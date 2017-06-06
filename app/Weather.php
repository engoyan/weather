<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'weather';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['zip'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'json',
    ];

    public function getLocationName()
    {
        return array_get($this->data, 'name', 'N/A');
    }

    public function getIcon()
    {
        // returning first weather icon since they 
        // seem to be the same within the array
        return 'http://openweathermap.org/img/w/' . array_get($this->data, 'weather.0.icon') . '.png';
    }

    public function getWeatherConditions()
    {
        $weather = collect(array_get($this->data, 'weather', []));

        return $weather->implode('main', ', ');
    }

    public function getTemp()
    {
        // we can keep it simple..
        // return array_get($this->data, 'main.temp', '-');
        // or
        $temp = array_get($this->data, 'main.temp', '-');
        if($temp == '-') return 'N/A';
        return intval($temp);
    }
}
