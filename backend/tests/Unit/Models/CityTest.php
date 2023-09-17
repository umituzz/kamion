<?php

namespace Tests\Unit\Models;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

/**
 * Class CityTest
 * @package Tests\Unit\Models
 * @coversDefaultClass \App\Models\City
 */
class CityTest extends TestCase
{
    use DatabaseTransactions;

    public function test_it_belongs_to_a_country()
    {
        $country = Country::factory()->create();
        $city = City::factory()->create([
            'country_id' => $country->id
        ]);

        $relation = $city->country();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals($country->id, $city->country_id);
        $this->assertEquals('country_id', $relation->getForeignKeyName());
    }

}

