<?php 
require_once("conexion.php");

if(isset($_POST['submit']))
{
    // Validar que todos los campos estén completos
    if(empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['correo']) || empty($_POST['telefono']) || empty($_POST['nivel'])) 
    {
        echo "Completa todos los campos.";
    }     
    else 
    {
        // Limpiar y escapar los datos del formulario
        $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
        $apellido = mysqli_real_escape_string($conn, $_POST['apellido']);
        $correo = mysqli_real_escape_string($conn, $_POST['correo']);
        $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
        $nivel = mysqli_real_escape_string($conn, $_POST['nivel']);

        // Preparar la consulta SQL para insertar datos
        $query = "INSERT INTO estudiantes (nombre, apellido, correo, telefono, nivel_conocimiento) VALUES ('$nombre', '$apellido', '$correo', '$telefono', '$nivel')";
        
        // Ejecutar la consulta y verificar el resultado
        $result = mysqli_query($conn, $query);

        if($result)
        {
            header("location: view.php");
            exit;
        }
        else 
        {
            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
        }
    }
}
else 
{
    header("location: index.php");
    exit;
}
?>

