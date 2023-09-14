<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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

    /**
     * @param $order
     * @return void
     */
    public function loadRelationships($order);

    /**
     * @return Builder[]|Collection
     */
    public function listAll();

}
