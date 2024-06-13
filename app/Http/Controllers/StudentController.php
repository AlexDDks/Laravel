<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;


class StudentController extends Controller
{

    public function index()
    {
        $students = Student::with('courses')->get();
        return view('students.index', compact('students')); // Carga previamente las relaciones asociadas a los objetos que se están recuperando. Especifica la relación que quieres cargar junto con los estudiantes. 'courses' es el nombre de la función definida en el modelo de students. Devuelve una colección de objetos Student, donde cada objeto tiene su respectiva colección de objetos Course 
    }

    // Show the create student form
    public function create()
    {
        $courses = Course::all(); // Fetch all courses
        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->save();

        // Attach multiple courses
        $student->courses()->attach($request->course_id);

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    // // Store the new student
    // public function store(Request $request)
    // {
    //     $student = new Student();
    //     $student->name = $request->name;
    //     $student->save();

    //     $courseId = $request->course_id; //The course id is not saved, just is used to be used in the attach method
    //     $student->courses()->attach($courseId);

    //     // The attach() method is used to link a student to a course by inserting a record in the pivot table that connects the two models. Here’s how it works:

    //     // Syntax: $student->courses()->attach($courseId);
    //     // Parameters: The $courseId is the ID of the course you want to associate with the student.
    //     // Operation: When you call attach(), Laravel inserts a new record in the pivot table. This record will have the student’s ID and the course’s ID, creating a link between the student and the course. Insert the student id as well as the course id in the pivote table.
    //     return redirect()->route('courses.index')->with('success', 'Student created successfully!');
    // }
}
