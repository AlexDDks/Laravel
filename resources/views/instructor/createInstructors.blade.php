@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add New Instructor</h2>
        <form action="{{ route('instructors.store') }}" method="post" enctype="multipart/form-data">
            @csrf <!-- CSRF Token for form submission security -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="image">Image of the Professor:</label>
                <input type="file" id="image" name="image">
                @error('image')
                    <!-- Mensaje de error para el campo 'image' -->
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Instructor</button>
        </form>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/instructors-form.css') }}?v=1.01">
@endpush
