<?php

namespace App\Repositories;

use App\Contracts\SettingRepositoryInterface;
use App\Models\Setting;

/**
 * Class SettingRepository
 * @package App\Repositories
 */
class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{
    private Setting $setting;

    public function __construct(Setting $setting)
    {
        parent::__construct($setting);

        $this->setting = $setting;
    }
}
