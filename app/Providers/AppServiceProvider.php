<?php

namespace App\Providers;

use App\Models\Image;
use App\Services\Htmx\HtmxRequest;
use App\Services\Htmx\HtmxResponse;
use App\Services\ImageStorage;
use App\Services\SessionHelper;
use App\Services\ImagickProcessor;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('session-helper', SessionHelper::class);
        $this->app->singleton('image-storage', ImageStorage::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
