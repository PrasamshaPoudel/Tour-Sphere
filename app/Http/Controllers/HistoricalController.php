<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoricalController extends Controller
{
    public function index()
    {
        $experiences = [
            [
                'name' => 'Kathmandu Durbar Square Heritage Walk',
                'location' => 'Kathmandu, Nepal',
                'type' => 'Royal Palace Complex',
                'duration' => '1-2 days',
                'best_season' => 'Year round',
                'cost' => 'Rs 5,000 - Rs 12,000',
                'description' => 'Explore the ancient royal palace complex with intricate wood carvings, courtyards, and temples dating back to the 12th century.',
                'highlights' => [
                    'UNESCO World Heritage Site',
                    'Ancient Newari architecture',
                    'Hanuman Dhoka Palace Museum',
                    'Living Goddess Kumari\'s residence',
                    'Traditional wood and stone carvings'
                ],
                'itinerary' => [
                    'Morning: Guided tour of palace courtyards',
                    'Midday: Museum visits and historical exhibitions',
                    'Afternoon: Traditional architecture workshop',
                    'Evening: Cultural performance in historical setting'
                ],
                'things_to_carry' => [
                    'Comfortable walking shoes',
                    'Camera for architecture photography',
                    'Hat and sunscreen',
                    'Water bottle',
                    'Notebook for historical facts',
                    'Cash for entrance fees',
                    'Respectful clothing for cultural sites'
                ],
                'image' => 'bhaktapur.jpg',
                'weather' => [
                    'temperature' => 24,
                    'description' => 'Pleasant',
                    'humidity' => 65,
                    'wind_speed' => 2.0,
                    'icon' => '02d'
                ]
            ],
            [
                'name' => 'Ancient Ruins Archaeological Tour',
                'location' => 'Tilaurakot, Nepal',
                'type' => 'Archaeological Site',
                'duration' => '2-3 days',
                'best_season' => 'October-March',
                'cost' => 'Rs 18,000 - Rs 35,000',
                'description' => 'Discover ancient Buddhist and Hindu ruins, archaeological excavations, and learn about Nepal\'s rich prehistoric and historical heritage.',
                'highlights' => [
                    'Ancient Kapilvastu ruins',
                    'Archaeological excavation sites',
                    'Buddhist monasteries ruins',
                    'Ancient city planning systems',
                    'Historical artifact discoveries'
                ],
                'itinerary' => [
                    'Day 1: Travel and visit Tilaurakot ruins',
                    'Day 2: Archaeological site exploration with expert guide',
                    'Day 3: Museum visits and historical documentation'
                ],
                'things_to_carry' => [
                    'Sturdy walking shoes',
                    'Hat and sun protection',
                    'Camera with extra batteries',
                    'Notebook for archaeological notes',
                    'Water and snacks',
                    'Magnifying glass for artifacts',
                    'Comfortable outdoor clothing'
                ],
                'image' => 'ruins.jpg',
                'weather' => [
                    'temperature' => 27,
                    'description' => 'Warm and dry',
                    'humidity' => 55,
                    'wind_speed' => 3.0,
                    'icon' => '01d'
                ]
            ],
            [
                'name' => 'National Museum Heritage Experience',
                'location' => 'Chhauni, Kathmandu',
                'type' => 'Museum & Gallery',
                'duration' => '1 day',
                'best_season' => 'Year round',
                'cost' => 'Rs 2,000 - Rs 5,000',
                'description' => 'Explore Nepal\'s largest museum showcasing historical artifacts, traditional weapons, cultural items, and archaeological treasures.',
                'highlights' => [
                    'Ancient artifacts and sculptures',
                    'Traditional weapons and armor',
                    'Historical manuscripts and coins',
                    'Cultural and religious exhibits',
                    'Educational guided tours'
                ],
                'itinerary' => [
                    'Morning: Museum orientation and historical overview',
                    'Midday: Detailed exploration of artifact collections',
                    'Afternoon: Special exhibitions and cultural workshops'
                ],
                'things_to_carry' => [
                    'Comfortable indoor shoes',
                    'Camera (where permitted)',
                    'Notebook for museum notes',
                    'Small bag for personal items',
                    'Interest in history and culture',
                    'Cash for museum entry and souvenirs',
                    'Reading glasses if needed'
                ],
                'image' => 'museum.jpg',
                'weather' => [
                    'temperature' => 22,
                    'description' => 'Mild indoor climate',
                    'humidity' => 60,
                    'wind_speed' => 0.5,
                    'icon' => '02d'
                ]
            ]
        ];

        return view('pages.historical-details', compact('experiences'));
    }
}
