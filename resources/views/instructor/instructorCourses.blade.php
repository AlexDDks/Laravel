@extends('layouts.app')

@section('content')
    <h2>Courses by {{ $instructor->name }}</h2>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="courses-list">
        @forelse ($instructor->courses as $course)
            <div class="course-details">
                <img src="{{ asset('storage/' . $instructor->image_path) }}" class="course-image">
                <h3>{{ $course->title }}</h3>
                <p><strong>Description:</strong> {{ $course->description }}</p>
                <p><strong>Language:</strong> {{ $course->language }}</p>
                <p><strong>Difficulty:</strong> {{ $course->difficulty }}</p>
            </div>
        @empty
            <p>No courses available for this instructor.</p>
        @endforelse
    </div>
    <a href="{{ route('courses.index') }}" class="back-link">Back to Courses List</a>
@endsection
