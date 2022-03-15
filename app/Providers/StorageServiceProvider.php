<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\StorageService;

class StorageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(StorageService::class, function ($app) {
            return new StorageService;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
