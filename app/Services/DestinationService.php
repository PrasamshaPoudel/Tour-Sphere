<?php

namespace App\Services;

class DestinationService
{
    public static function getDestinationsData()
    {
        return [
            'culture' => [
                'title' => 'Cultural Experiences',
                'description' => 'Immerse yourself in Nepal\'s rich cultural heritage and traditions',
                'destinations' => [
                    [
                        'id' => 'kathmandu-durbar-square',
                        'name' => 'Kathmandu Durbar Square',
                        'location' => 'Kathmandu, Nepal',
                        'description' => 'Explore the ancient royal palace complex and witness traditional Newari architecture, temples, and cultural heritage sites.',
                        'duration' => '4-6 hours',
                        'difficulty' => 'Easy',
                        'best_season' => 'October to April',
                        'pricing' => [
                            'low' => 2500,
                            'medium' => 3500,
                            'expensive' => 5000
                        ],
                        'highlights' => [
                            'UNESCO World Heritage Site',
                            'Traditional Newari architecture',
                            'Living Goddess Kumari',
                            'Ancient temples and palaces',
                            'Cultural performances',
                            'Local handicraft markets'
                        ],
                        'itinerary' => [
                            'Morning: Hotel pickup and briefing',
                            'Visit: Kathmandu Durbar Square complex',
                            'Explore: Kumari Ghar (Living Goddess)',
                            'Discover: Ancient temples and palaces',
                            'Experience: Traditional cultural performances',
                            'Shopping: Local handicraft markets',
                            'Evening: Return to hotel'
                        ],
                        'things_to_carry' => [
                            'Comfortable walking shoes',
                            'Camera for photography',
                            'Sun hat and sunscreen',
                            'Water bottle',
                            'Valid ID for temple entry',
                            'Cash for local purchases',
                            'Respectful clothing for temples'
                        ],
                        'image' => 'images/bhaktapur.jpg'
                    ],
                    [
                        'id' => 'bhaktapur-city',
                        'name' => 'Bhaktapur City Tour',
                        'location' => 'Bhaktapur, Nepal',
                        'description' => 'Step back in time to explore the medieval city of Bhaktapur with its well-preserved architecture and traditional lifestyle.',
                        'duration' => '6-8 hours',
                        'difficulty' => 'Easy',
                        'best_season' => 'October to April',
                        'pricing' => [
                            'low' => 3000,
                            'medium' => 4500,
                            'expensive' => 6500
                        ],
                        'highlights' => [
                            'Medieval city architecture',
                            'Pottery Square demonstrations',
                            'Traditional Newari cuisine',
                            'Wood carving workshops',
                            'Ancient temples and courtyards',
                            'Local artisan interactions'
                        ],
                        'itinerary' => [
                            'Morning: Departure from Kathmandu',
                            'Arrival: Bhaktapur Durbar Square',
                            'Explore: Ancient temples and palaces',
                            'Visit: Pottery Square for demonstrations',
                            'Lunch: Traditional Newari cuisine',
                            'Discover: Wood carving workshops',
                            'Shopping: Local handicrafts',
                            'Evening: Return to Kathmandu'
                        ],
                        'things_to_carry' => [
                            'Comfortable walking shoes',
                            'Camera for photography',
                            'Sun hat and sunscreen',
                            'Water bottle',
                            'Valid ID for city entry',
                            'Cash for local purchases',
                            'Appetite for local cuisine'
                        ],
                        'image' => 'images/tour.jpg'
                    ],
                    [
                        'id' => 'patan-city',
                        'name' => 'Patan City Heritage',
                        'location' => 'Patan, Nepal',
                        'description' => 'Discover the artistic heritage of Patan with its magnificent temples, courtyards, and traditional metalwork.',
                        'duration' => '5-7 hours',
                        'difficulty' => 'Easy',
                        'best_season' => 'October to April',
                        'pricing' => [
                            'low' => 2800,
                            'medium' => 4000,
                            'expensive' => 5800
                        ],
                        'highlights' => [
                            'Patan Durbar Square',
                            'Golden Temple (Hiranya Varna)',
                            'Metalwork demonstrations',
                            'Traditional courtyards',
                            'Buddhist monasteries',
                            'Artisan workshops'
                        ],
                        'itinerary' => [
                            'Morning: Hotel pickup',
                            'Arrival: Patan Durbar Square',
                            'Explore: Ancient temples and palaces',
                            'Visit: Golden Temple complex',
                            'Discover: Metalwork workshops',
                            'Lunch: Local Newari cuisine',
                            'Explore: Traditional courtyards',
                            'Evening: Return to hotel'
                        ],
                        'things_to_carry' => [
                            'Comfortable walking shoes',
                            'Camera for photography',
                            'Sun hat and sunscreen',
                            'Water bottle',
                            'Valid ID for temple entry',
                            'Cash for local purchases',
                            'Interest in traditional arts'
                        ],
                        'image' => 'images/ktm-tour.jpg'
                    ]
                ]
            ],
            'nature' => [
                'title' => 'Nature & Wildlife',
                'description' => 'Discover Nepal\'s diverse natural landscapes and wildlife sanctuaries',
                'destinations' => [
                    [
                        'id' => 'chitwan-national-park',
                        'name' => 'Chitwan National Park',
                        'location' => 'Chitwan, Nepal',
                        'description' => 'Experience the wilderness of Chitwan National Park with jungle safaris, wildlife spotting, and nature walks.',
                        'duration' => '2-3 days',
                        'difficulty' => 'Moderate',
                        'best_season' => 'October to March',
                        'pricing' => [
                            'low' => 8000,
                            'medium' => 12000,
                            'expensive' => 18000
                        ],
                        'highlights' => [
                            'Jungle safari on elephant back',
                            'Rhino and tiger spotting',
                            'Bird watching opportunities',
                            'Canoe ride on Rapti River',
                            'Tharu cultural village tour',
                            'Nature walks with expert guides'
                        ],
                        'itinerary' => [
                            'Day 1: Arrival and orientation',
                            'Afternoon: Jungle safari on elephant back',
                            'Evening: Tharu cultural program',
                            'Day 2: Early morning bird watching',
                            'Morning: Canoe ride on Rapti River',
                            'Afternoon: Nature walk with guide',
                            'Evening: Wildlife documentary screening',
                            'Day 3: Final safari and departure'
                        ],
                        'things_to_carry' => [
                            'Neutral colored clothing',
                            'Binoculars for wildlife spotting',
                            'Camera with zoom lens',
                            'Insect repellent',
                            'Comfortable walking shoes',
                            'Sun hat and sunscreen',
                            'Water bottle'
                        ],
                        'image' => 'images/chitwan.jpg'
                    ],
                    [
                        'id' => 'bardia-national-park',
                        'name' => 'Bardia National Park',
                        'location' => 'Bardia, Nepal',
                        'description' => 'Explore the remote wilderness of Bardia National Park, home to Bengal tigers and diverse wildlife.',
                        'duration' => '3-4 days',
                        'difficulty' => 'Moderate',
                        'best_season' => 'October to March',
                        'pricing' => [
                            'low' => 10000,
                            'medium' => 15000,
                            'expensive' => 22000
                        ],
                        'highlights' => [
                            'Tiger spotting opportunities',
                            'Elephant safari experiences',
                            'Bird watching paradise',
                            'Jungle walks with experts',
                            'River activities',
                            'Remote wilderness experience'
                        ],
                        'itinerary' => [
                            'Day 1: Arrival and park orientation',
                            'Afternoon: Jungle walk introduction',
                            'Evening: Wildlife briefing',
                            'Day 2: Early morning elephant safari',
                            'Morning: Bird watching session',
                            'Afternoon: River activities',
                            'Evening: Campfire and stories',
                            'Day 3: Full day jungle exploration',
                            'Day 4: Final safari and departure'
                        ],
                        'things_to_carry' => [
                            'Neutral colored clothing',
                            'Binoculars for wildlife spotting',
                            'Camera with zoom lens',
                            'Insect repellent',
                            'Comfortable walking shoes',
                            'Sun hat and sunscreen',
                            'Water bottle'
                        ],
                        'image' => 'images/bardiya.jpg'
                    ],
                    [
                        'id' => 'pokhara-lakes',
                        'name' => 'Pokhara Lakes & Nature',
                        'location' => 'Pokhara, Nepal',
                        'description' => 'Enjoy the serene beauty of Pokhara\'s lakes, mountains, and natural landscapes.',
                        'duration' => '1-2 days',
                        'difficulty' => 'Easy',
                        'best_season' => 'Year Round',
                        'pricing' => [
                            'low' => 4000,
                            'medium' => 6000,
                            'expensive' => 9000
                        ],
                        'highlights' => [
                            'Phewa Lake boating',
                            'Mountain views',
                            'Peace Pagoda visit',
                            'Cave exploration',
                            'Waterfall visits',
                            'Sunrise from Sarangkot'
                        ],
                        'itinerary' => [
                            'Morning: Sunrise from Sarangkot',
                            'Breakfast: Lakeside restaurant',
                            'Morning: Phewa Lake boating',
                            'Visit: Peace Pagoda',
                            'Lunch: Local cuisine',
                            'Afternoon: Cave exploration',
                            'Visit: Waterfalls',
                            'Evening: Lakeside relaxation'
                        ],
                        'things_to_carry' => [
                            'Comfortable walking shoes',
                            'Camera for photography',
                            'Sun hat and sunscreen',
                            'Water bottle',
                            'Light jacket for morning',
                            'Swimming attire (optional)',
                            'Binoculars for mountain views'
                        ],
                        'image' => 'images/pokhara.jpg'
                    ]
                ]
            ],
            'spiritual' => [
                'title' => 'Spiritual Journeys',
                'description' => 'Embark on transformative spiritual experiences in Nepal\'s sacred sites',
                'destinations' => [
                    [
                        'id' => 'lumbini-birthplace',
                        'name' => 'Lumbini - Birthplace of Buddha',
                        'location' => 'Lumbini, Nepal',
                        'description' => 'Visit the sacred birthplace of Lord Buddha and explore the peaceful monasteries and meditation centers.',
                        'duration' => '1-2 days',
                        'difficulty' => 'Easy',
                        'best_season' => 'October to April',
                        'pricing' => [
                            'low' => 5000,
                            'medium' => 7500,
                            'expensive' => 11000
                        ],
                        'highlights' => [
                            'Maya Devi Temple',
                            'Sacred Garden complex',
                            'International monasteries',
                            'Meditation sessions',
                            'Buddhist teachings',
                            'Peaceful atmosphere'
                        ],
                        'itinerary' => [
                            'Morning: Arrival in Lumbini',
                            'Visit: Maya Devi Temple',
                            'Explore: Sacred Garden complex',
                            'Lunch: Vegetarian meal',
                            'Afternoon: International monasteries tour',
                            'Meditation: Guided session',
                            'Evening: Peaceful reflection',
                            'Overnight: Monastery stay (optional)'
                        ],
                        'things_to_carry' => [
                            'Modest, respectful clothing',
                            'Camera for photography',
                            'Meditation cushion (optional)',
                            'Water bottle',
                            'Valid ID for temple entry',
                            'Cash for donations',
                            'Open mind and heart'
                        ],
                        'image' => 'images/lumbini.jpg'
                    ],
                    [
                        'id' => 'swayambhunath-stupa',
                        'name' => 'Swayambhunath Stupa',
                        'location' => 'Kathmandu, Nepal',
                        'description' => 'Climb the ancient steps to the Monkey Temple and experience the spiritual energy of this sacred Buddhist site.',
                        'duration' => '3-4 hours',
                        'difficulty' => 'Moderate',
                        'best_season' => 'Year Round',
                        'pricing' => [
                            'low' => 2000,
                            'medium' => 3000,
                            'expensive' => 4500
                        ],
                        'highlights' => [
                            'Ancient Buddhist stupa',
                            'Monkey temple experience',
                            'Panoramic city views',
                            'Prayer wheel spinning',
                            'Monastery visits',
                            'Spiritual ceremonies'
                        ],
                        'itinerary' => [
                            'Morning: Hotel pickup',
                            'Climb: Ancient stone steps',
                            'Explore: Main stupa complex',
                            'Visit: Surrounding monasteries',
                            'Experience: Prayer wheel spinning',
                            'Lunch: Vegetarian meal',
                            'Afternoon: Meditation session',
                            'Evening: Return to hotel'
                        ],
                        'things_to_carry' => [
                            'Comfortable walking shoes',
                            'Modest clothing',
                            'Camera for photography',
                            'Water bottle',
                            'Cash for donations',
                            'Respectful attitude',
                            'Prayer flags (optional)'
                        ],
                        'image' => 'images/hya.jpg'
                    ],
                    [
                        'id' => 'pashupatinath-temple',
                        'name' => 'Pashupatinath Temple',
                        'location' => 'Kathmandu, Nepal',
                        'description' => 'Visit the most sacred Hindu temple in Nepal and witness traditional cremation ceremonies along the Bagmati River.',
                        'duration' => '2-3 hours',
                        'difficulty' => 'Easy',
                        'best_season' => 'Year Round',
                        'pricing' => [
                            'low' => 1500,
                            'medium' => 2500,
                            'expensive' => 3500
                        ],
                        'highlights' => [
                            'Sacred Hindu temple',
                            'Bagmati River ceremonies',
                            'Sadhu interactions',
                            'Traditional architecture',
                            'Spiritual atmosphere',
                            'Cultural insights'
                        ],
                        'itinerary' => [
                            'Morning: Hotel pickup',
                            'Arrival: Pashupatinath complex',
                            'Explore: Main temple area',
                            'Observe: River ceremonies',
                            'Interact: With sadhus',
                            'Lunch: Vegetarian meal',
                            'Afternoon: Temple complex tour',
                            'Evening: Return to hotel'
                        ],
                        'things_to_carry' => [
                            'Modest, respectful clothing',
                            'Camera for photography',
                            'Water bottle',
                            'Cash for donations',
                            'Valid ID for temple entry',
                            'Respectful attitude',
                            'Head covering (optional)'
                        ],
                        'image' => 'images/kathmandu.jpg'
                    ]
                ]
            ],
            'historical' => [
                'title' => 'Historical Sites',
                'description' => 'Explore Nepal\'s rich historical heritage and ancient monuments',
                'destinations' => [
                    [
                        'id' => 'changunarayan-temple',
                        'name' => 'Changu Narayan Temple',
                        'location' => 'Bhaktapur, Nepal',
                        'description' => 'Visit the oldest Hindu temple in Nepal, dating back to the 4th century, with exquisite stone carvings and architecture.',
                        'duration' => '3-4 hours',
                        'difficulty' => 'Easy',
                        'best_season' => 'October to April',
                        'pricing' => [
                            'low' => 2000,
                            'medium' => 3000,
                            'expensive' => 4500
                        ],
                        'highlights' => [
                            'Oldest Hindu temple in Nepal',
                            'Ancient stone carvings',
                            'UNESCO World Heritage Site',
                            'Panoramic valley views',
                            'Traditional architecture',
                            'Historical significance'
                        ],
                        'itinerary' => [
                            'Morning: Hotel pickup',
                            'Drive: To Changu Narayan',
                            'Explore: Temple complex',
                            'Discover: Ancient carvings',
                            'Lunch: Local cuisine',
                            'Afternoon: Valley views',
                            'Visit: Museum (if open)',
                            'Evening: Return to hotel'
                        ],
                        'things_to_carry' => [
                            'Comfortable walking shoes',
                            'Camera for photography',
                            'Sun hat and sunscreen',
                            'Water bottle',
                            'Valid ID for temple entry',
                            'Cash for donations',
                            'Respectful clothing'
                        ],
                        'image' => 'images/changu.jpg'
                    ],
                    [
                        'id' => 'gorkha-palace',
                        'name' => 'Gorkha Palace',
                        'location' => 'Gorkha, Nepal',
                        'description' => 'Explore the historic Gorkha Palace, birthplace of King Prithvi Narayan Shah and the unification of Nepal.',
                        'duration' => '4-5 hours',
                        'difficulty' => 'Moderate',
                        'best_season' => 'October to April',
                        'pricing' => [
                            'low' => 3500,
                            'medium' => 5000,
                            'expensive' => 7500
                        ],
                        'highlights' => [
                            'Birthplace of King Prithvi Narayan Shah',
                            'Historic palace complex',
                            'Panoramic mountain views',
                            'Museum exhibits',
                            'Historical significance',
                            'Cultural heritage'
                        ],
                        'itinerary' => [
                            'Morning: Departure from Kathmandu',
                            'Drive: To Gorkha (3 hours)',
                            'Arrival: Palace complex',
                            'Explore: Historic buildings',
                            'Lunch: Local cuisine',
                            'Afternoon: Museum visit',
                            'Views: Mountain panoramas',
                            'Evening: Return to Kathmandu'
                        ],
                        'things_to_carry' => [
                            'Comfortable walking shoes',
                            'Camera for photography',
                            'Sun hat and sunscreen',
                            'Water bottle',
                            'Valid ID for entry',
                            'Cash for local purchases',
                            'Light jacket for elevation'
                        ],
                        'image' => 'images/gorkha.jpg'
                    ],
                    [
                        'id' => 'janakpur-temple',
                        'name' => 'Janakpur Temple Complex',
                        'location' => 'Janakpur, Nepal',
                        'description' => 'Visit the sacred Janaki Temple and explore the historic city associated with the epic Ramayana.',
                        'duration' => '1-2 days',
                        'difficulty' => 'Easy',
                        'best_season' => 'October to April',
                        'pricing' => [
                            'low' => 4000,
                            'medium' => 6000,
                            'expensive' => 9000
                        ],
                        'highlights' => [
                            'Sacred Janaki Temple',
                            'Ramayana connections',
                            'Traditional Mithila art',
                            'Cultural performances',
                            'Historic significance',
                            'Religious festivals'
                        ],
                        'itinerary' => [
                            'Day 1: Arrival in Janakpur',
                            'Visit: Janaki Temple complex',
                            'Explore: Historic sites',
                            'Lunch: Local cuisine',
                            'Afternoon: Mithila art workshops',
                            'Evening: Cultural performances',
                            'Day 2: Temple ceremonies',
                            'Departure: Return to Kathmandu'
                        ],
                        'things_to_carry' => [
                            'Modest, respectful clothing',
                            'Camera for photography',
                            'Water bottle',
                            'Cash for donations',
                            'Valid ID for temple entry',
                            'Respectful attitude',
                            'Interest in mythology'
                        ],
                        'image' => 'images/janakpur.jpg'
                    ]
                ]
            ]
        ];
    }

    public static function getDestinationsByCategory($category)
    {
        $data = self::getDestinationsData();
        return $data[$category] ?? ['title' => '', 'description' => '', 'destinations' => []];
    }

    public static function getDestination($category, $id)
    {
        $categoryData = self::getDestinationsByCategory($category);
        $destinations = $categoryData['destinations'] ?? [];
        
        foreach ($destinations as $destination) {
            if ($destination['id'] === $id) {
                return $destination;
            }
        }
        
        return null;
    }

    public static function getPricingTiers($destination)
    {
        if (!$destination || !isset($destination['pricing'])) {
            return [
                'low' => [
                    'name' => 'Low Budget',
                    'price' => 0,
                    'description' => 'Basic services and accommodation',
                    'color' => 'green'
                ],
                'medium' => [
                    'name' => 'Medium Budget',
                    'price' => 0,
                    'description' => 'Comfortable services and accommodation',
                    'color' => 'blue'
                ],
                'expensive' => [
                    'name' => 'Premium',
                    'price' => 0,
                    'description' => 'Luxury services and premium accommodation',
                    'color' => 'purple'
                ]
            ];
        }

        return [
            'low' => [
                'name' => 'Low Budget',
                'price' => $destination['pricing']['low'],
                'description' => 'Basic services and accommodation',
                'color' => 'green'
            ],
            'medium' => [
                'name' => 'Medium Budget',
                'price' => $destination['pricing']['medium'],
                'description' => 'Comfortable services and accommodation',
                'color' => 'blue'
            ],
            'expensive' => [
                'name' => 'Premium',
                'price' => $destination['pricing']['expensive'],
                'description' => 'Luxury services and premium accommodation',
                'color' => 'purple'
            ]
        ];
    }

    public static function getSuggestedBudgetRange($destination)
    {
        if (!$destination || !isset($destination['pricing'])) {
            return 'medium';
        }

        $mediumPrice = $destination['pricing']['medium'];
        
        if ($mediumPrice < 3000) {
            return 'low';
        } elseif ($mediumPrice < 8000) {
            return 'medium';
        } else {
            return 'expensive';
        }
    }
}
