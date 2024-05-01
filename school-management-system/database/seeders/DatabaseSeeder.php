<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Levels;
use App\Models\Staff;
use App\Models\Student;
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
    }
}
