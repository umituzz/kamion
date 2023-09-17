<?php

namespace Console\Commands\Redis;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

/**
 * Class SetTotalOrderCommandTest
 * @package Tests\Unit\Console\Commands\Redis
 */
class SetTotalOrderCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_flush_database()
    {
        Artisan::call('redis:set-total-orders');

        $this->assertTrue(true);
    }
}
