<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use App\Models\User;
use App\Models\Booking;
use App\Models\Destination;
use App\Mail\BookingConfirmation;
use App\Mail\BookingStatusUpdate;

class EmailTest extends TestCase
{
    use RefreshDatabase;

    public function test_booking_confirmation_email_is_sent(): void
    {
        Mail::fake();

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
        
        Mail::assertSent(BookingConfirmation::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });
    }

    public function test_booking_status_update_email_is_sent(): void
    {
        Mail::fake();

        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create();
        $destination = Destination::factory()->create();
        $booking = Booking::factory()->create([
            'user_id' => $user->id,
            'destination_id' => $destination->id,
            'status' => 'pending'
        ]);

        $response = $this->actingAs($admin)->patch("/admin/bookings/{$booking->id}/status", [
            'status' => 'confirmed'
        ]);

        $response->assertRedirect();
        
        Mail::assertSent(BookingStatusUpdate::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });
    }

    public function test_booking_status_update_email_not_sent_when_status_unchanged(): void
    {
        Mail::fake();

        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create();
        $destination = Destination::factory()->create();
        $booking = Booking::factory()->create([
            'user_id' => $user->id,
            'destination_id' => $destination->id,
            'status' => 'pending'
        ]);

        $response = $this->actingAs($admin)->patch("/admin/bookings/{$booking->id}/status", [
            'status' => 'pending' // Same status
        ]);

        $response->assertRedirect();
        
        Mail::assertNotSent(BookingStatusUpdate::class);
    }

    public function test_booking_confirmation_email_has_correct_content(): void
    {
        $user = User::factory()->create(['name' => 'John Doe']);
        $destination = Destination::factory()->create([
            'name' => 'Everest Base Camp',
            'price' => 1200.00
        ]);
        $booking = Booking::factory()->create([
            'user_id' => $user->id,
            'destination_id' => $destination->id,
            'travel_date' => now()->addDays(30),
            'number_of_people' => 2,
            'total_price' => 2400.00
        ]);

        $mail = new BookingConfirmation($booking, 'TS-ABC123');
        $mail->build();

        $this->assertStringContainsString('John Doe', $mail->render());
        $this->assertStringContainsString('Everest Base Camp', $mail->render());
        $this->assertStringContainsString('Rs 2,400.00', $mail->render());
        $this->assertStringContainsString('TS-ABC123', $mail->render());
    }

    public function test_booking_status_update_email_has_correct_content(): void
    {
        $user = User::factory()->create(['name' => 'Jane Smith']);
        $destination = Destination::factory()->create([
            'name' => 'Annapurna Circuit',
            'price' => 800.00
        ]);
        $booking = Booking::factory()->create([
            'user_id' => $user->id,
            'destination_id' => $destination->id,
            'travel_date' => now()->addDays(30),
            'number_of_people' => 1,
            'total_price' => 800.00,
            'status' => 'confirmed'
        ]);

        $mail = new BookingStatusUpdate($booking, 'pending', 'confirmed');
        $mail->build();

        $this->assertStringContainsString('Jane Smith', $mail->render());
        $this->assertStringContainsString('Annapurna Circuit', $mail->render());
        $this->assertStringContainsString('Rs 800.00', $mail->render());
        $this->assertStringContainsString('confirmed', $mail->render());
    }
}