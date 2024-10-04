<?php

    include("../con_bd.php");

    $ci = $_GET["ci"];
    $ids_catastro = isset($_GET["id_catastro"]) ? $_GET["id_catastro"] : [];

    if (empty($ids_catastro)) {
        echo "<script>alert('No seleccionaste ninguna propiedad para eliminar.'); window.location.href='dash.php';</script>";
    } else {
        echo "<script>
                if (confirm('¿Estás seguro de que deseas eliminar las propiedades seleccionadas?')) {
                    window.location.href='eliminar_confirmado.php?ci=$ci&ids_catastro=" . implode(',', $ids_catastro) . "';
                } else {
                    window.location.href='dash.php';
                }
              </script>";
    }


    $conn->close();
?>
