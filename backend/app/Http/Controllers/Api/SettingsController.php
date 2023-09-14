<?php

namespace App\Http\Controllers\Api;

use App\Enums\SettingEnums;
use App\Services\RedisService;
use Illuminate\Http\Response;

/**
 * Class SettingsController
 * @package App\Http\Controllers\Api
 */
class SettingsController extends BaseController
{
    private RedisService $redisService;

    public function __construct(RedisService $redisService)
    {
        $this->redisService = $redisService;
    }

    public function index()
    {
        $data = $this->redisService->get(SettingEnums::REDIS_KEY);

        return $this->ok($data, __('Settings'), Response::HTTP_OK);
    }
}
