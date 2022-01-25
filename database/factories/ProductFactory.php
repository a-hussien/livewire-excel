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
            'model' => $this->faker->name(),
            'category' => $this->faker->company(),
            'minimum_price' => $this->faker->randomFloat(2, 1000, 5000),
            'unit_price' => $this->faker->randomFloat(2, 500, 3000),
            'bulk_price' => $this->faker->randomFloat(2, 300, 2000)
        ];
    }
}
