<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Setting::factory()->count(1)->create();

        Setting::create(['group' => 'general', 'key' => 'company', 'value' => 'Kamion']);
        Setting::create(['group' => 'general', 'key' => 'foundation', 'value' => '2020']);
    }
}
