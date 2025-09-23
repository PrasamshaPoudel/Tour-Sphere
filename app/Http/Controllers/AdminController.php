<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Booking;
use App\Models\Destination;
use App\Mail\BookingStatusUpdate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role !== 'admin') {
                abort(403, 'Unauthorized access.');
            }
            return $next($request);
        });
    }

    /**
     * Display admin dashboard
     */
    public function dashboard()
    {
        try {
            // Get basic counts using safe methods
            $users = DB::table('users')->count();
            $destinations = DB::table('destinations')->count();
            $bookings = DB::table('bookings')->count();
            $totalRevenue = DB::table('bookings')->sum('price') ?? 0;
            
            // Get recent bookings
            $recentBookingsData = DB::table('bookings')
                ->join('users', 'bookings.user_id', '=', 'users.id')
                ->leftJoin('destinations', 'bookings.destination_id', '=', 'destinations.id')
                ->select('bookings.*', 'users.name as user_name', 'users.email as user_email', 'destinations.name as destination_name')
                ->orderBy('bookings.created_at', 'desc')
                ->limit(5)
                ->get();
            
            $recentBookings = $recentBookingsData->map(function($item) {
                return (object) $item;
            });
            
            return view('admin.dashboard', compact('users', 'bookings', 'destinations', 'recentBookings', 'totalRevenue'));
        } catch (\Exception $e) {
            return response()->view('errors.safe-error', [
                'message' => 'Failed to load admin dashboard. Please try again.',
                'details' => config('app.debug') ? $e->getMessage() : 'Please try again later.'
            ], 500);
        }
    }

    /**
     * Display all users
     */
    public function users(Request $request)
    {
        try {
            // First get users without bookings count to avoid GROUP BY issues
            $query = DB::table('users');
            
            // Search functionality
            if ($request->has('search') && $request->search) {
                $query->where(function($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->search . '%')
                      ->orWhere('email', 'like', '%' . $request->search . '%');
                });
            }

            // Filter by role
            if ($request->has('role') && $request->role) {
                $query->where('role', $request->role);
            }

            $users = $query->orderBy('created_at', 'desc')->paginate(15);
            
            // Convert to collection of objects and add bookings count
            $collection = $users->getCollection()->map(function($item) {
                $user = (object) $item;
                $user->bookings_count = DB::table('bookings')->where('user_id', $user->id)->count();
                return $user;
            });
            $users->setCollection($collection);
            
            // Calculate role counts
            $userCount = DB::table('users')->where('role', 'user')->count();
            $adminCount = DB::table('users')->where('role', 'admin')->count();
            
            return view('admin.users', [
                'users' => $users,
                'userCount' => $userCount,
                'adminCount' => $adminCount
            ]);
        } catch (\Exception $e) {
            return response()->view('errors.safe-error', [
                'message' => 'Failed to load users. Please try again.',
                'details' => config('app.debug') ? $e->getMessage() : 'Please try again later.'
            ], 500);
        }
    }

    /**
     * Display all bookings
     */
    public function bookings(Request $request)
    {
        try {
            // Use DB facade for safe querying
            $query = DB::table('bookings')
                ->join('users', 'bookings.user_id', '=', 'users.id')
                ->leftJoin('destinations', 'bookings.destination_id', '=', 'destinations.id')
                ->select('bookings.*', 'users.name as user_name', 'users.email as user_email', 'destinations.name as destination_name');

            // Search functionality
            if ($request->has('search') && $request->search) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('users.name', 'like', '%' . $search . '%')
                      ->orWhere('users.email', 'like', '%' . $search . '%')
                      ->orWhere('destinations.name', 'like', '%' . $search . '%');
                });
            }

            // Filter by status
            if ($request->has('status') && $request->status) {
                $query->where('bookings.status', $request->status);
            }

            $bookings = $query->orderBy('bookings.created_at', 'desc')->paginate(15);
            
            // Convert to collection of objects
            $collection = $bookings->getCollection()->map(function($item) {
                return (object) $item;
            });
            $bookings->setCollection($collection);
            
            return view('admin.bookings', ['bookings' => $bookings]);
        } catch (\Exception $e) {
            return response()->view('errors.safe-error', [
                'message' => 'Failed to load bookings. Please try again.',
                'details' => config('app.debug') ? $e->getMessage() : 'Please try again later.'
            ], 500);
        }
    }

    /**
     * Display all destinations
     */
    public function destinations(Request $request)
    {
        try {
            // Use DB facade for safe querying
            $query = DB::table('destinations');

            // Search functionality
            if ($request->has('search') && $request->search) {
                $query->where('name', 'like', '%' . $request->search . '%')
                      ->orWhere('description', 'like', '%' . $request->search . '%');
            }

            $destinations = $query->orderBy('created_at', 'desc')->paginate(15);
            
            // Convert to collection of objects
            $collection = $destinations->getCollection()->map(function($item) {
                return (object) $item;
            });
            $destinations->setCollection($collection);
            
            return view('admin.destinations', ['destinations' => $destinations]);
        } catch (\Exception $e) {
            return response()->view('errors.safe-error', [
                'message' => 'Failed to load destinations. Please try again.',
                'details' => config('app.debug') ? $e->getMessage() : 'Please try again later.'
            ], 500);
        }
    }

    /**
     * Update booking status
     */
    public function updateBookingStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => ['required', Rule::in(['pending', 'confirmed', 'cancelled', 'completed'])]
        ]);

        $oldStatus = $booking->status;
        $booking->update(['status' => $request->status]);

        // Send email notification if status changed
        if ($oldStatus !== $request->status) {
            try {
                // Get user email using direct database query
                $user = DB::table('users')->where('id', $booking->user_id)->first();
                if ($user) {
                    Mail::to($user->email)->send(new BookingStatusUpdate($booking, $oldStatus, $request->status));
                }
            } catch (\Exception $e) {
                // Log error but don't fail the request
                \Log::error('Failed to send booking status update email', [
                    'booking_id' => $booking->id,
                    'user_id' => $booking->user_id,
                    'error' => $e->getMessage()
                ]);
            }
        }

        return redirect()->back()->with('success', 'Booking status updated successfully.');
    }

    /**
     * Delete a booking
     */
    public function deleteBooking(Booking $booking)
    {
        $booking->delete();
        return redirect()->back()->with('success', 'Booking deleted successfully.');
    }

    /**
     * Update user role
     */
    public function updateUserRole(Request $request, User $user)
    {
        $request->validate([
            'role' => ['required', Rule::in(['user', 'admin'])]
        ]);

        $user->update(['role' => $request->role]);

        return redirect()->back()->with('success', 'User role updated successfully.');
    }

    /**
     * Delete a user
     */
    public function deleteUser(User $user)
    {
        // Prevent admin from deleting themselves
        if ($user->id === Auth::id()) {
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    /**
     * Create new destination
     */
    public function createDestination(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $destination = Destination::create($request->only(['name', 'description', 'price']));

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('destinations', 'public');
            $destination->update(['image' => $imagePath]);
        }

        return redirect()->back()->with('success', 'Destination created successfully.');
    }

    /**
     * Update destination
     */
    public function updateDestination(Request $request, Destination $destination)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $destination->update($request->only(['name', 'description', 'price']));

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('destinations', 'public');
            $destination->update(['image' => $imagePath]);
        }

        return redirect()->back()->with('success', 'Destination updated successfully.');
    }

    /**
     * Delete destination
     */
    public function deleteDestination(Destination $destination)
    {
        $destination->delete();
        return redirect()->back()->with('success', 'Destination deleted successfully.');
    }

    /**
     * Get booking statistics
     */
    public function getBookingStats()
    {
        try {
            $stats = [
                'total' => \DB::table('bookings')->count(),
                'pending' => \DB::table('bookings')->where('status', 'pending')->count(),
                'confirmed' => \DB::table('bookings')->where('status', 'confirmed')->count(),
                'cancelled' => \DB::table('bookings')->where('status', 'cancelled')->count(),
                'completed' => \DB::table('bookings')->where('status', 'completed')->count(),
                'revenue' => \DB::table('bookings')->sum('price'),
                'this_month' => \DB::table('bookings')->whereMonth('created_at', now()->month)->count(),
                'this_month_revenue' => \DB::table('bookings')->whereMonth('created_at', now()->month)->sum('price'),
            ];

            return response()->json($stats);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to load statistics'], 500);
        }
    }
}