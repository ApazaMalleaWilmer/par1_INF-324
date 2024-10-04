<?php

include("../con_bd.php");

$ci = $_GET["ci"];


$sql_persona = "SELECT d.ci as nci, p.nombre, p.paterno, p.materno
                 FROM duenio d, persona p
                 WHERE d.ci = p.ci AND d.ci = $ci";
$resultado_persona = $conn->query($sql_persona);
$fila = $resultado_persona->fetch_array();

$nci = $fila["nci"];
$nombre = $fila["nombre"];
$paterno = $fila["paterno"];
$materno = $fila["materno"];

$sql_catastro = "SELECT * FROM catastro WHERE ci = $ci";
$resultado_catastro = $conn->query($sql_catastro);

?>

<html>

<head>
    <title>Mi Página</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <script>
        function confirmarEliminacion() {
            return confirm("¿Estás seguro de que deseas eliminar esta persona?");
        }
    </script>
</head>

<body>
    <h1>ELEGIR PROPIEDAD</h1>

    <form action="eliminar.php" method="GET">

        <!-- C.o ci -->
        <input type="hidden" name="ci" value="<?php echo $ci; ?>">

        <h2>Seleccionar Propiedad</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Zona</th>
                    <th>X Inicial</th>
                    <th>Y Inicial</th>
                    <th>X Final</th>
                    <th>Y Final</th>
                    <th>Superficie</th>
                    <th>Seleccionar</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado_catastro->num_rows > 0): ?>
                    <?php while ($row = $resultado_catastro->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['zona']; ?></td>
                            <td><?php echo $row['x_ini']; ?></td>
                            <td><?php echo $row['y_ini']; ?></td>
                            <td><?php echo $row['x_fin']; ?></td>
                            <td><?php echo $row['y_fin']; ?></td>
                            <td><?php echo $row['superficie']; ?></td>
                            <td>
                                <input type="checkbox" name="id_catastro[]" value="<?php echo $row['id']; ?>">
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">
                            <strong>Esta persona no tiene propiedades.</strong>
                            <br>
                            <a href="eliminar_persona.php?ci=<?php echo $ci; ?>" class="btn btn-danger" 
                               onclick="return confirmarEliminacion();">Eliminar Persona</a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?php if ($resultado_catastro->num_rows > 0): ?>
            <button type="submit" class='btn btn-success'>Siguiente</button>
        <?php endif; ?>
        
        <a href="dash.php" class='btn btn-danger'>Cancelar</a>

    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>

</html>

<?php
$conn->close();
?>
