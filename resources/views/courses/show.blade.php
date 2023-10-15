@extends('layouts.app')

@section('content')
    <h2>Course Details</h2>
    <div class="course-details">
        <h3>{{ $course->title }}</h3>
        <p><strong>Description:</strong> {{ $course->description }}</p>
        <p><strong>Language:</strong> {{ $course->language }}</p>
        <p><strong>Difficulty:</strong> {{ $course->difficulty }}</p>
        <p><strong>Instructor:</strong> {{ $course->instructor }}</p>
        <p><strong>Email:</strong> {{ $course->email }}</p>
    </div>

    <a href="{{ route('courses.index') }}" class="back-link">Back to Courses List</a>

    @push('styles')
        <!-- Comienza una directiva push para la pila 'styles'. Esto permite agregar estilos específicos a esta vista que se insertarán en la ubicación stack('styles') de 'layouts.app'. -->
        <link rel="stylesheet" href="{{ asset('css/show-course.css') }}">
        <!-- Enlace al archivo de estilos específico para esta página de lista de cursos. La función asset() ayuda a generar la URL para el recurso en el directorio 'public'. -->
    @endpush
@endsection
