<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::resource('courses', CourseController::class);

// Lo que hace este método resource es generar automáticamente todas las rutas necesarias para un CRUD completo, y las asocia con los métodos del controlador:

// GET courses -> index (listar todos los cursos)
// GET courses/create -> create (mostrar formulario de creación)
// POST courses -> store (almacenar un nuevo curso)
// GET courses/{course} -> show (mostrar un curso específico)
// GET courses/{course}/edit -> edit (mostrar formulario de edición)
// PUT/PATCH courses/{course} -> update (actualizar un curso específico)
// DELETE courses/{course} -> destroy (eliminar un curso específico)
// Con esa única línea, estás creando todas las rutas necesarias para el CRUD de cursos en Laravel.