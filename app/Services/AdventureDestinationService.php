<?php

namespace App\Services;

class AdventureDestinationService
{
    /**
     * Get all adventure destinations organized by category
     */
    public static function getAllDestinations()
    {
        return [
            'rafting' => [
                'title' => 'River Rafting Adventures',
                'description' => 'Experience thrilling white water rafting on Nepal\'s pristine rivers',
                'destinations' => [
                    [
                        'id' => 'seti-river',
                        'name' => 'Seti River Rafting',
                        'description' => 'Gentle rapids perfect for beginners and families. Enjoy scenic views of the Annapurna range.',
                        'duration' => '2 days',
                        'difficulty' => 'Easy',
                        'location' => 'Pokhara, Nepal',
                        'best_season' => 'October to May',
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
                        'pricing' => [
                            'low' => 8000,
                            'medium' => 12000,
                            'expensive' => 18000
                        ],
                        'image' => 'images/book.jpg',
                        'highlights' => ['Family-friendly', 'Scenic views', 'Beginner-friendly']
                    ],
                    [
                        'id' => 'kaligandaki-river',
                        'name' => 'Kali Gandaki River Rafting',
                        'description' => 'Challenging rapids with stunning mountain views. Perfect for adventure seekers.',
                        'duration' => '3 days',
                        'difficulty' => 'Moderate',
                        'location' => 'Mustang, Nepal',
                        'best_season' => 'October to April',
                        'itinerary' => [
                            'Day 1: Drive from Pokhara to starting point, camp setup',
                            'Day 2: Full day rafting on Kali Gandaki (6-7 hours)',
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
                        'pricing' => [
                            'low' => 12000,
                            'medium' => 18000,
                            'expensive' => 25000
                        ],
                        'image' => 'images/seti-rafting.jpg',
                        'highlights' => ['Challenging rapids', 'Mountain views', 'Adventure']
                    ],
                    [
                        'id' => 'trishuli-river',
                        'name' => 'Trishuli River Rafting',
                        'description' => 'Popular rafting destination with exciting rapids and beautiful landscapes.',
                        'duration' => '1 day',
                        'difficulty' => 'Easy to Moderate',
                        'location' => 'Chitwan, Nepal',
                        'best_season' => 'October to May',
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
                        'pricing' => [
                            'low' => 6000,
                            'medium' => 9000,
                            'expensive' => 14000
                        ],
                        'image' => 'images/rafting-kaligandaki.jpg',
                        'highlights' => ['Popular choice', 'One day trip', 'Exciting rapids']
                    ],
                    [
                        'id' => 'bhote-koshi-river',
                        'name' => 'Bhote Koshi River Rafting',
                        'description' => 'Extreme white water rafting with technical rapids. For experienced rafters only.',
                        'duration' => '2 days',
                        'difficulty' => 'Extreme',
                        'location' => 'Nepal-Tibet Border',
                        'best_season' => 'October to December, March to May',
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
                        'pricing' => [
                            'low' => 15000,
                            'medium' => 22000,
                            'expensive' => 30000
                        ],
                        'image' => 'images/bhoteykoshi.jpg',
                        'highlights' => ['Extreme adventure', 'Technical rapids', 'Experienced only']
                    ]
                ]
            ],
            'bungee' => [
                'title' => 'Bungee Jumping Adventures',
                'description' => 'Experience the ultimate adrenaline rush with bungee jumping in Nepal',
                'destinations' => [
                    [
                        'id' => 'bhote-koshi-bungee',
                        'name' => 'Bhote Koshi Bungee Jump',
                        'description' => '160m high bungee jump over the raging Bhote Koshi River. One of the highest in the world.',
                        'duration' => '1 day',
                        'difficulty' => 'Extreme',
                        'location' => 'Tatopani, Nepal',
                        'best_season' => 'October to April',
                        'itinerary' => [
                            'Morning: Pick up from Kathmandu (3 hours drive)',
                            'Arrival: Registration and safety briefing',
                            'Jump: 160m bungee jump over Bhote Koshi River',
                            'Afternoon: Certificate ceremony and return to Kathmandu'
                        ],
                        'things_to_carry' => [
                            'Comfortable clothing (no loose items)',
                            'Secure shoes (no flip-flops)',
                            'Camera (optional - video available)',
                            'Water bottle',
                            'Valid ID for registration',
                            'Personal medications',
                            'Change of clothes (optional)'
                        ],
                        'pricing' => [
                            'low' => 12000,
                            'medium' => 15000,
                            'expensive' => 20000
                        ],
                        'image' => 'images/bungee.jpg',
                        'highlights' => ['160m height', 'World record', 'Extreme thrill']
                    ],
                    [
                        'id' => 'kushma-bungee',
                        'name' => 'Kushma Bungee Jump',
                        'description' => '228m high bungee jump - the highest in Nepal. Not for the faint-hearted!',
                        'duration' => '1 day',
                        'difficulty' => 'Extreme',
                        'location' => 'Kushma, Nepal',
                        'best_season' => 'October to April',
                        'itinerary' => [
                            'Morning: Drive from Pokhara to Kushma (2 hours)',
                            'Arrival: Registration and safety briefing',
                            'Jump: 228m bungee jump - highest in Nepal',
                            'Afternoon: Celebration and return to Pokhara'
                        ],
                        'things_to_carry' => [
                            'Comfortable clothing (no loose items)',
                            'Secure shoes (no flip-flops)',
                            'Camera (optional - video available)',
                            'Water bottle',
                            'Valid ID for registration',
                            'Personal medications',
                            'Change of clothes (optional)'
                        ],
                        'pricing' => [
                            'low' => 15000,
                            'medium' => 20000,
                            'expensive' => 28000
                        ],
                        'image' => 'images/kushma-bunjee.jpg',
                        'highlights' => ['228m height', 'Highest in Nepal', 'Ultimate thrill']
                    ],
                    [
                        'id' => 'pokhara-bungee',
                        'name' => 'Pokhara Bungee Jump',
                        'description' => 'Scenic bungee jump with beautiful views of Phewa Lake and Annapurna range.',
                        'duration' => '1 day',
                        'difficulty' => 'Moderate',
                        'location' => 'Pokhara, Nepal',
                        'best_season' => 'Year Round',
                        'itinerary' => [
                            'Morning: Pick up from hotel in Pokhara',
                            'Arrival: Registration and safety briefing',
                            'Jump: Scenic bungee jump with lake views',
                            'Afternoon: Relax by Phewa Lake, return to hotel'
                        ],
                        'things_to_carry' => [
                            'Comfortable clothing (no loose items)',
                            'Secure shoes (no flip-flops)',
                            'Camera (optional - video available)',
                            'Water bottle',
                            'Valid ID for registration',
                            'Personal medications',
                            'Change of clothes (optional)'
                        ],
                        'pricing' => [
                            'low' => 10000,
                            'medium' => 13000,
                            'expensive' => 18000
                        ],
                        'image' => 'images/pokhara-bunjee.jpg',
                        'highlights' => ['Scenic views', 'Lake views', 'Moderate thrill']
                    ]
                ]
            ],
            'mountain-biking' => [
                'title' => 'Mountain Biking Adventures',
                'description' => 'Explore Nepal\'s diverse terrain on two wheels with our mountain biking tours',
                'destinations' => [
                    [
                        'id' => 'kathmandu-valley',
                        'name' => 'Kathmandu Valley Mountain Biking',
                        'description' => 'Explore ancient temples, traditional villages, and scenic landscapes around Kathmandu.',
                        'duration' => '1 day',
                        'difficulty' => 'Easy',
                        'location' => 'Kathmandu, Nepal',
                        'best_season' => 'Year Round',
                        'itinerary' => [
                            'Morning: Pick up from hotel, bike setup and briefing',
                            'Ride: Visit Swayambhunath, Boudhanath, and Pashupatinath',
                            'Afternoon: Explore Patan Durbar Square and local villages',
                            'Evening: Return to hotel'
                        ],
                        'things_to_carry' => [
                            'Comfortable cycling clothes',
                            'Helmet (provided)',
                            'Water bottle',
                            'Sunscreen and sunglasses',
                            'Camera for cultural sites',
                            'Small backpack',
                            'Cash for local purchases'
                        ],
                        'pricing' => [
                            'low' => 5000,
                            'medium' => 8000,
                            'expensive' => 12000
                        ],
                        'image' => 'images/mountainbiking.jpg',
                        'highlights' => ['Cultural sites', 'Easy trails', 'City exploration']
                    ],
                    [
                        'id' => 'pokhara-mountain-biking',
                        'name' => 'Pokhara Mountain Biking',
                        'description' => 'Ride through beautiful landscapes with stunning views of the Annapurna range.',
                        'duration' => '2 days',
                        'difficulty' => 'Moderate',
                        'location' => 'Pokhara, Nepal',
                        'best_season' => 'October to May',
                        'itinerary' => [
                            'Day 1: Ride around Phewa Lake, visit World Peace Pagoda',
                            'Day 2: Mountain biking to Sarangkot, scenic viewpoints'
                        ],
                        'things_to_carry' => [
                            'Comfortable cycling clothes',
                            'Helmet (provided)',
                            'Water bottle',
                            'Sunscreen and sunglasses',
                            'Camera for mountain views',
                            'Small backpack',
                            'Cash for local purchases'
                        ],
                        'pricing' => [
                            'low' => 8000,
                            'medium' => 12000,
                            'expensive' => 18000
                        ],
                        'image' => 'images/mountain-biking.jpg',
                        'highlights' => ['Mountain views', 'Lake Phewa', 'Moderate trails']
                    ],
                    [
                        'id' => 'mustang-mountain-biking',
                        'name' => 'Mustang Mountain Biking',
                        'description' => 'Challenging high-altitude biking through the ancient kingdom of Mustang.',
                        'duration' => '7 days',
                        'difficulty' => 'Hard',
                        'location' => 'Mustang, Nepal',
                        'best_season' => 'March to May, September to November',
                        'itinerary' => [
                            'Day 1-2: Drive to Jomsom, bike to Kagbeni',
                            'Day 3-4: Ride through Mustang Valley, visit ancient caves',
                            'Day 5-6: Explore Lo Manthang, ancient kingdom',
                            'Day 7: Return journey to Pokhara'
                        ],
                        'things_to_carry' => [
                            'Warm cycling clothes (high altitude)',
                            'Helmet (provided)',
                            'Water bottle',
                            'Sunscreen and sunglasses',
                            'Camera for ancient sites',
                            'Warm jacket',
                            'Personal medications'
                        ],
                        'pricing' => [
                            'low' => 25000,
                            'medium' => 35000,
                            'expensive' => 50000
                        ],
                        'image' => 'images/mustang.jpg',
                        'highlights' => ['High altitude', 'Ancient kingdom', 'Challenging']
                    ]
                ]
            ],
            'paragliding' => [
                'title' => 'Paragliding Adventures',
                'description' => 'Soar above Nepal\'s stunning landscapes with our paragliding experiences',
                'destinations' => [
                    [
                        'id' => 'pokhara-paragliding',
                        'name' => 'Pokhara Paragliding',
                        'description' => 'Tandem paragliding over Phewa Lake with breathtaking views of the Annapurna range.',
                        'duration' => '1 day',
                        'difficulty' => 'Easy',
                        'location' => 'Pokhara, Nepal',
                        'best_season' => 'October to May',
                        'itinerary' => [
                            'Morning: Pick up from hotel, drive to Sarangkot',
                            'Briefing: Safety instructions and equipment check',
                            'Flight: Tandem paragliding over Phewa Lake (30-45 minutes)',
                            'Afternoon: Landing by the lake, certificate, return to hotel'
                        ],
                        'things_to_carry' => [
                            'Comfortable clothing (no loose items)',
                            'Secure shoes (no flip-flops)',
                            'Camera (optional - video available)',
                            'Water bottle',
                            'Valid ID for registration',
                            'Personal medications',
                            'Change of clothes (optional)'
                        ],
                        'pricing' => [
                            'low' => 8000,
                            'medium' => 12000,
                            'expensive' => 18000
                        ],
                        'image' => 'images/paragliding.jpg',
                        'highlights' => ['Lake views', 'Tandem flight', 'Mountain backdrop']
                    ],
                    [
                        'id' => 'kathmandu-paragliding',
                        'name' => 'Kathmandu Paragliding',
                        'description' => 'Paragliding over the Kathmandu Valley with views of the city and surrounding hills.',
                        'duration' => '1 day',
                        'difficulty' => 'Easy',
                        'location' => 'Kathmandu, Nepal',
                        'best_season' => 'October to May',
                        'itinerary' => [
                            'Morning: Pick up from hotel, drive to takeoff point',
                            'Briefing: Safety instructions and equipment check',
                            'Flight: Paragliding over Kathmandu Valley (20-30 minutes)',
                            'Afternoon: Landing, certificate, return to hotel'
                        ],
                        'things_to_carry' => [
                            'Comfortable clothing (no loose items)',
                            'Secure shoes (no flip-flops)',
                            'Camera (optional - video available)',
                            'Water bottle',
                            'Valid ID for registration',
                            'Personal medications',
                            'Change of clothes (optional)'
                        ],
                        'pricing' => [
                            'low' => 7000,
                            'medium' => 10000,
                            'expensive' => 15000
                        ],
                        'image' => 'images/para.jpg',
                        'highlights' => ['City views', 'Valley landscape', 'Easy access']
                    ]
                ]
            ],
            'rock-climbing' => [
                'title' => 'Rock Climbing Adventures',
                'description' => 'Challenge yourself with rock climbing in Nepal\'s diverse climbing areas',
                'destinations' => [
                    [
                        'id' => 'nagarkot-rock-climbing',
                        'name' => 'Nagarkot Rock Climbing',
                        'description' => 'Rock climbing with panoramic views of the Himalayas. Perfect for beginners and intermediates.',
                        'duration' => '1 day',
                        'difficulty' => 'Moderate',
                        'location' => 'Nagarkot, Nepal',
                        'best_season' => 'October to May',
                        'itinerary' => [
                            'Morning: Drive from Kathmandu to Nagarkot (1.5 hours)',
                            'Arrival: Equipment setup and safety briefing',
                            'Climbing: Multiple routes with Himalayan views',
                            'Afternoon: Return to Kathmandu'
                        ],
                        'things_to_carry' => [
                            'Comfortable climbing clothes',
                            'Climbing shoes (provided)',
                            'Water bottle',
                            'Sunscreen and sunglasses',
                            'Camera for Himalayan views',
                            'Small backpack',
                            'Personal medications'
                        ],
                        'pricing' => [
                            'low' => 6000,
                            'medium' => 9000,
                            'expensive' => 14000
                        ],
                        'image' => 'images/nagarkot.jpg',
                        'highlights' => ['Himalayan views', 'Beginner-friendly', 'Scenic location']
                    ],
                    [
                        'id' => 'pokhara-rock-climbing',
                        'name' => 'Pokhara Rock Climbing',
                        'description' => 'Technical rock climbing with views of Phewa Lake and surrounding mountains.',
                        'duration' => '2 days',
                        'difficulty' => 'Hard',
                        'location' => 'Pokhara, Nepal',
                        'best_season' => 'October to May',
                        'itinerary' => [
                            'Day 1: Drive to Pokhara, equipment setup, basic routes',
                            'Day 2: Advanced technical climbing, lake views'
                        ],
                        'things_to_carry' => [
                            'Comfortable climbing clothes',
                            'Climbing shoes (provided)',
                            'Water bottle',
                            'Sunscreen and sunglasses',
                            'Camera for lake views',
                            'Small backpack',
                            'Personal medications'
                        ],
                        'pricing' => [
                            'low' => 10000,
                            'medium' => 15000,
                            'expensive' => 22000
                        ],
                        'image' => 'images/pkr rock-climbing.jpg',
                        'highlights' => ['Technical routes', 'Lake views', 'Challenging']
                    ]
                ]
            ],
            'trekking' => [
                'title' => 'Himalayan Trekking Adventures',
                'destinations' => [
                    [
                        'id' => 'everest-base-camp',
                        'name' => 'Everest Base Camp Trek',
                        'description' => 'The ultimate trekking adventure to the base of the world\'s highest mountain. Experience Sherpa culture and breathtaking mountain views.',
                        'duration' => '14 days',
                        'difficulty' => 'Hard',
                        'location' => 'Everest Base Camp, Nepal',
                        'best_season' => 'March to May, September to November',
                        'itinerary' => [
                            'Day 1-2: Fly to Lukla, trek to Namche Bazaar',
                            'Day 3-4: Acclimatization in Namche, visit local monastery',
                            'Day 5-7: Trek to Dingboche, acclimatization day',
                            'Day 8-10: Trek to Lobuche, Gorak Shep, Everest Base Camp',
                            'Day 11-14: Return trek via Pheriche, Namche, Lukla'
                        ],
                        'things_to_carry' => [
                            'Warm clothing (layers)',
                            'Down jacket and sleeping bag',
                            'Trekking boots and poles',
                            'Headlamp and extra batteries',
                            'Water purification tablets',
                            'First aid kit and medications',
                            'Camera and extra memory cards'
                        ],
                        'pricing' => [
                            'low' => 120000,
                            'medium' => 180000,
                            'expensive' => 250000
                        ],
                        'image' => 'images/everest.jpg',
                        'highlights' => ['World\'s highest peak', 'Sherpa culture', 'Alpine scenery']
                    ],
                    [
                        'id' => 'annapurna-circuit',
                        'name' => 'Annapurna Circuit Trek',
                        'description' => 'Diverse trekking experience through varied landscapes, from subtropical forests to high-altitude desert.',
                        'duration' => '12 days',
                        'difficulty' => 'Moderate to Hard',
                        'location' => 'Annapurna Region, Nepal',
                        'best_season' => 'March to May, September to November',
                        'itinerary' => [
                            'Day 1-3: Drive to Besisahar, trek to Chame',
                            'Day 4-6: Trek to Manang, acclimatization day',
                            'Day 7-8: Cross Thorong La Pass (5,416m)',
                            'Day 9-12: Trek to Muktinath, Jomsom, return to Pokhara'
                        ],
                        'things_to_carry' => [
                            'Warm clothing (layers)',
                            'Down jacket and sleeping bag',
                            'Trekking boots and poles',
                            'Headlamp and extra batteries',
                            'Water purification tablets',
                            'First aid kit and medications',
                            'Camera and extra memory cards'
                        ],
                        'pricing' => [
                            'low' => 80000,
                            'medium' => 120000,
                            'expensive' => 180000
                        ],
                        'image' => 'images/annapurnabasecamp.jpg',
                        'highlights' => ['Diverse landscapes', 'Thorong La Pass', 'Cultural villages']
                    ],
                    [
                        'id' => 'langtang-valley',
                        'name' => 'Langtang Valley Trek',
                        'description' => 'Beautiful valley trek with stunning mountain views and rich Tamang culture. Perfect for those seeking a shorter trek.',
                        'duration' => '8 days',
                        'difficulty' => 'Moderate',
                        'location' => 'Langtang Valley, Nepal',
                        'best_season' => 'March to May, September to November',
                        'itinerary' => [
                            'Day 1-2: Drive to Syabrubesi, trek to Lama Hotel',
                            'Day 3-4: Trek to Langtang Village, Kyanjin Gompa',
                            'Day 5-6: Explore Kyanjin Ri, Tserko Ri',
                            'Day 7-8: Return trek to Syabrubesi, drive to Kathmandu'
                        ],
                        'things_to_carry' => [
                            'Warm clothing (layers)',
                            'Down jacket and sleeping bag',
                            'Trekking boots and poles',
                            'Headlamp and extra batteries',
                            'Water purification tablets',
                            'First aid kit and medications',
                            'Camera and extra memory cards'
                        ],
                        'pricing' => [
                            'low' => 50000,
                            'medium' => 75000,
                            'expensive' => 110000
                        ],
                        'image' => 'images/treeking.jpg',
                        'highlights' => ['Tamang culture', 'Mountain views', 'Shorter duration']
                    ],
                    [
                        'id' => 'ghorepani-poon-hill',
                        'name' => 'Ghorepani Poon Hill Trek',
                        'description' => 'Classic short trek with spectacular sunrise views over the Annapurna and Dhaulagiri ranges.',
                        'duration' => '5 days',
                        'difficulty' => 'Easy to Moderate',
                        'location' => 'Annapurna Region, Nepal',
                        'best_season' => 'October to May',
                        'itinerary' => [
                            'Day 1: Drive to Nayapul, trek to Tikhedhunga',
                            'Day 2: Trek to Ghorepani via Ulleri',
                            'Day 3: Early morning Poon Hill sunrise, trek to Tadapani',
                            'Day 4: Trek to Ghandruk village',
                            'Day 5: Trek to Nayapul, drive to Pokhara'
                        ],
                        'things_to_carry' => [
                            'Warm clothing (layers)',
                            'Down jacket and sleeping bag',
                            'Trekking boots and poles',
                            'Headlamp and extra batteries',
                            'Water purification tablets',
                            'First aid kit and medications',
                            'Camera and extra memory cards'
                        ],
                        'pricing' => [
                            'low' => 25000,
                            'medium' => 35000,
                            'expensive' => 50000
                        ],
                        'image' => 'images/trekking.jpg',
                        'highlights' => ['Sunrise views', 'Short duration', 'Cultural villages']
                    ]
                ]
            ]
        ];
    }

    /**
     * Get destinations for a specific adventure category
     */
    public static function getDestinationsByCategory($category)
    {
        $allDestinations = self::getAllDestinations();
        return $allDestinations[$category] ?? null;
    }

    /**
     * Get a specific destination by category and ID
     */
    public static function getDestination($category, $destinationId)
    {
        $categoryData = self::getDestinationsByCategory($category);
        if (!$categoryData) {
            return null;
        }

        foreach ($categoryData['destinations'] as $destination) {
            if ($destination['id'] === $destinationId) {
                return $destination;
            }
        }

        return null;
    }

    /**
     * Get pricing tiers for a destination
     */
    public static function getPricingTiers($destination)
    {
        return [
            'low' => [
                'name' => 'Low Budget',
                'price' => $destination['pricing']['low'],
                'description' => 'Basic equipment and services',
                'color' => 'green'
            ],
            'medium' => [
                'name' => 'Medium Budget',
                'price' => $destination['pricing']['medium'],
                'description' => 'Comfortable equipment and services',
                'color' => 'blue'
            ],
            'expensive' => [
                'name' => 'Expensive',
                'price' => $destination['pricing']['expensive'],
                'description' => 'Premium equipment and luxury services',
                'color' => 'purple'
            ]
        ];
    }

    /**
     * Get suggested budget range based on average price
     */
    public static function getSuggestedBudgetRange($destination)
    {
        $prices = $destination['pricing'];
        $averagePrice = array_sum($prices) / count($prices);
        
        if ($averagePrice <= 10000) {
            return 'low';
        } elseif ($averagePrice <= 20000) {
            return 'medium';
        } else {
            return 'expensive';
        }
    }
}
