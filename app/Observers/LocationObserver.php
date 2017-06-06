<?php

namespace App\Observers;

use App\Location;
use App\Weather;

class LocationObserver
{
    /**
     * Listen to the Location creating event.
     *
     * @param  Location  $location
     * @return App\Weather
     */
    public function creating(Location $location)
    {
        return Weather::create(['zip' => $location->zip]);
    }

    /**
     * Listen to the Location deleting event.
     *
     * @param  Location  $location
     * @return void
     */
    public function deleting(Location $location)
    {
        // check and cleanup weather info
    }
}
