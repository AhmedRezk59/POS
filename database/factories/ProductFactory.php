<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price_bought' => 1000,
            'price_sell' => 1100,
            'category_id' => rand(1,50),
            'size_id' => rand(1,50),
            'quantity' => 10
        ];
    }
}
