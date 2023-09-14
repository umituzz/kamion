<?php

namespace App\Console\Commands\Redis;

use App\Contracts\OrderRepositoryInterface;
use App\Services\RedisService;
use Illuminate\Console\Command;

/**
 * Class SetTotalOrderCommand
 * @package App\Console\Commands\Redis
 */
class SetTotalOrderCommand extends Command
{
    protected $signature = 'redis:set-total-orders';

    protected $description = 'Set total orders count to redis';
    private OrderRepositoryInterface $orderRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository
    )
    {
        parent::__construct();
        $this->orderRepository = $orderRepository;
    }

    public function handle()
    {
        $count = $this->orderRepository->total();

        RedisService::set('total_orders', $count);
    }
}
