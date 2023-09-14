<?php

namespace App\Http\Controllers\Api;

use App\Contracts\OrderRepositoryInterface;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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

        return $this->ok($data, __('Order List'), Response::HTTP_OK);
    }

    public function store(OrderRequest $request)
    {
        $order = $this->orderRepository->create([
            'shipper_id' => auth()->id(),
            'load_type_id' => $request->input('load_type_id'),
            'commodity' => $request->input('commodity'),
            'departure_city' => $request->input('departure_city'),
            'arrival_city' => $request->input('arrival_city'),
        ]);

        $data = new OrderResource($order);

        return $this->ok($data, __('Order Created'), Response::HTTP_CREATED);
    }
}
