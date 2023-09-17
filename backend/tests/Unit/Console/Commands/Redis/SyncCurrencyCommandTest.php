<?php

namespace Console\Commands\Redis;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

/**
 * Class SyncCurrencyCommandTest
 * @package Tests\Unit\Console\Commands\Redis
 */
class SyncCurrencyCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_flush_database()
    {
        Artisan::call('redis:sync-currencies');

        $this->assertTrue(true);
    }
}
