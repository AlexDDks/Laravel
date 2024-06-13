<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\InstructorController;

// Route::resource('courses', CourseController::class);
// Lo que hace este método resource es generar automáticamente todas las rutas necesarias para un CRUD completo, y las asocia con los métodos del controlador:

// GET courses -> index (listar todos los cursos)
// GET courses/create -> create (mostrar formulario de creación)
// POST courses -> store (almacenar un nuevo curso)
// GET courses/{course} -> show (mostrar un curso específico)
// GET courses/{course}/edit -> edit (mostrar formulario de edición)
// PUT/PATCH courses/{course} -> update (actualizar un curso específico)
// DELETE courses/{course} -> destroy (eliminar un curso específico)
// Con esa única línea, estás creando todas las rutas necesarias para el CRUD de cursos en Laravel.

// 1. Index
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

// 2. Create
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');

// 3. Store
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

// 4. Show
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

// 5. Edit
Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');

// 6. Update
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');

// 7. Destroy
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');


// INSTRUCTOR
// 8. Show form to create Instructor
Route::get('/instructor', [InstructorController::class, 'createInstructor'])->name('instructors.create');

// 9. CreateInstructor
Route::post('/instructors', [InstructorController::class, 'storeInstructor'])->name('instructors.store');

// 10. See all instructors:
Route::get('/instructors', [InstructorController::class, 'indexInstructors'])->name('instructors.list');

//11. Showing the courses of each professor
Route::get('/instructor/{id}/courses', [InstructorController::class, 'showByInstructor'])->name('instructor.courses');

//12. Delete an instructor
Route::delete('/instructors/{instructor}', [InstructorController::class, 'destroy'])->name('instructors.destroy');


// STUDENTS
//12. Show form to create a Student
Route::get('/studentForm', [StudentController::class, 'create'])->name('students.create');

//13 Handle the submission of the student creation form
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// 14. Route for showing the list of students
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
