<?php 

require_once("conexion.php");

if (isset($_GET['Del'])) {
    $ID = $_GET['Del'];

    // Preparar la consulta para evitar la inyección SQL
    $query = "DELETE FROM estudiantes WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $ID);

    if ($stmt->execute()) {
        header("Location: view.php");
    } else {
        echo "Error al ejecutar la consulta. Por favor, revisa tu query.";
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
} else {
    header("Location: formulario.php");
}
?>
