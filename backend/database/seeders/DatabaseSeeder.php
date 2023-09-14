<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            ModelHasRoleSeeder::class,
            RoleHasPermissionSeeder::class,
            ShipperSeeder::class,
            LoadTypeSeeder::class,
            CurrencySeeder::class,
            OrderSeeder::class,
        ]);
    }
}
