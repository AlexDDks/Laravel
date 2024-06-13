@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add New Student</h2>
        <form action="{{ route('students.store') }}" method="post">
            @csrf <!-- CSRF Token for form submission security -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <!-- Dropdown for selecting courses -->
            <div class="form-group">
                <label for="course_id">Course:</label>
                {{-- By changing the name to an array format (adding []), it tells Laravel that it should expect an array of data for this input field, which aligns with the multiple selections possible. --}}
                <select class="form-control" id="course_id" name="course_id[]" multiple>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Student</button>
        </form>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/students-form.css') }}">
@endpush
