<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción de Estudiantes</title>
    <!-- Bootstrap CSS para estilos rápidos y responsivos -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #b0e0e6; /* Color de fondo celeste */
            background-size: cover; /* Ajusta la imagen para cubrir todo el fondo */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
            background-attachment: fixed; /* Fija la imagen de fondo para que no se desplace con el contenido */
            height: 100vh; /* Ajusta la altura al 100% del viewport */
        }
        .card {
            margin-bottom: 20px; /* Espacio entre las tarjetas */
        }
        .module {
            background-color: #ffffff; /* Color de fondo para cada módulo */
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .module-title {
            background-color: #007bff; /* Color de fondo para el título del módulo */
            color: #ffffff;
            padding: 10px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            margin-bottom: 10px;
        }
        .module-content {
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid h-100">
        <div class="row justify-content-center align-items-center h-100">
            <!-- Columna izquierda con formulario de inscripción -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Inscripción de estudiantes</h4>
                    </div>
                    <div class="card-body">
                        <form action="guardar_inscripcion.php" method="POST">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido:</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="correo" name="correo" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" required>
                            </div>
                            <div class="form-group">
                                <label for="nivel">Nivel de Conocimiento:</label>
                                <select class="form-control" id="nivel" name="nivel" required>
                                    <option value="">Seleccione el nivel de conocimiento</option>
                                    <option value="Principiante">Principiante</option>
                                    <option value="Intermedio">Intermedio</option>
                                    <option value="Avanzado">Avanzado</option>
                                </select>
                            </div>
                            <div class="form-group text-center">
                                <!-- Botón de envío -->
                                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Inscribirse</button>
                            </div>
                            <div class="form-group text-center">
                                <!-- Enlace para consultar la lista -->
                                <a href="buscar-pag.php" class="btn btn-secondary btn-lg btn-block">Consulta para ver si tu nombre ya aparece en la lista</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Columna derecha con tarjeta de imagen y detalles del curso -->
        <div class="row justify-content-center align-items-center mt-4">
            <div class="col-md-6">
                <div class="card">
                    <img src="https://w0.peakpx.com/wallpaper/6/619/HD-wallpaper-php-developer.jpg" class="card-img-top" alt="Imagen de PHP">
                    <div class="card-body">
                        <h4 class="card-title text-center">Bienvenido al curso de PHP</h4>
                        <p class="card-text">Aprende PHP y desarrolla aplicaciones web poderosas. La clave es ofrecer contenido de alta calidad y asegurarte de que los estudiantes obtengan habilidades prácticas y aplicables que puedan demostrar en el mundo real.</p>
                        <p><strong>¿Qué Aprenderás?</strong></p>
                        <ul>
                            <li>Instalación de XAMPP y Creación de Base de Datos MySQL</li>
                            <li>Descargar y Configurar Visual Studio Code</li>
                            <li>CRUD (Create, Read, Update, Delete)</li>
                            <li>Formularios y Funcionalidades Avanzadas</li>
                            <li>Estilización con CSS</li>
                            <li>Botones: agregar, actualizar, eliminar, buscar y paginación</li>
                        </ul>
                        <p><strong>Módulos del Curso</strong></p>
                        <ul>
                            <li class="module">
                                <div class="module-title">Módulo 1: Configuración del Entorno de Desarrollo</div>
                                <div class="module-content">
                                    <ul>
                                        <li>Introducción al desarrollo web y herramientas necesarias.</li>
                                        <li>Instalación y configuración de XAMPP para entorno de desarrollo local.</li>
                                        <li>Configuración y uso de Visual Studio Code como editor de código.</li>
                                    </ul>
                                </div>
                            </li>
                            <li class="module">
                                <div class="module-title">Módulo 2: Fundamentos de Bases de Datos MySQL</div>
                                <div class="module-content">
                                    <ul>
                                        <li>Conceptos básicos de bases de datos.</li>
                                        <li>Instalación y configuración de MySQL en XAMPP.</li>
                                        <li>Creación de una base de datos y tablas utilizando phpMyAdmin.</li>
                                    </ul>
                                </div>
                            </li>
                            <li class="module">
                                <div class="module-title">Módulo 3: Desarrollo de Funcionalidades Básicas</div>
                                <div class="module-content">
                                    <ul>
                                        <li>Creación de un sistema CRUD (Crear, Leer, Actualizar, Eliminar) utilizando PHP y MySQL.</li>
                                        <li>Implementación de formularios HTML para captura de datos.</li>
                                        <li>Validación de datos en el lado del cliente y servidor.</li>
                                    </ul>
                                </div>
                            </li>
                            <li class="module">
                                <div class="module-title">Módulo 4: Estilización y Diseño con CSS</div>
                                <div class="module-content">
                                    <ul>
                                        <li>Introducción a CSS y su sintaxis básica.</li>
                                        <li>Aplicación de estilos CSS a páginas web.</li>
                                        <li>Diseño responsivo y adaptabilidad a diferentes dispositivos.</li>
                                    </ul>
                                </div>
                            </li>
                            <li class="module">
                                <div class="module-title">Módulo 5: Implementación de Funcionalidades Avanzadas</div>
                                <div class="module-content">
                                    <ul>
                                        <li>Creación de botones funcionales: agregar, actualizar, eliminar, buscar.</li>
                                        <li>Implementación de paginación para manejar grandes conjuntos de datos.</li>
                                        <li>Integración de JavaScript para mejorar la experiencia del usuario.</li>
                                    </ul>
                                </div>
                            </li>
                            <li class="module">
                                <div class="module-title">Módulo 6: Publicación del Sitio Web</div>
                                <div class="module-content">
                                    <ul>
                                        <li>Registro y configuración en un servicio de hosting gratuito como Infinity Free.</li>
                                        <li>Transferencia de archivos utilizando FTP para subir tu sitio web.</li>
                                        <li>Configuración final y prueba en el entorno de producción.</li>
                                    </ul>
                                </div>
                            </li>
                            <li class="module">
                                <div class="module-title">Módulo 7: Optimización y Mantenimiento</div>
                                <div class="module-content">
                                    <ul>
                                        <li>Mejoras de rendimiento y optimización de código.</li>
                                        <li>Configuración de certificados SSL (si es compatible con el servicio).</li>
                                        <li>Estrategias básicas de seguridad y copias de seguridad.</li>
                                    </ul>
                                </div>
                            </li>
                            <li class="module">
                                <div class="module-title">Recursos Adicionales</div>
                                <div class="module-content">
                                    <ul>
                                        <li>Recomendaciones para continuar aprendiendo.</li>
                                        <li>Ejercicios y proyectos prácticos para reforzar lo aprendido.</li>
                                        <li>Soporte y comunidad online para resolver dudas y compartir experiencias.</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <p><strong>A Quién Va Dirigido</strong></p>
                        <ul>
                            <li>Desarrolladores Principiantes</li>
                            <li>Estudiantes de Informática</li>
                        </ul>
                        <p><strong>Inscríbete Ahora!</strong></p>
                        <p>No pierdas la oportunidad de avanzar en tu carrera de desarrollo web con PHP y MySQL. ¡Inscríbete hoy y comienza tu camino hacia el desarrollo web!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
