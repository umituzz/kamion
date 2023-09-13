<?php

namespace App\Repositories;

use App\Contracts\OrderRepositoryInterface;
use App\Http\Resources\OrderCollection;
use App\Models\Order;

/**
 * Class OrderRepository
 * @package App\Models
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
        $data = $this->get();

        return new OrderCollection($data);
    }
}