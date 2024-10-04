<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "BDWilmer";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

include "../1/cabeza.php";
?>

<h1>AÑADIR INFORMACIÓN</h1>

<form action="guardaagregar.php" method="POST">
    <div class="container">
        <div class="row">
            <!-- Columna Izquierda - Información del Dueño -->
            <div class="col-md-6">
                <h2>Añadir Dueño</h2>
                <div class="mb-3">
                    <label for="ci" class="form-label">CI</label>
                    <input type="text" class="form-control" id="ci" name="ci" required>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="paterno" class="form-label">Paterno</label>
                    <input type="text" class="form-control" id="paterno" name="paterno" required>
                </div>
                <div class="mb-3">
                    <label for="materno" class="form-label">Materno</label>
                    <input type="text" class="form-control" id="materno" name="materno" required>
                </div>
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="text" class="form-control" id="contraseña" name="contraseña" required>
                </div>
            </div>

            <!-- Columna Derecha - Información del Catastro -->
            <div class="col-md-6">
                <h2>Añadir Catastro</h2>
                <div class="mb-3">
                    <label for="id" class="form-label">Id</label>
                    <input type="text" class="form-control" id="id" name="id" required>
                </div>
                <div class="mb-3">
                    <label for="distrito" class="form-label">Distrito</label>
                    <select id="distrito" name="distrito" class="form-control" required>
                        <option value="">Seleccione un distrito</option>
                        <?php
                        // Consulta para obtener los distritos
                        $sql = "SELECT id, nombre FROM distritos";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="zona" class="form-label">Zona</label>
                    <select id="zona" name="zona" class="form-control" required>
                        <option value="">Seleccione un distrito primero</option>
                    </select>
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
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <input type="submit" class='btn btn-secondary' value="Agregar" />
                <a class='btn btn-danger' href='../con_fun/dash.php'>Cancelar</a>
            </div>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../agregar_ajax.js"></script> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
</body>

</html>

<?php
$conn->close();
?>