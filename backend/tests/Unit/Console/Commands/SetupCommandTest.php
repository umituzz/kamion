<?php

namespace Tests\Unit\Console\Commands;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

/**
 * Class Tests\Unit\Console\Commands
 * @package Tests\Unit\Console\Commands
 */
class SetupCommandTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_runs_setup_command()
    {
        Artisan::call('setup');

        $this->assertTrue(true);
    }
}
