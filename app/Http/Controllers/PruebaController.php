<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function __invoke() //just for one route, this is a method called __invoke
    {
        // return view('welcome');
        return view("courses.prueba");
    }
}
