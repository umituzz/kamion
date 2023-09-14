<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Currency::factory()->count(1)->create();

        Currency::create(['name' => 'Turkish Lira', 'code' => 'TRY']);
        Currency::create(['name' => 'American Dollar', 'code' => 'USD']);
        Currency::create(['name' => 'Euro', 'code' => 'EUR']);
    }
}
