<?php

namespace App\Providers;

use App\Interfaces\RestaurantInterface;
use App\Repositories\RestaurantRepository;
use Illuminate\Support\ServiceProvider;

class RestaurantProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RestaurantInterface::class, RestaurantRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
