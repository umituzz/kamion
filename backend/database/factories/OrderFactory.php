<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Currency;
use App\Models\LoadType;
use App\Models\Order;
use App\Models\OrderStatus;
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
            'load_type_id' => LoadType::factory(),
            'currency_id' => Currency::factory(),
            'commodity' => $this->faker->randomDigit(),
            'departure_city_id' => City::factory(),
            'arrival_city_id' => City::factory(),
            'order_status_id' => OrderStatus::factory()
        ];
    }
}
