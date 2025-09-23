<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;
use App\Services\AdventureDestinationService;

class MountainBikingController extends Controller
{
    public function index(WeatherService $weatherService)
    {
        // Get mountain biking destinations from AdventureDestinationService
        $bikingData = AdventureDestinationService::getDestinationsByCategory('mountain-biking');
        
        // Get weather data for each destination
        $destinationsWithWeather = [];
        $destinations = $bikingData['destinations'] ?? [];
        foreach ($destinations as $destination) {
            $city = $destination['location'] ?? 'Kathmandu'; // Default to Kathmandu if location not specified
            
            // Extract city name from location string (e.g., "Kathmandu, Nepal" -> "Kathmandu")
            if (strpos($city, ',') !== false) {
                $city = trim(explode(',', $city)[0]);
            }
            
            try {
                $weatherResponse = $weatherService->getCurrentByCity($city);
                
                // Initialize weather as null by default
                $destination['weather'] = null;
                
                if ($weatherResponse['ok'] && isset($weatherResponse['data'])) {
                    $weatherData = $weatherResponse['data'];
                    
                    // Safely check and extract weather data
                    if (is_array($weatherData) && 
                        isset($weatherData['main']) && 
                        is_array($weatherData['main']) && 
                        isset($weatherData['main']['temp']) && 
                        isset($weatherData['weather']) && 
                        is_array($weatherData['weather']) && 
                        count($weatherData['weather']) > 0) {
                        
                        $weatherItem = $weatherData['weather'][0];
                        
                        // Double check that weather item is an array
                        if (is_array($weatherItem)) {
                            $destination['weather'] = [
                                'temperature' => round($weatherData['main']['temp']),
                                'description' => ucfirst($weatherItem['description'] ?? 'Unknown'),
                                'icon' => $this->getWeatherIcon($weatherItem['icon'] ?? '01d')
                            ];
                        }
                    }
                }
            } catch (\Exception $e) {
                $destination['weather'] = null;
            }
            
            $destinationsWithWeather[] = $destination;
        }
        
        return view('pages.mountain-biking', [
            'bikingData' => $destinationsWithWeather,
            'pageTitle' => 'Mountain Biking Adventures in Nepal',
            'metaDescription' => 'Explore Nepal\'s diverse landscapes on two wheels. From cultural city tours to challenging high-altitude mountain biking adventures.'
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