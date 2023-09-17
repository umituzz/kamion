<?php

namespace Tests\Feature\Http\Controllers\Dashboard;

use App\Models\User;
use App\Services\RedisService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Class HomepageControllerTest
 * @package Tests\Feature\Http\Controllers\Dashboard
 */
class HomepageControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_homepage()
    {
        $totalOrders = $this->faker->randomNumber();
        $totalShippers = $this->faker->randomNumber();

        $redisServiceMock = $this->mock(RedisService::class);
        $redisServiceMock->shouldReceive('get')->with('total_orders')->andReturn($totalOrders);
        $redisServiceMock->shouldReceive('get')->with('total_shippers')->andReturn($totalShippers);

        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response = $response->get(route('homepage'));

        $response->assertStatus(200)
            ->assertViewIs('dashboard.homepage')
            ->assertViewHas('totalOrders', $totalOrders)
            ->assertViewHas('totalShippers', $totalShippers);
    }

    public function test_homepage_without_authentication()
    {
        $response = $this->get(route('homepage'));

        $response->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
