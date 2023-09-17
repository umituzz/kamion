<?php

namespace App\Http\Controllers\Api;

use App\Enums\CityEnums;
use App\Enums\CurrencyEnums;
use App\Enums\LoadTypeEnums;
use App\Enums\SettingEnums;
use App\Services\RedisService;
use Illuminate\Http\Response;

/**
 * Class InitialController
 * @package App\Http\Controllers\Api
 */
class InitialController extends BaseController
{
    private RedisService $redisService;

    public function __construct(
        RedisService $redisService,
    )
    {
        $this->redisService = $redisService;
    }

    public function index()
    {
        $settings = $this->redisService->get(SettingEnums::REDIS_KEY);
        $currencies = $this->redisService->get(CurrencyEnums::REDIS_KEY);
        $loadTypes = $this->redisService->get(LoadTypeEnums::REDIS_KEY);
        $cities = $this->redisService->get(CityEnums::REDIS_KEY);

        $data = [
            'settings' => $settings,
            'currencies' => $currencies,
            'loadTypes' => $loadTypes,
            'cities' => $cities,
        ];

        return $this->ok($data, __('Initial Data'), Response::HTTP_OK);
    }
}
