<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CultureController extends Controller
{
    public function index()
    {
        $experiences = [
            [
                'name' => 'Dashain Festival Experience',
                'location' => 'Kathmandu Valley, Nepal',
                'type' => 'Festival Celebration',
                'duration' => '3-5 days',
                'best_season' => 'September-October',
                'cost' => 'Rs 12,000 - Rs 25,000',
                'description' => 'Experience Nepal\'s biggest festival celebrating the victory of good over evil. Join local families in traditional celebrations, rituals, and festivities.',
                'highlights' => [
                    'Traditional Dashain rituals and ceremonies',
                    'Family gatherings and feasts',
                    'Kite flying competitions',
                    'Temple visits and prayers',
                    'Traditional music and dance'
                ],
                'itinerary' => [
                    'Day 1: Festival orientation and temple visits',
                    'Day 2: Join local family for Dashain celebrations',
                    'Day 3: Kite flying and traditional games',
                    'Day 4: Cultural performances and local cuisine',
                    'Day 5: Market visits and souvenir shopping'
                ],
                'things_to_carry' => [
                    'Respectful clothing for temple visits',
                    'Comfortable walking shoes',
                    'Camera for cultural documentation',
                    'Gifts for host families',
                    'Open mind and respectful attitude',
                    'Cash for offerings and purchases',
                    'Notebook for cultural learning'
                ],
                'image' => 'festival.jpg',
                'weather' => [
                    'temperature' => 24,
                    'description' => 'Pleasant and clear',
                    'humidity' => 65,
                    'wind_speed' => 3.5,
                    'icon' => '01d'
                ]
            ],
            [
                'name' => 'Traditional Art & Craft Workshop',
                'location' => 'Bhaktapur, Nepal',
                'type' => 'Handicraft Experience',
                'duration' => '2-3 days',
                'best_season' => 'Year round',
                'cost' => 'Rs 8,000 - Rs 18,000',
                'description' => 'Learn traditional Nepalese crafts including pottery, wood carving, and thangka painting from master artisans in the ancient city of Bhaktapur.',
                'highlights' => [
                    'Pottery making with traditional techniques',
                    'Wood carving workshops',
                    'Thangka painting lessons',
                    'Visit to ancient craft workshops',
                    'Interaction with master artisans'
                ],
                'itinerary' => [
                    'Day 1: Bhaktapur heritage tour and pottery workshop',
                    'Day 2: Wood carving and traditional painting classes',
                    'Day 3: Create your own masterpiece to take home'
                ],
                'things_to_carry' => [
                    'Comfortable clothes that can get dirty',
                    'Apron or old shirt',
                    'Camera for process documentation',
                    'Notebook for techniques',
                    'Cash for purchasing materials',
                    'Patience and creativity',
                    'Water bottle and snacks'
                ],
                'image' => 'art.jpg',
                'weather' => [
                    'temperature' => 22,
                    'description' => 'Mild and pleasant',
                    'humidity' => 60,
                    'wind_speed' => 2.5,
                    'icon' => '02d'
                ]
            ],
            [
                'name' => 'Traditional Cuisine Cooking Class',
                'location' => 'Kathmandu/Pokhara, Nepal',
                'type' => 'Culinary Experience',
                'duration' => '1-2 days',
                'best_season' => 'Year round',
                'cost' => 'Rs 5,000 - Rs 12,000',
                'description' => 'Learn to cook authentic Nepali dishes including dal bhat, momos, and traditional sweets with local families and professional chefs.',
                'highlights' => [
                    'Learn to make traditional dal bhat',
                    'Momo (dumpling) making workshop',
                    'Spice market tour and ingredient selection',
                    'Traditional cooking methods',
                    'Enjoy your homemade feast'
                ],
                'itinerary' => [
                    'Morning: Spice market tour and ingredient shopping',
                    'Midday: Cooking class with local family or chef',
                    'Afternoon: Prepare multiple traditional dishes',
                    'Evening: Enjoy feast with cultural stories'
                ],
                'things_to_carry' => [
                    'Apron or cooking clothes',
                    'Hair tie for cooking hygiene',
                    'Camera for recipe documentation',
                    'Notebook for recipes',
                    'Appetite for learning and eating',
                    'Cash for market purchases',
                    'Comfortable shoes for market walking'
                ],
                'image' => 'cuisine.jpg',
                'weather' => [
                    'temperature' => 25,
                    'description' => 'Warm and comfortable',
                    'humidity' => 70,
                    'wind_speed' => 2.0,
                    'icon' => '01d'
                ]
            ]
        ];

        return view('pages.culture-details', compact('experiences'));
    }
}

