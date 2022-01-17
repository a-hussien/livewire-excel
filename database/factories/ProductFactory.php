<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'brand' => $this->faker->company(),
            'price' => $this->faker->randomFloat(2, 500,50000)
        ];
    }
}
