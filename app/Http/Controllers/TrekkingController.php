<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrekkingController extends Controller
{
    public function index()
    {
        $treks = [
            [
                'name' => 'Everest Base Camp Trek',
                'location' => 'Solukhumbu, Nepal',
                'difficulty' => 'Strenuous',
                'duration' => '14-16 days',
                'best_season' => 'March-May, September-November',
                'cost' => 'Rs 85,000 - Rs 150,000',
                'description' => 'The ultimate trekking adventure to the base of the world\'s highest peak. Experience Sherpa culture, stunning mountain views, and the achievement of a lifetime.',
                'highlights' => [
                    'Reach Everest Base Camp at 5,364m',
                    'Stunning views of Everest, Lhotse, Nuptse',
                    'Visit famous Tengboche Monastery',
                    'Experience authentic Sherpa culture',
                    'Cross suspension bridges over deep gorges'
                ],
                'itinerary' => [
                    'Day 1-2: Fly to Lukla, trek to Namche Bazaar',
                    'Day 3-4: Acclimatization in Namche, visit Everest View Hotel',
                    'Day 5-7: Trek to Tengboche, Dingboche via Pangboche',
                    'Day 8-9: Acclimatization day in Dingboche',
                    'Day 10-12: Trek to Lobuche, Gorak Shep, Everest Base Camp',
                    'Day 13-16: Return trek to Lukla via Pheriche, Namche'
                ],
                'things_to_carry' => [
                    'Down jacket and sleeping bag (-15°C rated)',
                    'Trekking boots and gaiters',
                    'Layers of thermal clothing',
                    'Sunglasses and sunscreen (high SPF)',
                    'Trekking poles',
                    'Water purification tablets',
                    'First aid kit and altitude sickness medication',
                    'Headlamp with extra batteries'
                ],
                'image' => 'everest.jpg',
                'weather' => [
                    'temperature' => -5,
                    'description' => 'Clear and cold',
                    'humidity' => 45,
                    'wind_speed' => 15.0,
                    'icon' => '01d'
                ]
            ],
            [
                'name' => 'Annapurna Base Camp Trek',
                'location' => 'Annapurna Region, Nepal',
                'difficulty' => 'Moderate',
                'duration' => '10-12 days',
                'best_season' => 'March-May, September-November',
                'cost' => 'Rs 45,000 - Rs 85,000',
                'description' => 'Trek into the heart of the Annapurna Sanctuary, surrounded by towering peaks. Perfect balance of culture, nature, and mountain views.',
                'highlights' => [
                    'Reach Annapurna Base Camp at 4,130m',
                    '360-degree mountain amphitheater views',
                    'Natural hot springs at Jhinu Danda',
                    'Diverse landscapes from subtropical to alpine',
                    'Gurung and Magar cultural villages'
                ],
                'itinerary' => [
                    'Day 1-2: Drive to Pokhara, trek to Ghorepani',
                    'Day 3-4: Poon Hill sunrise, trek to Tadapani',
                    'Day 5-6: Trek through Chomrong to Bamboo',
                    'Day 7-8: Trek to Deurali, reach Annapurna Base Camp',
                    'Day 9-10: Return via Bamboo to Jhinu hot springs',
                    'Day 11-12: Trek to Nayapul, drive back to Pokhara'
                ],
                'things_to_carry' => [
                    'Warm sleeping bag and jacket',
                    'Waterproof trekking gear',
                    'Comfortable trekking boots',
                    'Layers for varying temperatures',
                    'Rain gear and poncho',
                    'Water bottles and snacks',
                    'Camera for stunning landscapes',
                    'Personal medicines'
                ],
                'image' => 'annapurnabasecamp.jpg',
                'weather' => [
                    'temperature' => 8,
                    'description' => 'Partly cloudy',
                    'humidity' => 65,
                    'wind_speed' => 8.0,
                    'icon' => '02d'
                ]
            ],
            [
                'name' => 'Mardi Himal Trek',
                'location' => 'Annapurna Region, Nepal',
                'difficulty' => 'Moderate',
                'duration' => '7-9 days',
                'best_season' => 'March-May, September-November',
                'cost' => 'Rs 35,000 - Rs 65,000',
                'description' => 'A relatively new and less crowded trekking route offering spectacular views of Annapurna South, Hiunchuli, and Mardi Himal. Perfect for those seeking pristine trails.',
                'highlights' => [
                    'Close-up views of Mardi Himal (5,587m)',
                    'Less crowded alternative to ABC',
                    'Pristine rhododendron forests',
                    'Spectacular sunrise views from High Camp',
                    'Traditional Gurung villages and culture'
                ],
                'itinerary' => [
                    'Day 1: Drive to Kande, trek to Australian Camp',
                    'Day 2-3: Trek to Pothana, then to Forest Camp',
                    'Day 4-5: Trek to Low Camp, then High Camp',
                    'Day 6: Early morning Mardi Himal Base Camp visit',
                    'Day 7-9: Return trek via Siding village to Pokhara'
                ],
                'things_to_carry' => [
                    'Warm layers for high altitude',
                    'Good quality trekking boots',
                    'Rain jacket and pants',
                    'Sleeping bag (teahouses provide bedding)',
                    'Trekking poles for steep sections',
                    'Headlamp and extra batteries',
                    'Water purification tablets',
                    'Camera for mountain photography'
                ],
                'image' => 'trekking.jpg',
                'weather' => [
                    'temperature' => 10,
                    'description' => 'Clear mountain air',
                    'humidity' => 60,
                    'wind_speed' => 6.0,
                    'icon' => '01d'
                ]
            ],
            [
                'name' => 'Langtang Valley Trek',
                'location' => 'Langtang Region, Nepal',
                'difficulty' => 'Moderate',
                'duration' => '7-9 days',
                'best_season' => 'March-May, September-November',
                'cost' => 'Rs 35,000 - Rs 65,000',
                'description' => 'Trek through the beautiful Langtang Valley, known as the "Valley of Glaciers." Perfect for those seeking fewer crowds but stunning mountain scenery.',
                'highlights' => [
                    'Close-up views of Langtang Lirung (7,227m)',
                    'Visit traditional Tamang villages',
                    'Explore Kyanjin Gompa monastery',
                    'Optional climb to Tserko Ri (5,000m)',
                    'Rich biodiversity in Langtang National Park'
                ],
                'itinerary' => [
                    'Day 1: Drive from Kathmandu to Syabrubesi',
                    'Day 2-3: Trek to Lama Hotel, then Langtang village',
                    'Day 4-5: Trek to Kyanjin Gompa, acclimatization day',
                    'Day 6: Optional Tserko Ri climb or explore glaciers',
                    'Day 7-9: Return trek to Syabrubesi, drive to Kathmandu'
                ],
                'things_to_carry' => [
                    'Warm clothing for high altitude',
                    'Sturdy trekking boots',
                    'Sleeping bag (provided by teahouses)',
                    'Water purification methods',
                    'Snacks and energy bars',
                    'Camera for mountain photography',
                    'Personal hygiene items',
                    'Cash for teahouses and tips'
                ],
                'image' => 'trekking.jpg',
                'weather' => [
                    'temperature' => 12,
                    'description' => 'Sunny',
                    'humidity' => 55,
                    'wind_speed' => 5.0,
                    'icon' => '01d'
                ]
            ],
            [
                'name' => 'Gokyo Lakes Trek',
                'location' => 'Everest Region, Nepal',
                'difficulty' => 'Strenuous',
                'duration' => '12-14 days',
                'best_season' => 'March-May, September-November',
                'cost' => 'Rs 75,000 - Rs 135,000',
                'description' => 'Explore the stunning turquoise lakes of Gokyo valley with spectacular views of Everest, Cho Oyu, and other peaks from Gokyo Ri.',
                'highlights' => [
                    'Climb Gokyo Ri (5,357m) for panoramic views',
                    'Visit the sacred Gokyo Lakes',
                    'Views of four 8000m peaks',
                    'Cross Ngozumpa Glacier',
                    'Alternative route to Everest region'
                ],
                'itinerary' => [
                    'Day 1-3: Fly to Lukla, trek to Namche Bazaar',
                    'Day 4-6: Trek to Dole, then Machhermo',
                    'Day 7-9: Reach Gokyo, climb Gokyo Ri',
                    'Day 10-11: Explore lakes and optional Cho La Pass',
                    'Day 12-14: Return trek to Lukla'
                ],
                'things_to_carry' => [
                    'High altitude gear and clothing',
                    'Crampons for glacier crossing',
                    'UV protection sunglasses',
                    'High SPF sunscreen',
                    'Altitude sickness medication',
                    'Extra batteries for cold weather',
                    'Thermal layers and down jacket',
                    'Emergency shelter/bivy'
                ],
                'image' => 'everest.jpg',
                'weather' => [
                    'temperature' => -8,
                    'description' => 'Cold and clear',
                    'humidity' => 40,
                    'wind_speed' => 18.0,
                    'icon' => '01d'
                ]
            ],
            [
                'name' => 'Manaslu Circuit Trek',
                'location' => 'Manaslu Region, Nepal',
                'difficulty' => 'Strenuous',
                'duration' => '14-16 days',
                'best_season' => 'March-May, September-November',
                'cost' => 'Rs 65,000 - Rs 120,000',
                'description' => 'Circuit around the eighth highest mountain in the world. A challenging trek through remote valleys with Tibetan Buddhist culture.',
                'highlights' => [
                    'Views of Manaslu (8,163m)',
                    'Cross Larkya La Pass (5,106m)',
                    'Tibetan Buddhist monasteries',
                    'Remote and less crowded trails',
                    'Diverse landscapes and cultures'
                ],
                'itinerary' => [
                    'Day 1-3: Drive to Soti Khola, trek to Machha Khola',
                    'Day 4-7: Trek through Jagat to Samagaon',
                    'Day 8-10: Acclimatization and exploration',
                    'Day 11-13: Cross Larkya La Pass to Bimthang',
                    'Day 14-16: Trek to Dharapani, drive to Kathmandu'
                ],
                'things_to_carry' => [
                    'Four-season sleeping bag',
                    'Mountaineering boots and crampons',
                    'High altitude medications',
                    'Restricted area permits',
                    'Extra food supplies',
                    'Satellite communication device',
                    'Professional trekking guide mandatory',
                    'Comprehensive insurance'
                ],
                'image' => 'mountaineering.jpg',
                'weather' => [
                    'temperature' => 2,
                    'description' => 'Variable mountain weather',
                    'humidity' => 50,
                    'wind_speed' => 12.0,
                    'icon' => '03d'
                ]
            ]
        ];

        return view('pages.trekking', compact('treks'));
    }
}