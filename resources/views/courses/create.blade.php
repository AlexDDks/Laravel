@extends('layouts.app')

@section('content')
    <h2>Add New Course</h2>
    <form action="{{ route('courses.store') }}" method="post">
        @csrf
        <label>Title:</label>
        <input type="text" name="title">
        <label>Description:</label>
        <textarea name="description"></textarea>
        <label>Language:</label>
        <input type="text" name="language">
        <label>Difficulty:</label>
        <select name="difficulty">
            <option value="Beginner">Beginner</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Advanced">Advanced</option>
        </select>
        <label>Instructor:</label>
        <input type="text" name="instructor">
        <label>Email:</label>
        <input type="email" name="email">
        <input type="submit" value="Add Course">
    </form>
@endsection
