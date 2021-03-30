<?php

namespace App\Providers;



use Illuminate\Support\ServiceProvider;
use App\Contracts\OrderContract;
use App\Services\OrderBookService;
use App\Contracts\CategoriesContract;
use App\Contracts\CategoriesRequest;
use App\Services\CategoriesServiceConstract;
use App\Services\CategoriesService;

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
        $this->app->bind(CategoriesContract::class,CategoriesRequest::class);
        $this->app->bind(CategoriesContract::class,CategoriesService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
