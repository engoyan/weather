<?php

namespace App\Providers;

use App\Location;
use App\Weather;
use App\Observers\LocationObserver;
use App\Observers\WeatherObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Location::observe(LocationObserver::class);
        Weather::observe(WeatherObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
