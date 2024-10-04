<?php
    include("../con_bd.php");

    $id= $_POST["id"];
    $zona = $_POST["zona"];
    $x_ini = $_POST["xini"];
    $x_fin = $_POST["xfin"];
    $y_ini = $_POST["yini"];
    $y_fin = $_POST["yfin"];
    $superficie = $_POST["superficie"];
    $ci = $_POST["ci"]; 


    $sql_catastro = "INSERT INTO catastro (id,zona, x_ini, x_fin, y_ini, y_fin, superficie, ci) VALUES ('$id','$zona', '$x_ini', '$x_fin', '$y_ini', '$y_fin', '$superficie', '$ci')";

    if ($conn->query($sql_catastro) === TRUE) {
        echo "Nuevo catastro agregado correctamente.";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
?>
