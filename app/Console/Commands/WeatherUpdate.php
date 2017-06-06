<?php

namespace App\Console\Commands;

use App\Weather;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\ClientException;

class WeatherUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:update {take=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates weather for each zip code';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Updating weather info..');
        
        $take = $this->argument('take');

        $weather = DB::table('weather')
                ->select('zip')
                ->groupBy('zip')
                ->orderBy('created_at', 'desc')
                ->take($take)
                ->get();

        $n = 0; 
              
        foreach ($weather as $location) {
            try {

                Weather::create(['zip' => $location->zip]);
                $n++;
            } catch (ClientException $e) {
                Log::error("Error updating weather for {$weather->zip}");
            }
        }

        $this->info("Updated {$n} locations out of ".$weather->count());
    }
}
