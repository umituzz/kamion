<?php

namespace Models;

use App\Models\City;
use App\Models\Currency;
use App\Models\LoadType;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Shipper;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

/**
 * Class OrderTest
 * @package Tests\Unit\Models
 * @coversDefaultClass \App\Models\Order
 */
class OrderTest extends TestCase
{
    use DatabaseTransactions;

    public function test_it_belongs_to_a_shipper()
    {
        $model = Order::factory()->create();
        $relation = $model->shipper();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertInstanceOf(Shipper::class, $relation->first());
        $this->assertEquals('shipper_id', $relation->getForeignKeyName());
    }

    public function test_it_belongs_to_currency()
    {
        $model = Order::factory()->create();
        $relation = $model->currency();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertInstanceOf(Currency::class, $relation->first());
        $this->assertEquals('currency_id', $relation->getForeignKeyName());
    }

    public function test_it_belongs_to_load_type()
    {
        $model = Order::factory()->create();
        $relation = $model->loadType();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertInstanceOf(LoadType::class, $relation->first());
        $this->assertEquals('load_type_id', $relation->getForeignKeyName());
    }

    public function test_it_belongs_to_departure_city()
    {
        $model = Order::factory()->create();
        $relation = $model->departureCity();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertInstanceOf(City::class, $relation->first());
        $this->assertEquals('departure_city_id', $relation->getForeignKeyName());
    }

    public function test_it_belongs_to_arrival_city()
    {
        $model = Order::factory()->create();
        $relation = $model->arrivalCity();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertInstanceOf(City::class, $relation->first());
        $this->assertEquals('arrival_city_id', $relation->getForeignKeyName());
    }

    public function test_it_belongs_to_order_status()
    {
        $model = Order::factory()->create();
        $relation = $model->status();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertInstanceOf(OrderStatus::class, $relation->first());
        $this->assertEquals('order_status_id', $relation->getForeignKeyName());
    }

    public function test_to_searchable_array()
    {
        $model = Order::factory()->create();

        $searchableArray = $model->toSearchableArray();

        $expectedKeys = [
            'shippers.first_name',
            'shippers.last_name',
            'commodity',
            'load_types.name',
            'currencies.name',
            'departure_cities.name',
            'arrival_cities.name',
            'order_statuses.name',
            'orders.created_at',
        ];

        foreach ($expectedKeys as $key) {
            $this->assertArrayHasKey($key, $searchableArray);
        }

        foreach ($searchableArray as $value) {
            $this->assertEquals('', $value);
        }
    }
}
