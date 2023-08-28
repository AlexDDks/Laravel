<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\courseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// //Route by GET one by one
// // http://localhost/firstApp/public/
// Route::get('/', function () {
//     // return view('welcome');
//     return "Hello world";
// });

// //Route to courses
// // http://localhost/firstApp/public/courses/
// Route::get('/courses', function () {
//     return "Welcome to the courses";
// });

// // Route to a variable
// // http://localhost/firstApp/public/courses/something
// Route::get('/courses/{course}', function ($course) {
//     return "Welcome to the courses: $course";
// });

// // Route to 2 variables
// // http://localhost/firstApp/public/courses/something/something
// Route::get('/courses/{course}/{category}', function ($course, $category) {
//     return "Welcome to the courses: $course of the category $category";
// });

// // Route to 2 variables (optional)
// // http://localhost/firstApp/public/courses/something/something
// Route::get('/courses/{course}/{category?}', function ($course, $category = null) {
//     if ($category) {
//         return "Welcome to the courses: $course of the category $category";
//     } else {
//         return "Welcome to the courses: $course";
//     }
// });


//USING CONTROLLER
//Route by GET

// Controller home return string
// http://localhost/firstApp/public/
Route::get('/', homeController::class);


// //Controller Course return string
// // http://localhost/firstApp/public/courses/
// Route::get('courses', [courseController::class, "index"]);

// //http://localhost/firstApp/public/courses/create
// Route::get('courses/create', [courseController::class, "create"]);

// // http://localhost/firstApp/public/courses/something/something
// Route::get('courses/{course}/{category?}', [courseController::class, "show"]);

//Controller Course by group return string
Route::controller(courseController::class)->group(function () {
    Route::get('courses', "index");
    Route::get('courses/create', "create");
    Route::get('courses/{course}/{category?}', "show");
});
