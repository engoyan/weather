<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Get the locations for the user.
     */
    public function locations()
    {
        return $this->hasMany('App\Location');
    }

    /**
     * Get the current weather info for the user for all locations.
     */
    public function weather()
    {
        return $this->locations()
                    ->with('currentWeather')
                    ->get();
    }
}
