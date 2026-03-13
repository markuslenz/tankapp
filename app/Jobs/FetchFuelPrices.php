<?php

namespace App\Jobs;

use App\Models\FuelPrice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FetchFuelPrices implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $response = Http::get('https://creativecommons.tankerkoenig.de/json/list.php',[
            'lat'    => env('TK_LAT'),
            'lng'    => env('TK_LNG'),
            'rad'    => env('TK_RAD'),
            'sort'   => env('TK_SORT'),
            'type'   => env('TK_TYPE'),
            'apikey' => env('TK_APIKEY'),

        ]);

        $data = $response->json();

        foreach($data['stations'] as $station) {
            FuelPrice::create([
                'station_id'   => $station['id'],
                'station_name' => $station['name'],
                'brand'        => $station['brand'],
                'type'         => env('TK_TYPE'),
                'price'        => $station['price']
            ]);
        }
    }
}
