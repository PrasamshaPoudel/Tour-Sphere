<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParaglidingController extends Controller
{
    public function index()
    {
        $locations = [
            [
                'name' => 'Pokhara Paragliding',
                'location' => 'Pokhara, Nepal',
                'difficulty' => 'Beginner to Advanced',
                'duration' => '30 minutes - 2 hours',
                'best_season' => 'October to April',
                'cost' => 'Rs 8,000 - Rs 15,000',
                'description' => 'Soar above the beautiful Pokhara valley with stunning views of the Annapurna range, Phewa Lake, and the surrounding hills. Perfect for beginners and experienced pilots alike.',
                'highlights' => [
                    'Panoramic views of Annapurna mountain range',
                    'Bird\'s eye view of Phewa Lake',
                    'Professional tandem flights available',
                    'Photo and video service included',
                    'International certified instructors'
                ],
                'itinerary' => [
                    'Morning: Pick up from hotel, drive to Sarangkot (30 minutes)',
                    'Pre-flight: Safety briefing and equipment check (15 minutes)', 
                    'Flight: Paragliding experience with instructor (30-60 minutes)',
                    'Landing: Safe landing at Phewa Lake side',
                    'Return: Transport back to hotel with photos/videos'
                ],
                'things_to_carry' => [
                    'Comfortable clothing (avoid loose items)',
                    'Closed-toe shoes (sneakers recommended)',
                    'Sunglasses with strap',
                    'Small backpack',
                    'Camera (GoPro style recommended)',
                    'Light jacket (can get windy)',
                    'Cash for tips and extras'
                ],
                'image' => 'para.jpg',
                'weather' => [
                    'temperature' => 24,
                    'description' => 'Clear skies',
                    'humidity' => 60,
                    'wind_speed' => 2.5,
                    'icon' => '01d'
                ]
            ],
            [
                'name' => 'Bandipur Paragliding',
                'location' => 'Bandipur, Nepal',
                'difficulty' => 'Intermediate to Advanced',
                'duration' => '45 minutes - 1.5 hours',
                'best_season' => 'October to March',
                'cost' => 'Rs 10,000 - Rs 18,000',
                'description' => 'Experience paragliding from the historic hill town of Bandipur with spectacular mountain views and traditional Newari architecture below.',
                'highlights' => [
                    'Historic Newari town views',
                    'Himalayan mountain panorama',
                    'Thermal flying conditions',
                    'Cultural heritage exploration',
                    'Less crowded than Pokhara'
                ],
                'itinerary' => [
                    'Morning: Drive to Bandipur from Kathmandu/Pokhara',
                    'Arrival: Check equipment and weather conditions',
                    'Launch: Take off from designated hill station',
                    'Flight: Extended flying time over valleys',
                    'Cultural: Optional Bandipur heritage walk'
                ],
                'things_to_carry' => [
                    'Warm layers (higher altitude)',
                    'Sturdy hiking boots',
                    'Wind-resistant jacket',
                    'Water bottle',
                    'Energy snacks',
                    'Personal medication',
                    'Overnight bag (if staying)'
                ],
                'image' => 'paragliding.jpg',
                'weather' => [
                    'temperature' => 20,
                    'description' => 'Partly cloudy',
                    'humidity' => 65,
                    'wind_speed' => 3.0,
                    'icon' => '02d'
                ]
            ],
            [
                'name' => 'Sarangkot Paragliding',
                'location' => 'Sarangkot, Pokhara',
                'difficulty' => 'Beginner Friendly',
                'duration' => '20-45 minutes',
                'best_season' => 'September to May',
                'cost' => 'Rs 6,000 - Rs 12,000',
                'description' => 'The most popular paragliding spot in Nepal with consistent thermals and stunning views of the Annapurna range and Phewa Lake below.',
                'highlights' => [
                    'Consistent flying conditions',
                    'Perfect for first-time flyers',
                    'Spectacular lake and mountain views',
                    'Easy access from Pokhara city',
                    'Professional photo/video service'
                ],
                'itinerary' => [
                    'Morning: Hotel pickup and drive to Sarangkot (45 minutes)',
                    'Pre-flight: Equipment check and safety briefing (20 minutes)',
                    'Flight: Tandem paragliding experience (20-45 minutes)',
                    'Landing: Soft landing near Phewa Lake',
                    'Return: Transport back to hotel with memories'
                ],
                'things_to_carry' => [
                    'Comfortable sports clothing',
                    'Closed shoes (no sandals)',
                    'Sunglasses with strap',
                    'Light jacket for wind',
                    'Camera or GoPro',
                    'Small bag for personal items',
                    'Positive attitude and excitement!'
                ],
                'image' => 'paragliding.jpg',
                'weather' => [
                    'temperature' => 26,
                    'description' => 'Perfect flying weather',
                    'humidity' => 55,
                    'wind_speed' => 2.8,
                    'icon' => '01d'
                ]
            ],
            [
                'name' => 'Nagarkot Paragliding',
                'location' => 'Nagarkot, Nepal',
                'difficulty' => 'Intermediate',
                'duration' => '30-60 minutes',
                'best_season' => 'October to April',
                'cost' => 'Rs 12,000 - Rs 20,000',
                'description' => 'Fly from the famous hill station of Nagarkot with panoramic views of the Himalayas including Everest on clear days.',
                'highlights' => [
                    'Himalayan range panoramic views',
                    'Possible Everest sightings on clear days',
                    'Historic hill station launch point',
                    'Longer flight duration',
                    'Kathmandu valley bird\'s eye view'
                ],
                'itinerary' => [
                    'Early morning: Drive from Kathmandu to Nagarkot (1.5 hours)',
                    'Preparation: Weather assessment and equipment setup',
                    'Flight: Extended paragliding with mountain views',
                    'Exploration: Optional Nagarkot sunrise viewpoint visit',
                    'Return: Drive back to Kathmandu with lunch stop'
                ],
                'things_to_carry' => [
                    'Warm layers (higher altitude)',
                    'Windproof jacket',
                    'Sturdy hiking boots',
                    'Binoculars for mountain viewing',
                    'Camera with extra batteries',
                    'Water and light snacks',
                    'Overnight bag if staying in Nagarkot'
                ],
                'image' => 'para.jpg',
                'weather' => [
                    'temperature' => 18,
                    'description' => 'Cool and clear',
                    'humidity' => 45,
                    'wind_speed' => 4.0,
                    'icon' => '01d'
                ]
            ]
        ];

        return view('pages.paragliding', compact('locations'));
    }
}
