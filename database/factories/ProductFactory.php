<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->text(255),
            'description' => fake()->text(255),
            'costPrice' => fake()->randomNumber(),
            'sellingPrice' => fake()->randomNumber(),
            'imgPath' => null
        ];
    }
}
