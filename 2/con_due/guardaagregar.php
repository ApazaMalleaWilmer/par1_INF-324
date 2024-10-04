<?php
include("../con_bd.php");

$ci = $_POST["ci"];
$nombre = $_POST["nombre"];
$paterno = $_POST["paterno"];
$materno = $_POST["materno"];

$usuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];

$id = $_POST["id"];
$zona = $_POST["zona"];
$x_ini = $_POST["xini"];
$x_fin = $_POST["xfin"];
$y_ini = $_POST["yini"];
$y_fin = $_POST["yfin"];
$superficie = $_POST["superficie"];
$distrito = $_POST["distrito"];


$conn->begin_transaction();

try {
    $sql_persona = "INSERT INTO persona (ci, nombre, paterno, materno) VALUES ('$ci', '$nombre', '$paterno', '$materno')";


    $sql_duenio = "INSERT INTO duenio (ci,usuario,contraseña) VALUES ('$ci','$usuario','$contraseña')";

    $id_duenio = $conn->insert_id; 

    // Insertar la información del catastro
    $sql_catastro = "INSERT INTO catastro (zona, x_ini, x_fin, y_ini, y_fin, superficie, ci, distrito) VALUES ('$zona', '$x_ini', '$x_fin', '$y_ini', '$y_fin', '$superficie', '$ci','$distrito')";


    $conn->commit();
    echo "Nuevo dueño y catastro agregados correctamente.";

} catch (Exception $e) {
    
    $conn->rollback();
    echo $e->getMessage();
}

$conn->close();

?>
