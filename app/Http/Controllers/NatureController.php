<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NatureController extends Controller
{
    public function index()
    {
        $experiences = [
            [
                'name' => 'Rara Lake',
                'location' => 'Mugu, Nepal',
                'type' => 'Pristine Lake',
                'duration' => '4-6 days',
                'best_season' => 'April-May, September-November',
                'cost' => 'Rs 45,000 - Rs 75,000',
                'description' => 'Nepal\'s largest lake surrounded by pristine forests and snow-capped peaks. A hidden gem offering tranquility and untouched natural beauty.',
                'highlights' => [
                    'Largest lake in Nepal (10.8 sq km)',
                    'Crystal clear blue waters',
                    'Rara National Park wildlife',
                    'Stunning Himalayan reflections',
                    'Peaceful and less crowded'
                ],
                'itinerary' => [
                    'Day 1: Fly Kathmandu to Nepalgunj, then to Talcha Airport',
                    'Day 2: Trek to Rara Lake, explore surroundings',
                    'Day 3: Full day at Rara Lake, photography and relaxation',
                    'Day 4: Return trek and fly back to Kathmandu'
                ],
                'things_to_carry' => [
                    'Warm clothing for high altitude',
                    'Comfortable trekking shoes',
                    'Camera for stunning landscapes',
                    'Water bottles and snacks',
                    'Sunscreen and sunglasses',
                    'Personal medicines',
                    'Light camping gear'
                ],
                'image' => 'rara.jpg',
                'weather' => [
                    'temperature' => 15,
                    'description' => 'Clear and crisp',
                    'humidity' => 50,
                    'wind_speed' => 3.0,
                    'icon' => '01d'
                ]
            ],
            [
                'name' => 'Everest Region Trekking',
                'location' => 'Solukhumbu, Nepal',
                'type' => 'Himalayan Views',
                'duration' => '12-16 days',
                'best_season' => 'March-May, September-November',
                'cost' => 'Rs 85,000 - Rs 180,000',
                'description' => 'Experience the world\'s highest peaks up close. Walk in the shadows of Everest, Lhotse, and Ama Dablam while experiencing Sherpa culture.',
                'highlights' => [
                    'Close-up views of Mount Everest',
                    'Sherpa villages and monasteries',
                    'Suspension bridges and glacial valleys',
                    'Namche Bazaar mountain market',
                    'Tengboche Monastery visits'
                ],
                'itinerary' => [
                    'Day 1-3: Fly to Lukla, trek to Namche Bazaar',
                    'Day 4-6: Explore Namche, visit Everest View Hotel',
                    'Day 7-10: Trek to Tengboche, Dingboche regions',
                    'Day 11-14: Advanced viewpoints and return trek',
                    'Day 15-16: Return to Lukla and fly to Kathmandu'
                ],
                'things_to_carry' => [
                    'High altitude trekking gear',
                    'Down jacket and warm layers',
                    'Sturdy trekking boots',
                    'Sleeping bag (-15°C rated)',
                    'Trekking poles',
                    'High SPF sunscreen',
                    'Altitude sickness medication',
                    'Water purification tablets'
                ],
                'image' => 'himalayan.jpg',
                'weather' => [
                    'temperature' => -2,
                    'description' => 'Sunny but cold',
                    'humidity' => 40,
                    'wind_speed' => 12.0,
                    'icon' => '01d'
                ]
            ],
            [
                'name' => 'Chitwan Jungle Safari',
                'location' => 'Chitwan, Nepal',
                'type' => 'Forest Adventure',
                'duration' => '2-4 days',
                'best_season' => 'October-March',
                'cost' => 'Rs 15,000 - Rs 35,000',
                'description' => 'Explore Nepal\'s first national park, home to rhinos, tigers, elephants, and over 500 bird species in lush subtropical forests.',
                'highlights' => [
                    'One-horned rhinoceros sightings',
                    'Bengal tiger tracking',
                    'Elephant safari and bathing',
                    'Tharu cultural performances',
                    'Canoe rides on Rapti River'
                ],
                'itinerary' => [
                    'Day 1: Drive to Chitwan, jungle walk and cultural show',
                    'Day 2: Elephant safari, rhino and bird watching',
                    'Day 3: Canoe ride, elephant bathing, nature walks',
                    'Day 4: Final safari activities and return journey'
                ],
                'things_to_carry' => [
                    'Light, neutral-colored clothing',
                    'Comfortable walking shoes',
                    'Hat and sunglasses',
                    'Insect repellent',
                    'Binoculars for wildlife',
                    'Camera with zoom lens',
                    'Water bottles',
                    'Personal medication'
                ],
                'image' => 'forest.jpg',
                'weather' => [
                    'temperature' => 28,
                    'description' => 'Warm and humid',
                    'humidity' => 75,
                    'wind_speed' => 2.0,
                    'icon' => '02d'
                ]
            ]
        ];

        return view('pages.nature-details', compact('experiences'));
    }
}

