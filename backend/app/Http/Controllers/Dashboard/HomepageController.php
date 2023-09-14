<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\RedisService;

/**
 * Class HomepageController
 * @package App\Http\Controllers\Dashboard
 */
class HomepageController extends Controller
{
    private RedisService $redisService;

    public function __construct(RedisService $redisService)
    {
        $this->redisService = $redisService;
    }

    public function index()
    {
        $totalOrders = $this->redisService->get('total_orders');
        $totalShippers = $this->redisService->get('total_shippers');

        return view('dashboard.homepage', [
            'totalOrders' => $totalOrders,
            'totalShippers' => $totalShippers,
        ]);
    }
}
