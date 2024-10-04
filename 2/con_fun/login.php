<?php
session_start(); 

include("../con_bd.php");

$usuario = $_POST['usuario'];
$password = $_POST['contraseña']; 

// Consulta SQL sin usar declaración preparada
$sql = "SELECT * FROM funcionario WHERE usuario = '$usuario' AND contraseña = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['usuario'] = $usuario;

    header("Location: dash.php"); 
    exit(); 
} else {
    echo "Usuario o contraseña incorrectos.";
}

$conn->close();
?>
