<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::factory()->count(1)->create();

        Order::create(['shipper_id' => 1, 'load_type_id' => 1, 'currency_id' => 1, 'commodity' => 1500, 'departure_city_id' => 34, 'arrival_city_id' => 27, 'order_status_id' => 1]);
    }
}
