<?php

namespace App\Console\Commands\Redis;

use App\Contracts\CurrencyRepositoryInterface;
use App\Contracts\OrderStatusRepositoryInterface;
use App\Enums\CurrencyEnums;
use App\Enums\OrderStatusEnums;
use App\Http\Resources\CurrencyResource;
use App\Http\Resources\OrderStatusResource;
use App\Services\RedisService;
use Exception;
use Illuminate\Console\Command;

/**
 * Class SyncOrderStatusCommand
 * @package App\Console\Commands\Redis
 */
class SyncCurrencyCommand extends Command
{
    protected $signature = 'redis:sync-currencies';

    protected $description = 'Sync currencies with redis';
    private RedisService $redisService;
    private CurrencyRepositoryInterface $currencyRepository;

    public function __construct(
        RedisService $redisService,
        CurrencyRepositoryInterface $currencyRepository
    )
    {
        parent::__construct();

        $this->redisService = $redisService;
        $this->currencyRepository = $currencyRepository;
    }

    public function handle()
    {
        try {
            $data = $this->currencyRepository->get();
            $currencies = CurrencyResource::collection($data);
            $this->redisService->set(CurrencyEnums::REDIS_KEY, $currencies);

            return Command::SUCCESS;
        } catch (Exception $exception) {
            //@todo yeni bir throw exception ile mail gönderilebilir
            return Command::FAILURE;
        }
    }
}
