<?php

namespace App\Console\Commands\Redis;

use App\Contracts\CityRepositoryInterface;
use App\Contracts\CurrencyRepositoryInterface;
use App\Contracts\OrderStatusRepositoryInterface;
use App\Enums\CityEnums;
use App\Enums\CurrencyEnums;
use App\Enums\OrderStatusEnums;
use App\Http\Resources\CurrencyResource;
use App\Http\Resources\OrderStatusResource;
use App\Services\RedisService;
use Exception;
use Illuminate\Console\Command;

/**
 * Class SyncCityCommand
 * @package App\Console\Commands\Redis
 */
class SyncCityCommand extends Command
{
    protected $signature = 'redis:sync-cities';

    protected $description = 'Sync cities with redis';
    private RedisService $redisService;
    private CityRepositoryInterface $cityRepository;

    public function __construct(
        RedisService            $redisService,
        CityRepositoryInterface $cityRepository
    )
    {
        parent::__construct();

        $this->redisService = $redisService;
        $this->cityRepository = $cityRepository;
    }

    public function handle()
    {
        try {
            $data = $this->cityRepository->get();
            $items = CurrencyResource::collection($data);
            $this->redisService->set(CityEnums::REDIS_KEY, $items);

            return Command::SUCCESS;
        } catch (Exception $exception) {
            return Command::FAILURE;
        }
    }
}
