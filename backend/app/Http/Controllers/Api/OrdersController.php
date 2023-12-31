<?php

namespace App\Http\Controllers\Api;

use App\Contracts\OrderRepositoryInterface;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
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
        $data = $this->orderRepository->getApiCollection();

        return $this->ok($data, __('Order List'), Response::HTTP_OK);
    }

    public function store(OrderRequest $request)
    {
        $order = $this->orderRepository->create([
            'shipper_id' => Auth::guard('api')->id(),
            'load_type_id' => $request->input('load_type_id'),
            'currency_id' => $request->input('currency_id'),
            'commodity' => $request->input('commodity'),
            'departure_city_id' => $request->input('departure_city_id'),
            'arrival_city_id' => $request->input('arrival_city_id'),
            'order_status_id' => $request->input('order_status_id'),
        ]);

        $this->orderRepository->loadRelationships($order);

        return $this->ok([], __('Order Created'), Response::HTTP_CREATED);
    }

    public function search(Request $request)
    {
        $data = $this->orderRepository->search($request->input('search'));

        return $this->ok($data, __('Order Search List'), Response::HTTP_OK);
    }
}
