<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'Order Management']);
        Permission::create(['name' => 'Shipper Management']);
        Permission::create(['name' => 'Notification Management']);
    }
}
