<?php

include("../con_bd.php");



if (isset($_GET['ci'])) {
    $ci = $_GET['ci'];

    $conn->begin_transaction();

    try {

        $sql_duenio = "DELETE FROM duenio WHERE ci = $ci";
        $conn->query($sql_duenio);

        $sql_persona = "DELETE FROM persona WHERE ci = $ci";
        $conn->query($sql_persona);

        $conn->commit();
        $message = "La persona ha sido eliminada exitosamente.";
    } catch (Exception $e) {
        $conn->rollback();
        $message = "Error al eliminar la persona: " . $e->getMessage();
    }
} else {
    $message = "No se proporcionó un CI válido.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function confirmDeletion(ci) {
            return confirm("¿Estás seguro de que deseas eliminar a la persona con CI " + ci + "?");
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Eliminar Persona</h1>
        <?php if (isset($message)): ?>
            <div class="alert <?php echo strpos($message, 'Error') !== false ? 'alert-danger' : 'alert-success'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        
        <form action="" method="GET" onsubmit="return confirmDeletion('<?php echo $ci; ?>');">
            <input type="hidden" name="ci" value="<?php echo $ci; ?>">
            <a href="dash.php" class="btn btn-primary">Volver al Dashboard</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
