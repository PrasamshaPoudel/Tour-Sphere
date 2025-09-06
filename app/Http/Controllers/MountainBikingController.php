<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;

class MountainBikingController extends Controller
{
    public function index(WeatherService $weatherService)
    {
        $bikingRoutes = [
            [
                'name' => 'Pokhara Valley Mountain Biking',
                'location' => 'Pokhara, Nepal',
                'difficulty' => 'Beginner to Intermediate',
                'duration' => 'Half day to Full day',
                'best_season' => 'October to April',
                'cost' => 'Rs 2,500 - Rs 6,000',
                'description' => 'Explore the beautiful Pokhara valley on mountain bikes with stunning views of the Annapurna range and Phewa Lake.',
                'highlights' => [
                    'Scenic valley routes with mountain views',
                    'Multiple difficulty levels available',
                    'Professional mountain bikes provided',
                    'Experienced biking guides',
                    'Photo stops at scenic viewpoints'
                ],
                'itinerary' => [
                    'Morning: Hotel pickup, bike fitting and briefing',
                    'Start: Begin valley exploration route',
                    'Mid-morning: Stop at scenic viewpoints',
                    'Lunch: Break at local restaurant',
                    'Afternoon: Continue biking or optional routes',
                    'Return: Drop off at hotel'
                ],
                'things_to_carry' => [
                    'Comfortable biking clothes',
                    'Closed-toe shoes',
                    'Water bottle',
                    'Light snacks',
                    'Camera for photos',
                    'Sunscreen and sunglasses',
                    'Small backpack'
                ],
                'image' => 'mountain-biking.jpg'
            ],
            [
                'name' => 'Kathmandu Valley Heritage Biking',
                'location' => 'Kathmandu, Nepal',
                'difficulty' => 'Beginner',
                'duration' => 'Half day',
                'best_season' => 'October to April',
                'cost' => 'Rs 2,000 - Rs 5,000',
                'description' => 'Bike through the cultural heritage sites of Kathmandu valley, visiting ancient temples and traditional villages.',
                'highlights' => [
                    'UNESCO World Heritage sites',
                    'Traditional Newari villages',
                    'Ancient temples and stupas',
                    'Cultural immersion experience',
                    'Easy biking routes'
                ],
                'itinerary' => [
                    'Morning: Hotel pickup, bike setup',
                    'Heritage tour: Visit temples and villages',
                    'Cultural stops: Learn about local traditions',
                    'Lunch: Traditional Nepali meal',
                    'Afternoon: Continue heritage exploration',
                    'Return: Drop off at hotel'
                ],
                'things_to_carry' => [
                    'Comfortable clothing',
                    'Walking shoes',
                    'Water bottle',
                    'Camera for heritage sites',
                    'Respectful attire for temples',
                    'Cash for donations',
                    'Small bag for souvenirs'
                ],
                'image' => 'mountain-biking.jpg'
            ],
            [
                'name' => 'Annapurna Circuit Mountain Biking',
                'location' => 'Annapurna Region, Nepal',
                'difficulty' => 'Advanced',
                'duration' => '7-10 days',
                'best_season' => 'March to May, September to November',
                'cost' => 'Rs 25,000 - Rs 45,000',
                'description' => 'Challenging mountain biking expedition around the Annapurna circuit with high altitude passes and stunning mountain views.',
                'highlights' => [
                    'High altitude mountain biking',
                    'Thorong La Pass crossing (5,416m)',
                    'Diverse landscapes and cultures',
                    'Professional expedition support',
                    'Multi-day adventure experience'
                ],
                'itinerary' => [
                    'Day 1-2: Drive to Besi Sahar, start biking',
                    'Day 3-5: Trek through villages to Manang',
                    'Day 6-7: Cross Thorong La Pass to Muktinath',
                    'Day 8-10: Continue biking to Pokhara',
                    'Support: Vehicle backup and guide included'
                ],
                'things_to_carry' => [
                    'High altitude biking gear',
                    'Mountaineering clothing',
                    'Personal biking equipment',
                    'Sleeping bag',
                    'High energy food',
                    'Altitude medication',
                    'Emergency communication device'
                ],
                'image' => 'mountain-biking.jpg'
            ],
            [
                'name' => 'Mustang Mountain Biking',
                'location' => 'Mustang, Nepal',
                'difficulty' => 'Intermediate to Advanced',
                'duration' => '5-7 days',
                'best_season' => 'March to May, September to November',
                'cost' => 'Rs 20,000 - Rs 35,000',
                'description' => 'Explore the ancient kingdom of Mustang on mountain bikes, discovering Tibetan culture and desert-like landscapes.',
                'highlights' => [
                    'Ancient Tibetan culture',
                    'Desert-like landscapes',
                    'Remote mountain villages',
                    'Cultural immersion',
                    'Unique geological formations'
                ],
                'itinerary' => [
                    'Day 1: Fly to Jomsom, start biking',
                    'Day 2-3: Explore Kagbeni and Muktinath',
                    'Day 4-5: Bike to Lo Manthang',
                    'Day 6-7: Explore Mustang and return',
                    'Support: Guide and vehicle backup'
                ],
                'things_to_carry' => [
                    'Desert-appropriate clothing',
                    'Sturdy biking shoes',
                    'Sun protection gear',
                    'Water purification tablets',
                    'Camera for cultural sites',
                    'Personal medications',
                    'Cash for remote areas'
                ],
                'image' => 'mountain-biking.jpg'
            ]
        ];

        // Get weather data for each biking route
        $weatherData = [];
        foreach ($bikingRoutes as $route) {
            $city = explode(',', $route['location'])[0];
            
            try {
                $weatherResult = $weatherService->getCurrentByCity($city);
                
                if ($weatherResult['ok']) {
                    $data = $weatherResult['data'];
                    $weatherData[$route['name']] = [
                        'temperature' => round($data['main']['temp']),
                        'description' => $data['weather'][0]['description'] ?? 'Clear sky',
                        'humidity' => $data['main']['humidity'],
                        'wind_speed' => round($data['wind']['speed'], 1),
                        'icon' => $data['weather'][0]['icon'] ?? '01d',
                        'feels_like' => round($data['main']['feels_like'] ?? $data['main']['temp'])
                    ];
                } else {
                    $weatherData[$route['name']] = [
                        'temperature' => 22,
                        'description' => 'Weather unavailable',
                        'humidity' => 60,
                        'wind_speed' => 2.5,
                        'icon' => '02d',
                        'feels_like' => 24
                    ];
                }
            } catch (\Exception $e) {
                $weatherData[$route['name']] = [
                    'temperature' => 22,
                    'description' => 'Weather unavailable',
                    'humidity' => 60,
                    'wind_speed' => 2.5,
                    'icon' => '02d',
                    'feels_like' => 24
                ];
            }
        }

        return view('pages.mountain-biking', compact('bikingRoutes', 'weatherData'));
    }
}
