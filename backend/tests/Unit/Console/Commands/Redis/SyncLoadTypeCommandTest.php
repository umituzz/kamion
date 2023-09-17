<?php

namespace Console\Commands\Redis;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

/**
 * Class SyncLoadTypeCommandTest
 * @package Tests\Unit\Console\Commands\Redis
 */
class SyncLoadTypeCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_flush_database()
    {
        Artisan::call('redis:sync-load-types');

        $this->assertTrue(true);
    }
}
