<?php

namespace Tests\Feature\Http\Controllers\Order;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class OrdersControllerTest
 * @package Tests\Feature\Http\Controllers\Dashboard
 * @coversDefaultClass \App\Http\Controllers\Order\OrdersController
 */
class OrdersControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_list_orders()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('orders.index'));

        $response->assertStatus(200)
            ->assertViewIs('order.index')
            ->assertViewHas('orders');
    }

    public function test_edit_order()
    {
        $user = User::factory()->create();
        $order = Order::factory()->create();
        $response = $this->actingAs($user)->get(route('orders.edit', $order->id));

        $response->assertStatus(200)
            ->assertViewIs('order.edit')
            ->assertViewHas('order', $order)
            ->assertViewHas('statuses');
    }

    public function test_update_order()
    {
        $orderStatusId = 10;
        $user = User::factory()->create();
        $order = Order::factory()->create([
            'order_status_id' => $orderStatusId
        ]);

        $response = $this->actingAs($user)->put(route('orders.update', $order->id), [
            'order_status_id' => $orderStatusId,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'order_status_id' => $orderStatusId,
        ]);
    }

    public function test_edit_invalid_order()
    {
        $user = User::factory()->create();
        $invalidOrderId = 9999;

        $response = $this->actingAs($user)->put(route('orders.update', $invalidOrderId));

        $response->assertStatus(302);
    }

    public function test_destroy_order()
    {
        $order = Order::factory()->create();

        $response = $this->get(route('orders.destroy', $order->id));

        $response->assertRedirect();
    }

    public function test_destroy_invalid_order()
    {
        $invalidOrderId = 9999;

        $response = $this->get(route('orders.destroy', $invalidOrderId));

        $response->assertStatus(302);
    }




}
