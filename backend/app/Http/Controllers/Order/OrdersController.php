<?php

namespace App\Http\Controllers\Order;

use App\Contracts\OrderRepositoryInterface;
use App\Enums\OrderStatusEnums;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;
use App\Services\RedisService;
use Illuminate\Http\Request;

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
        $orders = $this->orderRepository->listQuery();

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
        $this->orderRepository->delete($id);

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $orders = $this->orderRepository->search($request->input('search'));

        return view('order.index')->with([
            'orders' => $orders
        ]);
    }
}
