<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function current(Request $request, WeatherService $weather)
    {
        $city = (string) $request->query('city', 'Kathmandu');
        $result = $weather->getCurrentByCity($city);
        return response()->json($result, $result['ok'] ? 200 : ($result['status'] ?? 500));
    }

    public function forecast(Request $request, WeatherService $weather)
    {
        $city = (string) $request->query('city', 'Kathmandu');
        $result = $weather->getForecastByCity($city);
        return response()->json($result, $result['ok'] ? 200 : ($result['status'] ?? 500));
    }
}








