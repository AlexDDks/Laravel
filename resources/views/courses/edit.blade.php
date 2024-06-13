@extends('layouts.app')
<!-- Extiende o hereda todo el contenido de la vista 'layouts.app', lo que significa que se usará como una plantilla base. -->

@section('content')
    <!-- Comienza una sección llamada 'content'. Esta sección se insertará en el punto de la plantilla yield('content') en 'layouts.app'. -->

    <h2>Edit Course</h2>
    <!-- Título de la página que indica que estamos en la sección de edición de curso. -->

    <!-- Comienza el formulario para editar un curso.
                                                 La acción del formulario apunta a la ruta 'courses.update' y pasa el ID del curso para saber cuál modificar.
                                                 La clase añadida se utiliza para dar estilos específicos al formulario. -->
    <form action="{{ route('courses.update', $course->id) }}" method="post" class="edit-course-form"
        enctype="multipart/form-data">
        @csrf
        <!-- Token CSRF para proteger contra ataques de falsificación de solicitudes entre sitios. -->

        @method('PUT')
        <!-- Esta directiva especifica que el formulario debe enviar una solicitud HTTP PUT, que es el método HTTP estándar para actualizar recursos. -->

        <!-- Cada uno de estos campos del formulario se prellena con la información actual del curso para edición. -->
        <label>Title:</label>
        <input type="text" name="title" value="{{ $course->title }}">

        <label>Description:</label>
        <textarea name="description">{{ $course->description }}</textarea>

        <label>Language:</label>
        <input type="text" name="language" value="{{ $course->language }}">

        <label>Difficulty:</label>
        <select name="difficulty">
            <!-- Se verifica la dificultad actual del curso y se selecciona la opción correspondiente en el dropdown. -->
            <option value="Beginner" {{ $course->difficulty == 'Beginner' ? 'selected' : '' }}>Beginner</option>
            <option value="Intermediate" {{ $course->difficulty == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
            <option value="Advanced" {{ $course->difficulty == 'Advanced' ? 'selected' : '' }}>Advanced</option>
        </select>

        <label for="instructor">Instructor:</label>
        <select name="instructor" id="instructor" class="form-control">
            <option value="">Seleccione un instructor</option>
            @foreach ($instructors as $instructor)
                <option value="{{ $instructor->name }}" {{ old('instructor') == $instructor->name ? 'selected' : '' }}>
                    {{ $instructor->name }}
                </option>
            @endforeach
        </select>
        @error('instructor')
            <!-- Mensaje de error para el campo 'instructor' -->
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror



        <!-- Botón para enviar el formulario y actualizar la información del curso en la base de datos. -->
        <input type="submit" value="Update Course">

    </form>
    <!-- Fin del formulario -->
@endsection
<!-- Finaliza la sección 'content'. -->

@push('styles')
    <!-- Comienza una directiva push para la pila 'styles'. Esto permite agregar estilos específicos a esta vista que se insertarán en la ubicación @stack('styles') de 'layouts.app'. -->
    <link rel="stylesheet" href="{{ asset('css/edit-course.css') }}?v=1.01">
    <!-- Enlace al archivo de estilos específico para esta página de edición. La función asset() ayuda a generar la URL para el recurso en el directorio 'public'. -->
@endpush
<!-- Finaliza la directiva push. -->
