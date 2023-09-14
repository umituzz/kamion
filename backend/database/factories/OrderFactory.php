<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Shipper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
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
            'shipper_id' => Shipper::factory(),
            'load_type' => $this->faker->word,
            'commodity' => $this->faker->randomDigit(),
            'departure_city' => $this->faker->city,
            'arrival_city' => $this->faker->city,
        ];
    }
}
