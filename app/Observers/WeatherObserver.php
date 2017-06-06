<?php

namespace App\Observers;

use App\Weather;
use App\WeatherApi;

class WeatherObserver
{
    /**
     * Listen to the Weather creating event. Once the record is created
     * make an API call to get the weather data for provided zip code
     *
     * @param  Weather  $weather
     * @return void
     */
    public function creating(Weather $weather)
    {
        $weather->data = WeatherApi::get($weather->zip);
    }

    /**
     * Listen to the Weather deleting event.
     *
     * @param  Weather  $weather
     * @return void
     */
    public function deleting(Weather $weather)
    {
        // check and cleanup weather info
    }
}
