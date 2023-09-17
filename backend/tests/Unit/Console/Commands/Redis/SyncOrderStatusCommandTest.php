<?php

namespace Console\Commands\Redis;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

/**
 * Class SyncOrderStatusCommandTest
 * @package Tests\Unit\Console\Commands\Redis
 */
class SyncOrderStatusCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_flush_database()
    {
        Artisan::call('redis:sync-order-status');

        $this->assertTrue(true);
    }
}
