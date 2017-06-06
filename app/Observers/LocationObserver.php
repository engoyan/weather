<?php

namespace App\Observers;

use App\Location;
use App\Weather;

class LocationObserver
{
    /**
     * Listen to the Location creating event.
     * Continue only when Weather record successfully created,
     * otherwise if the Weather API failed it will not create 
     * location record.
     *
     * @param  Location  $location
     * @return App\Weather
     */
    public function creating(Location $location)
    {
        // For optimization purposes might be worth using findOrCreate 
        // and check the creation date in order to save on extra API call
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
