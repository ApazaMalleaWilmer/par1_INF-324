<?php
session_start(); 

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include("../con_bd.php");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el CI del dueño logueado
$ci_dueño = $_SESSION['ci']; // Ahora obtienes el CI almacenado en la sesión

// Obtener la lista de propiedades del dueño
$sql = "SELECT * FROM catastro WHERE ci = '$ci_dueño'"; // Modifica esta consulta según tu lógica
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Propiedades</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Sistema de Catastro</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <span class="navbar-text">
                        Bienvenido, <?php echo $_SESSION['usuario']; ?>
                    </span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../1/index.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="mb-3">Lista de Propiedades</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Zona</th>
                    <th>Coordenadas Iniciales (X,Y)</th>
                    <th>Coordenadas Finales (X,Y)</th>
                    <th>Superficie</th>
                    <th>Distrito</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['zona']; ?></td>
                            <td><?php echo $row['x_ini'] . ',' . $row['y_ini']; ?></td>
                            <td><?php echo $row['x_fin'] . ',' . $row['y_fin']; ?></td>
                            <td><?php echo $row['superficie']; ?></td>
                            <td><?php echo $row['distrito']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">No hay propiedades registradas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
// Cerrar la conexión
$conn->close();
?>
