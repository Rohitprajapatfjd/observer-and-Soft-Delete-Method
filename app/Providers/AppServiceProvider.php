<?php

namespace App\Providers;

use App\Models\author;
use App\Models\form;
use App\Observers\addSlug;
use App\Observers\formObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        author::observe(addSlug::class);
        form::observe(formObserver::class);
    }
}
