<?php

namespace App\Console\Commands;

use App\Contracts\SettingRepositoryInterface;
use App\Enums\SettingEnums;
use App\Http\Resources\SettingResource;
use App\Services\RedisService;
use Exception;
use Illuminate\Console\Command;

/**
 * Class SyncSettingCommand
 * @package App\Console\Commands
 */
class SyncSettingCommand extends Command
{
    protected $signature = 'sync:setting';

    protected $description = 'Sync settings with database and redis';
    private RedisService $redisService;
    private SettingRepositoryInterface $settingRepository;

    public function __construct(
        SettingRepositoryInterface $settingRepository,
        RedisService $redisService
    )
    {
        parent::__construct();

        $this->redisService = $redisService;
        $this->settingRepository = $settingRepository;
    }

    public function handle()
    {
        try {
            $data = $this->settingRepository->get();
            $settings = SettingResource::collection($data);
            $this->redisService->set(SettingEnums::REDIS_KEY, $settings);

            return Command::SUCCESS;
        } catch (Exception $exception) {
            //@todo yeni bir throw exception ile mail gönderilebilir
            return Command::FAILURE;
        }
    }
}
