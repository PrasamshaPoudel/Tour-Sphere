<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpiritualController extends Controller
{
    public function index()
    {
        $experiences = [
            [
                'name' => 'Pashupatinath Temple Spiritual Tour',
                'location' => 'Kathmandu, Nepal',
                'type' => 'Sacred Temple',
                'duration' => '1-2 days',
                'best_season' => 'Year round',
                'cost' => 'Rs 3,000 - Rs 8,000',
                'description' => 'Visit Nepal\'s most sacred Hindu temple dedicated to Lord Shiva. Witness ancient rituals, cremation ceremonies, and experience deep spiritual energy.',
                'highlights' => [
                    'UNESCO World Heritage Site',
                    'Ancient Hindu temple architecture',
                    'Sacred Bagmati River ceremonies',
                    'Traditional cremation rituals',
                    'Spiritual meditation areas'
                ],
                'itinerary' => [
                    'Morning: Temple visit and prayer ceremonies',
                    'Midday: Learn about Hindu traditions and customs',
                    'Afternoon: Meditation by the sacred river',
                    'Evening: Aarti (prayer) ceremony participation'
                ],
                'things_to_carry' => [
                    'Modest, respectful clothing',
                    'Scarf or shawl for temple entry',
                    'Comfortable walking shoes (removable)',
                    'Small offerings (flowers, incense)',
                    'Water bottle',
                    'Respectful attitude and open mind',
                    'Cash for donations and offerings'
                ],
                'image' => 'temple.jpg',
                'weather' => [
                    'temperature' => 23,
                    'description' => 'Pleasant',
                    'humidity' => 65,
                    'wind_speed' => 2.5,
                    'icon' => '02d'
                ]
            ],
            [
                'name' => 'Buddhist Monastery Retreat',
                'location' => 'Boudhanath, Kathmandu',
                'type' => 'Meditation Retreat',
                'duration' => '3-7 days',
                'best_season' => 'Year round',
                'cost' => 'Rs 15,000 - Rs 35,000',
                'description' => 'Experience authentic Buddhist teachings and meditation practices in one of the largest Buddhist stupas in the world. Learn from experienced monks.',
                'highlights' => [
                    'Stay in traditional monastery',
                    'Daily meditation sessions',
                    'Buddhist philosophy teachings',
                    'Prayer wheel circumambulation',
                    'Authentic vegetarian meals'
                ],
                'itinerary' => [
                    'Day 1: Arrival and orientation to monastery life',
                    'Day 2-5: Daily meditation, teachings, and practices',
                    'Day 6: Advanced teachings and personal reflection',
                    'Day 7: Closing ceremony and departure preparation'
                ],
                'things_to_carry' => [
                    'Simple, modest clothing',
                    'Meditation cushion (if preferred)',
                    'Notebook for teachings',
                    'Comfortable loose clothing',
                    'Personal hygiene items',
                    'Open mind for spiritual learning',
                    'Minimal electronics (silent mode)'
                ],
                'image' => 'monasteries.jpg',
                'weather' => [
                    'temperature' => 21,
                    'description' => 'Calm and clear',
                    'humidity' => 60,
                    'wind_speed' => 1.5,
                    'icon' => '01d'
                ]
            ],
            [
                'name' => 'Lumbini Sacred Garden Pilgrimage',
                'location' => 'Lumbini, Nepal',
                'type' => 'Pilgrimage Site',
                'duration' => '2-3 days',
                'best_season' => 'October-March',
                'cost' => 'Rs 12,000 - Rs 25,000',
                'description' => 'Visit the birthplace of Lord Buddha, a UNESCO World Heritage Site. Experience peace and tranquility in the sacred gardens where Buddhism began.',
                'highlights' => [
                    'Maya Devi Temple - Buddha\'s birthplace',
                    'Sacred Bodhi Tree and pond',
                    'International monasteries from various countries',
                    'Meditation in Buddha\'s birthplace',
                    'Archaeological discoveries'
                ],
                'itinerary' => [
                    'Day 1: Travel to Lumbini, visit Maya Devi Temple',
                    'Day 2: Explore international monasteries and meditation',
                    'Day 3: Final prayers and return journey'
                ],
                'things_to_carry' => [
                    'White or light-colored clothing',
                    'Comfortable walking shoes',
                    'Sun hat and sunscreen',
                    'Water bottle and light snacks',
                    'Camera for sacred sites',
                    'Meditation accessories',
                    'Respectful and peaceful mindset'
                ],
                'image' => 'lumbini.jpg',
                'weather' => [
                    'temperature' => 26,
                    'description' => 'Warm and peaceful',
                    'humidity' => 70,
                    'wind_speed' => 2.0,
                    'icon' => '01d'
                ]
            ]
        ];

        return view('pages.spiritual-details', compact('experiences'));
    }
}

