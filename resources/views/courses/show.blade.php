{{-- What layout is gonna use --}}
@extends('layouts.plantilla')

{{-- Just for one line --}}
@section('title', 'Show Course ' . $course)

{{-- More than one line --}}
@section('content')
    <h1> Welcome to the course: {{ $course }}</h1>
@endsection


{{-- <?php echo $course; ?> == {{course}} --}}
