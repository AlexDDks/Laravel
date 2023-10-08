{{-- What layout is gonna use --}}
@extends('layouts.plantilla')

{{-- Just for one line (insert the second argument in the title) --}}
@section('title', 'Prueba')

{{-- More than one line that is gonna be added --}}
@section('content')
    <h1> This is prueba </h1>
@endsection

@section('anotherContent', 'Another content')



















{{-- Esta es la estructura que se repite en todas las páginas --}}
{{-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>

<body>
    @yield('content')
</body>

</html> --}}
