<?php

include("../con_bd.php");


include "../1/cabeza.php";
?>

<h1>AÑADIR INFORMACIÓN</h1>

<form action="guardaagregar.php" method="POST">
    <div class="container">
        <div class="row">
            <!-- Columna Izquierda -->
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
                    <label for="Contraseña" class="form-label">Contraseña</label>
                    <input type="text" class="form-control" id="contraseña" name="contraseña" required>
                </div>
            </div>

            <!-- Columna Derecha -->
            <div class="col-md-6">
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
                <div class="mb-3">
                    <label for="superficie" class="form-label">Distrito</label>
                    <input type="text" class="form-control" id="distrito" name="distrito" required>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>

<?php
$conn->close();
?>
