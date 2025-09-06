<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class LuxuryController extends Controller
{
    public function index(WeatherService $weatherService)
    {
        $packages = [
            [
                'name' => 'Luxury Himalayan Retreat',
                'location' => 'Pokhara, Nepal',
                'type' => '5-Star Luxury',
                'duration' => '7 days',
                'best_season' => 'October-March',
                'cost' => 'Rs 150,000 - Rs 300,000',
                'description' => 'Ultimate luxury experience with 5-star accommodations, private helicopter tours, gourmet dining, and personalized services.',
                'highlights' => [
                    '5-star luxury resort accommodation',
                    'Private helicopter tour to Everest Base Camp',
                    'Personal butler and concierge service',
                    'Gourmet dining with Michelin-starred chefs',
                    'Private spa treatments and wellness programs',
                    'Exclusive cultural experiences',
                    'Luxury transportation and transfers'
                ],
                'itinerary' => [
                    'Day 1: Luxury airport transfer, resort check-in, welcome ceremony',
                    'Day 2: Private helicopter tour, gourmet lunch, spa treatments',
                    'Day 3: Exclusive cultural experiences, private dining',
                    'Day 4: Adventure activities with luxury amenities',
                    'Day 5: Wellness programs, private tours',
                    'Day 6: Leisure day with personalized services',
                    'Day 7: Farewell ceremony, luxury departure'
                ],
                'things_to_carry' => [
                    'Elegant luxury clothing',
                    'Formal wear for fine dining',
                    'Comfortable luxury shoes',
                    'Camera for luxury experiences',
                    'Personal luxury accessories',
                    'Cash for additional luxury services',
                    'Expectation for premium service'
                ],
                'image' => 'luxury-himalayan.jpg',
                'weather' => [
                    'temperature' => 22,
                    'description' => 'Perfect luxury weather',
                    'humidity' => 65,
                    'wind_speed' => 2.5,
                    'icon' => '01d'
                ]
            ],
            [
                'name' => 'Royal Heritage Experience',
                'location' => 'Kathmandu, Nepal',
                'type' => 'Royal Luxury',
                'duration' => '5 days',
                'best_season' => 'Year round',
                'cost' => 'Rs 120,000 - Rs 250,000',
                'description' => 'Royal treatment with palace accommodations, private heritage tours, and exclusive access to Nepal\'s most prestigious sites.',
                'highlights' => [
                    'Palace accommodation with royal treatment',
                    'Private access to restricted heritage sites',
                    'Royal dining experiences',
                    'Personal heritage guide and historian',
                    'Exclusive cultural performances',
                    'Luxury spa and wellness center',
                    'Royal transportation and security'
                ],
                'itinerary' => [
                    'Day 1: Royal welcome, palace check-in, heritage orientation',
                    'Day 2: Private palace tours, royal dining experience',
                    'Day 3: Exclusive heritage site access, cultural performances',
                    'Day 4: Luxury spa treatments, private tours',
                    'Day 5: Royal farewell ceremony, luxury departure'
                ],
                'things_to_carry' => [
                    'Royal and elegant clothing',
                    'Formal wear for palace visits',
                    'Comfortable luxury shoes',
                    'Camera for royal experiences',
                    'Personal luxury accessories',
                    'Cash for royal services',
                    'Respectful attitude for royal treatment'
                ],
                'image' => 'royal-heritage.jpg',
                'weather' => [
                    'temperature' => 24,
                    'description' => 'Royal weather conditions',
                    'humidity' => 60,
                    'wind_speed' => 2.0,
                    'icon' => '02d'
                ]
            ],
            [
                'name' => 'Exclusive Wildlife Safari',
                'location' => 'Chitwan, Nepal',
                'type' => 'Luxury Safari',
                'duration' => '4 days',
                'best_season' => 'October-March',
                'cost' => 'Rs 100,000 - Rs 200,000',
                'description' => 'Luxury wildlife experience with premium accommodations, private safaris, and exclusive access to Nepal\'s best wildlife areas.',
                'highlights' => [
                    'Luxury jungle resort accommodation',
                    'Private wildlife safaris with expert guides',
                    'Exclusive access to restricted wildlife areas',
                    'Gourmet jungle dining experiences',
                    'Luxury spa treatments in nature',
                    'Personal wildlife photographer',
                    'Premium transportation and amenities'
                ],
                'itinerary' => [
                    'Day 1: Luxury transfer, resort check-in, welcome ceremony',
                    'Day 2: Private wildlife safari, gourmet jungle dining',
                    'Day 3: Exclusive wildlife photography, luxury spa',
                    'Day 4: Final safari, farewell ceremony, departure'
                ],
                'things_to_carry' => [
                    'Luxury safari clothing',
                    'Comfortable luxury shoes',
                    'Professional camera equipment',
                    'Binoculars for wildlife viewing',
                    'Personal luxury accessories',
                    'Cash for luxury services',
                    'Appreciation for wildlife luxury'
                ],
                'image' => 'luxury-safari.jpg',
                'weather' => [
                    'temperature' => 28,
                    'description' => 'Perfect safari weather',
                    'humidity' => 70,
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

        return view('pages.luxury', compact('packages', 'weatherData'));
    }
}
