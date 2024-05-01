<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LevelsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Define the levels in a four-year program
        $levels = [
            'Creche',
            'Nursery',
            'Kindergarten',
            'Primary 1',
            'Primary 2',
            'Primary 3',
            'Primary 4',
            'Primary 5',
            'Primary 6',
            'Junior High 1',
            'Junior High 2',
            'Junior High 3',
            'Senior High 1',
            'Senior High 2',
            'Senior High 3',
            'Level 100', 'Level 200', 'Level 300', 'Level 400'
        ];


        return [
            //
            'levelID' => fake()->unique()->uuid(),
            'StudentLevel'=>fake()->unique()->randomElement($levels)
        ];
    }
}
