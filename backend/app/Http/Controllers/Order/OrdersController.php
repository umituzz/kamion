<?php

namespace App\Http\Controllers\Order;

use App\Contracts\OrderRepositoryInterface;
use App\Http\Controllers\Controller;

/**
 * Class OrdersController
 * @package App\Http\Controllers\Order
 */
class OrdersController extends Controller
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
   {
       $this->orderRepository = $orderRepository;
   }

    public function index()
    {
        $orders = $this->orderRepository->listAll();

        return view('order.index', [
            'orders' => $orders,
        ]);
    }

    public function edit($id)
    {
        $order = $this->orderRepository->findBy('id', $id);

        return view('order.edit', [
            'order' => $order
        ]);
    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }
}
