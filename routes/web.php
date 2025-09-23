<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RaftingController;
use App\Http\Controllers\ParaglidingController;
use App\Http\Controllers\TrekkingController;
use App\Http\Controllers\BungeeController;
use App\Http\Controllers\RockClimbingController;
use App\Http\Controllers\MountainBikingController;
use App\Http\Controllers\NatureController;
use App\Http\Controllers\CultureController;
use App\Http\Controllers\SpiritualController;
use App\Http\Controllers\HistoricalController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\SpecialPackageController;
use App\Http\Controllers\SimpleBookingController;
use App\Http\Controllers\BlogController;

Route::view('/', 'pages.home')->name('home');

// Test routes
Route::get('/test1', [App\Http\Controllers\TestController::class, 'test']);
Route::get('/test2', [App\Http\Controllers\TestController::class, 'testUser'])->middleware('auth');
Route::get('/test3', [App\Http\Controllers\TestController::class, 'testBooking'])->middleware('auth');
Route::get('/test4', [App\Http\Controllers\TestController::class, 'testView'])->middleware('auth');
Route::get('/test5', function() { return 'DB Test: ' . (DB::connection()->getPdo() ? 'Connected' : 'Failed'); });
Route::get('/test6', function() { return 'Booking Test: ' . (class_exists('App\Models\Booking') ? 'Exists' : 'Not Found'); });
Route::view('/destinations', 'pages.destinations')->name('destinations');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/about', 'pages.about')->name('about');

// Blog routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Dummy booking page (standalone, no backend processing)
Route::view('/quick-booking', 'pages.dummy-booking')->name('dummy.booking');

// Simple booking routes (non-breaking, clean implementation)
Route::get('/simple-booking', [SimpleBookingController::class, 'showForm'])->name('simple.booking.form');
Route::post('/simple-booking', [SimpleBookingController::class, 'processBooking'])->name('simple.booking.process');
Route::get('/simple-booking/{id}/success', [SimpleBookingController::class, 'showSuccess'])->name('simple.booking.success');

// New booking flow with login enforcement
Route::get('/booking-form', [BookingController::class, 'showUnifiedBookingForm'])->name('booking.form');
Route::post('/booking-form', [BookingController::class, 'processBooking'])->name('booking.process');
Route::get('/booking/{id}/success', [BookingController::class, 'showBookingSuccess'])->name('booking.success');

// Adventure booking form
Route::view('/book/adventure', 'booking.adventure-booking-form')->name('adventure.booking.form');

// Unified booking routes (public access with auth checks in controller)
Route::get('/book-now', [BookingController::class, 'showUnifiedBookingForm'])->name('booking.unified.form');
Route::post('/book-now', [BookingController::class, 'storeUnifiedBooking'])->name('booking.unified.store');
Route::get('/booking/{id}/confirmation', [BookingController::class, 'showConfirmation'])->name('booking.confirmation');
Route::post('/booking/{id}/confirm', [BookingController::class, 'confirmBooking'])->name('booking.confirm');
Route::view('/booking-test', 'pages.booking-test')->name('booking.test');
Route::view('/adventure-test', 'pages.adventure-test')->name('adventure.test');

// eSewa QR Payment (public access)
Route::get('/payment/esewa/{bookingId}', [App\Http\Controllers\PaymentController::class, 'showEsewaPayment'])->name('payment.esewa');
Route::post('/payment/esewa/{bookingId}/process', [App\Http\Controllers\PaymentController::class, 'processEsewaPayment'])->name('payment.esewa.process');

// User routes (require authentication)
Route::middleware(['auth'])->group(function () {
    // User Dashboard
    Route::get('/user/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/user/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
    
    // User booking management
    Route::post('/user/bookings/{bookingId}/cancel', [App\Http\Controllers\UserController::class, 'cancelBooking'])->name('user.bookings.cancel');
    
    // Booking routes
    Route::get('/booking', [BookingController::class, 'index'])->name('booking')->middleware('validate.discount');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store')->middleware('validate.discount');
    
    // Enhanced booking routes (without discount logic)
    Route::get('/book-tour', [BookingController::class, 'showEnhancedBookingForm'])->name('booking.enhanced.form');
    Route::post('/book-tour', [BookingController::class, 'storeEnhancedBooking'])->name('booking.enhanced.store');
    
    
    // Profile route
    Route::get('/my-profile', [App\Http\Controllers\UserController::class, 'showProfile'])->name('profile.show');
    
    // Booking management routes
    Route::post('/booking/{id}/cancel', [App\Http\Controllers\UserController::class, 'cancelBooking'])->name('booking.cancel');
    
    // Review routes
    Route::get('/booking/{id}/review', [App\Http\Controllers\UserController::class, 'showReviewForm'])->name('review.create');
    Route::post('/booking/{id}/review', [App\Http\Controllers\UserController::class, 'storeReview'])->name('review.store');
    
    // Specific booking type routes
    Route::get('/book/adventure', [BookingController::class, 'showAdventureBooking'])->name('book.adventure');
    Route::post('/book/adventure', [BookingController::class, 'processAdventureBooking'])->name('book.adventure.process');
    Route::get('/book/package', [BookingController::class, 'showPackageBooking'])->name('book.package');
    Route::get('/book/destination', [BookingController::class, 'showDestinationBooking'])->name('book.destination');
    Route::get('/book/promotional', [BookingController::class, 'showPromotionalBooking'])->name('book.promotional');
});


// Admin routes (require authentication and admin role) - Using SimpleAdminController
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\SimpleAdminController::class, 'dashboard'])->name('dashboard');
    
    // User Management
    Route::get('/users', [App\Http\Controllers\SimpleAdminController::class, 'users'])->name('users');
    Route::get('/users/{userId}', [App\Http\Controllers\SimpleAdminController::class, 'viewUser'])->name('users.view');
    Route::get('/users/{userId}/edit', [App\Http\Controllers\SimpleAdminController::class, 'editUser'])->name('users.edit');
    Route::patch('/users/{userId}', [App\Http\Controllers\SimpleAdminController::class, 'updateUser'])->name('users.update');
    Route::patch('/users/{userId}/role', [App\Http\Controllers\SimpleAdminController::class, 'updateUserRole'])->name('users.update-role');
    Route::delete('/users/{userId}', [App\Http\Controllers\SimpleAdminController::class, 'deleteUser'])->name('users.delete');
    
    // Booking Management
    Route::get('/bookings', [App\Http\Controllers\SimpleAdminController::class, 'bookings'])->name('bookings');
    Route::get('/bookings/{bookingId}', [App\Http\Controllers\SimpleAdminController::class, 'viewBooking'])->name('bookings.view');
    Route::get('/bookings/{bookingId}/edit', [App\Http\Controllers\SimpleAdminController::class, 'editBooking'])->name('bookings.edit');
    Route::patch('/bookings/{bookingId}', [App\Http\Controllers\SimpleAdminController::class, 'updateBooking'])->name('bookings.update');
    Route::patch('/bookings/{bookingId}/status', [App\Http\Controllers\SimpleAdminController::class, 'updateBookingStatus'])->name('bookings.update-status');
    Route::delete('/bookings/{bookingId}', [App\Http\Controllers\SimpleAdminController::class, 'deleteBooking'])->name('bookings.delete');
    
    // Destination Management
    Route::get('/destinations', [App\Http\Controllers\SimpleAdminController::class, 'destinations'])->name('destinations');
    Route::get('/destinations/{destinationId}', [App\Http\Controllers\SimpleAdminController::class, 'viewDestination'])->name('destinations.view');
    Route::get('/destinations/{destinationId}/edit', [App\Http\Controllers\SimpleAdminController::class, 'editDestination'])->name('destinations.edit');
    Route::post('/destinations', [App\Http\Controllers\SimpleAdminController::class, 'createDestination'])->name('destinations.create');
    Route::patch('/destinations/{destinationId}', [App\Http\Controllers\SimpleAdminController::class, 'updateDestination'])->name('destinations.update');
    Route::delete('/destinations/{destinationId}', [App\Http\Controllers\SimpleAdminController::class, 'deleteDestination'])->name('destinations.delete');
    
    // Blog management
    Route::get('/blog', [BlogController::class, 'manage'])->name('blog.manage');
    Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
});

// Nature subpages
Route::view('/destinations/nature/lakes', 'pages.nature-lakes')->name('nature.lakes');
Route::view('/destinations/nature/forests-treks', 'pages.nature-forests-treks')->name('nature.forests_treks');

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login-only');
})->name('login');

Route::get('/register', function () {
    return view('auth.register-only');
})->name('register');

Route::get('/signin', function () {
    return view('auth.signin');
})->name('signin');

Route::get('/signup', function () {
    return redirect()->route('login');
})->name('signup');

// Authentication POST routes
Route::post('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store'])->name('login.post');
Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::post('/register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'store'])->name('register.post');

// Password reset routes
Route::get('/forgot-password', [App\Http\Controllers\Auth\PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [App\Http\Controllers\Auth\PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\NewPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [App\Http\Controllers\Auth\NewPasswordController::class, 'store'])->name('password.store');

// Email verification routes
Route::get('/verify-email', [App\Http\Controllers\Auth\EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
Route::get('/verify-email/{id}/{hash}', [App\Http\Controllers\Auth\VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
Route::post('/email/verification-notification', [App\Http\Controllers\Auth\EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');

// Password confirmation routes
Route::get('/confirm-password', [App\Http\Controllers\Auth\ConfirmablePasswordController::class, 'show'])->name('password.confirm');
Route::post('/confirm-password', [App\Http\Controllers\Auth\ConfirmablePasswordController::class, 'store'])->name('password.confirm');

// Profile routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('password.update');
});

// 🟢 Category Pages
Route::view('/destinations/adventure', 'pages.adventure')->name('adventure');
Route::view('/destinations/culture', 'pages.culture')->name('culture');
Route::view('/destinations/nature', 'pages.nature')->name('nature');
Route::view('/destinations/spiritual', 'pages.spiritual')->name('spiritual');
Route::view('/destinations/historical', 'pages.historical')->name('historical');

// 🚣 Adventure Activity Details
Route::get('/rafting', [RaftingController::class, 'index'])->name('rafting');
Route::get('/paragliding', [ParaglidingController::class, 'index'])->name('paragliding');
Route::get('/trekking', [TrekkingController::class, 'index'])->name('trekking');
Route::get('/bungee', [BungeeController::class, 'index'])->name('bungee');
Route::get('/rock-climbing', [RockClimbingController::class, 'index'])->name('rock-climbing');
Route::get('/mountain-biking', [MountainBikingController::class, 'index'])->name('mountain-biking');

// 🏞️ Nature Activity Details
Route::get('/nature', [NatureController::class, 'index'])->name('nature');

// 🎭 Culture Activity Details  
Route::get('/culture', [CultureController::class, 'index'])->name('culture');

// 🙏 Spiritual Activity Details
Route::get('/spiritual', [SpiritualController::class, 'index'])->name('spiritual');

// 🏛️ Historical Activity Details
Route::get('/historical', [HistoricalController::class, 'index'])->name('historical');

// 💕 Special Packages
Route::get('/honeymoon', [SpecialPackageController::class, 'index'])->name('honeymoon');
Route::get('/family', [SpecialPackageController::class, 'index'])->name('family');
Route::get('/romantic', [SpecialPackageController::class, 'index'])->name('romantic');
Route::get('/luxury', [SpecialPackageController::class, 'index'])->name('luxury');


Route::get('/destination-details/{id}', function ($id) {
    $packages = [
        1 => [
            'name' => 'Annapurna Base Camp',
            'overview' => 'Experience the breathtaking beauty of the Annapurna region with this 7-day trek to the base camp of one of the world\'s most iconic mountain ranges.',
            'duration' => '7 days',
            'difficulty' => 'Moderate',
            'price' => 'Rs 18,000',
            'image' => 'images/annapurnabasecamp.jpg',
            'itinerary' => [
                'Day 1: Arrival in Kathmandu and preparation',
                'Day 2: Drive to Pokhara and trek to Ulleri',
                'Day 3: Trek to Ghorepani',
                'Day 4: Early morning Poon Hill sunrise, trek to Tadapani',
                'Day 5: Trek to Chhomrong',
                'Day 6: Trek to Annapurna Base Camp',
                'Day 7: Return trek and drive to Pokhara'
            ],
            'inclusions' => [
                'Professional trekking guide',
                'Porter service',
                'All meals during trek',
                'Tea house accommodation',
                'Transportation',
                'Permits and fees',
                'Basic first aid kit'
            ]
        ],
        2 => [
            'name' => 'Ghandruk',
            'overview' => 'Discover the traditional Gurung village of Ghandruk with stunning Himalayan views and rich cultural experiences.',
            'duration' => '3 days',
            'difficulty' => 'Easy',
            'price' => 'Rs 12,000',
            'image' => 'images/ghandruk.jpg',
            'itinerary' => [
                'Day 1: Drive to Pokhara and trek to Ghandruk',
                'Day 2: Explore Ghandruk village and cultural sites',
                'Day 3: Return trek and drive back to Kathmandu'
            ],
            'inclusions' => [
                'Professional guide',
                'All meals',
                'Tea house accommodation',
                'Transportation',
                'Cultural site visits',
                'Permits'
            ]
        ],
        3 => [
            'name' => 'Dhorpatan',
            'overview' => 'Explore the remote and wild beauty of Dhorpatan, Nepal\'s only hunting reserve, with diverse wildlife and pristine landscapes.',
            'duration' => '7 days',
            'difficulty' => 'Moderate to Hard',
            'price' => 'Rs 20,000',
            'image' => 'images/dhorpatan.jpg',
            'itinerary' => [
                'Day 1: Drive to Pokhara',
                'Day 2: Drive to Beni and trek to Darbang',
                'Day 3: Trek to Takam',
                'Day 4: Trek to Dhorpatan',
                'Day 5: Explore Dhorpatan hunting reserve',
                'Day 6: Return trek to Darbang',
                'Day 7: Drive back to Kathmandu'
            ],
            'inclusions' => [
                'Professional guide',
                'Porter service',
                'All meals',
                'Camping equipment',
                'Transportation',
                'Hunting reserve permits',
                'Wildlife spotting equipment'
            ]
        ],
        4 => [
            'name' => 'Ilam',
            'overview' => 'Experience the tea paradise of Ilam with its winding hills, lush tea gardens, and serene landscapes.',
            'duration' => '4 days',
            'difficulty' => 'Easy',
            'price' => 'Rs 10,000',
            'image' => 'images/illam.jpg',
            'itinerary' => [
                'Day 1: Drive to Ilam',
                'Day 2: Visit tea gardens and factories',
                'Day 3: Explore local villages and culture',
                'Day 4: Return to Kathmandu'
            ],
            'inclusions' => [
                'Professional guide',
                'All meals',
                'Hotel accommodation',
                'Transportation',
                'Tea garden visits',
                'Cultural experiences'
            ]
        ]
    ];

    $pkg = $packages[$id] ?? null;
    $slug = strtolower(str_replace(' ', '-', $pkg['name'] ?? 'package'));
    
    if (!$pkg) {
        abort(404, 'Package not found');
    }

    return view('pages.destination-details', compact('pkg', 'slug'));
})->name('destination.details');

// Weather JSON endpoints
Route::get('/weather/current', [WeatherController::class, 'current'])->name('weather.current');
Route::get('/weather/forecast', [WeatherController::class, 'forecast'])->name('weather.forecast');


// API routes
Route::get('/api/packages/{destination}', function($destinationId) {
    $packages = \App\Models\Package::where('destination_id', $destinationId)
        ->orderByRaw("CASE package_type WHEN 'Economy' THEN 1 WHEN 'Standard' THEN 2 WHEN 'Luxury' THEN 3 END")
        ->get(['package_type', 'price']);

    return response()->json($packages);
});

// Fake Payment API
Route::get('/api/booking/{bookingId}', function($bookingId) {
    try {
        $booking = \DB::table('bookings')
            ->leftJoin('destinations', 'bookings.destination_id', '=', 'destinations.id')
            ->leftJoin('users', 'bookings.user_id', '=', 'users.id')
            ->select('bookings.*', 'destinations.name as destination_name', 'users.name as user_name', 'users.email as user_email')
            ->where('bookings.id', $bookingId)
            ->first();
        
        if (!$booking) {
            return response()->json(['success' => false, 'error' => 'Booking not found'], 404);
        }
        
        return response()->json([
            'success' => true,
            'booking' => $booking
        ]);
        
    } catch (\Exception $e) {
        \Log::error('Get booking error: ' . $e->getMessage());
        return response()->json(['success' => false, 'error' => 'Failed to fetch booking'], 500);
    }
});

Route::post('/api/fake-pay', function(\Illuminate\Http\Request $request) {
    try {
        $bookingId = $request->input('bookingId');
        
        if (!$bookingId) {
            return response()->json(['success' => false, 'error' => 'Booking ID is required'], 400);
        }
        
        // Find the booking
        $booking = \DB::table('bookings')->where('id', $bookingId)->first();
        
        if (!$booking) {
            return response()->json(['success' => false, 'error' => 'Booking not found'], 404);
        }
        
        // Update booking to paid and confirmed
        \DB::table('bookings')
            ->where('id', $bookingId)
            ->update([
                'paid' => true,
                'status' => 'confirmed',
                'updated_at' => now()
            ]);
        
        // Get updated booking
        $updatedBooking = \DB::table('bookings')->where('id', $bookingId)->first();
        
        return response()->json([
            'success' => true,
            'booking' => $updatedBooking
        ]);
        
    } catch (\Exception $e) {
        \Log::error('Fake payment error: ' . $e->getMessage());
        return response()->json(['success' => false, 'error' => 'Payment processing failed'], 500);
    }
});

// User Dashboard
