@extends('layouts.app')

@section('content')
    <h2>Courses List</h2>
    <a href="{{ route('courses.create') }}">Add New Course</a>
    <table border="1">
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
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->language }}</td>
                    <td>{{ $course->difficulty }}</td>
                    <td>{{ $course->instructor }}</td>
                    <td>{{ $course->email }}</td>
                    <td>
                        <a href="{{ route('courses.edit', $course->id) }}">Edit</a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
