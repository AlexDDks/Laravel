@extends('layouts.app')

@section('content')
    <h2>Add New Course</h2>

    <form class="course-form" action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}">
        @error('title')
            <!-- Mensaje de error para el campo 'title' -->
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ old('description') }}</textarea>
        @error('description')
            <!-- Mensaje de error para el campo 'description' -->
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="language">Language:</label>
        <input type="text" id="language" name="language" value="{{ old('language') }}">
        @error('language')
            <!-- Mensaje de error para el campo 'language' -->
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="difficulty">Difficulty:</label>
        <select id="difficulty" name="difficulty">
            <option value="Beginner" {{ old('difficulty') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
            <option value="Intermediate" {{ old('difficulty') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
            <option value="Advanced" {{ old('difficulty') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
        </select>
        @error('difficulty')
            <!-- Mensaje de error para el campo 'difficulty' -->
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

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





        <input type="submit" value="Add Course">
    </form>
@endsection
