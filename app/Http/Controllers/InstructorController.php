<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Instructor;



class InstructorController extends Controller
{

    // List of Instructors
    public function indexInstructors()
    {
        $instructors = Instructor::all(); // Asume que tienes un modelo Instructor
        return view('instructor.instructorsList', compact('instructors'));
    }

    // Create Form Instructors
    public function createInstructor()
    {
        return view('instructor.createInstructors');
    }

    // Store a new instructor
    public function storeInstructor(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
        ]);
        $instructor = new Instructor;
        $instructor->name = $request->name;
        $instructor->email = $request->email;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('professorImages', 'public');
            $instructor->image_path = $imagePath;
        }
        $instructor->save();
        return redirect()->route('courses.index')->with('success', 'Course added successfully.');
    }

    // Showing the courses of each instructor
    public function showByInstructor($id) //Se recibe el id que se mandó desde la vista y se obtiene un único instructor gracias a la clave foránea
    {
        $instructor = Instructor::with('courses')->find($id);

        if (!$instructor) {
            return redirect()->route('courses.index')->with('error', 'Instructor not found.');
        }
        return view('instructor.instructorCourses', compact('instructor'));
    }

    public function destroy($id)
    {
        $instructor = Instructor::find($id); // Encuentra el instructor por su ID

        if ($instructor) {
            $instructor->delete(); // Elimina el instructor
        }

        return redirect()->route('instructors.list'); // Redirige a la lista de instructores
    }
}
