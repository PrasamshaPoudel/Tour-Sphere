<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true) . ' Tour',
            'description' => $this->faker->paragraph(3),
            'price' => $this->faker->randomFloat(2, 50, 2000),
            'image' => 'default-destination.jpg',
        ];
    }
}
