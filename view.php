<?php
require_once("conexion.php");

// Establece la codificación de caracteres de la conexión a la base de datos
mysqli_set_charset($conn, "utf8mb4");

$query = "SELECT * FROM estudiantes";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Matrícula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    
    <style>
        /* Estilos personalizados */
        h1 {
            text-align: center;
            color: #333;
            font-family: Arial, sans-serif;
            margin-top: 20px;
        }

        /* Estilos para los botones de acción */
        .btn-accion {
            margin-right: 5px; /* Margen derecho entre botones */
        }

        /* Colores para las celdas de encabezado */
        th:nth-child(1) { background-color: #FFD700; } /* Amarillo para ID */
        th:nth-child(2) { background-color: #ADFF2F; } /* Verde para NOMBRE */
        th:nth-child(3) { background-color: #87CEEB; } /* Azul para APELLIDO */
        th:nth-child(4) { background-color: #FFB6C1; } /* Rosa para CORREO */
        th:nth-child(5) { background-color: #FFA500; } /* Naranja para TELÉFONO */
        th:nth-child(6) { background-color: #DDA0DD; } /* Púrpura para NIVEL DE CONOCIMIENTO */
        th:nth-child(7),
        th:nth-child(8),
        th:nth-child(9) { background-color: #90EE90; } /* Verde claro para ACCIÓN */
    </style>
</head>
<body>

<div class="container">
    <h1>REGISTRO DE ASISTENCIA AL CURSO DE PHP</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>CORREO</th>
                    <th>TELÉFONO</th>
                    <th>NIVEL DE CONOCIMIENTO</th>
                    <th>ACCIÓN</th>
                    <th>ACCIÓN</th>
                    <th>ACCIÓN</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($row['apellido']); ?></td>
                        <td><?php echo htmlspecialchars($row['correo']); ?></td>
                        <td><?php echo htmlspecialchars($row['telefono']); ?></td>
                        <td><?php echo htmlspecialchars($row['nivel_conocimiento']); ?></td>
                        <td>
                            <a href="edit.php?GetID=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-danger btn-accion">Actualizar</a>
                        </td>
                        <td>
                            <a href="delete.php?Del=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-secondary btn-accion" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');">Eliminar</a>
                        </td>
                        <td>
                            <a href="buscar-pag.php" class="btn btn-warning btn-accion">Ver</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <a href="index.php" class="btn btn-primary">Agregar Estudiante</a>
</div>

</body>
</html> 




