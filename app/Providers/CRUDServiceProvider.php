<?php

namespace App\Providers;

use App\Implementations\Repositories\Account\UserRepository;
use App\Implementations\Services\Account\UserService;
use App\Interfaces\Repositories\Account\IUserRepository;
use App\Interfaces\Services\Account\IUserService;
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

        // Repositories
        $this->app->bind(IUserRepository::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
