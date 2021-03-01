<?php

namespace Database\Factories;

use App\Models\Capybara;
use Illuminate\Database\Eloquent\Factories\Factory;

class CapybaraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Capybara::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'color' => $this->faker->randomElement(['brown', 'gray', 'yellow', 'black']),
            'size' => $this->faker->randomElement(['small', 'medium', 'large'])
        ];
    }
}
