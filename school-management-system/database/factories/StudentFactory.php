<?php

namespace Database\Factories;

use App\Models\Levels;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
                // Get all level IDs from the levels table
        $levelIds = Levels::pluck('levelID')->toArray();
        return [
            //
            'studentID'=> fake()->unique()->uuid(),
            'surname' => fake()->lastName(),
            'otherNames' => fake()->firstName(),
            'email'=>fake()->unique()->email(),
            'dob'=>fake()->dateTimeBetween('-30 years', '-18 years')->format('Y-m-d'),
            'gender'=>fake()->randomElement(['Male', 'Female']),
            'telephone'=>fake()->phoneNumber(),
            'address'=>fake()->address(),
            'nationality'=>fake()->country(),
            'levelID'=>fake()->randomElement($levelIds)


        ];
    }
}
