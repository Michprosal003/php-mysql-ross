<?php
// Establecer la conexión a la base de datos MySQL
$conn = mysqli_connect("localhost", "root", "", "zombie_db");

// Verificar si la conexión fue exitosa
if (!$conn) {
    die("La conexión falló: " . mysqli_connect_error());
}
?>
