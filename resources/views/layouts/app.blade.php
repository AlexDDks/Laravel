<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: #333;
            color: white;
            padding: 1rem 2rem;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 2rem;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        a {
            color: #3498db;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a href="{{ route('courses.index') }}">Courses App</a>
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
