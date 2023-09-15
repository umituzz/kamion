<?php

namespace App\Http\Controllers\Api;

use App\Contracts\CurrencyRepositoryInterface;
use App\Enums\CurrencyEnums;
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
    private CurrencyRepositoryInterface $currencyRepository;

    public function __construct(
        RedisService $redisService,
        CurrencyRepositoryInterface $currencyRepository
    )
    {
        $this->redisService = $redisService;
        $this->currencyRepository = $currencyRepository;
    }

    public function index()
    {
        $settings = $this->redisService->get(SettingEnums::REDIS_KEY);
//        $currencies = $this->redisService->get(CurrencyEnums::REDIS_KEY);
        $currencies = $this->currencyRepository->get();

//        $data = [
//            'settings' => $settings,
//            'currencies' => $currencies,
//        ];

        return $this->ok($currencies, __('Initial Data '), Response::HTTP_OK);
    }
}
