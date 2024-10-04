<?php
    include("../con_bd.php");

    $ci = $_GET["ci"];
    $id_catastro = $_GET["id_catastro"];


    $sql_persona = "SELECT d.ci as nci, p.nombre, p.paterno, p.materno, c.id as cid, c.zona, c.x_ini, c.x_fin, c.y_ini, c.y_fin, c.superficie
                    FROM duenio d, persona p, catastro c
                    WHERE d.ci = p.ci AND d.ci = $ci AND c.id = $id_catastro";

    $resultado_persona = $conn->query($sql_persona);
    $fila = $resultado_persona->fetch_array();

    $nci = $fila["nci"];
    $nombre = $fila["nombre"];
    $paterno = $fila["paterno"];
    $materno = $fila["materno"];

    $cid = $fila["cid"];
    $zona = $fila["zona"];
    $x_ini = $fila["x_ini"];
    $x_fin = $fila["x_fin"];
    $y_ini = $fila["y_ini"];
    $y_fin = $fila["y_fin"];
    $superficie = $fila["superficie"];

    include "../1/cabeza.php";
?>



<h1>EDITAR INFORMACIÓN</h1>

<form action="guardaeditar.php" method="GET">
    <div class="container">
        <div class="row">
            <!-- Columna Izquierda -->
            <div class="col-md-6">
                <h2>Editar Dueño</h2>
                <div class="mb-3">
                    <label for="id" class="form-label">Id</label>
                    <input type="text" class="form-control" id="id" name="id" value="<?php echo $ci; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
                </div>
                <div class="mb-3">
                    <label for="paterno" class="form-label">Paterno</label>
                    <input type="text" class="form-control" id="paterno" name="paterno" value="<?php echo $paterno; ?>">
                </div>
                <div class="mb-3">
                    <label for="materno" class="form-label">Materno</label>
                    <input type="text" class="form-control" id="materno" name="materno" value="<?php echo $materno; ?>">
                </div>
            </div>

            <!-- Columna Derecha -->
            <div class="col-md-6">
                <h2>Editar Catastro</h2>
                <div class="mb-3">
                    <label for="id_c" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id_c" name="id_c" value="<?php echo $id_catastro; ?>"
                        readonly>
                </div>

                <div class="mb-3">
                    <label for="zona" class="form-label">Zona</label>
                    <input type="text" class="form-control" id="zona" name="zona" value="<?php echo $zona; ?>">
                </div>

                <div class="mb-3">
                    <label for="xini" class="form-label">X Inicial</label>
                    <input type="text" class="form-control" id="xini" name="xini" value="<?php echo $x_ini; ?>">
                </div>
                <div class="mb-3">
                    <label for="xfin" class="form-label">X Final</label>
                    <input type="text" class="form-control" id="xfin" name="xfin" value="<?php echo $x_fin; ?>">
                </div>

                <div class="mb-3">
                    <label for="yini" class="form-label">Y Inicial</label>
                    <input type="text" class="form-control" id="yini" name="yini" value="<?php echo $y_ini; ?>">
                </div>
                <div class="mb-3">
                    <label for="yfin" class="form-label">Y Final</label>
                    <input type="text" class="form-control" id="yfin" name="yfin" value="<?php echo $y_fin; ?>">
                </div>

                <div class="mb-3">
                    <label for="superficie" class="form-label">Superficie</label>
                    <input type="text" class="form-control" id="superficie" name="superficie"
                        value="<?php echo $superficie; ?>">
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <input type="submit"  class='btn btn-secondary' />
                <a class='btn btn-danger' href='dash.php'>Cancelar</a>
            </div>
        </div>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
</body>

</html>

<?php

$conn->close();
?>