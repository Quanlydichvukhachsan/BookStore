<?php

namespace App\Providers;

use App\Contracts\UserContract;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;
use App\Contracts\OrderContract;
use App\Services\OrderBookService;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OrderContract::class, OrderBookService::class);
        $this->app->bind(UserContract::class,UserService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
