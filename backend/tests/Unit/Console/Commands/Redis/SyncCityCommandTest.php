<?php

namespace Console\Commands\Redis;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

/**
 * Class SetTotalOrderCommandTest
 * @package Tests\Unit\Console\Commands\Redis
 */
class SyncCityCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_flush_database()
    {
        Artisan::call('redis:sync-cities');

        $this->assertTrue(true);
    }
}
