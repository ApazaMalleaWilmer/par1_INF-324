<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "BDWilmer";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener los datos del formulario
$ci = $_POST["ci"];
$nombre = $_POST["nombre"];
$paterno = $_POST["paterno"];
$materno = $_POST["materno"];

$usuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];

$id = $_POST["id"];
$zona = $_POST["zona"];
$x_ini = $_POST["xini"];
$x_fin = $_POST["xfin"];
$y_ini = $_POST["yini"];
$y_fin = $_POST["yfin"];
$superficie = $_POST["superficie"];
$distrito = $_POST["distrito"];

// Iniciar una transacción
$conn->begin_transaction();

try {
    // Insertar la información de la persona
    $sql_persona = "INSERT INTO persona (ci, nombre, paterno, materno) VALUES ('$ci', '$nombre', '$paterno', '$materno')";
    if (!$conn->query($sql_persona)) {
        throw new Exception("Error al agregar persona: " . $conn->error);
    }

    // Insertar la información del dueño
    $sql_duenio = "INSERT INTO duenio (ci,usuario,contraseña) VALUES ('$ci','$usuario','$contraseña')";
    if (!$conn->query($sql_duenio)) {
        throw new Exception("Error al agregar dueño: " . $conn->error);
    }

    // Obtener el ID del dueño recién creado para relacionarlo con el catastro
    $id_duenio = $conn->insert_id;  // Suponiendo que ci es único y auto incrementable

    // Insertar la información del catastro
    $sql_catastro = "INSERT INTO catastro (zona, x_ini, x_fin, y_ini, y_fin, superficie, ci, distrito) VALUES ('$zona', '$x_ini', '$x_fin', '$y_ini', '$y_fin', '$superficie', '$ci','$distrito')";
    if (!$conn->query($sql_catastro)) {
        throw new Exception("Error al agregar catastro: " . $conn->error);
    }

    // Confirmar la transacción
    $conn->commit();
    echo "Nuevo dueño y catastro agregados correctamente.";

} catch (Exception $e) {
    // Revertir la transacción en caso de error
    $conn->rollback();
    echo $e->getMessage();
}

// Cerrar la conexión
$conn->close();

// Redirigir a una página de éxito o mostrar un mensaje
// header("Location: success.php"); // Descomentar para redirigir a otra página
?>
