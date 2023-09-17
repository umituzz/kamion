<?php

namespace Http\Controllers\Api;

use App\Http\Controllers\Api\InitialController;
use App\Services\RedisService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class InitialControllerTest
 * @package Tests\Feature\Http\Controllers\Api
 * @coversDefaultClass \App\Http\Controllers\Api\InitialController
 */
class InitialControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_initial_data()
    {
        $settings = ['setting_key' => 'setting_value'];
        $currencies = ['USD', 'EUR'];
        $loadTypes = ['Type A', 'Type B'];
        $cities = ['City X', 'City Y'];

        $redisServiceMock = $this->mock(RedisService::class);
        $redisServiceMock->shouldReceive('get')->with('settings')->andReturn($settings);
        $redisServiceMock->shouldReceive('get')->with('currencies')->andReturn($currencies);
        $redisServiceMock->shouldReceive('get')->with('load_types')->andReturn($loadTypes);
        $redisServiceMock->shouldReceive('get')->with('cities')->andReturn($cities);

        $initialController = new InitialController($redisServiceMock);
        $response = $initialController->index();

        $this->assertEquals([
            'statusCode' => 200,
            'message' => 'Initial Data',
            'data' => [
                'settings' => $settings,
                'currencies' => $currencies,
                'loadTypes' => $loadTypes,
                'cities' => $cities,
            ]
        ], $response->getOriginalContent());
    }
}
