<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\RedisService;

class HomepageController extends Controller
{
    private RedisService $redisService;

    public function __construct(RedisService $redisService)
    {
        $this->redisService = $redisService;
    }

    public function index()
    {
        $totalUsers = $this->redisService->get('total_orders');

        return view('dashboard.homepage', [
            'totalUsers' => $totalUsers,
        ]);
    }
}
