<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Destination;
use App\Models\Package;
use App\Http\Requests\BookingRequest;
use App\Services\AdventureDestinationService;
use App\Services\DestinationService;
use App\Services\SpecialPackageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display the booking form
     */
    public function showBookingForm(Request $request)
    {
        $destinations = Destination::all();
        
        // Get discount from query parameter and validate it
        $discount = $request->query('discount', 0);
        $discount = max(0, min(100, (float)$discount)); // Ensure discount is between 0-100
        
        return view('booking.form', compact('destinations', 'discount'));
    }

    /**
     * Show Adventure Booking Form
     */
    public function showAdventureBooking(Request $request)
    {
        $category = $request->get('category', 'Trekking');
        $destination = $request->get('destination');
        $priceRange = $request->get('price_range', '15000 - 25000');
        
        // Get destinations based on category (using name field for now)
        $destinations = Destination::where('name', 'like', '%' . $category . '%')
            ->orWhere('description', 'like', '%' . $category . '%')
            ->get()
            ->map(function ($dest) {
                // Determine budget category based on price
                $budgetCategory = 'Medium';
                if ($dest->price < 10000) {
                    $budgetCategory = 'Low';
                } elseif ($dest->price > 50000) {
                    $budgetCategory = 'Expensive';
                }
                
                return (object) [
                    'id' => $dest->id,
                    'name' => $dest->name,
                    'description' => $dest->description ?? 'Amazing adventure experience in Nepal',
                    'price' => $dest->price,
                    'budget_category' => $budgetCategory,
                    'duration' => $dest->duration ?? '3-5 days',
                    'group_size' => '2-12 people',
                    'image' => $dest->image ?? 'images/default-destination.jpg'
                ];
            });
        
        // If specific destination is requested, add it to the list
        if ($destination) {
            $specificDestination = Destination::where('name', 'like', '%' . $destination . '%')->first();
            if ($specificDestination && !$destinations->contains('id', $specificDestination->id)) {
                $budgetCategory = 'Medium';
                if ($specificDestination->price < 10000) {
                    $budgetCategory = 'Low';
                } elseif ($specificDestination->price > 50000) {
                    $budgetCategory = 'Expensive';
                }
                
                $destinations->prepend((object) [
                    'id' => $specificDestination->id,
                    'name' => $specificDestination->name,
                    'description' => $specificDestination->description ?? 'Amazing adventure experience in Nepal',
                    'price' => $specificDestination->price,
                    'budget_category' => $budgetCategory,
                    'duration' => $specificDestination->duration ?? '3-5 days',
                    'group_size' => '2-12 people',
                    'image' => $specificDestination->image ?? 'images/default-destination.jpg'
                ]);
            }
        }
        
        // If no destinations found, create some sample data
        if ($destinations->isEmpty()) {
            $destinations = collect([
                (object) [
                    'id' => 1,
                    'name' => 'Mardi Himal Trek',
                    'description' => 'Stunning trek with panoramic mountain views and diverse landscapes',
                    'price' => 20000,
                    'budget_category' => 'Medium',
                    'duration' => '5 days',
                    'group_size' => '2-12 people',
                    'image' => 'images/mardi-himal.jpg'
                ],
                (object) [
                    'id' => 2,
                    'name' => 'Annapurna Base Camp',
                    'description' => 'Classic trek to the base of the majestic Annapurna range',
                    'price' => 60000,
                    'budget_category' => 'Expensive',
                    'duration' => '7 days',
                    'group_size' => '2-12 people',
                    'image' => 'images/annapurna-base-camp.jpg'
                ],
                (object) [
                    'id' => 3,
                    'name' => 'Poon Hill Trek',
                    'description' => 'Short and scenic trek perfect for beginners',
                    'price' => 15000,
                    'budget_category' => 'Low',
                    'duration' => '3 days',
                    'group_size' => '2-12 people',
                    'image' => 'images/poon-hill.jpg'
                ]
            ]);
        }

        return view('pages.booking', compact('destinations', 'category', 'priceRange'));
    }

    /**
     * Process Adventure Booking
     */
    public function processAdventureBooking(Request $request)
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to complete your booking.');
        }

        // Validate the request
        $request->validate([
            'destination_id' => 'required|integer|min:1',
            'travel_date' => 'required|date|after:today',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'total_amount' => 'required|numeric|min:0',
            'special_requests' => 'nullable|string|max:1000',
        ]);

        try {
            DB::beginTransaction();

            // Get destination details
            $destination = Destination::findOrFail($request->destination_id);
            $user = auth()->user();

            // Create booking using direct database query
            $bookingId = DB::table('bookings')->insertGetId([
                'user_id' => $user->id,
                'destination_id' => $request->destination_id,
                'tour_title' => $destination->name,
                'travel_date' => $request->travel_date,
                'people' => 1, // Default to 1, can be enhanced later
                'price' => $request->total_amount,
                'status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

            return redirect()->route('booking.success', ['id' => $bookingId])
                ->with('success', 'Adventure booking created successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to create booking: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show Package Booking Form
     */
    public function showPackageBooking(Request $request)
    {
        $destination = $request->get('destination');
        $pricePerPerson = $request->get('price_per_person');
        
        // Find destination by name
        $destinationModel = Destination::where('name', 'like', '%' . $destination . '%')->first();
        
        $data = [
            'type' => 'package',
            'destination' => $destination,
            'price_per_person' => $pricePerPerson,
            'destination_id' => $destinationModel ? $destinationModel->id : null,
        ];

        return view('booking.package', compact('data'));
    }

    /**
     * Show Destination Booking Form
     */
    public function showDestinationBooking(Request $request)
    {
        $destination = $request->get('destination');
        $pricePerPerson = $request->get('price_per_person');
        
        // Find destination by name
        $destinationModel = Destination::where('name', 'like', '%' . $destination . '%')->first();
        
        $data = [
            'type' => 'destination',
            'destination' => $destination,
            'price_per_person' => $pricePerPerson,
            'destination_id' => $destinationModel ? $destinationModel->id : null,
        ];

        return view('booking.destination', compact('data'));
    }

    /**
     * Show Promotional Booking Form
     */
    public function showPromotionalBooking(Request $request)
    {
        $discountPercentage = $request->get('discount_percentage');
        $destinations = Destination::all();
        
        $data = [
            'type' => 'promotional',
            'discount_percentage' => $discountPercentage,
            'destinations' => $destinations,
        ];

        return view('booking.promotional', compact('data'));
    }

    /**
     * Store a new booking
     */
    public function storeBooking(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|integer|min:1',
            'travel_date' => 'required|date|after:today',
            'people' => 'required|integer|min:1|max:20',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
        ]);

        // Additional security validation
        $discountPercentage = (float)($request->discount_percentage ?? 0);
        
        // Prevent excessive discounts (business rule)
        if ($discountPercentage > 50) {
            return back()->with('error', 'Maximum discount allowed is 50%.')
                ->withInput();
        }

        try {
            DB::beginTransaction();

            $destination = Destination::findOrFail($request->destination_id);
            $user = Auth::user();

            // Calculate pricing
            $subtotal = $destination->price * $request->people;
            $discountPercentage = (float)($request->discount_percentage ?? 0);
            $discountAmount = $subtotal * ($discountPercentage / 100);
            $totalPrice = $subtotal - $discountAmount;

            $bookingId = DB::table('bookings')->insertGetId([
                'user_id' => $user->id,
                'destination_id' => $request->destination_id,
                'tour_title' => $destination->name,
                'travel_date' => $request->travel_date,
                'people' => $request->people,
                'price' => $totalPrice,
                'status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

            return redirect()->route('booking.form')
                ->with('success', 'Tour booked successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to create booking: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show Enhanced Booking Form (with budget tiers)
     */
    public function showEnhancedBookingForm(Request $request)
    {
        $destinations = Destination::all();
        $selectedDestinationId = $request->query('destination_id');
        
        return view('booking.enhanced-form', compact('destinations', 'selectedDestinationId'));
    }

    /**
     * Store Enhanced Booking (with budget tiers)
     */
    public function storeEnhancedBooking(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|integer|min:1',
            'budget_tier' => 'required|in:normal,medium,five_star',
            'travel_date' => 'required|date|after:today',
            'people' => 'required|integer|min:1|max:20',
        ]);

        try {
            DB::beginTransaction();

            $destination = Destination::find($request->destination_id);
            
            // If destination not found in database, create a temporary one
            if (!$destination) {
                $destination = (object) [
                    'id' => $request->destination_id,
                    'name' => 'Selected Destination',
                    'price' => 0
                ];
            }
            
            $user = Auth::user();

            // Calculate pricing based on budget tier
            $pricePerPerson = method_exists($destination, 'getPriceForTier') ? 
                $destination->getPriceForTier($request->budget_tier) : 
                $destination->price;
            $totalPrice = $pricePerPerson * $request->people;

            $bookingId = DB::table('bookings')->insertGetId([
                'user_id' => $user->id,
                'destination_id' => $request->destination_id,
                'tour_title' => $destination->name,
                'travel_date' => $request->travel_date,
                'people' => $request->people,
                'price' => $totalPrice,
                'status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

            return redirect()->route('booking.enhanced.form')
                ->with('success', 'Tour booked successfully! Your booking ID is #' . $bookingId);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to create booking: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Store a new booking with discount support
     */
    public function store(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|integer|min:1',
            'travel_date' => 'required|date|after:today',
            'people' => 'required|integer|min:1|max:20',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
        ]);

        $destination = Destination::find($request->destination_id);
        
        // If destination not found in database, create a temporary one
        if (!$destination) {
            $destination = (object) [
                'id' => $request->destination_id,
                'name' => 'Selected Destination',
                'price' => 0
            ];
        }
        $discountPercentage = (float)($request->discount_percentage ?? 0);
        
        // Security: Maximum discount allowed is 50%
        if ($discountPercentage > 50) {
            return back()->with('error', 'Maximum discount allowed is 50%.')->withInput();
        }

        $subtotal = $destination->price * $request->people;
        $discountAmount = $subtotal * ($discountPercentage / 100);
        $totalPrice = $subtotal - $discountAmount;

        $bookingId = DB::table('bookings')->insertGetId([
            'user_id' => auth()->id(),
            'destination_id' => $request->destination_id,
            'tour_title' => $destination->name,
            'travel_date' => $request->travel_date,
            'people' => $request->people,
            'price' => $totalPrice,
            'status' => 'Pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('booking')->with('success', 'Tour booked successfully!');
    }

    /**
     * Calculate pricing based on booking type
     */
    private function calculatePricing(Request $request, Destination $destination)
    {
        $type = $request->type;
        $numberOfPeople = $request->number_of_people;
        $subtotal = 0;
        $discountPercentage = 0;
        $discountAmount = 0;

        switch ($type) {
            case 'adventure':
                // For adventure bookings, use price range or destination price
                $subtotal = $destination->price ?: 15000; // Default price if not set
                break;

            case 'package':
            case 'destination':
                // For package and destination bookings, use price per person
                $pricePerPerson = $request->price_per_person ?: $destination->price;
                $subtotal = $pricePerPerson * $numberOfPeople;
                break;

            case 'promotional':
                // For promotional bookings, apply discount
                $originalPrice = $destination->price ?: 20000; // Default price
                $subtotal = $originalPrice * $numberOfPeople;
                $discountPercentage = $request->discount_percentage ?: 0;
                $discountAmount = $subtotal * ($discountPercentage / 100);
                break;
        }

        $totalPrice = $subtotal - $discountAmount;

        return [
            'subtotal' => $subtotal,
            'discount_percentage' => $discountPercentage,
            'discount_amount' => $discountAmount,
            'price' => $totalPrice,
        ];
    }

    /**
     * Show booking success page
     */
    public function success(Request $request)
    {
        $bookingId = $request->get('id');
        $booking = Booking::with(['user', 'destination'])->findOrFail($bookingId);

        return view('booking.success', compact('booking'));
    }

    /**
     * Show booking form with optional discount
     */
    public function index(Request $request)
    {
        $destinations = Destination::all();
        $discount = $request->query('discount', 0);
        $discount = max(0, min(100, (float)$discount)); // Validate discount between 0-100
        
        // Get selected destination if provided
        $selectedDestination = null;
        $destinationId = $request->query('destination_id');
        if ($destinationId) {
            $selectedDestination = Destination::find($destinationId);
        }
        
        // Get user details if authenticated
        $user = Auth::user();
        
        // Calculate pricing based on destination
        $pricing = $this->calculateDestinationPricing($selectedDestination);
        
        return view('booking.simple-booking-form', compact('destinations', 'discount', 'selectedDestination', 'user', 'pricing'));
    }

    /**
     * Show unified booking form
     */
    public function showUnifiedBookingForm(Request $request)
    {
        // Get query parameters
        $destinationTitle = $request->query('destination_title');
        $price = $request->query('price');
        $destinationId = $request->query('destination_id');
        $description = $request->query('description');
        $adventureCategory = $request->query('category');
        $adventureDestinationId = $request->query('adventure_destination');
        $specialPackageId = $request->query('special_package');
        
        // Get discount and promo status
        $discount = $request->query('discount', 0);
        $isPromo = filter_var($request->query('promo', false), FILTER_VALIDATE_BOOLEAN);
        
        $selectedDestination = null;
        $pricingTiers = null;
        $suggestedBudgetRange = 'medium';
        
        // Check if this is a special package
        if ($adventureCategory === 'special-package' && $specialPackageId) {
            // Find the special package in all categories
            $specialPackageCategories = ['honeymoon', 'family', 'romantic', 'luxury'];
            $specialPackage = null;
            $packageCategory = null;
            
            foreach ($specialPackageCategories as $category) {
                $package = SpecialPackageService::getPackage($category, $specialPackageId);
                if ($package) {
                    $specialPackage = $package;
                    $packageCategory = $category;
                    break;
                }
            }
            
            if ($specialPackage) {
                // Convert special package ID to numeric ID
                $numericId = $this->convertSpecialPackageIdToNumeric($specialPackageId, $packageCategory);
                
                $selectedDestination = (object) [
                    'id' => $numericId,
                    'name' => $specialPackage['name'],
                    'description' => $specialPackage['description'],
                    'price' => $specialPackage['pricing']['medium'], // Default to medium
                    'image' => $specialPackage['image'],
                    'duration' => $specialPackage['duration'],
                    'difficulty' => $specialPackage['difficulty'],
                    'highlights' => $specialPackage['highlights'],
                    'category' => $packageCategory,
                    'package_id' => $specialPackageId // Keep original ID for reference
                ];
                
                $pricingTiers = SpecialPackageService::getPricingTiers($specialPackage);
                $suggestedBudgetRange = SpecialPackageService::getSuggestedBudgetRange($specialPackage);
            }
        }
        // Check if this is an adventure destination
        elseif ($adventureCategory && $adventureDestinationId) {
            // Check if it's an adventure category first
            $adventureCategories = ['rafting', 'paragliding', 'trekking', 'bungee', 'mountain-biking', 'rock-climbing'];
            
            if (in_array($adventureCategory, $adventureCategories)) {
                $adventureDestination = AdventureDestinationService::getDestination($adventureCategory, $adventureDestinationId);
                
                if ($adventureDestination) {
                    // Convert adventure destination ID to numeric ID
                    $numericId = $this->convertAdventureIdToNumeric($adventureDestinationId, $adventureCategory);
                    
                    $selectedDestination = (object) [
                        'id' => $numericId,
                        'name' => $adventureDestination['name'],
                        'description' => $adventureDestination['description'],
                        'price' => $adventureDestination['pricing']['medium'], // Default to medium
                        'image' => $adventureDestination['image'],
                        'duration' => $adventureDestination['duration'],
                        'difficulty' => $adventureDestination['difficulty'],
                        'highlights' => $adventureDestination['highlights'],
                        'category' => $adventureCategory,
                        'adventure_id' => $adventureDestinationId // Keep original ID for reference
                    ];
                    
                    $pricingTiers = AdventureDestinationService::getPricingTiers($adventureDestination);
                    $suggestedBudgetRange = AdventureDestinationService::getSuggestedBudgetRange($adventureDestination);
                }
            } else {
                // Handle other destination categories (culture, nature, spiritual, historical)
                $destination = DestinationService::getDestination($adventureCategory, $adventureDestinationId);
                
                if ($destination) {
                    // Convert destination ID to numeric ID
                    $numericId = $this->convertDestinationIdToNumeric($adventureDestinationId, $adventureCategory);
                    
                    $selectedDestination = (object) [
                        'id' => $numericId,
                        'name' => $destination['name'],
                        'description' => $destination['description'],
                        'price' => $destination['pricing']['medium'], // Default to medium
                        'image' => $destination['image'],
                        'duration' => $destination['duration'],
                        'difficulty' => $destination['difficulty'],
                        'highlights' => $destination['highlights'],
                        'category' => $adventureCategory,
                        'destination_id' => $adventureDestinationId // Keep original ID for reference
                    ];
                    
                    $pricingTiers = DestinationService::getPricingTiers($destination);
                    $suggestedBudgetRange = DestinationService::getSuggestedBudgetRange($destination);
                }
            }
        }
        
        // If not an adventure destination, handle regular destinations
        if (!$selectedDestination) {
            // Prioritize URL parameters over database lookup
            if ($destinationTitle && $price) {
                // Create destination object from URL parameters (prioritize these)
                $selectedDestination = (object) [
                    'id' => (int) ($destinationId ?? 1),
                    'name' => $destinationTitle,
                    'description' => $description ?? 'Amazing destination for your next adventure',
                    'price' => (float) $price,
                    'image' => 'images/default-destination.jpg'
                ];
            } elseif ($destinationId && is_numeric($destinationId)) {
                // Try to find the destination in database as fallback
                $selectedDestination = Destination::find($destinationId);
                
                // If not found in database, create a default one
                if (!$selectedDestination) {
                    $selectedDestination = (object) [
                        'id' => (int) $destinationId,
                        'name' => 'Selected Destination',
                        'description' => 'Amazing destination for your next adventure',
                        'price' => 0,
                        'image' => 'images/default-destination.jpg'
                    ];
                }
            } else {
                // Default fallback - get first available destination
                $firstDestination = Destination::first();
                if ($firstDestination) {
                    $selectedDestination = $firstDestination;
                } else {
                    $selectedDestination = (object) [
                        'id' => 1,
                        'name' => 'Selected Destination',
                        'description' => 'Amazing destination for your next adventure',
                        'price' => 0,
                        'image' => 'images/default-destination.jpg'
                    ];
                }
            }
            
            // Determine budget range based on price
            $suggestedBudgetRange = $this->getBudgetRangeFromPrice($selectedDestination->price);
        }
        
        // Get user if authenticated
        $user = Auth::user();
        
        return view('booking.unified-booking-form', compact(
            'selectedDestination', 
            'suggestedBudgetRange', 
            'pricingTiers',
            'user',
            'discount',
            'isPromo'
        ));
    }
    
    /**
     * Get budget range suggestion based on price
     */
    private function getBudgetRangeFromPrice($price)
    {
        if ($price <= 15000) {
            return 'Low';
        } elseif ($price <= 50000) {
            return 'Medium';
        } else {
            return 'Expensive';
        }
    }

    /**
     * Convert adventure destination ID to numeric ID
     */
    private function convertAdventureIdToNumeric($adventureId, $category)
    {
        // Create a mapping of adventure destinations to numeric IDs
        $adventureMapping = [
            'rafting' => [
                'seti-river' => 16,
                'kaligandaki-river' => 17,
                'trishuli-river' => 18,
            ],
            'paragliding' => [
                'pokhara-paragliding' => 19,
                'kathmandu-paragliding' => 20,
            ],
            'trekking' => [
                'everest-base-camp' => 21,
                'annapurna-circuit' => 22,
                'langtang-trek' => 23,
            ],
            'bungee' => [
                'kushma-bungee' => 24,
                'pokhara-bungee' => 25,
            ],
            'mountain-biking' => [
                'kathmandu-valley' => 26,
                'pokhara-mountain-biking' => 27,
            ],
            'rock-climbing' => [
                'nagarkot-rock-climbing' => 28,
                'pokhara-rock-climbing' => 29,
            ]
        ];

        return $adventureMapping[$category][$adventureId] ?? 30; // Default fallback ID
    }

    /**
     * Convert destination category ID to numeric ID
     */
    private function convertDestinationIdToNumeric($destinationId, $category)
    {
        // Create a mapping of destination categories to numeric IDs
        $destinationMapping = [
            'culture' => [
                'kathmandu-durbar-square' => 31,
                'bhaktapur-durbar-square' => 32,
                'patan-durbar-square' => 33,
                'swayambhunath' => 34,
                'boudhanath' => 35,
                'pashupatinath' => 36,
            ],
            'nature' => [
                'chitwan-national-park' => 37,
                'bardiya-national-park' => 38,
                'sagarmatha-national-park' => 39,
                'langtang-national-park' => 40,
                'rara-lake' => 41,
                'phoksundo-lake' => 42,
            ],
            'spiritual' => [
                'lumbini' => 43,
                'muktinath' => 44,
                'gosaikunda' => 45,
                'pathivara' => 46,
                'manakamana' => 47,
                'janakpur' => 48,
            ],
            'historical' => [
                'kathmandu-heritage' => 49,
                'bhaktapur-heritage' => 50,
                'patan-heritage' => 51,
                'gorkha-palace' => 52,
                'nagarkot-fort' => 53,
                'changunarayan' => 54,
            ]
        ];

        return $destinationMapping[$category][$destinationId] ?? 55; // Default fallback ID
    }

    /**
     * Convert special package ID to numeric ID
     */
    private function convertSpecialPackageIdToNumeric($packageId, $category)
    {
        // Create a mapping of special packages to numeric IDs
        $packageMapping = [
            'honeymoon' => [
                'pokhara-honeymoon' => 56,
                'kathmandu-honeymoon' => 57,
                'mountain-honeymoon' => 58,
                'luxury-honeymoon' => 59,
            ],
            'family' => [
                'kathmandu-family' => 60,
                'pokhara-family' => 61,
                'chitwan-family' => 62,
                'mountain-family' => 63,
            ],
            'luxury' => [
                'luxury-himalayan' => 64,
                'luxury-safari' => 65,
                'luxury-cultural' => 66,
                'luxury-spiritual' => 67,
            ],
            'romantic' => [
                'kathmandu-romance' => 68,
                'pokhara-romance' => 69,
                'heritage-romance' => 70,
                'mountain-romance' => 71,
            ]
        ];

        return $packageMapping[$category][$packageId] ?? 72; // Default fallback ID
    }

    /**
     * Store unified booking
     */
    public function storeUnifiedBooking(Request $request)
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to book a tour.');
        }
        
        $request->validate([
            'destination_id' => 'required|integer|min:1',
            'travel_date' => 'required|date|after:today',
            'people' => 'required|integer|min:1|max:20',
            'budget_tier' => 'required_if:entry_point,category|required_if:entry_point,special|in:normal,medium,five_star',
            'budget_multiplier' => 'nullable|numeric|min:0.1|max:3.0',
            'special_requests' => 'nullable|string|max:1000',
        ]);

        try {
            DB::beginTransaction();

            // Try to find destination in database, if not found, create a temporary one
            $destination = Destination::find($request->destination_id);
            if (!$destination) {
                // Create a temporary destination for booking
                $destination = new Destination();
                $destination->id = $request->destination_id;
                $destination->name = $request->destination_title ?? 'Selected Destination';
                $destination->price = $request->price ?? 0;
                $destination->description = $request->description ?? 'Amazing destination for your next adventure';
            }
            $entryPoint = $request->entry_point ?? 'homepage';
            
            // Calculate pricing based on entry point and budget multiplier
            $basePrice = $destination->price;
            
            if ($entryPoint === 'category' || $entryPoint === 'special') {
                // Tiered pricing
                if (method_exists($destination, 'getPriceForTier')) {
                    $pricePerPerson = $destination->getPriceForTier($request->budget_tier);
                } else {
                    // Fallback for temporary destinations
                    $pricePerPerson = $basePrice;
                }
                $budgetTier = $request->budget_tier;
            } else {
                // Fixed pricing with budget multiplier
                $budgetMultiplier = $request->budget_multiplier ?? 1.0;
                $pricePerPerson = $basePrice * $budgetMultiplier;
                $budgetTier = null;
            }
            
            $totalPrice = $pricePerPerson * $request->people;

            $bookingId = DB::table('bookings')->insertGetId([
                'user_id' => auth()->id(),
                'destination_id' => $request->destination_id,
                'tour_title' => $destination->name,
                'travel_date' => $request->travel_date,
                'people' => $request->people,
                'price' => $totalPrice,
                'status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

            return redirect()->route('booking.confirmation', ['id' => $bookingId])
                ->with('success', 'Booking created successfully! Please proceed with payment.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to create booking: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show booking confirmation page
     */
    public function showConfirmation($id)
    {
        $booking = Booking::with(['user', 'destination'])->findOrFail($id);
        
        // Ensure user can only view their own booking
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access to booking details.');
        }
        
        return view('booking.confirmation', compact('booking'));
    }

    /**
     * Confirm booking (simulate payment completion)
     */
    public function confirmBooking($id)
    {
        try {
            $booking = Booking::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();
            
            $booking->update(['status' => 'Confirmed']);
            
            return response()->json([
                'success' => true,
                'message' => 'Booking confirmed successfully!'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to confirm booking: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show specific booking details
     */
    public function showBooking($id)
    {
        $booking = Booking::with(['user', 'destination'])
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('booking.show', compact('booking'));
    }

    // ========================================
    // SIMPLE BOOKING FLOW (Non-breaking)
    // ========================================

    /**
     * Show the simple booking form with autofilled data
     */
    public function showSimpleBookingForm(Request $request)
    {
        // Get destination ID from query parameter or default to first destination
        $destinationId = $request->query('destination_id');
        $selectedDestination = null;
        
        if ($destinationId) {
            $selectedDestination = Destination::find($destinationId);
        }
        
        // If no destination found, get the first available destination as fallback
        if (!$selectedDestination) {
            $selectedDestination = Destination::first();
        }
        
        
        // Get all destinations for the dropdown
        $destinations = Destination::all();
        
        // Get user details if authenticated
        $user = Auth::user();
        
        // Calculate pricing based on destination
        $pricing = $this->calculateDestinationPricing($selectedDestination);
        
        return view('booking.simple-booking-form', compact(
            'destinations', 
            'selectedDestination', 
            'user', 
            'pricing'
        ));
    }

    /**
     * Store the simple booking
     */
    public function storeSimpleBooking(Request $request)
    {
        // Basic validation
        $request->validate([
            'destination_id' => 'required|integer|min:1',
            'travel_date' => 'required|date|after:today',
            'people' => 'required|integer|min:1|max:20',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        try {
            DB::beginTransaction();

            $destination = Destination::find($request->destination_id);
            
            // If destination not found in database, create a temporary one
            if (!$destination) {
                $destination = (object) [
                    'id' => $request->destination_id,
                    'name' => 'Selected Destination',
                    'price' => 0
                ];
            }
            
            // Calculate total price
            $pricing = $this->calculateDestinationPricing($destination);
            $totalPrice = $pricing['price_per_person'] * $request->people;

            // Create booking
            $bookingId = DB::table('bookings')->insertGetId([
                'user_id' => Auth::id() ?? null, // Allow guest bookings
                'destination_id' => $request->destination_id,
                'tour_title' => $destination->name,
                'travel_date' => $request->travel_date,
                'people' => $request->people,
                'price' => $totalPrice,
                'status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

            return redirect()->route('booking.simple.success', ['id' => $bookingId])
                ->with('success', 'Booking created successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to create booking: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show booking success page
     */
    public function showSimpleBookingSuccess($id)
    {
        $booking = Booking::with(['destination'])->findOrFail($id);
        
        return view('booking.simple-success', compact('booking'));
    }

    /**
     * Calculate pricing for a destination
     * This is a helper method that can be easily maintained
     */
    private function calculateDestinationPricing($destination)
    {
        if (!$destination) {
            return [
                'price_per_person' => 0,
                'currency' => 'Rs',
                'description' => 'No pricing available'
            ];
        }

        // Use the destination's base price
        $basePrice = $destination->price ?? 0;
        
        return [
            'price_per_person' => $basePrice,
            'currency' => 'Rs',
            'description' => 'Per person pricing'
        ];
    }

    // ========================================
    // NEW BOOKING FLOW WITH LOGIN ENFORCEMENT
    // ========================================

    /**
     * Show booking form with login enforcement
     */
    public function showLoginEnforcedBookingForm(Request $request)
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            // For promo bookings, show the form without login requirement
            if ($request->query('promo') === 'true' || $request->query('promo') === true) {
                // Allow promo bookings to be viewed without login
            } else {
                // Save pending booking data in session
                session(['pending_booking' => [
                    'destination_id' => $request->query('destination_id'),
                    'destination_title' => $request->query('destination_title'),
                    'price' => $request->query('price'),
                    'num_people' => $request->query('num_people', 1),
                    'travel_date' => $request->query('travel_date'),
                    'name' => $request->query('name'),
                    'email' => $request->query('email'),
                    'phone' => $request->query('phone'),
                    'discount' => $request->query('discount', 0),
                    'promo' => $request->query('promo', false)
                ]]);
                
                return redirect()->route('login')->with('error', 'Please login to complete your booking.');
            }
        }

        // Get pending booking data if available
        $pendingBooking = session('pending_booking', []);
        
        // If no pending booking in session, get from URL parameters
        if (empty($pendingBooking)) {
            $pendingBooking = [
                'destination_id' => $request->query('destination_id'),
                'destination_title' => $request->query('destination_title'),
                'price' => $request->query('price'),
                'num_people' => $request->query('num_people', 1),
                'travel_date' => $request->query('travel_date'),
                'name' => $request->query('name'),
                'email' => $request->query('email'),
                'phone' => $request->query('phone'),
                'discount' => $request->query('discount', 0),
                'promo' => $request->query('promo', false)
            ];
        }
        
        // Clear pending booking from session
        session()->forget('pending_booking');

        // Get discount and promo status
        $discount = $pendingBooking['discount'] ?? $request->query('discount', 0);
        $isPromo = filter_var($pendingBooking['promo'] ?? $request->query('promo', false), FILTER_VALIDATE_BOOLEAN);

        // Get destination details - prioritize URL parameters over database
        $destinationId = $pendingBooking['destination_id'] ?? $request->query('destination_id');
        $destinationTitle = $pendingBooking['destination_title'] ?? $request->query('destination_title');
        $destinationPrice = $pendingBooking['price'] ?? $request->query('price');
        $destinationDescription = $pendingBooking['description'] ?? $request->query('description');
        
        // Create destination object from URL parameters (prioritize these over database)
        if ($destinationTitle && $destinationPrice) {
            $destination = (object) [
                'id' => $destinationId ?? 1,
                'name' => $destinationTitle,
                'description' => $destinationDescription ?? 'Amazing destination for your next adventure',
                'price' => (float) $destinationPrice
            ];
        } else {
            // Fallback: try to find in database
            if ($destinationId) {
                $destination = Destination::find($destinationId);
            }
            
            // If still no destination, create a default one
            if (!$destination) {
                $destination = (object) [
                    'id' => 1,
                    'name' => 'Selected Destination',
                    'description' => 'Amazing destination for your next adventure',
                    'price' => 0
                ];
            }
        }

        // Apply discount to price if it's a promo booking
        if ($isPromo && $discount > 0 && $destination) {
            $originalPrice = $destination->price ?? $pendingBooking['price'] ?? 0;
            $discountedPrice = $originalPrice * (1 - $discount / 100);
            $destination->price = $discountedPrice;
            $destination->original_price = $originalPrice;
            $destination->discount_percentage = $discount;
        }

        // Get user details (null if not logged in)
        $user = auth()->user();

        return view('booking.booking-form', compact('destination', 'user', 'pendingBooking', 'discount', 'isPromo'));
    }

    /**
     * Process booking with login enforcement
     */
    public function processBooking(Request $request)
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            // Save pending booking data in session
            session(['pending_booking' => $request->all()]);
            return redirect()->route('login')->with('error', 'Please login to complete your booking.');
        }

        // Validate the request
        $request->validate([
            'destination_id' => 'required|integer|min:1',
            'destination_title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'num_people' => 'required|integer|min:1|max:20',
            'travel_date' => 'required|date|after:today',
        ]);

        try {
            DB::beginTransaction();

            // Get destination details (handle missing destinations gracefully)
            $destination = Destination::find($request->destination_id);
            $user = auth()->user();
            
            // If destination not found in database, use the provided data
            if (!$destination) {
                $destination = (object) [
                    'id' => $request->destination_id,
                    'name' => $request->destination_title,
                    'price' => $request->price
                ];
            }

            // Create booking using direct database query to avoid mass assignment issues
            $bookingId = DB::table('bookings')->insertGetId([
                'user_id' => $user->id,
                'destination_id' => $request->destination_id,
                'tour_title' => $request->destination_title,
                'travel_date' => $request->travel_date,
                'people' => $request->num_people,
                'price' => $request->total_amount,
                'status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();
            
            // Debug: Log the created booking ID
            \Log::info('Main Booking - Created booking ID: ' . $bookingId);

            return redirect()->route('booking.success', ['id' => $bookingId])
                ->with('success', 'Booking created successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to create booking: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show booking success page
     */
    public function showBookingSuccess($id)
    {
        // Get booking details using direct database query
        $booking = DB::table('bookings')
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->first();
        
        if (!$booking) {
            abort(404, 'Booking not found');
        }
        
        // Get user details
        $user = DB::table('users')->where('id', $booking->user_id)->first();
        
        // Get destination details
        $destination = DB::table('destinations')->where('id', $booking->destination_id)->first();
        
        // Add user and destination data to booking object
        $booking->user = $user;
        $booking->destination = $destination;
        
        return view('booking.success', compact('booking'));
    }
}