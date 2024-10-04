<?php
    include("../con_bd.php");


    $ci = $_GET["id"];  
    $nombre = $_GET["nombre"];
    $paterno = $_GET["paterno"];
    $materno = $_GET["materno"];

    $id_catastro = $_GET["id_c"]; 
    $zona = $_GET["zona"];
    $x_ini = $_GET["xini"];
    $x_fin = $_GET["xfin"];
    $y_ini = $_GET["yini"];
    $y_fin = $_GET["yfin"];
    $superficie = $_GET["superficie"];


    $sql_persona = "UPDATE persona 
                    SET nombre='$nombre', paterno='$paterno', materno='$materno' 
                    WHERE ci=$ci";

    if ($conn->query($sql_persona) === TRUE) {
        echo "Información de persona actualizada correctamente.<br>";
    } else {
        echo "Error actualizando la información de la persona: " . $conn->error;
    }

    $sql_catastro = "UPDATE catastro 
                     SET zona='$zona', x_ini='$x_ini', x_fin='$x_fin', y_ini='$y_ini', y_fin='$y_fin', superficie='$superficie' 
                     WHERE id=$id_catastro";

    if ($conn->query($sql_catastro) === TRUE) {
        echo "Información de catastro actualizada correctamente.<br>";
    } else {
        echo "Error actualizando la información del catastro: " . $conn->error;
    }

    $conn->close();
?>
