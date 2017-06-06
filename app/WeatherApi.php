<?php

namespace App;

use GuzzleHttp\Client;

class WeatherApi
{
    
    /**
     * Get the weather at the locations.
     *
     * @param  string  $zip
     * @return json
     */
    public static function get($zip)
    {
        // client can be extracted in order to optimize batch calls
        $client = new Client();

        $response = $client->get('http://api.openweathermap.org/data/2.5/weather',[
            'query' => [
                'zip' => $zip,
                'units' => 'imperial',
                'appid' => env('OPENWEATHERMAP_KEY')
            ]
        ]);
        $data = $response->getBody()->getContents();

        if(!empty($data)){
            return json_decode($data, true);
        }
        
        return;
    }
}
