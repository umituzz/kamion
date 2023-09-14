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

        User::create(['first_name' => 'Admin', 'last_name' => 'Kamion', 'email' => 'admin@kamion.com', 'password' => bcrypt(123456789)]);
        User::create(['first_name' => 'User', 'last_name' => 'Kamion', 'email' => 'user@kamion.com', 'password' => bcrypt(123456789)]);
    }
}
