<?php

namespace App\Repositories;

use App\Contracts\CurrencyRepositoryInterface;
use App\Models\Currency;

/**
 * Class CurrencyRepository
 * @package App\Repositories
 */
class CurrencyRepository implements CurrencyRepositoryInterface
{
    private Currency $currency;

    public function __construct(Currency $currency)
    {
        $this->currency = $currency;
    }

    public function get()
    {
        return $this->currency->get();
    }
}
