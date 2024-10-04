<?php
include("con_bd.php");


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

$sql_catastro = "SELECT id, zona, x_ini, x_fin, y_ini, y_fin, superficie, ci, distrito FROM catastro WHERE ci = $ci";
$resultado_catastro = $conn->query($sql_catastro);
?>

<html>

<head>
    <title>Mi Página</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body>
    <h1>ELEGIR PROPIEDAD</h1>

    <form action="http://localhost:8080/pruebafinal/NewServlet_exa" method="GET">
        <h2>Seleccionar Propiedad</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Zona</th>
                    <th>X Inicial</th>
                    <th>Y Inicial</th>
                    <th>X Final</th>
                    <th>Y Final</th>
                    <th>Superficie</th>
                    <th>Distrito</th>
                    <th>Seleccionar</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado_catastro->num_rows > 0): ?>
                    <?php while ($row = $resultado_catastro->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['zona']; ?></td>
                            <td><?php echo $row['x_ini']; ?></td>
                            <td><?php echo $row['y_ini']; ?></td>
                            <td><?php echo $row['x_fin']; ?></td>
                            <td><?php echo $row['y_fin']; ?></td>
                            <td><?php echo $row['superficie']; ?></td>
                            <td><?php echo $row['distrito']; ?></td>
                            <td>
                                <form action="http://localhost:8080/pruebafinal/NewServlet_exa" method="GET">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="ci" value="<?php echo $ci; ?>">
                                    <button type="submit" class="btn btn-warning">Ver</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No se encontraron propiedades.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <a class='btn btn-danger' href='con_fun/dash.php'>Cancelar</a>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>

</html>

<?php
$conn->close();
?>
