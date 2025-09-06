<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class HoneymoonController extends Controller
{
    public function index(WeatherService $weatherService)
    {
        $packages = [
            [
                'name' => 'Romantic Pokhara Retreat',
                'location' => 'Pokhara, Nepal',
                'type' => 'Luxury Resort',
                'duration' => '5 days',
                'best_season' => 'October-March',
                'cost' => 'Rs 85,000 - Rs 150,000',
                'description' => 'Experience the ultimate romantic getaway in Pokhara with luxury accommodations, private dining, and breathtaking mountain views.',
                'highlights' => [
                    'Private candlelight dinner by Phewa Lake',
                    'Couple spa treatments and massages',
                    'Sunrise boat ride on Phewa Lake',
                    'Private helicopter tour of Annapurna range',
                    'Romantic sunset dinner at Sarangkot',
                    'Luxury resort with mountain views',
                    'Personalized honeymoon amenities'
                ],
                'itinerary' => [
                    'Day 1: Arrival in Pokhara, welcome ceremony, romantic dinner',
                    'Day 2: Sunrise boat ride, couple spa, private city tour',
                    'Day 3: Helicopter tour to Annapurna Base Camp, romantic lunch',
                    'Day 4: Sarangkot sunrise, couple activities, candlelight dinner',
                    'Day 5: Relaxation day, farewell dinner, departure'
                ],
                'things_to_carry' => [
                    'Elegant evening wear for romantic dinners',
                    'Comfortable walking shoes',
                    'Camera for capturing memories',
                    'Warm clothing for mountain views',
                    'Personal toiletries and cosmetics',
                    'Romantic accessories',
                    'Cash for additional romantic activities'
                ],
                'image' => 'pokhara-romantic.jpg',
                'weather' => [
                    'temperature' => 22,
                    'description' => 'Pleasant and romantic',
                    'humidity' => 65,
                    'wind_speed' => 2.5,
                    'icon' => '01d'
                ]
            ],
            [
                'name' => 'Kathmandu Valley Romance',
                'location' => 'Kathmandu, Nepal',
                'type' => 'Cultural Romance',
                'duration' => '4 days',
                'best_season' => 'Year round',
                'cost' => 'Rs 65,000 - Rs 120,000',
                'description' => 'Discover romance in the cultural heart of Nepal with heritage walks, traditional ceremonies, and intimate cultural experiences.',
                'highlights' => [
                    'Private heritage walk through ancient temples',
                    'Traditional Nepali wedding ceremony experience',
                    'Candlelight dinner at historic palace',
                    'Couple cooking class with local families',
                    'Private cultural performances',
                    'Luxury heritage hotel accommodation',
                    'Personalized cultural experiences'
                ],
                'itinerary' => [
                    'Day 1: Arrival, heritage hotel check-in, welcome ceremony',
                    'Day 2: Private temple tour, traditional cooking class',
                    'Day 3: Cultural performance, palace dinner, romantic walk',
                    'Day 4: Traditional ceremony experience, farewell dinner'
                ],
                'things_to_carry' => [
                    'Traditional and modern elegant wear',
                    'Comfortable shoes for heritage walks',
                    'Camera for cultural documentation',
                    'Respectful clothing for temple visits',
                    'Personal accessories',
                    'Cash for traditional ceremonies',
                    'Open mind for cultural experiences'
                ],
                'image' => 'kathmandu-romance.jpg',
                'weather' => [
                    'temperature' => 24,
                    'description' => 'Mild and comfortable',
                    'humidity' => 60,
                    'wind_speed' => 2.0,
                    'icon' => '02d'
                ]
            ],
            [
                'name' => 'Mountain Honeymoon Escape',
                'location' => 'Nagarkot, Nepal',
                'type' => 'Mountain Retreat',
                'duration' => '3 days',
                'best_season' => 'October-March',
                'cost' => 'Rs 75,000 - Rs 130,000',
                'description' => 'Escape to the mountains for an intimate honeymoon with panoramic Himalayan views, private dining, and luxury mountain resort experience.',
                'highlights' => [
                    'Private sunrise viewing with champagne breakfast',
                    'Mountain-top candlelight dinner',
                    'Couple hiking with picnic lunch',
                    'Luxury mountain resort with fireplace',
                    'Private stargazing session',
                    'Couple spa with mountain views',
                    'Personalized honeymoon suite'
                ],
                'itinerary' => [
                    'Day 1: Arrival at mountain resort, welcome ceremony',
                    'Day 2: Sunrise viewing, couple hiking, mountain dinner',
                    'Day 3: Spa treatments, stargazing, farewell breakfast'
                ],
                'things_to_carry' => [
                    'Warm elegant clothing for mountain weather',
                    'Comfortable hiking shoes',
                    'Camera for mountain photography',
                    'Warm accessories (scarves, gloves)',
                    'Personal romantic items',
                    'Cash for additional activities',
                    'Binoculars for mountain viewing'
                ],
                'image' => 'mountain-honeymoon.jpg',
                'weather' => [
                    'temperature' => 18,
                    'description' => 'Cool and romantic',
                    'humidity' => 55,
                    'wind_speed' => 4.0,
                    'icon' => '01d'
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

        return view('pages.honeymoon', compact('packages', 'weatherData'));
    }
}
