@extends('layouts.app')
<!-- Extiende o hereda todo el contenido de la vista 'layouts.app'. Esta es una forma de usar una plantilla base y agregar contenido específico para esta vista en particular. -->

@section('content')
    <!-- Comienza una sección llamada 'content'. Esta sección se insertará en el punto de la plantilla yield('content') en 'layouts.app'. -->

    <h2>Add New Course</h2>
    <!-- Título de la página -->

    <form class="course-form" action="{{ route('courses.store') }}" method="post">
        <!-- Inicio del formulario para agregar un curso. Cuando se envíe el formulario, hará una solicitud POST a la URL generada por route('courses.store'). -->

        @csrf
        <!-- Directiva Blade para agregar un token CSRF, que es una medida de seguridad para proteger contra ataques de falsificación de solicitudes entre sitios. -->

        <label for="title">Title:</label>
        <input type="text" id="title" name="title">
        <!-- Campo para ingresar el título del curso. -->

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
        <!-- Campo para ingresar la descripción del curso. -->

        <label for="language">Language:</label>
        <input type="text" id="language" name="language">
        <!-- Campo para ingresar el idioma del curso. -->

        <label for="difficulty">Difficulty:</label>
        <select id="difficulty" name="difficulty">
            <option value="Beginner">Beginner</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Advanced">Advanced</option>
        </select>
        <!-- Campo desplegable para seleccionar la dificultad del curso. -->

        <label for="instructor">Instructor:</label>
        <input type="text" id="instructor" name="instructor">
        <!-- Campo para ingresar el nombre del instructor del curso. -->

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <!-- Campo para ingresar el correo electrónico del instructor o del curso. -->

        <input type="submit" value="Add Course">
        <!-- Botón para enviar el formulario. -->

    </form>
    <!-- Fin del formulario -->
@endsection
<!-- Finaliza la sección 'content'. -->

@push('styles')
    <!-- Comienza una directiva push para la pila 'styles'. Esto permite agregar estilos específicos a esta vista que se insertarán en la ubicación stack('styles') de 'layouts.app'. -->

    <link rel="stylesheet" href="{{ asset('css/course-form.css') }}">
    <!-- Enlace al archivo de estilos específico para este formulario. La función asset() ayuda a generar la URL para el recurso en el directorio 'public'. -->
@endpush
<!-- Finaliza la directiva push. -->
