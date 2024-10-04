<?php
include ("con_bd.php");


if (isset($_POST['distrito_id'])) {
    $distrito_id = $_POST['distrito_id'];

    $query = "SELECT id, nombre FROM zonas WHERE distrito_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $distrito_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $zonas = [];
    while ($row = $result->fetch_assoc()) {
        $zonas[] = $row;
    }

    echo json_encode($zonas);
}

$conn->close();
?>
