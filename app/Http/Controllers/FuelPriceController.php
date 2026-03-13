<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\FuelPrice;
use Illuminate\Support\Facades\Http;

class FuelPriceController extends Controller
{
    public function index()
    {
        $prices = FuelPrice::latest()->take(100)->get();

        return Inertia::render('Prices/Index', [
            'prices' => $prices
        ]);
    }

    public function fetch()
    {
        /*$response = Http::get('https://creativecommons.tankerkoenig.de/json/list.php',[
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
            dd($station);
        } */
    }

    public function info()
    {
        phpinfo();
    }
}
