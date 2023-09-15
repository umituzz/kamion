<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

/**
 * Class SetupCommand
 * @package App\Console\Commands
 */
class SetupCommand extends Command
{
    protected $signature = 'setup';

    protected $description = 'Setup data for project';

    public function handle()
    {
        Artisan::call('migrate:fresh --seed');

        Artisan::call('redis:flush-db');

        Artisan::call('redis:sync-settings');
        Artisan::call('redis:sync-currencies');
        Artisan::call('redis:sync-cities');
        Artisan::call('redis:sync-order-status');
        Artisan::call('redis:sync-load-types');

        Artisan::call('redis:set-total-orders');
        Artisan::call('redis:set-total-shippers');
    }
}
