<?php

namespace App\Repositories;

use App\Contracts\OrderRepositoryInterface;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class OrderRepository
 * @package App\Repositories
 */
class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    private Order $order;

    public function __construct(Order $order)
    {
        parent::__construct($order);

        $this->order = $order;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function getCollection()
    {
        $data = auth()->user()->orders;
        $this->loadRelationships($data);

        return OrderResource::collection($data);
    }

    /**
     * @param $order
     * @return void
     */
    public function loadRelationships($order)
    {
        $order->load('loadType', 'currency', 'departureCity', 'arrivalCity', 'status');
    }
}
