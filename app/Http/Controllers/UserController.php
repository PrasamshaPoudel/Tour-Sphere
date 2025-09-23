<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Booking;
use App\Models\Destination;

class UserController extends Controller
{
    /**
     * Display the user dashboard
     */
    public function dashboard()
    {
        ob_start(); // Start output buffering
        try {
            $user = auth()->user();
            $bookings = collect();
            
            try {
                // Get user's booking history using DB facade instead of model
                $bookingData = \DB::table('bookings')
                    ->leftJoin('destinations', 'bookings.destination_id', '=', 'destinations.id')
                    ->where('bookings.user_id', $user->id)
                    ->select('bookings.*', 'destinations.name as destination_name', 'destinations.description as destination_description', 'destinations.price as destination_price')
                    ->orderBy('bookings.created_at', 'desc')
                    ->get();
                
                // Convert to collection of objects
                $bookings = $bookingData->map(function($item) {
                    return (object) $item;
                });
                
                // Create pagination manually
                $currentPage = request()->get('page', 1);
                $perPage = 10;
                $total = $bookings->count();
                $items = $bookings->forPage($currentPage, $perPage);
                
                $bookings = new \Illuminate\Pagination\LengthAwarePaginator(
                    $items,
                    $total,
                    $perPage,
                    $currentPage,
                    ['path' => request()->url(), 'pageName' => 'page']
                );
                
            } catch (\Exception $e) {
                $bookings = new \Illuminate\Pagination\LengthAwarePaginator(
                    collect(),
                    0,
                    10,
                    1,
                    ['path' => request()->url(), 'pageName' => 'page']
                );
                \Log::error('Error fetching bookings for user ' . $user->id . ': ' . $e->getMessage());
            }
            
            ob_clean(); // Clean any output that might have been generated
            return view('user.dashboard', compact('user', 'bookings'));
            
        } catch (\Exception $e) {
            ob_clean(); // Clean output buffer and return error
            return response('Error loading dashboard: ' . $e->getMessage());
        } finally {
            if (ob_get_level()) {
                ob_end_clean(); // Ensure output buffer is cleaned
            }
        }
    }

    /**
     * Display user profile
     */
    public function profile()
    {
        // Start output buffering to catch any unwanted output
        ob_start();
        
        try {
            $user = auth()->user();
            
            // Get user's bookings safely
            $bookings = collect();
            
            try {
                // Try to get bookings using DB facade instead of model
                $bookingData = \DB::table('bookings')
                    ->where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->get();
                
                // Convert to collection of objects
                $bookings = $bookingData->map(function($item) {
                    return (object) $item;
                });
            } catch (\Exception $e) {
                $bookings = collect();
            }
            
            // Clean any output that might have been generated
            ob_clean();
            
            return view('user.profile', compact('user', 'bookings'));
            
        } catch (\Exception $e) {
            // Clean output buffer and return error
            ob_clean();
            return response('Error loading profile: ' . $e->getMessage());
        } finally {
            // Ensure output buffer is cleaned
            if (ob_get_level()) {
                ob_end_clean();
            }
        }
    }

    /**
     * Show user profile with booking history
     */
    public function showProfile(): View
    {
        $user = auth()->user();
        
        try {
            // Get user's booking history with destinations
            $bookings = \App\Models\Booking::with('destination')
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } catch (\Exception $e) {
            // If there's an error (e.g., table doesn't exist), create empty paginated collection
            $bookings = new \Illuminate\Pagination\LengthAwarePaginator(
                collect(), // empty collection
                0, // total items
                10, // items per page
                1, // current page
                ['path' => request()->url(), 'pageName' => 'page']
            );
        }

        return view('profile.show', compact('user', 'bookings'));
    }

    /**
     * Cancel a booking (only pending bookings)
     */
    public function cancelBooking(Request $request, $bookingId)
    {
        try {
            $user = auth()->user();
            
            // Find the booking and verify it belongs to the user
            $booking = \DB::table('bookings')
                ->where('id', $bookingId)
                ->where('user_id', $user->id)
                ->first();
            
            if (!$booking) {
                return redirect()->back()->with('error', 'Booking not found or you do not have permission to cancel this booking.');
            }
            
            // Check if booking can be cancelled (only pending bookings)
            if ($booking->status !== 'Pending') {
                return redirect()->back()->with('error', 'Only pending bookings can be cancelled.');
            }
            
            // Update booking status to cancelled
            \DB::table('bookings')
                ->where('id', $bookingId)
                ->update([
                    'status' => 'Cancelled',
                    'updated_at' => now()
                ]);
            
            return redirect()->back()->with('success', 'Booking cancelled successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error cancelling booking: ' . $e->getMessage());
        }
    }

    /**
     * Show review form for a confirmed booking
     */
    public function showReviewForm($bookingId)
    {
        try {
            $user = auth()->user();
            
            // Find the booking and verify it belongs to the user
            $booking = \App\Models\Booking::with('destination')
                ->where('id', $bookingId)
                ->where('user_id', $user->id)
                ->first();
            
            if (!$booking) {
                return redirect()->back()->with('error', 'Booking not found.');
            }
            
            // Check if booking can be reviewed
            if (!$booking->canBeReviewed()) {
                return redirect()->back()->with('error', 'This booking cannot be reviewed.');
            }
            
            return view('reviews.create', compact('booking'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error loading review form: ' . $e->getMessage());
        }
    }

    /**
     * Store a review for a booking
     */
    public function storeReview(Request $request, $bookingId)
    {
        try {
            $user = auth()->user();
            
            // Find the booking and verify it belongs to the user
            $booking = \App\Models\Booking::where('id', $bookingId)
                ->where('user_id', $user->id)
                ->first();
            
            if (!$booking) {
                return redirect()->back()->with('error', 'Booking not found.');
            }
            
            // Check if booking can be reviewed
            if (!$booking->canBeReviewed()) {
                return redirect()->back()->with('error', 'This booking cannot be reviewed.');
            }
            
            // Validate the request
            $request->validate([
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'nullable|string|max:1000'
            ]);
            
            // Create the review
            \App\Models\Review::create([
                'booking_id' => $booking->id,
                'user_id' => $user->id,
                'destination_id' => $booking->destination_id,
                'rating' => $request->rating,
                'comment' => $request->comment,
                'is_verified' => true
            ]);
            
            return redirect()->route('profile.show')->with('success', 'Review submitted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error submitting review: ' . $e->getMessage());
        }
    }
}

