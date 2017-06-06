<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['zip'];

    /**
     * Get the user for the location.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get all weather info for the location.
     */
    public function weather()
    {
        return $this->hasMany('App\Weather', 'zip', 'zip');
    }

    /**
     * Get the current weather for the location.
     */
    public function currentWeather()
    {
        return $this->hasOne('App\Weather', 'zip', 'zip')->latest();
    }
}
