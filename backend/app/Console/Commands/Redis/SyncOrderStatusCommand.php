<?php

namespace App\Console\Commands\Redis;

use App\Contracts\OrderStatusRepositoryInterface;
use App\Enums\OrderStatusEnums;
use App\Http\Resources\OrderStatusResource;
use App\Services\RedisService;
use Exception;
use Illuminate\Console\Command;

/**
 * Class SyncOrderStatusCommand
 * @package App\Console\Commands\Redis
 */
class SyncOrderStatusCommand extends Command
{
    protected $signature = 'redis:sync-order-status';

    protected $description = 'Sync order statutes with redis';
    private RedisService $redisService;
    private OrderStatusRepositoryInterface $orderStatusRepository;

    public function __construct(
        RedisService $redisService,
        OrderStatusRepositoryInterface $orderStatusRepository
    )
    {
        parent::__construct();

        $this->redisService = $redisService;
        $this->orderStatusRepository = $orderStatusRepository;
    }

    public function handle()
    {
        try {
            $data = $this->orderStatusRepository->get();
            $orderStatuses = OrderStatusResource::collection($data);
            $this->redisService->set(OrderStatusEnums::REDIS_KEY, $orderStatuses);

            return Command::SUCCESS;
        } catch (Exception $exception) {
            //@todo yeni bir throw exception ile mail gönderilebilir
            return Command::FAILURE;
        }
    }
}
