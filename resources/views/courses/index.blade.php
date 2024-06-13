@extends('layouts.app')

@section('content')
    <h2>Courses List</h2>
    <a class="add-course-button btn btn-primary" href="{{ route('courses.create') }}">Add New Course</a>
    <a class="view-instructors-button btn btn-secondary" href="{{ route('instructors.list') }}">View All Instructors</a>
    <a class="add-instructor-button btn btn-primary" href="{{ route('instructors.create') }}">Add New Instructor</a>
    <!-- New button for viewing all students -->
    <a class="view-students-button btn btn-secondary" href="{{ route('students.index') }}">View All Students</a>

    <table class="courses-table table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Language</th>
                <th>Difficulty</th>
                <th>Instructor</th>
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
                    <td>
                        @if ($course->instructor_id)
                            <a href="{{ route('instructor.courses', $course->instructor_id) }}">{{ $course->instructor }}</a>
                        @else
                            Instructor Not Assigned
                        @endif
                    </td>

                    <td class="actions-cell">
                        <a class="view-course-button btn btn-info" href="{{ route('courses.show', $course->id) }}">View</a>
                        <a class="edit-link btn btn-warning" href="{{ route('courses.edit', $course->id) }}">Edit</a>
                        <button class="delete-button btn btn-danger"
                            onclick="confirmDelete({{ $course->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Confirm Deletion</h2>
            <p>Are you sure you want to delete this course?</p>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/courses-list.css') }}?v=1.01">
@endpush

@push('scripts')
    <script>
        function confirmDelete(courseId) {
            var form = document.getElementById('deleteForm');
            form.action = '{{ route('courses.destroy', '') }}/' + courseId;
            document.getElementById('deleteModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('deleteModal')) {
                closeModal();
            }
        }
    </script>
@endpush
