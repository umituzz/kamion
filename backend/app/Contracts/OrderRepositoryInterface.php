<?php

namespace App\Contracts;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Interface OrderRepositoryInterface
 * @package App\Contracts
 */
interface OrderRepositoryInterface
{
    /**
     * @return AnonymousResourceCollection
     */
    public function getApiCollection();

    public function listQuery();

    public function search($key);

}
