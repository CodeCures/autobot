<?php

namespace App\Providers;

use App\Events\UserCreated;
use App\Listeners\UserCreatedNotification;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use RateLimiter;
use Illuminate\Http\Request;

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
        RateLimiter::for('api', function (Request $request) {
            if (!$request->routeIs('stats')) {
                return Limit::perMinute(5);
            }
        });
    }
}
