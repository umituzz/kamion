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
     * @return AnonymousResourceCollection
     */
    public function listAll();

    public function search($key);

}
