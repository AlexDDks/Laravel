<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses App</title>
    <link rel="stylesheet" href="{{ asset('css/course-form.css') }}?v=1.01">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v=1.01">

    @stack('styles')
</head>

<body>
    <header class="navbar">
        <div class="container">
            <a href="{{ route('courses.index') }}" class="navbar-brand">Home</a>
            <nav>
                <ul class="navbar-nav">
                    <li><a href="{{ route('courses.index') }}">Courses</a></li>
                    <li><a href="{{ route('instructors.list') }}">Instructors</a></li>
                    <li><a href="{{ route('students.index') }}">Students</a></li>
                    <li><a href="{{ route('instructors.create') }}">Add Instructor</a></li>
                    <li><a href="{{ route('students.create') }}">Add Student</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Courses App. All rights reserved.</p>
        </div>
    </footer>

    @stack('scripts')
</body>

</html>
