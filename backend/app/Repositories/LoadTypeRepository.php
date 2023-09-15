<?php

namespace App\Repositories;

use App\Contracts\CurrencyRepositoryInterface;
use App\Contracts\LoadTypeRepositoryInterface;
use App\Models\Currency;
use App\Models\LoadType;

/**
 * Class LoadTypeRepository
 * @package App\Repositories
 */
class LoadTypeRepository implements LoadTypeRepositoryInterface
{
    private LoadType $loadType;

    public function __construct(LoadType $loadType)
    {
        $this->loadType = $loadType;
    }

    public function get()
    {
        return $this->loadType->get();
    }
}
