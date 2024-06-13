@extends('layouts.app')

@section('content')
    <div class="instructors-list-container">
        <h2>Instructors List</h2>

        <a class="btn btn-primary" href="{{ route('instructors.create') }}">Add New Instructor</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instructors as $instructor)
                    <tr>
                        <td>{{ $instructor->id }}</td>
                        <td>{{ $instructor->name }}</td>
                        <td>
                            <a href="{{ route('instructor.courses', $instructor->id) }}" class="btn btn-info">View Courses</a>
                            <button class="btn btn-danger" onclick="confirmDelete({{ $instructor->id }})">Delete</button>
                        </td>
                        <td>
                            @if ($instructor->image_path)
                                <img class="instructor-image" src="{{ asset('storage/' . $instructor->image_path) }}"
                                    alt="Instructor Image">
                            @endif
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
                <p>Are you sure you want to delete this instructor?</p>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/instructors-list.css') }}?v=1.01">
@endpush

@push('scripts')
    <script>
        function confirmDelete(id) {
            var form = document.getElementById('deleteForm');
            form.action = '{{ route('instructors.destroy', '') }}/' + id;
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
