<?php
session_start(); 

include("../con_bd.php");


$usuario = $_POST['usuario'];
$password = $_POST['contraseña']; 


$sql = "SELECT * FROM funcionario WHERE usuario = ? AND contraseña = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $usuario, $password); 
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['usuario'] = $usuario;
    echo "ingreso";

    header("Location: dash.php"); 
    exit(); 
} else {
    echo "Usuario o contraseña incorrectos.";
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
