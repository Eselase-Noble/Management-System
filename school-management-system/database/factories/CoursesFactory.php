<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Courses>
 */
class CoursesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departmentID = Department::pluck('departmentID')->toArray();
        $staffID  = Staff::pluck('staffID')->toArray();
        $semester = ['First Semester', 'Second Semester'];
        return [
            //
            'courseID'=> fake()->unique()->uuid(),
            'courseName' => fake()->name,
            'semester' => fake()->randomElement($semester),
            'description'=> fake()->word(),
            'departmentID'=>fake()->randomElement($departmentID),
            'staffID'=>fake()->randomElement($staffID)

        ];
    }
}
