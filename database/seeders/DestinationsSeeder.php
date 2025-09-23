<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationsSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing destinations to avoid duplicates
        DB::table('destinations')->truncate();
        
        DB::table('destinations')->insert([
            // Adventure Tours
            [
                'name' => 'Everest Base Camp Trek',
                'description' => 'Trek to the base of the world\'s highest peak with stunning mountain views.',
                'price' => 80000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Annapurna Circuit Trek',
                'description' => 'Classic trek around the Annapurna massif with diverse landscapes.',
                'price' => 60000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pokhara Paragliding',
                'description' => 'Soar over Pokhara valley with breathtaking mountain views.',
                'price' => 10000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Trishuli River Rafting',
                'description' => 'Exciting white water rafting on the Trishuli River.',
                'price' => 4000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bungee Jumping',
                'description' => 'Thrilling bungee jump from 160m high suspension bridge.',
                'price' => 8000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Cultural Tours
            [
                'name' => 'Kathmandu Durbar Square',
                'description' => 'Explore ancient royal palaces and temples in the heart of Kathmandu.',
                'price' => 1500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bhaktapur Heritage Tour',
                'description' => 'Discover the medieval city of Bhaktapur with its rich culture.',
                'price' => 2500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Patan Museum Tour',
                'description' => 'Visit the ancient city of Patan and its magnificent temples.',
                'price' => 2000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Spiritual Tours
            [
                'name' => 'Lumbini Pilgrimage',
                'description' => 'Visit the birthplace of Lord Buddha and sacred monasteries.',
                'price' => 10000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pashupatinath Temple',
                'description' => 'Sacred Hindu temple dedicated to Lord Shiva.',
                'price' => 1000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Muktinath Temple',
                'description' => 'Sacred temple at 3,800m altitude in Mustang region.',
                'price' => 45000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Nature Tours
            [
                'name' => 'Chitwan National Park Safari',
                'description' => 'Wildlife safari in UNESCO World Heritage site.',
                'price' => 15000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pokhara Lakeside',
                'description' => 'Relax by the peaceful Phewa Lake with mountain views.',
                'price' => 5000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rara Lake Trek',
                'description' => 'Trek to the largest lake in Nepal with pristine beauty.',
                'price' => 35000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Romantic Packages
            [
                'name' => 'Candlelight Dinner Experience',
                'description' => 'Romantic dinner by Phewa Lake with mountain views.',
                'price' => 5000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mountain Romance Package',
                'description' => 'Intimate mountain escape with sunrise views and spa treatments.',
                'price' => 25000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Heritage Romance Tour',
                'description' => 'Romantic exploration of Kathmandu heritage with private tours.',
                'price' => 15000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Honeymoon Packages
            [
                'name' => 'Luxury Honeymoon Suite',
                'description' => 'Premium accommodation with mountain views and couple spa.',
                'price' => 35000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mountain Honeymoon Retreat',
                'description' => 'Private mountain retreat with personalized romantic services.',
                'price' => 45000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Family Packages
            [
                'name' => 'Family Adventure Package',
                'description' => 'Fun activities for the whole family including kids.',
                'price' => 20000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cultural Family Tour',
                'description' => 'Educational cultural experience for families.',
                'price' => 12000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Luxury Packages
            [
                'name' => 'Luxury Everest Experience',
                'description' => 'Premium Everest base camp trek with luxury accommodations.',
                'price' => 150000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Helicopter Tour to Everest',
                'description' => 'Exclusive helicopter tour to Everest base camp.',
                'price' => 120000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
