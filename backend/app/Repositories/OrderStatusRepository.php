<?php

namespace App\Repositories;

use App\Contracts\OrderStatusRepositoryInterface;
use App\Models\OrderStatus;

/**
 * Class OrderStatusRepository
 * @package App\Repositories
 */
class OrderStatusRepository implements OrderStatusRepositoryInterface
{
    private OrderStatus $orderStatus;

    public function __construct(OrderStatus $orderStatus)
    {
        $this->orderStatus = $orderStatus;
    }

    public function get()
    {
        return $this->orderStatus->get();
    }
}
