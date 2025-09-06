<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;

class RaftingController extends Controller
{
    public function index(WeatherService $weatherService)
    {
        // River data with detailed information
        $rivers = [
            [
                'name' => 'Seti River',
                'location' => 'Pokhara, Nepal',
                'difficulty' => 'Grade II-III',
                'duration' => '2-3 days',
                'best_season' => 'October to May',
                'cost' => 'Rs 8,000 - Rs 12,000',
                'description' => 'The Seti River offers a perfect blend of adventure and scenic beauty. Known for its crystal-clear waters and moderate rapids, it\'s ideal for beginners and families.',
                'highlights' => [
                    'Crystal clear water with stunning mountain views',
                    'Perfect for beginners and families',
                    'Rich biodiversity and bird watching opportunities',
                    'Cultural interactions with local communities'
                ],
                'itinerary' => [
                    'Day 1: Arrival in Pokhara, briefing, and equipment check',
                    'Day 2: Drive to starting point, rafting on Seti River (4-5 hours)',
                    'Day 3: Continue rafting, cultural village visit, return to Pokhara'
                ],
                'things_to_carry' => [
                    'Swimming costume/quick-dry clothes',
                    'Sun hat and sunglasses',
                    'Sunscreen (SPF 30+)',
                    'Water bottle',
                    'Camera (waterproof case recommended)',
                    'Personal medications',
                    'Extra set of clothes'
                ],
                'image' => 'rafting.jpg'
            ],
            [
                'name' => 'Kaligandaki River',
                'location' => 'Mustang, Nepal',
                'difficulty' => 'Grade III-IV',
                'duration' => '3-4 days',
                'best_season' => 'October to April',
                'cost' => 'Rs 15,000 - Rs 25,000',
                'description' => 'The Kaligandaki River provides an exhilarating rafting experience through the deepest gorge in the world. This challenging route offers spectacular views of the Annapurna and Dhaulagiri ranges.',
                'highlights' => [
                    'World\'s deepest gorge experience',
                    'Spectacular views of Annapurna and Dhaulagiri',
                    'Challenging rapids for experienced rafters',
                    'Unique geological formations and hot springs'
                ],
                'itinerary' => [
                    'Day 1: Drive from Pokhara to starting point, camp setup',
                    'Day 2: Full day rafting on Kaligandaki (6-7 hours)',
                    'Day 3: Continue rafting, visit hot springs, cultural sites',
                    'Day 4: Final rafting section, return to Pokhara'
                ],
                'things_to_carry' => [
                    'Warm clothing (temperatures can drop significantly)',
                    'Waterproof jacket and pants',
                    'Sturdy river shoes',
                    'Headlamp with extra batteries',
                    'Personal first aid kit',
                    'Dry bags for electronics',
                    'Thermal underwear'
                ],
                'image' => 'rafting.jpg'
            ],
            [
                'name' => 'Trishuli River',
                'location' => 'Chitwan, Nepal',
                'difficulty' => 'Grade II-IV',
                'duration' => '1-3 days',
                'best_season' => 'October to May',
                'cost' => 'Rs 5,000 - Rs 10,000',
                'description' => 'The Trishuli River is Nepal\'s most popular rafting destination, offering a perfect mix of adventure and accessibility. It\'s easily accessible from Kathmandu and Pokhara.',
                'highlights' => [
                    'Most accessible from Kathmandu and Pokhara',
                    'Variety of rapids suitable for all levels',
                    'Beautiful gorges and waterfalls',
                    'Combine with Chitwan National Park safari'
                ],
                'itinerary' => [
                    'Day 1: Drive from Kathmandu/Pokhara, rafting on Trishuli (4-5 hours)',
                    'Day 2: Continue rafting, visit local villages, overnight camp',
                    'Day 3: Final rafting section, optional Chitwan safari, return'
                ],
                'things_to_carry' => [
                    'Lightweight, quick-dry clothing',
                    'Sandals or water shoes',
                    'Waterproof camera or phone case',
                    'Snacks and energy bars',
                    'Insect repellent',
                    'Small backpack for day trips',
                    'Cash for local purchases'
                ],
                'image' => 'rafting.jpg'
            ],
            [
                'name' => 'Bhote Koshi River',
                'location' => 'Nepal-Tibet Border',
                'difficulty' => 'Grade IV-V',
                'duration' => '1-2 days',
                'best_season' => 'October to December, March to May',
                'cost' => 'Rs 8,000 - Rs 15,000',
                'description' => 'The steepest and most technical river in Nepal with non-stop action. Known for its continuous rapids and adrenaline-pumping experience.',
                'highlights' => [
                    'Steepest rafting river in Nepal',
                    'Continuous Grade IV-V rapids',
                    'High adrenaline, non-stop action',
                    'Spectacular gorge scenery',
                    'Perfect for experienced rafters'
                ],
                'itinerary' => [
                    'Day 1: Drive from Kathmandu, safety briefing, intense rafting',
                    'Day 2: Continue challenging rapids, return to Kathmandu'
                ],
                'things_to_carry' => [
                    'Waterproof gear (essential)',
                    'Helmet and safety equipment (provided)',
                    'Quick-dry clothing',
                    'Secure footwear',
                    'Waterproof camera case',
                    'Change of dry clothes',
                    'High energy snacks'
                ],
                'image' => 'rafting.jpg'
            ],
            [
                'name' => 'Marsyangdi River',
                'location' => 'Annapurna Region',
                'difficulty' => 'Grade IV-V',
                'duration' => '3-4 days',
                'best_season' => 'October to November, March to May',
                'cost' => 'Rs 18,000 - Rs 30,000',
                'description' => 'Technical and challenging river with stunning mountain views. Considered one of the best white water experiences in Nepal.',
                'highlights' => [
                    'Technical Grade IV-V rapids',
                    'Spectacular Annapurna views',
                    'Remote mountain valley setting',
                    'Challenging for expert rafters',
                    'Multi-day expedition experience'
                ],
                'itinerary' => [
                    'Day 1: Drive to put-in point, begin rafting expedition',
                    'Day 2-3: Navigate challenging rapids, mountain camping',
                    'Day 4: Final rapids section, return journey'
                ],
                'things_to_carry' => [
                    'Professional rafting gear',
                    'Camping equipment (provided)',
                    'Warm sleeping bag',
                    'Waterproof bags for belongings',
                    'High-energy food supplies',
                    'First aid knowledge helpful',
                    'Expedition mindset'
                ],
                'image' => 'rafting.jpg'
            ],
            [
                'name' => 'Sun Koshi River',
                'location' => 'Eastern Nepal',
                'difficulty' => 'Grade III-IV',
                'duration' => '7-9 days',
                'best_season' => 'October to November, February to April',
                'cost' => 'Rs 35,000 - Rs 55,000',
                'description' => 'The longest rafting expedition in Nepal, known as the "River of Gold." Experience diverse landscapes and remote villages.',
                'highlights' => [
                    'Longest rafting expedition in Nepal',
                    'Diverse landscapes and cultures',
                    'Remote village interactions',
                    'Excellent for beginners to intermediates',
                    'Multi-day camping adventure'
                ],
                'itinerary' => [
                    'Day 1-2: Begin expedition, moderate rapids',
                    'Day 3-5: Middle section with varied challenges',
                    'Day 6-8: Final sections and cultural interactions',
                    'Day 9: Completion and return journey'
                ],
                'things_to_carry' => [
                    'Extended expedition gear',
                    'Personal camping items',
                    'Multiple sets of clothing',
                    'Water purification tablets',
                    'Personal hygiene supplies',
                    'Books or entertainment',
                    'Camera for cultural documentation'
                ],
                'image' => 'rafting.jpg'
            ]
        ];

        // Get weather data for each river location
        $weatherData = [];
        $forecastData = [];
        foreach ($rivers as $river) {
            // Extract city name from location (e.g., "Pokhara, Nepal" -> "Pokhara")
            $city = explode(',', $river['location'])[0];
            
            try {
                $weatherResult = $weatherService->getCurrentAndForecastByCity($city);
                
                // Current weather
                if ($weatherResult['current']['ok']) {
                    $data = $weatherResult['current']['data'];
                    $weatherData[$river['name']] = [
                        'temperature' => round($data['main']['temp']),
                        'description' => $data['weather'][0]['description'] ?? 'Clear sky',
                        'humidity' => $data['main']['humidity'],
                        'wind_speed' => round($data['wind']['speed'], 1),
                        'icon' => $data['weather'][0]['icon'] ?? '01d',
                        'feels_like' => round($data['main']['feels_like'] ?? $data['main']['temp'])
                    ];
                } else {
                    $weatherData[$river['name']] = [
                        'temperature' => 22,
                        'description' => 'Weather unavailable',
                        'humidity' => 65,
                        'wind_speed' => 3.2,
                        'icon' => '02d',
                        'feels_like' => 24
                    ];
                }
                
                // 5-day forecast (first 5 entries)
                if ($weatherResult['forecast']['ok']) {
                    $forecastList = $weatherResult['forecast']['data']['list'] ?? [];
                    $forecastData[$river['name']] = array_slice($forecastList, 0, 5);
                } else {
                    $forecastData[$river['name']] = [];
                }
                
            } catch (\Exception $e) {
                $weatherData[$river['name']] = [
                    'temperature' => 22,
                    'description' => 'Weather unavailable',
                    'humidity' => 65,
                    'wind_speed' => 3.2,
                    'icon' => '02d',
                    'feels_like' => 24
                ];
                $forecastData[$river['name']] = [];
            }
        }

        return view('pages.rafting', compact('rivers', 'weatherData', 'forecastData'));
    }
}
