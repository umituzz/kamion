<?php

namespace App\Http\Controllers\Order;

use App\Contracts\OrderRepositoryInterface;
use App\Enums\OrderStatusEnums;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderUpdateRequest;
use App\Services\RedisService;

/**
 * Class OrdersController
 * @package App\Http\Controllers\Order
 */
class OrdersController extends Controller
{
    private OrderRepositoryInterface $orderRepository;
    private RedisService $redisService;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        RedisService $redisService
    )
   {
       $this->orderRepository = $orderRepository;
       $this->redisService = $redisService;
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
        $statuses = $this->redisService->get(OrderStatusEnums::REDIS_KEY);

        return view('order.edit', [
            'order' => $order,
            'statuses' => $statuses,
        ]);
    }

    public function update(OrderUpdateRequest $request, $id)
    {
        $this->orderRepository->update($id, [
            'order_status_id' => $request->input('order_status_id')
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {

    }
}
