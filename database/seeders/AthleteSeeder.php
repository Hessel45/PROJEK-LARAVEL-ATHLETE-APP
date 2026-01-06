<?php

namespace Database\Seeders;

use App\Models\Athlete;
use Illuminate\Database\Seeder;

class AthleteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Athlete::factory()->count(50)->create();
    }
}
