<?php

namespace App\Console\Commands\Redis;

use App\Services\RedisService;
use Illuminate\Console\Command;

/**
 * Class FlushDatabase
 * @package App\Console\Commands\Redis
 */
class FlushDatabase extends Command
{
    protected $signature = 'redis:flush-db';

    protected $description = 'Flush redis database';
    private RedisService $redisService;

    public function __construct(RedisService $redisService)
    {
        parent::__construct();
        $this->redisService = $redisService;
    }

    public function handle()
    {
        $this->redisService->flushDB();

        $this->info('Redis database flushed successfully');

        return Command::SUCCESS;
    }
}
