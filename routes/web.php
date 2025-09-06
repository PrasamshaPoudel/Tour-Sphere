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
use App\Http\Controllers\HoneymoonController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\RomanticController;
use App\Http\Controllers\LuxuryController;

Route::view('/', 'pages.home')->name('home');
Route::view('/destinations', 'pages.destinations')->name('destinations');
Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/about', 'pages.about')->name('about');

// Nature subpages
Route::view('/destinations/nature/lakes', 'pages.nature-lakes')->name('nature.lakes');
Route::view('/destinations/nature/forests-treks', 'pages.nature-forests-treks')->name('nature.forests_treks');

// Temporary stubs so buttons don't 404 (replace later with Breeze/Jetstream)
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');

Route::get('/signin', function () {
    return view('auth.signin');
})->name('signin');

Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup');

// Demo-only POST handlers (no real auth) for frontend forms
Route::post('/login', function (Request $request) {
    $validated = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'string', 'min:6'],
    ]);

    // Fake rule: if password equals "fail", treat as invalid credentials
    $isFailed = $request->string('password') === 'fail';

    if ($request->expectsJson()) {
        if ($isFailed) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password (demo)'
            ], 422);
        }

        return response()->json([
            'success' => true,
            'message' => 'Signed in successfully (demo)'
        ]);
    }

    if ($isFailed) {
        return back()
            ->withInput($request->except('password'))
            ->with('error', 'Invalid email or password (demo)');
    }

    return back()
        ->with('success', 'Signed in successfully (demo)');
})->name('login.post');

Route::post('/signup', function (Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email'],
        'phone' => ['required', 'string', 'max:20'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
        'terms' => ['accepted'],
    ]);

    // Fake rule: if email ends with ".test", simulate server error
    $isFailed = str_ends_with(strtolower($request->string('email')), '.test');

    if ($request->expectsJson()) {
        if ($isFailed) {
            return response()->json([
                'success' => false,
                'message' => 'Signup failed for demo email domain'
            ], 422);
        }

        return response()->json([
            'success' => true,
            'message' => 'Account created (demo)'
        ]);
    }

    if ($isFailed) {
        return back()
            ->withInput($request->except(['password', 'password_confirmation']))
            ->with('error', 'Signup failed for demo email domain');
    }

    return back()->with('success', 'Account created (demo)');
})->name('signup');

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
Route::get('/nature-details', [NatureController::class, 'index'])->name('nature-details');

// 🎭 Culture Activity Details  
Route::get('/culture-details', [CultureController::class, 'index'])->name('culture-details');

// 🙏 Spiritual Activity Details
Route::get('/spiritual-details', [SpiritualController::class, 'index'])->name('spiritual-details');

// 🏛️ Historical Activity Details
Route::get('/historical-details', [HistoricalController::class, 'index'])->name('historical-details');

// 💕 Special Packages
Route::get('/honeymoon', [HoneymoonController::class, 'index'])->name('honeymoon');
Route::get('/family', [FamilyController::class, 'index'])->name('family');
Route::get('/romantic', [RomanticController::class, 'index'])->name('romantic');
Route::get('/luxury', [LuxuryController::class, 'index'])->name('luxury');


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
