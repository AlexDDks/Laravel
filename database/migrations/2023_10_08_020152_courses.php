<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // The up method is called when you run the migration command to apply the changes. Inside this method, the structure of the courses table is defined:
    public function up(): void
    {
        //Here we stablish the DB courses
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // Integer Unsigned Increment (Primary Key)
            $table->string('title'); // Course Title varchar(255)
            $table->text('description')->nullable(); // Course Description, possibly longer than 255 characters and optional
            $table->string('language')->default('English'); // Programming Language e.g., 'Python', 'JavaScript'
            $table->enum('difficulty', ['Beginner', 'Intermediate', 'Advanced']); // Course Difficulty Level
            $table->string('instructor'); // Instructor's Name varchar(255)
            $table->timestamps(); // created_at and updated_at
        });
    }

    // The down method is used to revert what was done by the up method, that is, if you need to undo this migration. In this case, it drops the courses table if it exists.
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
