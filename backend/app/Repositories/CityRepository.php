<?php

namespace App\Repositories;

use App\Contracts\CityRepositoryInterface;
use App\Contracts\CurrencyRepositoryInterface;
use App\Models\City;
use App\Models\Currency;

/**
 * Class CurrencyRepository
 * @package App\Repositories
 */
class CityRepository implements CityRepositoryInterface
{
    private City $city;

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    public function get()
    {
        return $this->city->get();
    }
}
