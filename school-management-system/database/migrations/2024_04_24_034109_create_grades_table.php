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
        Schema::create('grades', function (Blueprint $table) {
            $table->id('gradeID');
            $table->string('studentID');
            $table->foreign('studentID')->references('studentID')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->string('courseID');
            $table->foreign('courseID')->references('courseID')->on('courses')->onDelete('cascade')->onUpdate('cascade');
            $table->char('grade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
