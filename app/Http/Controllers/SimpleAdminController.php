<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Booking;
use App\Models\Destination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class SimpleAdminController extends Controller
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
            // Get basic counts
            $users = DB::table('users')->count();
            $destinations = DB::table('destinations')->count();
            $bookings = DB::table('bookings')->count();
            $totalRevenue = DB::table('bookings')->sum('price') ?? 0;
            
            // Get recent bookings
            $recentBookings = DB::table('bookings')
                ->join('users', 'bookings.user_id', '=', 'users.id')
                ->leftJoin('destinations', 'bookings.destination_id', '=', 'destinations.id')
                ->select('bookings.*', 'users.name as user_name', 'users.email as user_email', 'destinations.name as destination_name')
                ->orderBy('bookings.created_at', 'desc')
                ->limit(5)
                ->get();
            
            return view('admin.simple-dashboard', compact('users', 'bookings', 'destinations', 'recentBookings', 'totalRevenue'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error loading dashboard: ' . $e->getMessage());
        }
    }

    /**
     * Display all users
     */
    public function users(Request $request)
    {
        try {
            // Build query
            $query = DB::table('users');
            
            // Search functionality
            if ($request->filled('search')) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('email', 'like', '%' . $search . '%');
                });
            }

            // Filter by role
            if ($request->filled('role')) {
                $query->where('role', $request->role);
            }

            // Get paginated results
            $users = $query->orderBy('created_at', 'desc')->paginate(15);
            
            // Add bookings count to each user
            foreach ($users as $user) {
                $user->bookings_count = DB::table('bookings')->where('user_id', $user->id)->count();
            }
            
            // Calculate role counts
            $userCount = DB::table('users')->where('role', 'user')->count();
            $adminCount = DB::table('users')->where('role', 'admin')->count();
            
            return view('admin.users', compact('users', 'userCount', 'adminCount'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error loading users: ' . $e->getMessage());
        }
    }

    /**
     * Display all bookings
     */
    public function bookings(Request $request)
    {
        try {
            // Build query
            $query = DB::table('bookings')
                ->join('users', 'bookings.user_id', '=', 'users.id')
                ->leftJoin('destinations', 'bookings.destination_id', '=', 'destinations.id')
                ->select('bookings.*', 'users.name as user_name', 'users.email as user_email', 'destinations.name as destination_name');

            // Search functionality
            if ($request->filled('search')) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('users.name', 'like', '%' . $search . '%')
                      ->orWhere('users.email', 'like', '%' . $search . '%')
                      ->orWhere('destinations.name', 'like', '%' . $search . '%');
                });
            }

            // Filter by status
            if ($request->filled('status')) {
                $query->where('bookings.status', $request->status);
            }

            // Get paginated results
            $bookings = $query->orderBy('bookings.created_at', 'desc')->paginate(15);
            
            // Calculate status counts from all bookings (not just current page)
            $pendingCount = DB::table('bookings')->where('status', 'pending')->count();
            $confirmedCount = DB::table('bookings')->where('status', 'confirmed')->count();
            $cancelledCount = DB::table('bookings')->where('status', 'cancelled')->count();
            $totalRevenue = DB::table('bookings')->sum('price') ?? 0;
            
            return view('admin.bookings', compact('bookings', 'pendingCount', 'confirmedCount', 'cancelledCount', 'totalRevenue'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error loading bookings: ' . $e->getMessage());
        }
    }

    /**
     * Display all destinations
     */
    public function destinations(Request $request)
    {
        try {
            // Build query
            $query = DB::table('destinations');

            // Search functionality
            if ($request->filled('search')) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
                });
            }

            // Get paginated results
            $destinations = $query->orderBy('created_at', 'desc')->paginate(15);
            
            return view('admin.destinations', compact('destinations'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error loading destinations: ' . $e->getMessage());
        }
    }

    /**
     * Update booking status
     */
    public function updateBookingStatus(Request $request, $bookingId)
    {
        try {
            $request->validate([
                'status' => 'required|in:pending,confirmed,cancelled'
            ]);

            DB::table('bookings')->where('id', $bookingId)->update([
                'status' => $request->status,
                'updated_at' => now()
            ]);

            return redirect()->back()->with('success', 'Booking status updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating booking status: ' . $e->getMessage());
        }
    }

    /**
     * Delete booking
     */
    public function deleteBooking($bookingId)
    {
        try {
            \Log::info('Attempting to delete booking with ID: ' . $bookingId);
            
            // Check if booking exists first
            $booking = DB::table('bookings')->where('id', $bookingId)->first();
            
            if (!$booking) {
                \Log::warning('Booking not found with ID: ' . $bookingId);
                return redirect()->back()->with('error', 'Booking not found.');
            }
            
            \Log::info('Found booking to delete: ' . json_encode($booking));
            
            // Delete the booking
            $deleted = DB::table('bookings')->where('id', $bookingId)->delete();
            
            \Log::info('Delete result: ' . ($deleted ? 'Success' : 'Failed'));
            
            if ($deleted) {
                return redirect()->back()->with('success', 'Booking deleted successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to delete booking.');
            }
        } catch (\Exception $e) {
            \Log::error('Error deleting booking: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error deleting booking: ' . $e->getMessage());
        }
    }

    /**
     * Update user role
     */
    public function updateUserRole(Request $request, $userId)
    {
        try {
            $request->validate([
                'role' => 'required|in:user,admin'
            ]);

            DB::table('users')->where('id', $userId)->update([
                'role' => $request->role,
                'updated_at' => now()
            ]);

            return redirect()->back()->with('success', 'User role updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating user role: ' . $e->getMessage());
        }
    }

    /**
     * Delete user
     */
    public function deleteUser($userId)
    {
        try {
            // Prevent admin from deleting themselves
            if ($userId == Auth::id()) {
                return redirect()->back()->with('error', 'You cannot delete your own account.');
            }

            DB::table('users')->where('id', $userId)->delete();
            return redirect()->back()->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting user: ' . $e->getMessage());
        }
    }

    /**
     * Create destination
     */
    public function createDestination(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0'
            ]);

            DB::table('destinations')->insert([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return redirect()->back()->with('success', 'Destination created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error creating destination: ' . $e->getMessage());
        }
    }

    /**
     * View destination details
     */
    public function viewDestination($destinationId)
    {
        try {
            $destination = DB::table('destinations')->where('id', $destinationId)->first();
            
            if (!$destination) {
                return redirect()->route('admin.destinations')->with('error', 'Destination not found.');
            }

            // Get booking count for this destination
            $bookingsCount = DB::table('bookings')->where('destination_id', $destinationId)->count();
            $destination->bookings_count = $bookingsCount;

            // Get recent bookings for this destination
            $recentBookings = DB::table('bookings')
                ->join('users', 'bookings.user_id', '=', 'users.id')
                ->select('bookings.*', 'users.name as user_name', 'users.email as user_email')
                ->where('bookings.destination_id', $destinationId)
                ->orderBy('bookings.created_at', 'desc')
                ->limit(10)
                ->get();

            return view('admin.view-destination', ['destination' => $destination, 'recentBookings' => $recentBookings]);
        } catch (\Exception $e) {
            return redirect()->route('admin.destinations')->with('error', 'Error loading destination: ' . $e->getMessage());
        }
    }

    /**
     * Show edit destination form
     */
    public function editDestination($destinationId)
    {
        try {
            $destination = DB::table('destinations')->where('id', $destinationId)->first();
            
            if (!$destination) {
                return redirect()->route('admin.destinations')->with('error', 'Destination not found.');
            }

            // Get booking count for this destination
            $bookingsCount = DB::table('bookings')->where('destination_id', $destinationId)->count();
            $destination->bookings_count = $bookingsCount;

            return view('admin.edit-destination', ['destination' => $destination]);
        } catch (\Exception $e) {
            return redirect()->route('admin.destinations')->with('error', 'Error loading destination: ' . $e->getMessage());
        }
    }

    /**
     * Update destination
     */
    public function updateDestination(Request $request, $destinationId)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $updateData = [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'updated_at' => now()
            ];

            // Handle image upload if provided
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('destinations', 'public');
                $updateData['image'] = $imagePath;
            }

            DB::table('destinations')->where('id', $destinationId)->update($updateData);

            return redirect()->route('admin.destinations')->with('success', 'Destination updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating destination: ' . $e->getMessage());
        }
    }

    /**
     * Delete destination
     */
    public function deleteDestination($destinationId)
    {
        try {
            DB::table('destinations')->where('id', $destinationId)->delete();
            return redirect()->back()->with('success', 'Destination deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting destination: ' . $e->getMessage());
        }
    }

    /**
     * View booking details
     */
    public function viewBooking($bookingId)
    {
        try {
            $booking = DB::table('bookings')
                ->join('users', 'bookings.user_id', '=', 'users.id')
                ->leftJoin('destinations', 'bookings.destination_id', '=', 'destinations.id')
                ->select('bookings.*', 'users.name as user_name', 'users.email as user_email', 'users.phone as user_phone', 'destinations.name as destination_name', 'destinations.description as destination_description', 'destinations.price as destination_price')
                ->where('bookings.id', $bookingId)
                ->first();
            
            if (!$booking) {
                return redirect()->route('admin.bookings')->with('error', 'Booking not found.');
            }

            return view('admin.view-booking', ['booking' => $booking]);
        } catch (\Exception $e) {
            return redirect()->route('admin.bookings')->with('error', 'Error loading booking: ' . $e->getMessage());
        }
    }

    /**
     * Show edit booking form
     */
    public function editBooking($bookingId)
    {
        try {
            $booking = DB::table('bookings')
                ->join('users', 'bookings.user_id', '=', 'users.id')
                ->leftJoin('destinations', 'bookings.destination_id', '=', 'destinations.id')
                ->select('bookings.*', 'users.name as user_name', 'users.email as user_email', 'users.phone as user_phone', 'destinations.name as destination_name', 'destinations.description as destination_description', 'destinations.price as destination_price')
                ->where('bookings.id', $bookingId)
                ->first();
            
            if (!$booking) {
                return redirect()->route('admin.bookings')->with('error', 'Booking not found.');
            }

            // Get all destinations for dropdown
            $destinations = DB::table('destinations')->orderBy('name')->get();

            return view('admin.edit-booking', ['booking' => $booking, 'destinations' => $destinations]);
        } catch (\Exception $e) {
            return redirect()->route('admin.bookings')->with('error', 'Error loading booking: ' . $e->getMessage());
        }
    }

    /**
     * Update booking
     */
    public function updateBooking(Request $request, $bookingId)
    {
        try {
            $request->validate([
                'destination_id' => 'required|integer|min:1',
                'travel_date' => 'required|date|after:today',
                'number_of_people' => 'required|integer|min:1|max:20',
                'status' => 'required|in:pending,confirmed,cancelled',
                'special_requests' => 'nullable|string|max:1000'
            ]);

            // Get destination price
            $destination = DB::table('destinations')->where('id', $request->destination_id)->first();
            
            // If destination not found, use a default price
            $pricePerPerson = $destination ? $destination->price : 0;
            $totalPrice = $pricePerPerson * $request->number_of_people;

            $updateData = [
                'destination_id' => $request->destination_id,
                'travel_date' => $request->travel_date,
                'number_of_people' => $request->number_of_people,
                'price' => $totalPrice,
                'status' => $request->status,
                'special_requests' => $request->special_requests,
                'updated_at' => now()
            ];

            DB::table('bookings')->where('id', $bookingId)->update($updateData);

            return redirect()->route('admin.bookings')->with('success', 'Booking updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating booking: ' . $e->getMessage());
        }
    }

    /**
     * View user details
     */
    public function viewUser($userId)
    {
        try {
            $user = DB::table('users')->where('id', $userId)->first();
            
            if (!$user) {
                return redirect()->route('admin.users')->with('error', 'User not found.');
            }

            // Get user's bookings
            $bookings = DB::table('bookings')
                ->leftJoin('destinations', 'bookings.destination_id', '=', 'destinations.id')
                ->select('bookings.*', 'destinations.name as destination_name')
                ->where('bookings.user_id', $userId)
                ->orderBy('bookings.created_at', 'desc')
                ->get();

            // Get booking statistics
            $totalBookings = $bookings->count();
            $totalSpent = $bookings->sum('price');
            $pendingBookings = $bookings->where('status', 'pending')->count();
            $confirmedBookings = $bookings->where('status', 'confirmed')->count();

            return view('admin.view-user', [
                'user' => $user, 
                'bookings' => $bookings,
                'totalBookings' => $totalBookings,
                'totalSpent' => $totalSpent,
                'pendingBookings' => $pendingBookings,
                'confirmedBookings' => $confirmedBookings
            ]);
        } catch (\Exception $e) {
            return redirect()->route('admin.users')->with('error', 'Error loading user: ' . $e->getMessage());
        }
    }

    /**
     * Show edit user form
     */
    public function editUser($userId)
    {
        try {
            $user = DB::table('users')->where('id', $userId)->first();
            
            if (!$user) {
                return redirect()->route('admin.users')->with('error', 'User not found.');
            }

            return view('admin.edit-user', ['user' => $user]);
        } catch (\Exception $e) {
            return redirect()->route('admin.users')->with('error', 'Error loading user: ' . $e->getMessage());
        }
    }

    /**
     * Update user
     */
    public function updateUser(Request $request, $userId)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $userId,
                'phone' => 'nullable|string|max:20',
                'role' => 'required|in:user,admin'
            ]);

            $updateData = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => $request->role,
                'updated_at' => now()
            ];

            // Only update password if provided
            if ($request->filled('password')) {
                $request->validate(['password' => 'required|string|min:8|confirmed']);
                $updateData['password'] = Hash::make($request->password);
            }

            DB::table('users')->where('id', $userId)->update($updateData);

            return redirect()->route('admin.users')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating user: ' . $e->getMessage());
        }
    }
}
