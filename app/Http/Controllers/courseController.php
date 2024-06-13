<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Instructor;

class CourseController extends Controller
{

    // Este controlador gestiona las operaciones CRUD (Crear, Leer, Actualizar, Eliminar) para el modelo Course.

    // Muestra la lista de todos los cursos.
    // URL de ejemplo: http://localhost/firstApp_withCRUD/public/courses
    public function index()
    {
        // Obtiene todos los registros de la tabla 'courses' en la base de datos y lo guarda en la variable course, gracias a eloquent por el método all, no tenemos que escribir la sintaxis all
        $courses = Course::all(); // SQL: SELECT * FROM courses;

        // Devuelve la vista 'courses.index' y pasa la variable $courses a esa vista, con el nombre 'courses'.
        return view('courses.index', ['courses' => $courses]);
    }

    // URL de ejemplo: http://localhost/firstApp_withCRUD/public/courses/{course}
    public function show($id)
    {
        $course = Course::find($id);
        return view('courses.show', compact('course'));
    }


    // Muestra el formulario para crear un nuevo curso.
    // URL de ejemplo: http://localhost/firstApp_withCRUD/public/courses/create
    public function create()
    {
        $instructors = Instructor::all(); // Obtiene todos los instructores
        return view('courses.create', compact('instructors')); // Pasa instructores a la vista
    }

    // Almacena un nuevo curso en la base de datos.
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'language' => 'required',
            'difficulty'  => 'required',
            'instructor' => 'required',
        ]);

        $instructor = Instructor::where('name', $validatedData['instructor'])->first();

        if (!$instructor) {
            return back()->withErrors(['instructor' => 'Instructor not found.'])->withInput();
        }


        $course = new Course;
        $course->title = $validatedData['title'];
        $course->description = $validatedData['description'];
        $course->language = $validatedData['language'];
        $course->difficulty = $validatedData['difficulty'];
        $course->instructor = $validatedData['instructor'];
        $course->instructor_id = $instructor->id;



        $course->save();

        return redirect()->route('courses.index');
    }


    // Muestra el formulario para editar un curso existente.
    // URL de ejemplo: http://localhost/firstApp_withCRUD/public/courses/{id}/edit
    public function edit($id)
    {
        // Encuentra el curso en la base de datos con el ID proporcionado.
        $course = Course::find($id); // SQL: SELECT * FROM courses WHERE id = ? LIMIT 1;
        $instructors = Instructor::all(); // Obtiene todos los instructores
        return view('courses.edit', ['course' => $course], ['instructors' => $instructors]);
    }

    // Actualiza un curso existente en la base de datos.
    public function update(Request $request, $id)
    {
        $course = Course::find($id); // SQL: SELECT * FROM courses WHERE id = ? LIMIT 1;

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'language' => 'required',
            'difficulty'  => 'required',
            'instructor' => 'required',
        ]);

        $instructor = Instructor::where('name', $validatedData['instructor'])->first();

        if (!$instructor) {
            return back()->withErrors(['instructor' => 'Instructor not found.'])->withInput();
        }

        $course->title = $request->title;
        $course->description = $request->description;
        $course->language = $request->language;
        $course->difficulty = $request->difficulty;
        $course->instructor = $request->instructor;


        $course = new Course;
        $course->title = $validatedData['title'];
        $course->description = $validatedData['description'];
        $course->language = $validatedData['language'];
        $course->difficulty = $validatedData['difficulty'];
        $course->instructor = $validatedData['instructor'];
        $course->instructor_id = $instructor->id;  //De acá se extrae el ID


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
