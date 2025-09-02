<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BungeeController extends Controller
{
    public function index()
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
            ]
        ];

        return view('pages.bungee', compact('locations'));
    }
}

