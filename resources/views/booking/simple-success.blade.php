@extends('layouts.app')

@section('title', 'Booking Confirmed - Tour Sphere')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Success Header -->
        <div class="text-center mb-8">
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-4">
                <i class="fas fa-check text-2xl text-green-600"></i>
            </div>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Booking Confirmed!</h1>
            <p class="text-lg text-gray-600">Your adventure is officially booked. We'll be in touch soon!</p>
        </div>

        <!-- Booking Details -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
            <div class="px-8 py-6 bg-blue-50 border-b border-blue-200">
                <h2 class="text-2xl font-semibold text-blue-900">Booking Details</h2>
                <p class="text-blue-700">Booking ID: #{{ $booking->id }}</p>
            </div>
            
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Destination Info -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Destination</h3>
                        <div class="flex items-start space-x-4">
                            @if($booking->destination->image)
                                <img src="{{ asset('images/' . $booking->destination->image) }}" 
                                     alt="{{ $booking->destination->name }}" 
                                     class="w-20 h-20 object-cover rounded-lg">
                            @endif
                            <div>
                                <h4 class="text-xl font-semibold text-gray-900">{{ $booking->destination->name }}</h4>
                                <p class="text-gray-600">{{ $booking->destination->description }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Travel Details -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Travel Details</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Travel Date:</span>
                                <span class="font-medium">{{ \Carbon\Carbon::parse($booking->travel_date)->format('M d, Y') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Number of People:</span>
                                <span class="font-medium">{{ $booking->people }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-medium">
                                    {{ $booking->status }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Price Summary -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Price Summary</h3>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Price per person:</span>
                                <span class="font-medium">Rs {{ number_format($booking->price_per_person, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Number of people:</span>
                                <span class="font-medium">{{ $booking->people }}</span>
                            </div>
                            <hr class="my-2">
                            <div class="flex justify-between text-xl font-bold">
                                <span>Total Price:</span>
                                <span class="text-blue-600">Rs {{ number_format($booking->price, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                @if($booking->special_requests)
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Special Requests</h3>
                        <p class="text-gray-600 bg-gray-50 p-3 rounded-lg">{{ $booking->special_requests }}</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Next Steps -->
        <div class="bg-blue-50 rounded-lg p-6 mb-8">
            <h3 class="text-lg font-semibold text-blue-900 mb-4">What's Next?</h3>
            <div class="space-y-3">
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <i class="fas fa-envelope text-blue-600 mt-1"></i>
                    </div>
                    <div>
                        <p class="text-blue-800 font-medium">Confirmation Email</p>
                        <p class="text-blue-700 text-sm">You'll receive a confirmation email with all the details shortly.</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <i class="fas fa-phone text-blue-600 mt-1"></i>
                    </div>
                    <div>
                        <p class="text-blue-800 font-medium">Travel Coordinator Contact</p>
                        <p class="text-blue-700 text-sm">Our travel coordinator will contact you within 24 hours to discuss your trip details.</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <i class="fas fa-calendar-alt text-blue-600 mt-1"></i>
                    </div>
                    <div>
                        <p class="text-blue-800 font-medium">Pre-Trip Preparation</p>
                        <p class="text-blue-700 text-sm">We'll send you a detailed itinerary and preparation guide before your travel date.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="text-center space-x-4">
            <a href="{{ route('home') }}" 
               class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                <i class="fas fa-home mr-2"></i>
                Back to Home
            </a>
            
            @auth
                <a href="{{ route('user.dashboard') }}" 
                   class="inline-flex items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                    <i class="fas fa-tachometer-alt mr-2"></i>
                    View Dashboard
                </a>
            @endauth
        </div>
    </div>
</div>
@endsection

