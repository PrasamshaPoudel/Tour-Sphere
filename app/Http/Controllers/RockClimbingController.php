<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;

class RockClimbingController extends Controller
{
    public function index(WeatherService $weatherService)
    {
        $climbingSites = [
            [
                'name' => 'Nagarkot Rock Climbing',
                'location' => 'Nagarkot, Nepal',
                'difficulty' => 'Beginner to Intermediate',
                'duration' => 'Half day to Full day',
                'best_season' => 'October to April',
                'cost' => 'Rs 3,000 - Rs 8,000',
                'description' => 'Experience rock climbing with stunning views of the Himalayas. Perfect for beginners with various routes and difficulty levels.',
                'highlights' => [
                    'Panoramic Himalayan views while climbing',
                    'Multiple routes for different skill levels',
                    'Professional climbing instructors',
                    'All safety equipment provided',
                    'Perfect for first-time climbers'
                ],
                'itinerary' => [
                    'Morning: Pick up from Kathmandu, drive to Nagarkot',
                    'Arrival: Equipment check and safety briefing',
                    'Climbing: Multiple routes with instructor guidance',
                    'Lunch: Break with mountain views',
                    'Afternoon: Continue climbing or rappelling',
                    'Return: Drive back to Kathmandu'
                ],
                'things_to_carry' => [
                    'Comfortable climbing clothes',
                    'Sturdy hiking shoes',
                    'Water bottle',
                    'Light snacks',
                    'Camera for mountain views',
                    'Sunscreen and hat',
                    'Personal medications'
                ],
                'image' => 'rock-climbing.jpg'
            ],
            [
                'name' => 'Pokhara Rock Climbing',
                'location' => 'Pokhara, Nepal',
                'difficulty' => 'Intermediate to Advanced',
                'duration' => 'Full day',
                'best_season' => 'September to May',
                'cost' => 'Rs 4,000 - Rs 10,000',
                'description' => 'Rock climbing in the beautiful Pokhara valley with views of Phewa Lake and Annapurna range. Various climbing routes available.',
                'highlights' => [
                    'Lake and mountain views while climbing',
                    'Natural rock formations',
                    'Experienced climbing guides',
                    'Equipment rental available',
                    'Photo opportunities'
                ],
                'itinerary' => [
                    'Morning: Hotel pickup, drive to climbing site',
                    'Preparation: Equipment fitting and route briefing',
                    'Climbing: Multiple routes with different difficulties',
                    'Lunch: Break by the lake',
                    'Afternoon: Advanced routes or rappelling',
                    'Return: Transport back to hotel'
                ],
                'things_to_carry' => [
                    'Quick-dry clothing',
                    'Climbing shoes (if you have)',
                    'Water and energy snacks',
                    'Camera or GoPro',
                    'Light jacket',
                    'First aid basics',
                    'Cash for equipment rental'
                ],
                'image' => 'rock-climbing.jpg'
            ],
            [
                'name' => 'Himalayan Rock Climbing',
                'location' => 'Langtang Region, Nepal',
                'difficulty' => 'Advanced',
                'duration' => '2-3 days',
                'best_season' => 'March to May, September to November',
                'cost' => 'Rs 15,000 - Rs 25,000',
                'description' => 'Advanced rock climbing in the Himalayan region with challenging routes and spectacular mountain scenery.',
                'highlights' => [
                    'High altitude climbing experience',
                    'Challenging technical routes',
                    'Remote mountain setting',
                    'Professional mountain guides',
                    'Multi-day climbing expedition'
                ],
                'itinerary' => [
                    'Day 1: Drive to Langtang, trek to base camp',
                    'Day 2: Climbing routes with mountain views',
                    'Day 3: Advanced routes or return trek',
                    'Equipment: All climbing gear provided',
                    'Accommodation: Mountain lodges included'
                ],
                'things_to_carry' => [
                    'High altitude clothing',
                    'Mountaineering boots',
                    'Personal climbing gear',
                    'Sleeping bag',
                    'High energy food',
                    'Altitude medication',
                    'Emergency communication device'
                ],
                'image' => 'mountaineering.jpg'
            ]
        ];

        // Get weather data for each climbing site
        $weatherData = [];
        foreach ($climbingSites as $site) {
            $city = explode(',', $site['location'])[0];
            
            try {
                $weatherResult = $weatherService->getCurrentByCity($city);
                
                if ($weatherResult['ok']) {
                    $data = $weatherResult['data'];
                    $weatherData[$site['name']] = [
                        'temperature' => round($data['main']['temp']),
                        'description' => $data['weather'][0]['description'] ?? 'Clear sky',
                        'humidity' => $data['main']['humidity'],
                        'wind_speed' => round($data['wind']['speed'], 1),
                        'icon' => $data['weather'][0]['icon'] ?? '01d',
                        'feels_like' => round($data['main']['feels_like'] ?? $data['main']['temp'])
                    ];
                } else {
                    $weatherData[$site['name']] = [
                        'temperature' => 20,
                        'description' => 'Weather unavailable',
                        'humidity' => 55,
                        'wind_speed' => 3.0,
                        'icon' => '02d',
                        'feels_like' => 22
                    ];
                }
            } catch (\Exception $e) {
                $weatherData[$site['name']] = [
                    'temperature' => 20,
                    'description' => 'Weather unavailable',
                    'humidity' => 55,
                    'wind_speed' => 3.0,
                    'icon' => '02d',
                    'feels_like' => 22
                ];
            }
        }

        return view('pages.rock-climbing', compact('climbingSites', 'weatherData'));
    }
}
