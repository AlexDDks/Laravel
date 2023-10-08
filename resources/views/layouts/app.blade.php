<!DOCTYPE html> <!-- Declaración del tipo de documento para HTML5 -->
<html lang="en"> <!-- El documento está en inglés -->

<head>
    <meta charset="UTF-8"> <!-- Establece el conjunto de caracteres del documento a UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Hace que el sitio web sea responsive, asegurándose de que se visualice correctamente en dispositivos móviles -->
    <title>Courses App</title> <!-- Establece el título de la página web -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Incluye el archivo de estilos app.css de la carpeta public/css -->
    @stack('styles') <!-- Permite insertar estilos específicos que se "apilan" desde vistas hijo -->
</head>

<body> <!-- Comienza el cuerpo del documento -->

    <div class="navbar"> <!-- Contenedor para la barra de navegación -->
        <a href="{{ route('courses.index') }}">Courses App</a>
        <!-- Enlace a la lista de cursos. La función route() genera una URL para la ruta con el nombre 'courses.index' -->
    </div>
    <div class="container"> <!-- Contenedor principal para el contenido -->
        @yield('content') <!-- Este es un punto de inserción donde las vistas hijo pueden "introducir" su contenido -->
    </div>

</body> <!-- Fin del cuerpo del documento -->

</html> <!-- Fin del documento HTML -->
