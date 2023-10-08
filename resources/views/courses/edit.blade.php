@extends('layouts.app')

@section('content')
    <h2>Edit Course</h2>
    <form action="{{ route('courses.update', $course->id) }}" method="post">
        @csrf
        @method('PUT')
        <label>Title:</label>
        <input type="text" name="title" value="{{ $course->title }}">
        <label>Description:</label>
        <textarea name="description">{{ $course->description }}</textarea>
        <label>Language:</label>
        <input type="text" name="language" value="{{ $course->language }}">
        <label>Difficulty:</label>
        <select name="difficulty">
            <option value="Beginner" {{ $course->difficulty == 'Beginner' ? 'selected' : '' }}>Beginner</option>
            <option value="Intermediate" {{ $course->difficulty == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
            <option value="Advanced" {{ $course->difficulty == 'Advanced' ? 'selected' : '' }}>Advanced</option>
        </select>
        <label>Instructor:</label>
        <input type="text" name="instructor" value="{{ $course->instructor }}">
        <label>Email:</label>
        <input type="email" name="email" value="{{ $course->email }}">
        <input type="submit" value="Update Course">
    </form>
@endsection
