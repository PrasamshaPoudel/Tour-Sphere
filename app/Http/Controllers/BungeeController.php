<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;

class BungeeController extends Controller
{
    public function index(WeatherService $weatherService)
    {
$locations = [
    [
        'name' => 'The Last Resort Bungee',
        'location' => 'Tatopani, Nepal',
        'difficulty' => 'Extreme',
        'duration' => '4-6 hours (including travel)',
        'best_season' => 'October to April',
        'cost' => 'Rs 11,500 - Rs 15,000',
        'description' => 'Experience the ultimate adrenaline rush with Nepal\'s only bungee jump from a 160m suspension bridge over the Bhote Koshi River gorge.',
        'highlights' => [
            '160 meters (525 feet) high bungee jump',
            'Spectacular gorge and river views',
            'New Zealand standard safety equipment',
            'Certificate and T-shirt included',
            'Video recording available'
        ],
        'itinerary' => [
            'Morning: Pick up from Kathmandu (3 hours drive)',
            'Arrival: Registration and safety briefing',
            'Preparation: Equipment fitting and final checks',
            'Jump: The ultimate 160m bungee experience',
            'Recovery: Photos, certificate, and celebration',
            'Return: Drive back to Kathmandu'
        ],
        'things_to_carry' => [
            'Comfortable clothing (no loose items)',
            'Closed-toe sports shoes',
            'Valid ID for registration',
            'Camera (handed to staff before jump)',
            'Light snacks and water',
            'Cash for optional video service',
            'Courage and positive attitude!'
        ],
        'image' => 'bungee.jpg',
        'weather' => [
            'temperature' => 18,
            'description' => 'Clear',
            'humidity' => 60,
            'wind_speed' => 2.0,
            'icon' => '01d'
        ]
    ], // ✅ Missing comma added here

    [
        'name' => 'Kushma Bungee Jump',
        'location' => 'Kushma, Parbat District, Nepal',
        'difficulty' => 'Extreme',
        'duration' => 'Full day (including travel)',
        'best_season' => 'September to May',
        'cost' => 'Rs 7,000 - Rs 12,000',
        'description' => 'Take the plunge from Nepal’s highest bungee jump, leaping from a suspension bridge 228 meters above the Kali Gandaki River.',
        'highlights' => [
            '228 meters (748 feet) high – one of the tallest in the world',
            'Scenic views of the Kaligandaki gorge and mountains',
            'State-of-the-art safety standards',
            'Thrilling suspension bridge platform',
            'Video/photo recording available'
        ],
        'itinerary' => [
            'Morning: Drive from Pokhara to Kushma (3-4 hours)',
            'Arrival: Registration and safety instructions',
            'Preparation: Equipment fitting and jump briefing',
            'Jump: Leap from 228m into the Kaligandaki gorge',
            'Recovery: Relax, collect certificate and photos',
            'Evening: Drive back to Pokhara'
        ],
        'things_to_carry' => [
            'Comfortable clothes (avoid skirts/loose wear)',
            'Closed shoes with good grip',
            'Valid ID for registration',
            'Water bottle and light snacks',
            'Sunglasses and sunscreen',
            'Cash for video/photo service',
            'Strong heart and courage!'
        ],
        'image' => 'kushma-bunjee.jpg',
        'weather' => [
            'temperature' => 20,
            'description' => 'Partly Cloudy',
            'humidity' => 55,
            'wind_speed' => 3.5,
            'icon' => '02d'
        ]
    ],

    [
        'name' => 'Pokhara Bungee Jump',
        'location' => 'Hemja, Pokhara, Nepal',
        'difficulty' => 'Moderate',
        'duration' => '2-3 hours',
        'best_season' => 'September to May',
        'cost' => 'Rs 4,000 - Rs 7,000',
        'description' => 'Enjoy a thrilling 75-meter bungee jump in the adventure hub of Pokhara with stunning views of the Himalayas and cityscape.',
        'highlights' => [
            '75 meters (246 feet) high bungee jump',
            'Easily accessible from Pokhara city',
            'Options for tandem jumps',
            'Safe and beginner-friendly',
            'Photography and video services available'
        ],
        'itinerary' => [
            'Morning/Afternoon: Short drive from Pokhara Lakeside to Hemja site (20 mins)',
            'Arrival: Registration and safety briefing',
            'Preparation: Equipment fitting and jump instructions',
            'Jump: 75m bungee with views of Pokhara valley',
            'Recovery: Collect certificate, photos and videos',
            'Return: Drive back to Pokhara city'
        ],
        'things_to_carry' => [
            'Comfortable, light clothing',
            'Closed-toe shoes',
            'Valid ID for registration',
            'Water and light snacks',
            'Camera (to hand over to staff)',
            'Cash for souvenirs or video recording',
            'Excitement and adventurous spirit'
        ],
        'image' => 'pokhara-bunjee.jpg',
        'weather' => [
            'temperature' => 22,
            'description' => 'Sunny',
            'humidity' => 50,
            'wind_speed' => 2.8,
            'icon' => '01d'
        ]
    ]
];


        // Get weather data for each location
        $weatherData = [];
        foreach ($locations as $location) {
            $city = explode(',', $location['location'])[0];
            
            try {
                $weatherResult = $weatherService->getCurrentByCity($city);
                
                if ($weatherResult['ok']) {
                    $data = $weatherResult['data'];
                    $weatherData[$location['name']] = [
                        'temperature' => round($data['main']['temp']),
                        'description' => $data['weather'][0]['description'] ?? 'Clear sky',
                        'humidity' => $data['main']['humidity'],
                        'wind_speed' => round($data['wind']['speed'], 1),
                        'icon' => $data['weather'][0]['icon'] ?? '01d',
                        'feels_like' => round($data['main']['feels_like'] ?? $data['main']['temp'])
                    ];
                } else {
                    $weatherData[$location['name']] = [
                        'temperature' => 18,
                        'description' => 'Weather unavailable',
                        'humidity' => 60,
                        'wind_speed' => 2.0,
                        'icon' => '02d',
                        'feels_like' => 20
                    ];
                }
            } catch (\Exception $e) {
                $weatherData[$location['name']] = [
                    'temperature' => 18,
                    'description' => 'Weather unavailable',
                    'humidity' => 60,
                    'wind_speed' => 2.0,
                    'icon' => '02d',
                    'feels_like' => 20
                ];
            }
        }

        return view('pages.bungee', compact('locations', 'weatherData'));
    }
}

