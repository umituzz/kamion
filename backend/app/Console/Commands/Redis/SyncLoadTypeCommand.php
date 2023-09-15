<?php

namespace App\Console\Commands\Redis;

use App\Contracts\LoadTypeRepositoryInterface;
use App\Enums\CurrencyEnums;
use App\Enums\LoadTypeEnums;
use App\Http\Resources\CurrencyResource;
use App\Http\Resources\LoadTypeResource;
use App\Services\RedisService;
use Exception;
use Illuminate\Console\Command;

/**
 * Class SyncLoadTypeCommand
 * @package App\Console\Commands\Redis
 */
class SyncLoadTypeCommand extends Command
{
    protected $signature = 'redis:sync-load-types';

    protected $description = 'Sync load types with redis';
    private RedisService $redisService;
    private LoadTypeRepositoryInterface $loadTypeRepository;

    public function __construct(
        RedisService $redisService,
        LoadTypeRepositoryInterface $loadTypeRepository
    )
    {
        parent::__construct();

        $this->redisService = $redisService;
        $this->loadTypeRepository = $loadTypeRepository;
    }

    public function handle()
    {
        try {
            $data = $this->loadTypeRepository->get();
            $items = LoadTypeResource::collection($data);
            $this->redisService->set(LoadTypeEnums::REDIS_KEY, $items);

            return Command::SUCCESS;
        } catch (Exception $exception) {
            return Command::FAILURE;
        }
    }
}
