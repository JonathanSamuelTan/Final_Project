<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // create random product name
            'ProductName' => $this->faker->unique()->randomElement(['apple', 'banana', 'orange', 'mango', 'grape', 'chicken', 'beef', 'pork', 'fish', 'egg', 'salt', 'pepper', 'sugar', 'milk', 'butter', 'cheese']),
            'CategoryID' => $this->faker->numberBetween(1, 3),
            'Price' => $this->faker->numberBetween(1000, 10000),
            'Quantity' => $this->faker->numberBetween(1, 100),
            // value = default-product.png
            'ProductIMG' => 'default-product.png',
        ];
    }
}
