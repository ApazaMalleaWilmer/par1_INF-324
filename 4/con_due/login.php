<?php
session_start(); 

include("../con_bd.php");

$usuario = $_POST['usuario'];
$password = $_POST['contraseña']; 


$sql = "SELECT ci,usuario,contraseña FROM duenio WHERE usuario = '$usuario' AND contraseña = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); 
    $_SESSION['usuario'] = $usuario; 
    $_SESSION['ci'] = $row['ci']; 

    echo "ingreso";
    header("Location: ver_propiedades.php"); 
    exit(); 
} else {
    echo "Usuario o contraseña incorrectos.";
}

// Cerrar la conexión
$conn->close();
?>
