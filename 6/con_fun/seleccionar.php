<?php
include("../con_bd.php");

$ci = $_GET["ci"];


$sql_persona = "SELECT d.ci as nci, p.nombre, p.paterno, p.materno
                 FROM duenio d, persona p
                 WHERE d.ci = p.ci AND d.ci = '$ci'";
$resultado_persona = $conn->query($sql_persona);
$fila = $resultado_persona->fetch_array();

$nci = $fila["nci"];
$nombre = $fila["nombre"];
$paterno = $fila["paterno"];
$materno = $fila["materno"];

$sql_catastro = "SELECT * FROM catastro WHERE ci = '$ci'";
$resultado_catastro = $conn->query($sql_catastro);
?>

<html>
<head>
    <title>Mi Página</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <script>
        function mostrarFormulario() {
            document.getElementById('formularioCatastro').style.display = 'block';
        }
    </script>
</head>

<body>
    <h1>ELEGIR PROPIEDAD</h1>

    <form action="editar.php" method="GET">
        <!-- C.o. ci -->
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
                                <input type="radio" name="id_catastro" value="<?php echo $row['id']; ?>" required>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">
                            <strong>Esta persona no tiene propiedades.</strong>
                            <br>
                            <a href="eliminar_persona.php?ci=<?php echo $ci; ?>" class="btn btn-danger"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar esta persona?');">Eliminar
                                Persona</a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?php if ($resultado_catastro->num_rows > 0): ?>
            <input type="submit" class='btn btn-secondary' />
        <?php endif; ?>
        
        <button type="button" class="btn btn-primary" onclick="mostrarFormulario()">Añadir Catastro</button>
        
        <a class='btn btn-danger' href='dash.php'>Cancelar</a>
    </form>

    <!-- Formulario new catastro -->
    <form action="guardar_catastro.php" method="POST" id="formularioCatastro" style="display: none;">
        <h2>Añadir Catastro</h2>
        <div class="mb-3">
            <label for="id" class="form-label">Id</label>
            <input type="text" class="form-control" id="id" name="id" required>
        </div>
        <div class="mb-3">
            <label for="zona" class="form-label">Zona</label>
            <input type="text" class="form-control" id="zona" name="zona" required>
        </div>
        <div class="mb-3">
            <label for="xini" class="form-label">X Inicial</label>
            <input type="text" class="form-control" id="xini" name="xini" required>
        </div>
        <div class="mb-3">
            <label for="xfin" class="form-label">X Final</label>
            <input type="text" class="form-control" id="xfin" name="xfin" required>
        </div>
        <div class="mb-3">
            <label for="yini" class="form-label">Y Inicial</label>
            <input type="text" class="form-control" id="yini" name="yini" required>
        </div>
        <div class="mb-3">
            <label for="yfin" class="form-label">Y Final</label>
            <input type="text" class="form-control" id="yfin" name="yfin" required>
        </div>
        <div class="mb-3">
            <label for="superficie" class="form-label">Superficie</label>
            <input type="text" class="form-control" id="superficie" name="superficie" required>
        </div>

        <!-- C.o. ci -->
        <input type="hidden" name="ci" value="<?php echo $ci; ?>">
        <input type="submit" class='btn btn-success' value="Guardar Catastro" />
        <a class='btn btn-danger' href='dash.php'>Cancelar</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>
</html>

<?php
$conn->close();
?>
