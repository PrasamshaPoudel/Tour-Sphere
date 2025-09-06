<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class RomanticController extends Controller
{
    public function index(WeatherService $weatherService)
    {
        $packages = [
            [
                'name' => 'Candlelight Dinner Experience',
                'location' => 'Pokhara, Nepal',
                'type' => 'Romantic Dining',
                'duration' => '1 evening',
                'best_season' => 'Year round',
                'cost' => 'Rs 8,000 - Rs 15,000',
                'description' => 'An intimate candlelight dinner by Phewa Lake with personalized service, gourmet cuisine, and breathtaking mountain views.',
                'highlights' => [
                    'Private lakeside candlelight dinner',
                    'Personalized menu with wine pairing',
                    'Live traditional music performance',
                    'Professional photography service',
                    'Romantic boat ride before dinner',
                    'Personalized romantic decorations',
                    'Champagne toast with mountain views'
                ],
                'itinerary' => [
                    '6:00 PM: Romantic boat ride on Phewa Lake',
                    '7:00 PM: Arrival at private dining location',
                    '7:30 PM: Welcome champagne and appetizers',
                    '8:00 PM: Gourmet candlelight dinner',
                    '9:30 PM: Live music and dessert',
                    '10:30 PM: Photography session and farewell'
                ],
                'things_to_carry' => [
                    'Elegant evening wear',
                    'Camera for romantic photos',
                    'Personal romantic accessories',
                    'Comfortable shoes for walking',
                    'Light jacket for evening',
                    'Cash for additional services',
                    'Romantic attitude and open heart'
                ],
                'image' => 'candlelight-dinner.jpg',
                'weather' => [
                    'temperature' => 20,
                    'description' => 'Romantic evening',
                    'humidity' => 65,
                    'wind_speed' => 1.5,
                    'icon' => '01n'
                ]
            ],
            [
                'name' => 'Mountain Romance Package',
                'location' => 'Nagarkot, Nepal',
                'type' => 'Mountain Romance',
                'duration' => '2 days',
                'best_season' => 'October-March',
                'cost' => 'Rs 25,000 - Rs 45,000',
                'description' => 'A romantic mountain escape with sunrise views, private dining, and intimate moments in the Himalayas.',
                'highlights' => [
                    'Private sunrise viewing with breakfast',
                    'Mountain-top candlelight dinner',
                    'Couple spa treatments',
                    'Romantic hiking with picnic',
                    'Private stargazing session',
                    'Luxury mountain resort stay',
                    'Personalized romantic services'
                ],
                'itinerary' => [
                    'Day 1: Arrival, romantic welcome, mountain dinner',
                    'Day 2: Sunrise viewing, couple spa, stargazing'
                ],
                'things_to_carry' => [
                    'Warm romantic clothing',
                    'Comfortable hiking shoes',
                    'Camera for mountain romance',
                    'Warm accessories',
                    'Personal romantic items',
                    'Cash for additional services',
                    'Binoculars for mountain viewing'
                ],
                'image' => 'mountain-romance.jpg',
                'weather' => [
                    'temperature' => 18,
                    'description' => 'Cool and romantic',
                    'humidity' => 55,
                    'wind_speed' => 3.0,
                    'icon' => '01d'
                ]
            ],
            [
                'name' => 'Heritage Romance Tour',
                'location' => 'Kathmandu, Nepal',
                'type' => 'Cultural Romance',
                'duration' => '3 days',
                'best_season' => 'Year round',
                'cost' => 'Rs 35,000 - Rs 60,000',
                'description' => 'Romantic exploration of Kathmandu\'s heritage with private tours, traditional ceremonies, and intimate cultural experiences.',
                'highlights' => [
                    'Private heritage walk for couples',
                    'Traditional romantic ceremonies',
                    'Palace candlelight dinner',
                    'Couple cooking class',
                    'Private cultural performances',
                    'Luxury heritage hotel stay',
                    'Personalized cultural experiences'
                ],
                'itinerary' => [
                    'Day 1: Arrival, heritage hotel, romantic welcome',
                    'Day 2: Private temple tour, cooking class, palace dinner',
                    'Day 3: Cultural performance, romantic walk, farewell'
                ],
                'things_to_carry' => [
                    'Elegant traditional and modern wear',
                    'Comfortable walking shoes',
                    'Camera for romantic moments',
                    'Respectful clothing for temples',
                    'Personal romantic accessories',
                    'Cash for traditional ceremonies',
                    'Open heart for cultural romance'
                ],
                'image' => 'heritage-romance.jpg',
                'weather' => [
                    'temperature' => 24,
                    'description' => 'Pleasant and romantic',
                    'humidity' => 60,
                    'wind_speed' => 2.0,
                    'icon' => '02d'
                ]
            ]
        ];

        // Get weather data for each location
        $weatherData = [];
        foreach ($packages as $package) {
            $city = explode(',', $package['location'])[0];
            try {
                $weatherResult = $weatherService->getCurrentByCity($city);
                $weatherData[$package['name']] = [
                    'temperature' => round($weatherResult['main']['temp']),
                    'description' => $weatherResult['weather'][0]['description'],
                    'humidity' => $weatherResult['main']['humidity'],
                    'wind_speed' => $weatherResult['wind']['speed'] ?? 0,
                    'feels_like' => round($weatherResult['main']['feels_like'] ?? $weatherResult['main']['temp']),
                    'icon' => $weatherResult['weather'][0]['icon']
                ];
            } catch (\Exception $e) {
                // Fallback to static data if API fails
                $weatherData[$package['name']] = $package['weather'];
            }
        }

        return view('pages.romantic', compact('packages', 'weatherData'));
    }
}
