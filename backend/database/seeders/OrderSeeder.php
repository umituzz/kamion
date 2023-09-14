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

        Order::create(['shipper_id' => 1, 'load_type' => 1,'commodity' => 1500, 'departure_city' => 'İstanbul', 'arrival_city' => 'Gaziantep']);
    }
}
