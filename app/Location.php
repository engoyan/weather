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
     * Get the weather for the location.
     */
    public function weather()
    {
        return $this->hasMany('App\Weather', 'zip', 'zip');
    }
}
