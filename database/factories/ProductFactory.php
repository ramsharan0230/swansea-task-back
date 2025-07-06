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
            'name' => $this->faker->sentence(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'trade_price' => $this->faker->randomFloat(2, 10, 100),
            'retail_price' => $this->faker->randomFloat(2, 20, 150),
            'mpn' => $this->faker->unique()->ean8(),
            'sku' => $this->faker->unique()->uuid(),
            'status' => $this->faker->boolean(),
        ];
    }
}
