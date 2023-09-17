<?php

namespace Models;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

/**
 * Class CountryTest
 * @package Tests\Unit\Models
 * @coversDefaultClass \App\Models\Country
 */
class CountryTest extends TestCase
{
    use DatabaseTransactions;

    public function test_it_has_many_cities()
    {
        $country = Country::factory()->create();
        City::factory()->count(3)->create([
            'country_id' => $country->id
        ]);

        $relation = $country->cities();

        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals(3, $relation->count());
    }
}
