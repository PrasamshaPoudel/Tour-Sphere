<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SpecialPackageService;
use App\Services\WeatherService;

class SpecialPackageController extends Controller
{
    public function index(Request $request)
    {
        // Get category from route name
        $routeName = $request->route()->getName();
        $category = $routeName; // The route name matches the category
        $packageData = SpecialPackageService::getPackagesByCategory($category);
        
        if (!$packageData) {
            abort(404, 'Package category not found');
        }

        $destinations = $packageData['destinations'] ?? [];
        $destinationsWithWeather = [];

        foreach ($destinations as $destination) {
            try {
                $city = $destination['location'] ?? 'Pokhara';
                
                // Fetch weather data
                $weatherService = new WeatherService();
                $weatherResponse = $weatherService->getCurrentAndForecastByCity($city);
                
                // Ultra-defensive weather data validation
                $weatherData = null;
                if (is_array($weatherResponse) && 
                    isset($weatherResponse['current']) && 
                    is_array($weatherResponse['current']) &&
                    isset($weatherResponse['current']['weather']) &&
                    is_array($weatherResponse['current']['weather']) &&
                    count($weatherResponse['current']['weather']) > 0 &&
                    is_array($weatherResponse['current']['weather'][0])) {
                    
                    $weatherItem = $weatherResponse['current']['weather'][0];
                    $weatherData = [
                        'temperature' => $weatherResponse['current']['main']['temp'] ?? 'N/A',
                        'description' => $weatherItem['description'] ?? 'Unknown',
                        'icon' => $weatherItem['icon'] ?? '01d',
                        'humidity' => $weatherResponse['current']['main']['humidity'] ?? 'N/A',
                        'wind_speed' => $weatherResponse['current']['wind']['speed'] ?? 'N/A'
                    ];
                }
                
                $destination['weather'] = $weatherData;
                $destination['weather_icon'] = $this->getWeatherIcon($weatherData['icon'] ?? '01d');
                
            } catch (\Exception $e) {
                // If weather fails, continue without weather data
                $destination['weather'] = null;
                $destination['weather_icon'] = '🌤️';
            }

            $destinationsWithWeather[] = $destination;
        }

        return view('pages.special-package', [
            'packageData' => $packageData,
            'destinations' => $destinationsWithWeather,
            'category' => $category
        ]);
    }

    private function getWeatherIcon($iconCode)
    {
        $iconMap = [
            '01d' => '☀️', '01n' => '🌙',
            '02d' => '⛅', '02n' => '☁️',
            '03d' => '☁️', '03n' => '☁️',
            '04d' => '☁️', '04n' => '☁️',
            '09d' => '🌧️', '09n' => '🌧️',
            '10d' => '🌦️', '10n' => '🌧️',
            '11d' => '⛈️', '11n' => '⛈️',
            '13d' => '❄️', '13n' => '❄️',
            '50d' => '🌫️', '50n' => '🌫️'
        ];

        return $iconMap[$iconCode] ?? '🌤️';
    }
}
