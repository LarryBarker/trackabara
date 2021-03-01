<?php

namespace Database\Factories;

use App\Models\Capybara;
use App\Models\City;
use App\Models\Observation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ObservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Observation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'capybara_id' => Capybara::all()->random()->id,
            'city_id' => City::all()->random()->id,
            'wearing_hat' => $this->faker->boolean(50),
            'observed_on' => Carbon::parse($this->faker->date())->format('Y-m-d')
        ];
    }
}
