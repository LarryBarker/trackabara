<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CapybaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Capybara::factory()->create([
            'name' => 'Colossus'
        ]);

        \App\Models\Capybara::factory()->create([
            'name' => 'Steven'
        ]);

        \App\Models\Capybara::factory()->create([
            'name' => 'Capybaby'
        ]);
    }
}
