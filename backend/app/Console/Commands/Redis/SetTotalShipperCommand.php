<?php

namespace App\Console\Commands\Redis;

use App\Contracts\ShipperRepositoryInterface;
use App\Services\RedisService;
use Illuminate\Console\Command;

/**
 * Class SetTotalShipperCommand
 * @package App\Console\Commands\Redis
 */
class SetTotalShipperCommand extends Command
{
    protected $signature = 'redis:set-total-shippers';

    protected $description = 'Set total shippers count to redis';
    private ShipperRepositoryInterface $shipperRepository;

    public function __construct(
        ShipperRepositoryInterface $shipperRepository
    )
    {
        parent::__construct();
        $this->shipperRepository = $shipperRepository;
    }

    public function handle()
    {
        $count = $this->shipperRepository->total();

        RedisService::set('total_shippers', $count);
    }
}
