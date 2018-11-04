<?php

namespace App\Http\Controllers;

use App\Components\Weather\Service\DarkSky;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WeatherController extends Controller
{
    public function forecast(Request $request)
    {
        $darkSky = new DarkSky($request->get('lat'), $request->get('lng'));

        $weather = Cache::remember('weather', 1, function () use ($request, $darkSky) {
            return $darkSky->forecast();
        });

        return $weather;
    }
}
