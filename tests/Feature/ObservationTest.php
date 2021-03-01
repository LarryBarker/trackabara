<?php

namespace Tests\Feature;

use App\Models\Observation;
use Database\Seeders\CapybaraSeeder;
use Database\Seeders\CitySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ObservationTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_capybara_can_be_observed()
    {
        $this->seed(CapybaraSeeder::class);
        $this->seed(CitySeeder::class);

        $data = [
            'capybara_name' => 'Steven',
            'city' => 'Chicago',
            'observed_on' => date('Y-m-d')
        ];

        $this->post('/api/observations', $data)->assertSessionHasNoErrors()->assertStatus(201);

        $this->assertDatabaseCount('observations', 1);
    }

    public function test_a_capybara_cannot_be_observed_twice_in_the_same_city_on_the_same_date()
    {
        $this->seed(CapybaraSeeder::class);
        $this->seed(CitySeeder::class);

        $data = [
            'capybara_name' => 'Steven',
            'city' => 'Chicago',
            'observed_on' => date('Y-m-d')
        ];

        $this->post('/api/observations', $data)->assertSessionHasNoErrors()->assertStatus(201);

        $this->assertDatabaseCount('observations', 1);

        $this->post('/api/observations', $data)->assertSessionHasNoErrors()->assertStatus(302);

        $this->assertDatabaseCount('observations', 1);
    }
}
