<?php

namespace App\Repositories;

use App\Contracts\OrderRepositoryInterface;
use App\Http\Resources\OrderResource;
use App\Models\Order;

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

    public function getCollection()
    {
        $data = auth()->user()->orders;
        $data->load('loadType', 'currency', 'departureCity', 'arrivalCity', 'status');

        return OrderResource::collection($data);
    }

}
