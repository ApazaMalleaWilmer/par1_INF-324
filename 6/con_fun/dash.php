<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); 
    exit();
}

include("../con_bd.php");

$usuario_logueado = $_SESSION['usuario'];

$sql = "SELECT d.ci, p.nombre, p.paterno, p.materno
        FROM duenio d, persona p
        WHERE d.ci = p.ci";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .sidebar {
            height: 100vh;
            background-color: #6c757d;
            padding: 15px;
        }


        .sidebar a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background-color: #e9ecef;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <span class="nav-link">Bienvenido, <?php echo htmlspecialchars($usuario_logueado); ?></span>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger" href="../1/index.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid ">
        <div class="row">
            <!-- Barra lateral -->
            <div class="col-md-3 sidebar">
                <h4>Opciones</h4>
                <a href="#">Opción 1</a>
                <a href="#">Opción 2</a>
                <a href="#">Opción 3</a>
                <a href="#">Opción 4</a>
                <a href="#">Opción 5</a>
            </div>

            <!-- Contenido principal -->
            <div class="col-md-9">
                <main>
                    <h2 class="mb-3">Lista de Personas Registradas</h2>
                    <a class="btn btn-success float-right" href="../mostrar.php">Ver Lista de Personas por tipo de impuestos</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>CI</th>
                                <th>Nombre</th>
                                <th>Paterno</th>
                                <th>Materno</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result->num_rows > 0): ?>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $row['ci']; ?></td>
                                        <td><?php echo $row['nombre']; ?></td>
                                        <td><?php echo $row['paterno']; ?></td>
                                        <td><?php echo $row['materno']; ?></td>
                                        <td>
                                            <a class='btn btn-secondary'
                                                href='seleccionar.php?ci=<?php echo $row['ci']; ?>'>Editar</a>
                                            <a class='btn btn-danger'
                                                href='seleccionar_eliminar.php?ci=<?php echo $row['ci']; ?>'>Eliminar</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>

                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">No hay personas registradas.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </main>
            </div>
        </div>
    </div>
</body>

</html>

<?php

$conn->close();
?>