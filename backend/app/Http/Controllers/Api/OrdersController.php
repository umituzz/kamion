<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\OrderCollection;
use App\Models\Order;

/**
 * Class OrdersController
 * @package App\Http\Controllers\Api
 */
class OrdersController extends BaseController
{
    public function index()
    {
        $orders = Order::all();

        return new OrderCollection($orders);
    }
}
