<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Booking;
use App\Models\Destination;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_dashboard(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        
        $response = $this->actingAs($admin)->get('/admin/dashboard');

        $response->assertStatus(200);
        $response->assertViewIs('admin.dashboard');
    }

    public function test_regular_user_cannot_access_admin_dashboard(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        
        $response = $this->actingAs($user)->get('/admin/dashboard');

        $response->assertStatus(403);
    }

    public function test_guest_cannot_access_admin_dashboard(): void
    {
        $response = $this->get('/admin/dashboard');

        $response->assertRedirect('/login');
    }

    public function test_admin_can_view_users(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        User::factory()->count(5)->create();
        
        $response = $this->actingAs($admin)->get('/admin/users');

        $response->assertStatus(200);
        $response->assertViewIs('admin.users');
    }

    public function test_admin_can_view_bookings(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create();
        $destination = Destination::factory()->create();
        Booking::factory()->count(3)->create([
            'user_id' => $user->id,
            'destination_id' => $destination->id
        ]);
        
        $response = $this->actingAs($admin)->get('/admin/bookings');

        $response->assertStatus(200);
        $response->assertViewIs('admin.bookings');
    }

    public function test_admin_can_view_destinations(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        Destination::factory()->count(5)->create();
        
        $response = $this->actingAs($admin)->get('/admin/destinations');

        $response->assertStatus(200);
        $response->assertViewIs('admin.destinations');
    }

    public function test_admin_can_update_booking_status(): void
    {
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
        $this->assertDatabaseHas('bookings', [
            'id' => $booking->id,
            'status' => 'confirmed'
        ]);
    }

    public function test_admin_can_delete_booking(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create();
        $destination = Destination::factory()->create();
        $booking = Booking::factory()->create([
            'user_id' => $user->id,
            'destination_id' => $destination->id
        ]);

        $response = $this->actingAs($admin)->delete("/admin/bookings/{$booking->id}");

        $response->assertRedirect();
        $this->assertDatabaseMissing('bookings', ['id' => $booking->id]);
    }

    public function test_admin_can_update_user_role(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create(['role' => 'user']);

        $response = $this->actingAs($admin)->patch("/admin/users/{$user->id}/role", [
            'role' => 'admin'
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'role' => 'admin'
        ]);
    }

    public function test_admin_can_delete_user(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create();

        $response = $this->actingAs($admin)->delete("/admin/users/{$user->id}");

        $response->assertRedirect();
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_admin_cannot_delete_themselves(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->delete("/admin/users/{$admin->id}");

        $response->assertRedirect();
        $this->assertDatabaseHas('users', ['id' => $admin->id]);
    }

    public function test_admin_can_create_destination(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $destinationData = [
            'name' => 'Test Destination',
            'description' => 'Test description',
            'price' => 100.00
        ];

        $response = $this->actingAs($admin)->post('/admin/destinations', $destinationData);

        $response->assertRedirect();
        $this->assertDatabaseHas('destinations', $destinationData);
    }

    public function test_admin_can_update_destination(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $destination = Destination::factory()->create();

        $updateData = [
            'name' => 'Updated Destination',
            'description' => 'Updated description',
            'price' => 150.00
        ];

        $response = $this->actingAs($admin)->patch("/admin/destinations/{$destination->id}", $updateData);

        $response->assertRedirect();
        $this->assertDatabaseHas('destinations', array_merge(['id' => $destination->id], $updateData));
    }

    public function test_admin_can_delete_destination(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $destination = Destination::factory()->create();

        $response = $this->actingAs($admin)->delete("/admin/destinations/{$destination->id}");

        $response->assertRedirect();
        $this->assertDatabaseMissing('destinations', ['id' => $destination->id]);
    }

    public function test_admin_can_search_users(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user1 = User::factory()->create(['name' => 'John Doe']);
        $user2 = User::factory()->create(['name' => 'Jane Smith']);

        $response = $this->actingAs($admin)->get('/admin/users?search=John');

        $response->assertStatus(200);
        $response->assertSee('John Doe');
        $response->assertDontSee('Jane Smith');
    }

    public function test_admin_can_filter_bookings_by_status(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create();
        $destination = Destination::factory()->create();
        
        Booking::factory()->create([
            'user_id' => $user->id,
            'destination_id' => $destination->id,
            'status' => 'pending'
        ]);
        
        Booking::factory()->create([
            'user_id' => $user->id,
            'destination_id' => $destination->id,
            'status' => 'confirmed'
        ]);

        $response = $this->actingAs($admin)->get('/admin/bookings?status=pending');

        $response->assertStatus(200);
        $response->assertSee('pending');
    }
}