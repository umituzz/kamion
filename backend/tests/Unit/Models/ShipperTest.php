<?php

namespace Models;

use App\Models\Order;
use App\Models\Shipper;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

/**
 * Class ShipperTest
 * @package Tests\Unit\Models
 * @coversDefaultClass \App\Models\Shipper
 */
class ShipperTest extends TestCase
{
    use DatabaseTransactions;

    public function test_it_has_many_cities()
    {
        $shipper = Shipper::factory()->create();
        Order::factory()->count(3)->create([
            'shipper_id' => $shipper->id
        ]);

        $relation = $shipper->orders();

        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals(3, $relation->count());
    }
}
