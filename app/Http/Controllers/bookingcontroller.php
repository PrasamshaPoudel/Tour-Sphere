<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    /**
     * Display the booking form
     */
    public function index(Request $request)
    {
        // Sample tour data - in a real app, this would come from a database
        $tourCategories = [
            'adventure' => 'Adventure Tours',
            'cultural' => 'Cultural Tours',
            'spiritual' => 'Spiritual Tours',
            'nature' => 'Nature Tours',
            'historical' => 'Historical Tours',
            'custom' => 'Custom Package'
        ];

        $popularTours = [
            'everest-base-camp' => 'Everest Base Camp Trek',
            'annapurna-circuit' => 'Annapurna Circuit Trek',
            'pokhara-paragliding' => 'Pokhara Paragliding',
            'bhaktapur-heritage' => 'Bhaktapur Heritage Tour',
            'lumbini-pilgrimage' => 'Lumbini Pilgrimage Tour',
            'chitwan-safari' => 'Chitwan Wildlife Safari',
            'rafting-trishuli' => 'Trishuli River Rafting',
            'bungee-jump' => 'Bungee Jumping',
            'mountain-biking' => 'Mountain Biking'
        ];

        // Get pre-selected values from URL parameters
        $selectedCategory = $request->get('category');
        $selectedTour = $request->get('tour');

        return view('pages.booking', compact('tourCategories', 'popularTours', 'selectedCategory', 'selectedTour'));
    }

    /**
     * Store a new booking
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'tour_category' => 'required|string',
            'tour_id' => 'required|string',
            'people' => 'required|integer|min:1|max:20',
            'travel_date' => 'required|date|after:today',
            'duration' => 'nullable|string',
            'budget' => 'nullable|string',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'special_requests' => 'nullable|string',
            'terms_accepted' => 'required|accepted'
        ]);

        try {
            // Generate a unique booking reference
            $bookingReference = 'TS-' . strtoupper(uniqid());
            
            // In a real application, you would:
            // 1. Save the booking to the database
            // 2. Send confirmation emails
            // 3. Process payment
            // 4. Send notifications to staff
            
            // For now, we'll just log the booking and send a success response
            Log::info('New booking received', [
                'reference' => $bookingReference,
                'customer' => $validated['first_name'] . ' ' . $validated['last_name'],
                'tour' => $validated['tour_id'],
                'date' => $validated['travel_date']
            ]);

            // Send confirmation email (you'll need to configure your mail settings)
            // $this->sendBookingConfirmation($validated, $bookingReference);

            // Return success response
            return redirect()->back()->with('success', [
                'message' => 'Booking submitted successfully!',
                'reference' => $bookingReference,
                'details' => 'We will contact you within 24 hours to confirm your booking and discuss payment options.'
            ]);

        } catch (\Exception $e) {
            Log::error('Booking failed', [
                'error' => $e->getMessage(),
                'data' => $validated
            ]);

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Sorry, there was an error processing your booking. Please try again or contact us directly.']);
        }
    }

    /**
     * Send booking confirmation email
     */
    private function sendBookingConfirmation($data, $reference)
    {
        // This is a placeholder for email functionality
        // You'll need to create email templates and configure your mail settings
        
        $emailData = [
            'reference' => $reference,
            'customer_name' => $data['first_name'] . ' ' . $data['last_name'],
            'tour' => $data['tour_id'],
            'travel_date' => $data['travel_date'],
            'people' => $data['people']
        ];

        // Example email sending (uncomment when mail is configured)
        // Mail::to($data['email'])->send(new BookingConfirmation($emailData));
        // Mail::to('bookings@toursphere.com')->send(new NewBookingNotification($emailData));
    }

    /**
     * Get available tours based on category
     */
    public function getToursByCategory($category)
    {
        // This would typically query your database
        $tours = [
            'adventure' => [
                'everest-base-camp' => 'Everest Base Camp Trek',
                'annapurna-circuit' => 'Annapurna Circuit Trek',
                'pokhara-paragliding' => 'Pokhara Paragliding',
                'rafting-trishuli' => 'Trishuli River Rafting',
                'bungee-jump' => 'Bungee Jumping',
                'rock-climbing' => 'Rock Climbing'
            ],
            'cultural' => [
                'bhaktapur-heritage' => 'Bhaktapur Heritage Tour',
                'kathmandu-durbar' => 'Kathmandu Durbar Square',
                'patan-museum' => 'Patan Museum Tour',
                'newari-cuisine' => 'Newari Cuisine Experience',
                'festival-tour' => 'Festival Celebration Tour'
            ],
            'spiritual' => [
                'lumbini-pilgrimage' => 'Lumbini Pilgrimage Tour',
                'pashupatinath-temple' => 'Pashupatinath Temple',
                'muktinath-temple' => 'Muktinath Temple',
                'meditation-retreat' => 'Meditation Retreat',
                'monastery-stay' => 'Monastery Stay Experience'
            ],
            'nature' => [
                'chitwan-safari' => 'Chitwan Wildlife Safari',
                'rara-lake' => 'Rara Lake Trek',
                'pokhara-lakes' => 'Pokhara Lakes Tour',
                'bird-watching' => 'Bird Watching Tour',
                'botanical-gardens' => 'Botanical Gardens'
            ],
            'historical' => [
                'bhaktapur-ancient' => 'Bhaktapur Ancient City',
                'patan-heritage' => 'Patan Heritage Walk',
                'kathmandu-old' => 'Old Kathmandu Tour',
                'gorkha-palace' => 'Gorkha Palace Tour',
                'archaeological-sites' => 'Archaeological Sites'
            ]
        ];

        return response()->json($tours[$category] ?? []);
    }
}
