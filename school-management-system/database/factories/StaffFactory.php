<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'staffID'=> fake()->unique()->uuid(),
            'surname' => fake()->lastName(),
            'otherNames' => fake()->firstName(),
            'email'=>fake()->unique()->email(),
            'dob'=>fake()->dateTimeBetween('-60 years', '-30 years')->format('Y-m-d'),
            'gender'=>fake()->randomElement(['Male', 'Female']),
            'telephone'=>fake()->phoneNumber(),
            'address'=>fake()->address(),
            'nationality'=>fake()->country(),
            'qualification'=>fake()->title()
        ];
    }
}
