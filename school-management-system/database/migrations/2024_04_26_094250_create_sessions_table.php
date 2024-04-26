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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id('sessionID');
            $table->string('courseID');
            $table->foreign('courseID')->references('courseID')->on('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->string('venueID');
            $table->foreign('venueID')->references('venueID')->on('venues')->onUpdate('cascade')->onDelete('cascade');
            $table->date('startTime');
            $table->date('endTime');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
