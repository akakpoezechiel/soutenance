<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\SaleInterface;
use App\Repositories\SaleRepository;



class SaleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(saleInterface::class, SaleRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
