<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index(WeatherService $weatherService)
    {
        $packages = [
            [
                'name' => 'Family Adventure in Chitwan',
                'location' => 'Chitwan, Nepal',
                'type' => 'Wildlife Family Fun',
                'duration' => '4 days',
                'best_season' => 'October-March',
                'cost' => 'Rs 45,000 - Rs 85,000',
                'description' => 'Perfect family adventure combining wildlife safaris, cultural experiences, and fun activities suitable for all ages.',
                'highlights' => [
                    'Elephant safari with family-friendly guides',
                    'Rhino and bird watching for kids',
                    'Tharu cultural dance performances',
                    'Family canoe ride on Rapti River',
                    'Kids-friendly jungle walks',
                    'Traditional cooking class for families',
                    'Safe and comfortable family accommodations'
                ],
                'itinerary' => [
                    'Day 1: Arrival, family orientation, cultural show',
                    'Day 2: Elephant safari, rhino watching, family activities',
                    'Day 3: Canoe ride, bird watching, traditional cooking',
                    'Day 4: Final safari, souvenir shopping, departure'
                ],
                'things_to_carry' => [
                    'Comfortable family clothing',
                    'Kids-friendly walking shoes',
                    'Binoculars for wildlife watching',
                    'Camera for family memories',
                    'Insect repellent for children',
                    'Snacks and water for kids',
                    'First aid kit for family'
                ],
                'image' => 'chitwan-family.jpg',
                'weather' => [
                    'temperature' => 28,
                    'description' => 'Warm and family-friendly',
                    'humidity' => 70,
                    'wind_speed' => 2.0,
                    'icon' => '02d'
                ]
            ],
            [
                'name' => 'Pokhara Family Fun',
                'location' => 'Pokhara, Nepal',
                'type' => 'Lakeside Family Adventure',
                'duration' => '5 days',
                'best_season' => 'Year round',
                'cost' => 'Rs 55,000 - Rs 95,000',
                'description' => 'Family-friendly activities in Pokhara including boating, paragliding for teens, and cultural experiences for all ages.',
                'highlights' => [
                    'Family boat ride on Phewa Lake',
                    'Safe paragliding for teenagers',
                    'Guided family trekking',
                    'Kids-friendly adventure activities',
                    'Family cooking classes',
                    'Cultural performances for families',
                    'Comfortable family hotel with amenities'
                ],
                'itinerary' => [
                    'Day 1: Arrival, family hotel check-in, lake walk',
                    'Day 2: Boat ride, family trekking, cultural show',
                    'Day 3: Adventure activities, cooking class',
                    'Day 4: Paragliding (teens), family relaxation',
                    'Day 5: Souvenir shopping, departure'
                ],
                'things_to_carry' => [
                    'Family-friendly clothing',
                    'Comfortable shoes for all ages',
                    'Swimming gear for lake activities',
                    'Camera for family photos',
                    'Snacks and entertainment for kids',
                    'Sun protection for children',
                    'Cash for family activities'
                ],
                'image' => 'pokhara-family.jpg',
                'weather' => [
                    'temperature' => 22,
                    'description' => 'Pleasant for families',
                    'humidity' => 65,
                    'wind_speed' => 2.5,
                    'icon' => '01d'
                ]
            ],
            [
                'name' => 'Kathmandu Family Heritage',
                'location' => 'Kathmandu, Nepal',
                'type' => 'Cultural Family Experience',
                'duration' => '3 days',
                'best_season' => 'Year round',
                'cost' => 'Rs 35,000 - Rs 65,000',
                'description' => 'Explore Kathmandu\'s rich heritage with family-friendly tours, interactive museums, and cultural activities for all ages.',
                'highlights' => [
                    'Family-friendly heritage walks',
                    'Interactive museum visits',
                    'Traditional craft workshops for kids',
                    'Family cooking classes',
                    'Safe temple visits with guides',
                    'Cultural performances for families',
                    'Comfortable family accommodations'
                ],
                'itinerary' => [
                    'Day 1: Arrival, family orientation, heritage walk',
                    'Day 2: Museum visits, craft workshops, cultural show',
                    'Day 3: Temple visits, cooking class, departure'
                ],
                'things_to_carry' => [
                    'Respectful family clothing',
                    'Comfortable walking shoes',
                    'Camera for family memories',
                    'Notebooks for kids learning',
                    'Snacks and water for children',
                    'Cash for family activities',
                    'Entertainment for travel time'
                ],
                'image' => 'kathmandu-family.jpg',
                'weather' => [
                    'temperature' => 24,
                    'description' => 'Comfortable for families',
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

        return view('pages.family', compact('packages', 'weatherData'));
    }
}
