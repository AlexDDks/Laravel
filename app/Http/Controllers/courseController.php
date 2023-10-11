<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{

    // Este controlador gestiona las operaciones CRUD (Crear, Leer, Actualizar, Eliminar) para el modelo Course.

    // Muestra la lista de todos los cursos.
    // URL de ejemplo: http://localhost/firstApp_withCRUD/public/courses
    public function index()
    {
        // Obtiene todos los registros de la tabla 'courses' en la base de datos y lo guarda en la variable course, gracias a eloquent por el método all, no tenemos que escribir la sintaxis all
        $courses = Course::all(); // SQL: SELECT * FROM courses;

        // Devuelve la vista 'courses.index' y pasa la variable $courses a esa vista.
        return view('courses.index', ['courses' => $courses]);
    }

    // Muestra el formulario para crear un nuevo curso.
    // URL de ejemplo: http://localhost/firstApp_withCRUD/public/courses/create
    public function create()
    {
        // Devuelve la vista 'courses.create' donde el usuario puede ingresar detalles del nuevo curso.
        return view('courses.create'); //Este es un formulario
    }

    // Almacena un nuevo curso en la base de datos.
    public function store(Request $request)
    {
        $course = new Course;
        $course->title = $request->title; //Se asigna el valor obtenido del formulario (a través de $request->title) al atributo title del modelo $course
        $course->description = $request->description;
        $course->language = $request->language;
        $course->difficulty = $request->difficulty;
        $course->instructor = $request->instructor;
        $course->email = $request->email;
        $course->email_verified_at = $request->email_verified_at;

        $course->save(); // SQL: INSERT INTO courses (title, description, ...) VALUES (?, ?, ...);

        return redirect()->route('courses.index');
    }

    // Muestra el formulario para editar un curso existente.
    // URL de ejemplo: http://localhost/firstApp_withCRUD/public/courses/{id}/edit
    public function edit($id)
    {
        // Encuentra el curso en la base de datos con el ID proporcionado.
        $course = Course::find($id); // SQL: SELECT * FROM courses WHERE id = ? LIMIT 1;

        return view('courses.edit', ['course' => $course]);
    }

    // Actualiza un curso existente en la base de datos.
    public function update(Request $request, $id)
    {
        $course = Course::find($id); // SQL: SELECT * FROM courses WHERE id = ? LIMIT 1;

        $course->title = $request->title;
        $course->description = $request->description;
        $course->language = $request->language;
        $course->difficulty = $request->difficulty;
        $course->instructor = $request->instructor;
        $course->email = $request->email;

        $course->save(); // SQL: UPDATE courses SET title=?, description=?, ... WHERE id=?;

        return redirect()->route('courses.index');
    }

    // Elimina un curso de la base de datos.
    public function destroy($id)
    {
        $course = Course::find($id); // SQL: SELECT * FROM courses WHERE id = ? LIMIT 1;

        $course->delete(); // SQL: DELETE FROM courses WHERE id=?;

        return redirect()->route('courses.index');
    }
}
