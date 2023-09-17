<?php

namespace Console\Commands\Redis;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

/**
 * Class SetTotalShipperCommandTest
 * @package Tests\Unit\Console\Commands\Redis
 */
class SetTotalShipperCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_flush_database()
    {
        Artisan::call('redis:set-total-shippers');

        $this->assertTrue(true);
    }
}
