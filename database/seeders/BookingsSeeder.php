<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookingsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Get all user IDs and destination IDs from the database
        $users = DB::table('users')->pluck('id')->toArray();
        $destinations = DB::table('destinations')->pluck('id')->toArray();

        if (empty($users) || empty($destinations)) {
            $this->command->info('No users or destinations found. Skipping bookings seeding.');
            return;
        }

        // Generate 10 random bookings
        for ($i = 0; $i < 10; $i++) {
            $user_id = $faker->randomElement($users);
            $destination_id = $faker->randomElement($destinations);

            $people = $faker->numberBetween(1, 5);

            $price_per_person = DB::table('destinations')
                ->where('id', $destination_id)
                ->value('price');

            $total_price = $price_per_person * $people;

            DB::table('bookings')->insert([
                'user_id' => $user_id,
                'destination_id' => $destination_id,
                'tour_title' => DB::table('destinations')->where('id', $destination_id)->value('name'),
                'travel_date' => $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
                'people' => $people,
                'price' => $total_price,
                'subtotal' => $total_price,
                'status' => $faker->randomElement(['Pending', 'Confirmed', 'Cancelled']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('Bookings seeded successfully.');
    }
}
