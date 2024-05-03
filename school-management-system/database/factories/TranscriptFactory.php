<?php

namespace Database\Factories;

use App\Models\Grades;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transcript>
 */
class TranscriptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gradeID = Grades::pluck('gradeID')->toArray();
        return [
            //

            'gradeID'=>fake()->unique()->randomElement($gradeID),
        ];
    }
}
