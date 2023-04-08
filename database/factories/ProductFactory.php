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
            
            'ProductName' => $this->faker->unique()->randomElement(['apple malang', 'sunpride banana', 'yuzu orange', 'Harum Manis mango', 'Black grape', 'chicken breast', 'yakiniku beef', 'pork belly', 'gurami fish', 'omega egg', 'sea salt', ' black pepper', 'brown sugar', 'low fat milk', 'swiss made butter', ' italian cheese']),
            'CategoryID' => $this->faker->numberBetween(1, 3),
            'Price' => $this->faker->numberBetween(1000, 10000),
            'Quantity' => $this->faker->numberBetween(1, 100),
            // value = default-product.png
            'ProductIMG' => 'default-product.png',
        ];
    }
}
