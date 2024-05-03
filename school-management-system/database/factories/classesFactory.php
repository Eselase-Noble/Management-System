<?php

namespace Database\Factories;

use App\Models\Courses;
use App\Models\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\classes>
 */
class classesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        //Query the IDs of the course and venue
        $courseID = Courses::pluck('courseID')->toArray();
        $venueID = Venue::pluck('venueID')->toArray();

        return [
            //
            'courseID'=>fake()->unique()->randomElement($courseID),
            'venueID'=>fake()->unique()->randomElement($venueID),
            'startTime' =>fake()->dateTime(),
            'endTime' => fake()->dateTime()


        ];
    }
}
