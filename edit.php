<?php 
require_once("conexion.php");

$id = $_GET['GetID'];
$query = "SELECT * FROM estudiantes WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    $nombre = htmlspecialchars($row['nombre']);
    $apellido = htmlspecialchars($row['apellido']);
    $correo = htmlspecialchars($row['correo']);
    $telefono = htmlspecialchars($row['telefono']);
    $nivel_conocimiento = htmlspecialchars($row['nivel_conocimiento']);
} else {
    echo "No se encontraron datos para este ID.";
}

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción de Estudiantes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://wallpapercave.com/wp/wp10474946.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Editar Inscripción de Estudiantes</h4>
                    </div>
                    <div class="card-body">
                        <form action="update.php?id=<?php echo $id; ?>" method="POST">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido:</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $apellido; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $correo; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nivel">Nivel de Conocimiento:</label>
                                <select class="form-control" id="nivel" name="nivel" required>
                                    <option value="">Seleccione el nivel de conocimiento</option>
                                    <option value="Principiante" <?php echo ($nivel_conocimiento == "Principiante") ? "selected" : ""; ?>>Principiante</option>
                                    <option value="Intermedio" <?php echo ($nivel_conocimiento == "Intermedio") ? "selected" : ""; ?>>Intermedio</option>
                                    <option value="Avanzado" <?php echo ($nivel_conocimiento == "Avanzado") ? "selected" : ""; ?>>Avanzado</option>
                                </select>
                            </div>
                            <button type="submit" name="update" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
