<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'load_type' => $this->faker->word,
            'commodity' => $this->faker->randomDigit(),
            'departure_city' => $this->faker->city,
            'arrival_city' => $this->faker->city,
        ];
    }
}
