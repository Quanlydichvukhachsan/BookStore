<?php

namespace App\Providers;

use App\Contracts\UserContract;
use App\Models\Category;
use App\Services\CategoryService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;
use App\Contracts\OrderContract;
use App\Services\OrderBookService;
use App\Contracts\CategoryContract;
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
        $this->app->bind(CategoryContract::class, CategoryService::class);
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
