<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\FarmerRepositoryInterface;
use App\Repositories\FarmerRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(FarmerRepositoryInterface::class, FarmerRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
