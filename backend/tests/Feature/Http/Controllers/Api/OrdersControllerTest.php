<?php

namespace Http\Controllers\Api;

use App\Contracts\OrderRepositoryInterface;
use App\Http\Controllers\Api\OrdersController;
use App\Http\Requests\OrderRequest;
use App\Models\Shipper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

/**
 * Class OrdersControllerTest
 * @package Tests\Feature\Http\Controllers\Api
 * @coversDefaultClass \App\Http\Controllers\Api\OrdersController
 */
class OrdersControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_api_order_list()
    {
        Shipper::factory()->create();

        $orderRepositoryMock = $this->mock(OrderRepositoryInterface::class);
        $orderRepositoryMock->shouldReceive('getApiCollection')->andReturn([]);

        $ordersController = new OrdersController($orderRepositoryMock);
        $response = $ordersController->index();

        $this->assertEquals([
            'statusCode' => 200,
            'message' => 'Order List',
            'data' => [],
        ], $response->getOriginalContent());
    }

    public function test_create_order()
    {
        $user = Shipper::factory()->create();

        $request = OrderRequest::create('/api/orders', 'POST', [
            'load_type_id' => $this->faker->randomNumber(),
            'currency_id' => $this->faker->randomNumber(),
            'commodity' => $this->faker->word,
            'departure_city_id' => $this->faker->randomNumber(),
            'arrival_city_id' => $this->faker->randomNumber(),
            'order_status_id' => $this->faker->randomNumber(),
        ]);

        $orderRepositoryMock = $this->mock(OrderRepositoryInterface::class);
        $orderRepositoryMock->shouldReceive('create')->andReturn([]);
        $orderRepositoryMock->shouldReceive('loadRelationships')->andReturn([]); // Beklenen metod

        $ordersController = new OrdersController($orderRepositoryMock);
        $response = $ordersController->store($request);

        $this->assertEquals([
            'statusCode' => 201,
            'message' => 'Order Created',
            'data' => [],
        ], $response->getOriginalContent());
    }

    public function test_search_order()
    {
        $request = Request::create('/api/orders/search', 'POST', [
            'search' => $this->faker->word,
        ]);

        $orderRepositoryMock = $this->mock(OrderRepositoryInterface::class);
        $orderRepositoryMock->shouldReceive('search')->andReturn([]);

        $ordersController = new OrdersController($orderRepositoryMock);
        $response = $ordersController->search($request);

        $this->assertEquals([
            'statusCode' => 200,
            'message' => 'Order Search List',
            'data' => [],
        ], $response->getOriginalContent());
    }
}
