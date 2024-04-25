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
        Schema::create('courses', function (Blueprint $table) {
            $table->string('courseCode')->primary();
            $table->string('departmentID');
            $table->foreign('departmentID')->references('departmentID')->on('departments')->onDelete('cascade')->onUpdate('cascade');
//            $table->foreignId('departmentID')->constrained()->onDelete('cascade');
            $table->string('staffID');
            $table->foreign('staffID')->references('staffID')->on('staff')->onDelete('cascade')->onUpdate('cascade');
           // $table->foreignId('staffID')->constrained()->onDelete('cascade');
            $table->string('courseName');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
