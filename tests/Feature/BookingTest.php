<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Destination;
use App\Models\Booking;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_booking_form(): void
    {
        $user = User::factory()->create();
        
        // Create some destinations for the test
        Destination::create([
            'name' => 'Test Destination',
            'description' => 'Test Description',
            'price' => 1000,
            'image' => 'test.jpg',
        ]);
        
        $response = $this->actingAs($user)->get('/booking');

        $response->assertStatus(200);
        $response->assertViewIs('pages.booking');
    }

    public function test_guest_cannot_access_booking_form(): void
    {
        $response = $this->get('/booking');

        $response->assertRedirect('/login');
    }

    public function test_user_can_create_booking(): void
    {
        $user = User::factory()->create();
        $destination = Destination::factory()->create([
            'name' => 'Test Destination',
            'price' => 100.00
        ]);

        $bookingData = [
            'destination_id' => $destination->id,
            'travel_date' => now()->addDays(30)->format('Y-m-d'),
            'number_of_people' => 2,
            'special_requests' => 'Test special requests'
        ];

        $response = $this->actingAs($user)->post('/booking', $bookingData);

        $response->assertRedirect('/dashboard');
        $this->assertDatabaseHas('bookings', [
            'user_id' => $user->id,
            'destination_id' => $destination->id,
            'number_of_people' => 2,
            'total_price' => 200.00
        ]);
    }

    public function test_booking_requires_authentication(): void
    {
        $destination = Destination::factory()->create();

        $bookingData = [
            'destination_id' => $destination->id,
            'travel_date' => now()->addDays(30)->format('Y-m-d'),
            'number_of_people' => 2
        ];

        $response = $this->post('/booking', $bookingData);

        $response->assertRedirect('/login');
    }

    public function test_booking_validation_works(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/booking', []);

        $response->assertSessionHasErrors(['destination_id', 'travel_date', 'number_of_people']);
    }
}
