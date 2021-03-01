<?php

namespace Database\Seeders;

use App\Models\Observation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CapybaraSeeder::class,
            CitySeeder::class,
            ObservationSeeder::class,
        ]);
    }
}
