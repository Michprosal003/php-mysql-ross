<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .pagination {
            margin-top: 20px;
            text-align: center;
        }
        .pagination a {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            color: #337ab7;
            border: 1px solid #ddd;
        }
        .pagination a.active {
            background-color: #337ab7;
            color: white;
            border: 1px solid #337ab7;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">REGISTRO DE ASISTENCIA AL CURSO PHP</h2>

    <!-- Formulario de Búsqueda -->
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <input type="text" name="search_query" class="form-control" placeholder="Buscar...">
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <!-- Botón para regresar a formulario.php -->
    <form action="index.php" method="get">
        <button type="submit" class="btn btn-secondary mt-3">Regresar a Formulario</button>
    </form>

    <!-- PHP para Procesar Búsqueda y Mostrar Resultados -->
    <?php
    // Establecer conexión con la base de datos
    $conn = mysqli_connect("localhost", "root", "", "zombie_db");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Establecer la codificación de caracteres a UTF-8
    $conn->set_charset("utf8mb4");

    // Definir el número de resultados por página
    $results_per_page = 5;

    // Construir la consulta SQL base
    $sql = "SELECT * FROM estudiantes";
    $params = [];

    // Añadir condiciones de búsqueda si se envía una consulta
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['search_query'])) {
        $search_query = "%" . $_POST['search_query'] . "%";
        $sql .= " WHERE id LIKE ? OR nombre LIKE ? OR apellido LIKE ? OR correo LIKE ? OR telefono LIKE ? OR nivel_conocimiento LIKE ?";
        $params = array_fill(0, 6, $search_query);
    }

    // Preparar la declaración SQL
    $stmt = $conn->prepare($sql);

    // Asociar los parámetros si existen
    if (!empty($params)) {
        $types = str_repeat('s', count($params));
        $stmt->bind_param($types, ...$params);
    }

    // Ejecutar la consulta
    $stmt->execute();
    $result = $stmt->get_result();
    $total_results = $result->num_rows;
    $total_pages = ceil($total_results / $results_per_page);

    // Obtener el número de página actual
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Calcular el límite inicial para la consulta SQL
    $start_limit = ($page - 1) * $results_per_page;

    // Añadir la cláusula LIMIT a la consulta SQL
    $sql .= " LIMIT ?, ?";
    $params[] = $start_limit;
    $params[] = $results_per_page;

    // Preparar la declaración SQL con LIMIT
    $stmt = $conn->prepare($sql);

    // Asociar los parámetros con tipos adecuados
    if (count($params) > 2) {
        $types = str_repeat('s', count($params) - 2) . 'ii';
        $stmt->bind_param($types, ...$params);
    } else {
        $stmt->bind_param('ii', $start_limit, $results_per_page);
    }

    // Ejecutar la consulta
    $stmt->execute();
    $result = $stmt->get_result();

    // Mostrar los resultados en una tabla
    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered table-striped'>";
        echo "<tr><th>ID</th><th>NOMBRE</th><th>APELLIDO</th><th>CORREO</th><th>TELÉFONO</th><th>NIVEL DE CONOCIMIENTO</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
            echo "<td>" . htmlspecialchars($row['apellido']) . "</td>";
            echo "<td>" . htmlspecialchars($row['correo']) . "</td>";
            echo "<td>" . htmlspecialchars($row['telefono']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nivel_conocimiento']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // Mostrar enlaces de paginación
        echo "<div class='pagination'>";
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='?page=" . $i . "' class='" . ($page == $i ? 'active' : '') . "'>" . $i . "</a>";
        }
        echo "</div>";
    } else {
        echo "<p>No se encontraron resultados.</p>";
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
    ?>
</div>

</body>
</html>
