<?php
include("con_bd.php");

$sql = "
    SELECT
        SUBSTRING(c.id, 1, 1) AS tipo_impuesto,
        CONCAT(p.nombre, ' ', p.paterno, ' ', p.materno) AS nombre_completo
    FROM
        persona p
    JOIN
        duenio d ON p.ci = d.ci
    JOIN
        catastro c ON d.ci = c.ci
    ORDER BY
        tipo_impuesto, nombre_completo
";

$resultado = $conn->query($sql);


$datos = [
    'Alto' => [],
    'Medio' => [],
    'Bajo' => []
];

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        switch ($row['tipo_impuesto']) {
            case '1':
                $datos['Alto'][] = $row['nombre_completo'];
                break;
            case '2':
                $datos['Medio'][] = $row['nombre_completo'];
                break;
            case '3':
                $datos['Bajo'][] = $row['nombre_completo'];
                break;
        }
    }
}


$max_filas = max(count($datos['Alto']), count($datos['Medio']), count($datos['Bajo']));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Personas por Tipo de Impuesto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Personas por Tipo de Impuesto</h1>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Alto</th>
                    <th>Medio</th>
                    <th>Bajo</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < $max_filas; $i++): ?>
                    <tr>
                        <td><?php echo isset($datos['Alto'][$i]) ? $datos['Alto'][$i] : ''; ?></td>
                        <td><?php echo isset($datos['Medio'][$i]) ? $datos['Medio'][$i] : ''; ?></td>
                        <td><?php echo isset($datos['Bajo'][$i]) ? $datos['Bajo'][$i] : ''; ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>

<?php
$conn->close();
?>