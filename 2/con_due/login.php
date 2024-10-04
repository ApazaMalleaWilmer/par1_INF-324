<?php
session_start(); 

include("../con_bd.php");

$usuario = $_POST['usuario'];
$password = $_POST['contraseña']; // Cambiado para que coincida con el formulario

// Consultar la base de datos para el dueño
$sql = "SELECT ci,usuario,contraseña FROM duenio WHERE usuario = '$usuario' AND contraseña = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Almacenar el usuario y el ci en la sesión
    $row = $result->fetch_assoc(); // Obtener los datos del dueño
    $_SESSION['usuario'] = $usuario; // Guardar el nombre de usuario
    $_SESSION['ci'] = $row['ci']; // Guardar el CI del dueño

    echo "ingreso";
    header("Location: ver_propiedades.php"); 
    exit(); 
} else {
    echo "Usuario o contraseña incorrectos.";
}

// Cerrar la conexión
$conn->close();
?>
