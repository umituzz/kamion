<?php

namespace Database\Seeders;

use App\Models\Shipper;
use Illuminate\Database\Seeder;

class ShipperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Shipper::factory()->count(1)->create();

        Shipper::create(['first_name' => 'Ümit', 'last_name' => 'UZ', 'email' => 'umituz9999@gmail.com', 'password' => bcrypt(123456789)]);

    }
}
