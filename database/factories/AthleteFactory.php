<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Athlete>
 */
class AthleteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sports = ['football', 'basketball', 'swimming', 'tennis', 'volleyball'];

        return [
            'name' => fake()->firstName() . ' ' . fake()->lastName(),
            'country' => fake()->country(),
            'sport' => fake()->randomElement($sports),
            'debut' => fake()->dateTimeBetween('-10 years', 'now')->format('Y-m-d'),
            'birthdate' => fake()->dateTimeBetween('-28 years', '-15 years')->format('Y-m-d'),
        ];
    }
}
