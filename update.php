<?php 
require_once("conexion.php");

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $nivel_conocimiento = $_POST['nivel'];

    // Preparar la consulta para evitar la inyección SQL
    $query = "UPDATE estudiantes SET nombre=?, apellido=?, correo=?, telefono=?, nivel_conocimiento=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssi", $nombre, $apellido, $correo, $telefono, $nivel_conocimiento, $id);

    if ($stmt->execute()) {
        header("Location: view.php");
    } else {
        echo "Revisa tu query nuevamente";
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
} else {
    header("Location: formulario.php");
}
?>


