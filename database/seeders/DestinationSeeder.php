<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $destinations = [
            [
                'name' => 'Everest Base Camp',
                'description' => 'Journey to the world\'s highest peak base camp. Experience the ultimate trekking adventure with stunning views of Mount Everest and surrounding peaks.',
                'price' => 45000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Annapurna Base Camp',
                'description' => 'Glacial sanctuary beneath towering peaks. Trek through diverse landscapes and reach the base of the magnificent Annapurna range.',
                'price' => 60000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ghandruk',
                'description' => 'Gurung village with Himalayan views. Experience traditional Nepalese culture and breathtaking mountain panoramas.',
                'price' => 15000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dhorpatan',
                'description' => 'Remote valley with wild beauty. Discover the untouched wilderness and unique flora and fauna of this hidden gem.',
                'price' => 35000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ilam',
                'description' => 'Tea paradise with winding hills. Explore the famous tea gardens and enjoy the serene hill station atmosphere.',
                'price' => 8000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pokhara',
                'description' => 'City of lakes with mountain views. Enjoy boating on Phewa Lake and witness the reflection of Machhapuchhre.',
                'price' => 12000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chitwan National Park',
                'description' => 'Wildlife safari and jungle adventure. Spot rhinos, tigers, and other exotic wildlife in their natural habitat.',
                'price' => 18000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lumbini',
                'description' => 'Birthplace of Lord Buddha. Visit the sacred birthplace and explore the peaceful monasteries and temples.',
                'price' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('destinations')->insert($destinations);
    }
}
