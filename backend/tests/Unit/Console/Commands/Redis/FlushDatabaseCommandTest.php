<?php

namespace Tests\Unit\Console\Commands\Redis;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

/**
 * Class FlushDatabaseCommandTest
 * @package Tests\Unit\Console\Commands\Redis
 */
class FlushDatabaseCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_flush_database()
    {
        Artisan::call('redis:flush-db');

        $this->assertTrue(true);
    }
}
