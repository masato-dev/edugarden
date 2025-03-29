<?php

namespace App\Providers;

use App\Implementations\Repositories\Account\UserRepository;
use App\Implementations\Repositories\Church\ChurchRepository;
use App\Implementations\Services\Account\UserService;
use App\Implementations\Services\Cache\CacheService;
use App\Implementations\Services\Church\ChurchService;
use App\Interfaces\Repositories\Account\IUserRepository;
use App\Interfaces\Repositories\Church\IChurchRepository;
use App\Interfaces\Services\Account\IUserService;
use App\Interfaces\Services\Church\IChurchService;
use App\Interfaces\Services\IService;
use Illuminate\Support\ServiceProvider;

class CRUDServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Services
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(IChurchService::class, ChurchService::class);

        // Repositories
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IChurchRepository::class, ChurchRepository::class);
        $this->app->singleton(CacheService::class, fn () => new CacheService());
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
