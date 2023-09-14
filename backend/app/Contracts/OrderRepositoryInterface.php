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

    /**
     * @param $order
     * @return void
     */
    public function loadRelationships($order);

    /**
     * @return AnonymousResourceCollection
     */
    public function listAll();

}
