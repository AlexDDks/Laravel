@extends('layouts.app')

@section('content')
    <h2>Students List</h2>
    <a class="btn btn-primary" href="{{ route('students.create') }}">Add New Student</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Course</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>
                        {{-- If the students does not have any courses --}}
                        @if ($student->courses->isEmpty())
                            No courses enrolled.
                        @else
                            {{-- Here we iterate for each one of the courses of the student: the colection $student->courses is one courses --}}
                            @foreach ($student->courses as $course)
                                {{-- . Si no es el último curso, se añade una coma y un espacio ', ' después del título del curso. --}}
                                {{-- Laravel te proporciona automáticamente una variable especial llamada $loop. Esta variable contiene información sobre el estado actual del bucle. Una de las propiedades de $loop es last, la cual es un booleano (verdadero o falso) que indica si el elemento actual es el último elemento del bucle.

                                $loop->last es true si el elemento actual es el último en la colección.
                                $loop->last es false si hay más elementos después del actual en la colección. --}}
                                <span>{{ $course->title }}</span>{{ !$loop->last ? ', ' : '' }}
                            @endforeach
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/students-list.css') }}">
@endpush
