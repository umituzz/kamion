<?php

namespace App\Console\Commands;

use App\Services\RedisService;
use Illuminate\Console\Command;

/**
 * Class FlushDatabase
 * @package App\Console\Commands
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
    }
}
