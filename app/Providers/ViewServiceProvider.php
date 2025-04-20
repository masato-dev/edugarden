<?php

namespace App\Providers;

use App\Interfaces\Services\Cart\ICartService;
use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    protected ICartService $cartService;
    public function __construct($app) {
        parent::__construct($app);
    }
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->cartService = $this->app->make(ICartService::class);
    }

    private function loadCartAmount(): int {
        $user = auth('user:web')->user();
        if(!$user) return 0;
        return $this->cartService->amount();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('layout.clients.main', function ($view) {
            $cartAmount = $this->loadCartAmount();
            $view->with([
                'cartAmount' => $cartAmount,
            ]);
        });
    }
}
