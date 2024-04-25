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
        Schema::create('staff', function (Blueprint $table) {
            $table->string('staffID')->primary();
            $table->string('surname');
            $table->string('otherNames');
            $table->string('email')->unique();
            $table->date('dob');
            $table->string('gender');
            $table->string('telephone');
            $table->string('address');
            $table->string('nationality');
            $table->string('qualification');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
