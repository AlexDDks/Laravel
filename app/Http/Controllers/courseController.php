<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class courseController extends Controller
{
    public function index()
    {
        return view("courses.index");
    }

    public function create()
    {
        return view("courses.index");
    }

    public function show($course)
    {
        return view("courses.show", ["course" => $course]);
    }

    // public function show($course, $category = null) //just for one route
    // {
    //     if ($category) {
    //         return "Welcome to the courses: $course of the category $category";
    //     } else {
    //         return "Welcome to the courses: $course";
    //     }
    // }
}
