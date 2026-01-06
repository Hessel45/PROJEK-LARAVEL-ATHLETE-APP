<?php

namespace Database\Factories;

use App\Models\Athlete;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Achievement>
 */
class AchievementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $athlete = Athlete::all()->random();
        $titles = [
            'Champion',
            'Runner-up',
            'Third place',
            'Fourth place',
            'Fifth place',
        ];

        return [
            'date' => fake()->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
            'title' => fake()->randomElement($titles) . ' at the ' . $athlete->sport . ' championship',
            'description' => fake()->paragraph(),
            'athlete_id' => $athlete->id,
        ];
    }
}
