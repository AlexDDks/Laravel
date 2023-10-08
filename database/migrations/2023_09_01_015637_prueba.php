<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nombreDeLaTabla', function (Blueprint $table) {
            $table->id(); //Integer Unsigned Increment
            $table->string('name'); //varchar(255)
            $table->string('apellido'); //varchar(255)
            $table->string('apellido2'); //varchar(255)
            $table->string('email')->unique(); //
            $table->timestamp('email_verified_at')->nullable(); //To save dates
            $table->timestamps(); //created_at and updated_at
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nombreDeLaTabla');
    }
};
