<?php

namespace App\Http\Controllers\Api;

use App\Contracts\OrderRepositoryInterface;

/**
 * Class OrdersController
 * @package App\Http\Controllers\Api
 */
class OrdersController extends BaseController
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $data = $this->orderRepository->getCollection();

        return $this->ok($data, __('Order List'));
    }
}
