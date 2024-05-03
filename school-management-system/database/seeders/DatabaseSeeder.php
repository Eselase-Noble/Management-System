<?php

namespace Database\Seeders;

use App\Models\classes;
use App\Models\Courses;
use App\Models\Department;
use App\Models\Enrolments;
use App\Models\Grades;
use App\Models\Levels;
use App\Models\Staff;
use App\Models\Student;
use App\Models\Transcript;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Venue;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Levels::factory()->count(19)->create()->unique();
        Student::factory()->count(50)->create();
        Staff::factory()->count(50)->create();
        Venue::factory()->count(10)->create()->unique();
        Department::factory()->count(12)->create()->unique();
        Courses::factory()->count(20)->create()->unique();
        Grades::factory()->count(50)->create();
        classes::factory()->count(15)->create()->unique();
        Enrolments::factory()->count(50)->create()->unique();
        Transcript::factory()->count(50)->create()->unique();
    }
}
