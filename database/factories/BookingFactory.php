<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'destination_id' => \App\Models\Destination::factory(),
            'travel_date' => $this->faker->dateTimeBetween('+1 week', '+3 months'),
            'number_of_people' => $this->faker->numberBetween(1, 10),
            'total_price' => $this->faker->randomFloat(2, 100, 5000),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']),
            'special_requests' => $this->faker->optional()->sentence(),
        ];
    }
}
