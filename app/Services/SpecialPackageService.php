<?php

namespace App\Services;

class SpecialPackageService
{
    public static function getPackagesData()
    {
        return [
            'honeymoon' => [
                'title' => 'Honeymoon Packages',
                'description' => 'Romantic getaways with candlelight dinners and luxury accommodations',
                'icon' => '💕',
                'color' => 'pink',
                'destinations' => [
                    [
                        'id' => 'pokhara-honeymoon',
                        'name' => 'Pokhara Honeymoon',
                        'location' => 'Pokhara',
                        'description' => 'Romantic lakeside retreat with mountain views, candlelight dinners, and luxury spa treatments.',
                        'duration' => '5 days / 4 nights',
                        'difficulty' => 'Easy',
                        'best_season' => 'October - April',
                        'pricing' => [
                            'low' => 25000,
                            'medium' => 35000,
                            'expensive' => 50000
                        ],
                        'highlights' => [
                            'Lakeside luxury resort accommodation',
                            'Private boat ride on Phewa Lake',
                            'Couple spa treatments',
                            'Sunrise view from Sarangkot',
                            'Romantic candlelight dinner',
                            'Private guided city tour'
                        ],
                        'itinerary' => [
                            'Day 1: Arrival in Pokhara, check-in to luxury resort, lakeside dinner',
                            'Day 2: Sunrise at Sarangkot, breakfast, couple spa treatment, lakeside walk',
                            'Day 3: Private boat ride on Phewa Lake, visit Peace Pagoda, romantic dinner',
                            'Day 4: Guided city tour, shopping, couple massage, sunset dinner',
                            'Day 5: Breakfast, check-out, departure'
                        ],
                        'things_to_carry' => [
                            'Comfortable walking shoes',
                            'Light jacket for evenings',
                            'Camera for romantic photos',
                            'Sunscreen and hat',
                            'Formal wear for dinners',
                            'Personal toiletries'
                        ],
                        'image' => 'images/pokhara-romantic.jpg'
                    ],
                    [
                        'id' => 'kathmandu-honeymoon',
                        'name' => 'Kathmandu Honeymoon',
                        'location' => 'Kathmandu',
                        'description' => 'Cultural honeymoon experience with heritage sites, fine dining, and luxury accommodations.',
                        'duration' => '4 days / 3 nights',
                        'difficulty' => 'Easy',
                        'best_season' => 'October - April',
                        'pricing' => [
                            'low' => 20000,
                            'medium' => 30000,
                            'expensive' => 45000
                        ],
                        'highlights' => [
                            'Luxury heritage hotel accommodation',
                            'Private guided heritage tour',
                            'Fine dining experiences',
                            'Couple spa treatments',
                            'Cultural performances',
                            'Shopping in Thamel'
                        ],
                        'itinerary' => [
                            'Day 1: Arrival in Kathmandu, check-in to luxury hotel, welcome dinner',
                            'Day 2: Private heritage tour (Durbar Square, Swayambhunath), couple spa',
                            'Day 3: Visit Pashupatinath, Boudhanath, cultural dinner show',
                            'Day 4: Shopping in Thamel, farewell lunch, departure'
                        ],
                        'things_to_carry' => [
                            'Comfortable walking shoes',
                            'Modest clothing for temples',
                            'Camera for memories',
                            'Light jacket',
                            'Formal wear for dinners',
                            'Personal items'
                        ],
                        'image' => 'images/kathmandu-romance.jpg'
                    ],
                    [
                        'id' => 'chitwan-honeymoon',
                        'name' => 'Chitwan Honeymoon',
                        'location' => 'Chitwan',
                        'description' => 'Wildlife honeymoon adventure with jungle safaris, luxury tented camps, and romantic experiences.',
                        'duration' => '6 days / 5 nights',
                        'difficulty' => 'Easy',
                        'best_season' => 'October - March',
                        'pricing' => [
                            'low' => 30000,
                            'medium' => 45000,
                            'expensive' => 65000
                        ],
                        'highlights' => [
                            'Luxury tented camp accommodation',
                            'Private jungle safari',
                            'Elephant back safari',
                            'Canoe ride on Rapti River',
                            'Bird watching tour',
                            'Romantic bush dinner'
                        ],
                        'itinerary' => [
                            'Day 1: Arrival in Chitwan, check-in to luxury camp, welcome dinner',
                            'Day 2: Morning jungle walk, elephant back safari, cultural show',
                            'Day 3: Canoe ride, bird watching, private jeep safari',
                            'Day 4: Full day jungle activities, romantic bush dinner',
                            'Day 5: Morning safari, relaxation, farewell dinner',
                            'Day 6: Breakfast, departure'
                        ],
                        'things_to_carry' => [
                            'Neutral colored clothing',
                            'Comfortable walking shoes',
                            'Binoculars for wildlife viewing',
                            'Camera with zoom lens',
                            'Light jacket for evenings',
                            'Insect repellent'
                        ],
                        'image' => 'images/candlelight-dinner.jpg'
                    ]
                ]
            ],
            'family' => [
                'title' => 'Family Packages',
                'description' => 'Fun activities for all ages with safe and educational experiences',
                'icon' => '👨‍👩‍👧‍👦',
                'color' => 'blue',
                'destinations' => [
                    [
                        'id' => 'pokhara-family',
                        'name' => 'Pokhara Family Adventure',
                        'location' => 'Pokhara',
                        'description' => 'Family-friendly adventure with safe activities, educational experiences, and fun for all ages.',
                        'duration' => '5 days / 4 nights',
                        'difficulty' => 'Easy',
                        'best_season' => 'October - April',
                        'pricing' => [
                            'low' => 15000,
                            'medium' => 25000,
                            'expensive' => 35000
                        ],
                        'highlights' => [
                            'Family-friendly resort accommodation',
                            'Boat ride on Phewa Lake',
                            'Guided city tour',
                            'Children\'s activities',
                            'Mountain view from Sarangkot',
                            'Local cultural experiences'
                        ],
                        'itinerary' => [
                            'Day 1: Arrival in Pokhara, check-in, family dinner',
                            'Day 2: Boat ride on Phewa Lake, visit Peace Pagoda, children\'s activities',
                            'Day 3: Guided city tour, shopping, family games',
                            'Day 4: Sarangkot sunrise, Davis Falls, family lunch',
                            'Day 5: Breakfast, departure'
                        ],
                        'things_to_carry' => [
                            'Comfortable walking shoes for all',
                            'Light jackets',
                            'Cameras',
                            'Sunscreen and hats',
                            'Children\'s entertainment',
                            'Snacks and water'
                        ],
                        'image' => 'images/pokhara-family.jpg'
                    ],
                    [
                        'id' => 'kathmandu-family',
                        'name' => 'Kathmandu Family Tour',
                        'location' => 'Kathmandu',
                        'description' => 'Educational family tour with cultural sites, interactive experiences, and safe activities.',
                        'duration' => '4 days / 3 nights',
                        'difficulty' => 'Easy',
                        'best_season' => 'October - April',
                        'pricing' => [
                            'low' => 12000,
                            'medium' => 20000,
                            'expensive' => 28000
                        ],
                        'highlights' => [
                            'Family-friendly hotel accommodation',
                            'Educational heritage tours',
                            'Interactive cultural experiences',
                            'Children\'s museum visit',
                            'Safe city exploration',
                            'Family dining experiences'
                        ],
                        'itinerary' => [
                            'Day 1: Arrival in Kathmandu, check-in, family dinner',
                            'Day 2: Heritage tour (Durbar Square, Swayambhunath), children\'s activities',
                            'Day 3: Visit Boudhanath, Pashupatinath, family lunch',
                            'Day 4: Shopping, farewell lunch, departure'
                        ],
                        'things_to_carry' => [
                            'Comfortable shoes for all',
                            'Modest clothing for temples',
                            'Cameras',
                            'Children\'s entertainment',
                            'Light jackets',
                            'Snacks and water'
                        ],
                        'image' => 'images/kathmandu-family.jpg'
                    ],
                    [
                        'id' => 'chitwan-family',
                        'name' => 'Chitwan Family Safari',
                        'location' => 'Chitwan',
                        'description' => 'Wildlife family adventure with safe safari experiences and educational activities.',
                        'duration' => '5 days / 4 nights',
                        'difficulty' => 'Easy',
                        'best_season' => 'October - March',
                        'pricing' => [
                            'low' => 18000,
                            'medium' => 28000,
                            'expensive' => 40000
                        ],
                        'highlights' => [
                            'Family-friendly resort accommodation',
                            'Safe jungle safari',
                            'Elephant back safari',
                            'Educational wildlife tour',
                            'Children\'s activities',
                            'Cultural performances'
                        ],
                        'itinerary' => [
                            'Day 1: Arrival in Chitwan, check-in, welcome dinner',
                            'Day 2: Morning jungle walk, elephant back safari, cultural show',
                            'Day 3: Canoe ride, bird watching, children\'s activities',
                            'Day 4: Jeep safari, educational tour, family dinner',
                            'Day 5: Breakfast, departure'
                        ],
                        'things_to_carry' => [
                            'Neutral colored clothing',
                            'Comfortable walking shoes',
                            'Binoculars',
                            'Cameras',
                            'Children\'s entertainment',
                            'Insect repellent'
                        ],
                        'image' => 'images/chitwan-family.jpg'
                    ]
                ]
            ],
            'romantic' => [
                'title' => 'Romantic Packages',
                'description' => 'Intimate experiences and candlelight dinners for couples',
                'icon' => '💕',
                'color' => 'purple',
                'destinations' => [
                    [
                        'id' => 'pokhara-romantic',
                        'name' => 'Pokhara Romantic Escape',
                        'location' => 'Pokhara',
                        'description' => 'Intimate romantic getaway with private experiences, candlelight dinners, and luxury accommodations.',
                        'duration' => '4 days / 3 nights',
                        'difficulty' => 'Easy',
                        'best_season' => 'October - April',
                        'pricing' => [
                            'low' => 22000,
                            'medium' => 32000,
                            'expensive' => 45000
                        ],
                        'highlights' => [
                            'Private luxury accommodation',
                            'Candlelight dinner by the lake',
                            'Private boat ride',
                            'Couple spa treatments',
                            'Sunrise view from Sarangkot',
                            'Romantic city tour'
                        ],
                        'itinerary' => [
                            'Day 1: Arrival in Pokhara, check-in, romantic dinner',
                            'Day 2: Private boat ride, couple spa, candlelight dinner',
                            'Day 3: Sunrise at Sarangkot, romantic city tour, private dinner',
                            'Day 4: Breakfast, departure'
                        ],
                        'things_to_carry' => [
                            'Comfortable walking shoes',
                            'Light jacket for evenings',
                            'Camera for romantic photos',
                            'Formal wear for dinners',
                            'Sunscreen and hat',
                            'Personal toiletries'
                        ],
                        'image' => 'images/candlelight-dinner.jpg'
                    ],
                    [
                        'id' => 'kathmandu-romantic',
                        'name' => 'Kathmandu Romantic Tour',
                        'location' => 'Kathmandu',
                        'description' => 'Cultural romantic experience with heritage sites, fine dining, and intimate moments.',
                        'duration' => '3 days / 2 nights',
                        'difficulty' => 'Easy',
                        'best_season' => 'October - April',
                        'pricing' => [
                            'low' => 18000,
                            'medium' => 28000,
                            'expensive' => 40000
                        ],
                        'highlights' => [
                            'Luxury heritage hotel',
                            'Private heritage tour',
                            'Fine dining experiences',
                            'Couple spa treatments',
                            'Cultural performances',
                            'Romantic city walks'
                        ],
                        'itinerary' => [
                            'Day 1: Arrival in Kathmandu, check-in, romantic dinner',
                            'Day 2: Private heritage tour, couple spa, cultural dinner show',
                            'Day 3: Romantic city walk, farewell lunch, departure'
                        ],
                        'things_to_carry' => [
                            'Comfortable walking shoes',
                            'Modest clothing for temples',
                            'Camera for memories',
                            'Formal wear for dinners',
                            'Light jacket',
                            'Personal items'
                        ],
                        'image' => 'images/heritage-romance.jpg'
                    ]
                ]
            ],
            'luxury' => [
                'title' => 'Luxury Packages',
                'description' => '5-star accommodations with exclusive access and private services',
                'icon' => '👑',
                'color' => 'yellow',
                'destinations' => [
                    [
                        'id' => 'pokhara-luxury',
                        'name' => 'Pokhara Luxury Retreat',
                        'location' => 'Pokhara',
                        'description' => 'Ultimate luxury experience with 5-star accommodations, private services, and exclusive access.',
                        'duration' => '6 days / 5 nights',
                        'difficulty' => 'Easy',
                        'best_season' => 'October - April',
                        'pricing' => [
                            'low' => 50000,
                            'medium' => 75000,
                            'expensive' => 100000
                        ],
                        'highlights' => [
                            '5-star luxury resort accommodation',
                            'Private helicopter tour',
                            'Exclusive dining experiences',
                            'Personal butler service',
                            'Luxury spa treatments',
                            'Private guided tours'
                        ],
                        'itinerary' => [
                            'Day 1: Arrival in Pokhara, private transfer, luxury check-in, welcome dinner',
                            'Day 2: Private helicopter tour, luxury spa, exclusive dining',
                            'Day 3: Private guided city tour, luxury shopping, private dinner',
                            'Day 4: Private boat experience, luxury spa, fine dining',
                            'Day 5: Private mountain tour, luxury activities, farewell dinner',
                            'Day 6: Private breakfast, departure'
                        ],
                        'things_to_carry' => [
                            'Formal wear for fine dining',
                            'Comfortable luxury shoes',
                            'High-end camera',
                            'Luxury accessories',
                            'Personal items',
                            'Travel documents'
                        ],
                        'image' => 'images/mountain-honeymoon.jpg'
                    ],
                    [
                        'id' => 'kathmandu-luxury',
                        'name' => 'Kathmandu Luxury Experience',
                        'location' => 'Kathmandu',
                        'description' => 'Premium luxury experience with exclusive heritage access and 5-star services.',
                        'duration' => '5 days / 4 nights',
                        'difficulty' => 'Easy',
                        'best_season' => 'October - April',
                        'pricing' => [
                            'low' => 45000,
                            'medium' => 70000,
                            'expensive' => 95000
                        ],
                        'highlights' => [
                            '5-star luxury hotel accommodation',
                            'Exclusive heritage access',
                            'Private guided tours',
                            'Fine dining experiences',
                            'Luxury spa treatments',
                            'Personal concierge service'
                        ],
                        'itinerary' => [
                            'Day 1: Arrival in Kathmandu, private transfer, luxury check-in, welcome dinner',
                            'Day 2: Exclusive heritage tour, luxury spa, fine dining',
                            'Day 3: Private cultural experiences, luxury shopping, exclusive dinner',
                            'Day 4: Private city tour, luxury activities, farewell dinner',
                            'Day 5: Private breakfast, departure'
                        ],
                        'things_to_carry' => [
                            'Formal wear for fine dining',
                            'Luxury shoes',
                            'High-end camera',
                            'Luxury accessories',
                            'Personal items',
                            'Travel documents'
                        ],
                        'image' => 'images/luxury-himalayan.jpg'
                    ],
                    [
                        'id' => 'chitwan-luxury',
                        'name' => 'Chitwan Luxury Safari',
                        'location' => 'Chitwan',
                        'description' => 'Ultimate luxury wildlife experience with exclusive safari access and premium services.',
                        'duration' => '7 days / 6 nights',
                        'difficulty' => 'Easy',
                        'best_season' => 'October - March',
                        'pricing' => [
                            'low' => 60000,
                            'medium' => 90000,
                            'expensive' => 120000
                        ],
                        'highlights' => [
                            'Luxury tented camp accommodation',
                            'Exclusive safari access',
                            'Private wildlife guide',
                            'Luxury dining experiences',
                            'Premium spa treatments',
                            'Personal butler service'
                        ],
                        'itinerary' => [
                            'Day 1: Arrival in Chitwan, private transfer, luxury check-in, welcome dinner',
                            'Day 2: Exclusive morning safari, luxury spa, fine dining',
                            'Day 3: Private wildlife tour, luxury activities, exclusive dinner',
                            'Day 4: Private canoe experience, luxury spa, fine dining',
                            'Day 5: Exclusive safari, luxury activities, private dinner',
                            'Day 6: Private wildlife experience, luxury spa, farewell dinner',
                            'Day 7: Private breakfast, departure'
                        ],
                        'things_to_carry' => [
                            'Neutral colored luxury clothing',
                            'Luxury walking shoes',
                            'High-end binoculars',
                            'Professional camera',
                            'Luxury accessories',
                            'Personal items'
                        ],
                        'image' => 'images/luxury-safari.jpg'
                    ]
                ]
            ]
        ];
    }

    public static function getPackagesByCategory($category)
    {
        $data = self::getPackagesData();
        return $data[$category] ?? null;
    }

    public static function getPackage($category, $id)
    {
        $packages = self::getPackagesByCategory($category);
        if (!$packages) {
            return null;
        }

        foreach ($packages['destinations'] as $destination) {
            if ($destination['id'] === $id) {
                return $destination;
            }
        }

        return null;
    }

    public static function getPricingTiers($destination)
    {
        if (!isset($destination['pricing'])) {
            return [
                ['name' => 'Low', 'description' => 'Basic package', 'color' => 'green', 'multiplier' => 1.0],
                ['name' => 'Medium', 'description' => 'Standard package', 'color' => 'blue', 'multiplier' => 1.5],
                ['name' => 'Expensive', 'description' => 'Premium package', 'color' => 'purple', 'multiplier' => 2.0]
            ];
        }

        return [
            [
                'name' => 'Low',
                'description' => 'Basic package with essential services',
                'color' => 'green',
                'price' => $destination['pricing']['low']
            ],
            [
                'name' => 'Medium',
                'description' => 'Standard package with enhanced services',
                'color' => 'blue',
                'price' => $destination['pricing']['medium']
            ],
            [
                'name' => 'Expensive',
                'description' => 'Premium package with luxury services',
                'color' => 'purple',
                'price' => $destination['pricing']['expensive']
            ]
        ];
    }

    public static function getSuggestedBudgetRange($destination)
    {
        if (!isset($destination['pricing'])) {
            return 'Medium';
        }

        $mediumPrice = $destination['pricing']['medium'];
        
        if ($mediumPrice < 20000) {
            return 'Low';
        } elseif ($mediumPrice < 50000) {
            return 'Medium';
        } else {
            return 'Expensive';
        }
    }
}
