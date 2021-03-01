<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            'Chicago', 'Atlanta', 'New York', 'Houston', 'San Francisco'
        ])->each(function ($city) {
            \App\Models\City::factory()->create([
                'name' => $city
            ]);
        });
    }
}
