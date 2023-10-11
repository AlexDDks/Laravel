@extends('layouts.app')
<!-- Extiende o hereda todo el contenido de la vista 'layouts.app'. Esto significa que se usará como una plantilla base. -->

@section('content')
    <!-- Comienza una sección llamada 'content'. Esta sección se insertará en el punto de la plantilla yield('content') en 'layouts.app'. -->

    <h2>Courses List</h2>
    <!-- Título de la página que indica que estamos viendo una lista de cursos. -->

    <!-- Botón para navegar a la página de creación de cursos, osea el método create() -->
    <a class="add-course-button" href="{{ route('courses.create') }}">Add New Course</a>

    <!-- Inicio de la tabla que muestra todos los cursos. -->
    <table class="courses-table">
        <!-- Encabezado de la tabla. -->
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Language</th>
                <th>Difficulty</th>
                <th>Instructor</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>

        <!-- Cuerpo de la tabla. -->
        <tbody>
            <!-- Recorre cada curso en la variable $courses.Permite iterar o recorrer cada elemento de una colección o un array.-->
            @foreach ($courses as $course)
                <tr>
                    <!-- Muestra la información del curso en las celdas correspondientes, los datos son mandados desde el controlador -->
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->language }}</td>
                    <td>{{ $course->difficulty }}</td>
                    <td>{{ $course->instructor }}</td>
                    <td>{{ $course->email }}</td>

                    <!-- Celda que contiene acciones para editar y eliminar un curso. -->
                    <td class="actions-cell">
                        <!-- Enlace para editar el curso. -->
                        <a class="edit-link" href="{{ route('courses.edit', $course->id) }}">Edit</a>

                        <!-- Formulario para eliminar el curso. -->
                        <form class="delete-form" action="{{ route('courses.destroy', $course->id) }}" method="post">
                            @method('DELETE')
                            <!-- Esta directiva especifica que el formulario debe enviar una solicitud HTTP DELETE, que es el método HTTP estándar para eliminar recursos.  Los navegadores web típicamente solo admiten los métodos HTTP GET y POST cuando envían formularios. Sin embargo, las aplicaciones RESTful, como las creadas con Laravel, a menudo requieren otros métodos como PUT, PATCH y DELETE. Esta directiva agrega un campo oculto que indica a Laravel que la verdadera intención de este formulario POST es realizar una acción DELETE. Laravel interpretará esto adecuadamente en el servidor y tratará la solicitud como si fuera un DELETE -->

                            <!-- Botón para enviar el formulario y eliminar el curso. -->
                            <button type="submit" class="delete-button">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <!-- Fin del bucle foreach. -->
        </tbody>
    </table>
    <!-- Fin de la tabla. -->
@endsection
<!-- Finaliza la sección 'content'. -->

@push('styles')
    <!-- Comienza una directiva push para la pila 'styles'. Esto permite agregar estilos específicos a esta vista que se insertarán en la ubicación stack('styles') de 'layouts.app'. -->
    <link rel="stylesheet" href="{{ asset('css/courses-list.css') }}">
    <!-- Enlace al archivo de estilos específico para esta página de lista de cursos. La función asset() ayuda a generar la URL para el recurso en el directorio 'public'. -->
@endpush
<!-- Finaliza la directiva push. -->
