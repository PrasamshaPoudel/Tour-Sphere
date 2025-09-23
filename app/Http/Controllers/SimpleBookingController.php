<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SimpleBookingController extends Controller
{
    /**
     * Show the simple booking form
     */
    public function showForm(Request $request)
    {
        // Debug: Log that this method is being called
        \Log::info('SimpleBookingController@showForm called');
        
        // Get destination details from URL parameters or use default
        $destinationId = $request->query('destination_id', 4);
        $destinationTitle = $request->query('destination_title');
        $description = $request->query('description');
        $price = $request->query('price');
        
        // Default destinations if no parameters provided
        $defaultDestinations = [
            4 => [
                'name' => 'Everest Base Camp Trek',
                'description' => 'Experience the world\'s most famous trek to the base of Mount Everest. This 12-14 day adventure takes you through stunning mountain scenery and traditional Sherpa villages.',
                'price' => 80000
            ],
            5 => [
                'name' => 'Annapurna Circuit Trek',
                'description' => 'Discover the legendary Annapurna Circuit, one of the world\'s best trekking routes. Experience diverse landscapes from subtropical forests to high-altitude deserts.',
                'price' => 70000
            ],
            6 => [
                'name' => 'Pokhara Paragliding',
                'description' => 'Enjoy paragliding, boating, and mountain views in Nepal\'s adventure capital. Perfect for thrill-seekers and nature lovers.',
                'price' => 15000
            ],
            15 => [
                'name' => 'Chitwan National Park Safari',
                'description' => 'Explore Nepal\'s first national park and spot rhinos, tigers, and elephants in their natural habitat. A perfect family adventure.',
                'price' => 12000
            ],
            12 => [
                'name' => 'Lumbini Pilgrimage',
                'description' => 'Visit the birthplace of Buddha and explore ancient monasteries and temples. A peaceful and spiritual journey.',
                'price' => 8000
            ],
            7 => [
                'name' => 'Trishuli River Rafting',
                'description' => 'Experience exciting white water rafting on the Trishuli River. Perfect for adventure enthusiasts of all levels.',
                'price' => 4000
            ]
        ];
        
        // Use provided parameters or defaults
        $destination = (object) [
            'id' => $destinationId,
            'name' => $destinationTitle ?? $defaultDestinations[$destinationId]['name'] ?? 'Amazing Adventure',
            'description' => $description ?? $defaultDestinations[$destinationId]['description'] ?? 'An unforgettable adventure awaits you',
            'price' => $price ?? $defaultDestinations[$destinationId]['price'] ?? 10000
        ];

        $user = Auth::user();
        
        // Debug: Log the variables being passed to the view
        \Log::info('Destination object:', ['destination' => $destination]);
        \Log::info('User object:', ['user' => $user]);
        
        return view('booking.simple-booking-form', compact('destination', 'user'));
    }

    /**
     * Process the simple booking
     */
    public function processBooking(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'destination_id' => 'required|integer|min:1',
                'destination_title' => 'required|string|max:255',
                'travel_date' => 'required|date',
                'num_people' => 'required|integer|min:1',
                'total_amount' => 'required|numeric|min:0',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
            ]);

            // Get user ID - require authentication for bookings
            if (!Auth::check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please login to complete your booking.',
                    'redirect_url' => route('login')
                ], 401);
            }
            
            $userId = Auth::id();

            // Debug: Log the booking data
            \Log::info('Simple Booking - User ID: ' . $userId . ', Destination ID: ' . $request->destination_id . ', Title: ' . $request->destination_title);
            
            // Insert booking directly into database using raw query
            $bookingId = DB::table('bookings')->insertGetId([
                'user_id' => $userId,
                'destination_id' => $request->destination_id,
                'tour_title' => $request->destination_title,
                'travel_date' => $request->travel_date,
                'people' => $request->num_people,
                'price' => $request->total_amount,
                'status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            // Debug: Log the created booking ID
            \Log::info('Simple Booking - Created booking ID: ' . $bookingId);

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Booking created successfully!',
                'booking_id' => $bookingId,
                'redirect_url' => route('booking.success', $bookingId)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create booking: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show booking success page
     */
    public function showSuccess($id)
    {
        // Get booking details
        $booking = DB::table('bookings')->where('id', $id)->first();
        
        if (!$booking) {
            abort(404, 'Booking not found');
        }

        return view('booking.success', compact('booking'));
    }
}
