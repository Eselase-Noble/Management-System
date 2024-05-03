<?php

namespace Database\Factories;

use App\Models\Courses;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrolments>
 */
class EnrolmentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $studentID = Student::pluck('studentID')->toArray();
        $courseID = Courses::pluck('courseID')->toArray();
        return [
            //
            'studentID'=>fake()->unique()->randomElement($studentID),
            'courseID'=>fake()->randomElement($courseID),
            'enrolDate'=>fake()->date,
        ];
    }
}
