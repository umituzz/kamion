<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;

/**
 * Class OrdersController
 * @package App\Http\Controllers\Api
 */
class OrdersController extends Controller
{
    public function index()
    {
        return Order::all();
    }
}
