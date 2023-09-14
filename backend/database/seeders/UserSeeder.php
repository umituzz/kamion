<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        User::factory()->count(1)->create();

        User::create(['first_name' => 'Ümit', 'last_name' => 'UZ', 'email' => 'umituz9999@gmail.com', 'password' => bcrypt(123456789)]);
    }
}
