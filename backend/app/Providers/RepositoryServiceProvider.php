<?php

namespace App\Providers;

use App\Contracts\CityRepositoryInterface;
use App\Contracts\CurrencyRepositoryInterface;
use App\Contracts\LoadTypeRepositoryInterface;
use App\Contracts\NotificationRepositoryInterface;
use App\Contracts\OrderRepositoryInterface;
use App\Contracts\OrderStatusRepositoryInterface;
use App\Contracts\SettingRepositoryInterface;
use App\Contracts\ShipperRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\CityRepository;
use App\Repositories\CurrencyRepository;
use App\Repositories\LoadTypeRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\OrderRepository;
use App\Repositories\OrderStatusRepository;
use App\Repositories\SettingRepository;
use App\Repositories\ShipperRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ShipperRepositoryInterface::class, ShipperRepository::class);
        $this->app->bind(OrderStatusRepositoryInterface::class, OrderStatusRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(NotificationRepositoryInterface::class, NotificationRepository::class);
        $this->app->bind(CurrencyRepositoryInterface::class, CurrencyRepository::class);
        $this->app->bind(LoadTypeRepositoryInterface::class, LoadTypeRepository::class);
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
    }
}
