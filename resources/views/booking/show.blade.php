@extends('layouts.app')

@section('title', 'Booking Details - #' . $booking->id)

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Booking Details</h1>
                    <p class="text-lg text-gray-600">Booking #{{ $booking->id }}</p>
                </div>
                <div class="flex items-center space-x-3">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                        @if($booking->status == 'pending') bg-yellow-100 text-yellow-800
                        @elseif($booking->status == 'confirmed') bg-green-100 text-green-800
                        @elseif($booking->status == 'cancelled') bg-red-100 text-red-800
                        @else bg-gray-100 text-gray-800 @endif">
                        {{ ucfirst($booking->status) }}
                    </span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Destination Information -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Destination Information</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Destination</label>
                            <p class="text-lg text-gray-900">{{ $booking->destination->name }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Package Type</label>
                            <p class="text-lg text-gray-900 capitalize">{{ $booking->package_type }}</p>
                        </div>
                        
                        @if($booking->destination->description)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Description</label>
                            <p class="text-gray-900">{{ $booking->destination->description }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Travel Details -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Travel Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Travel Date</label>
                            <p class="text-lg text-gray-900">{{ \Carbon\Carbon::parse($booking->travel_date)->format('M d, Y') }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Number of People</label>
                            <p class="text-lg text-gray-900">{{ $booking->number_of_people }} {{ $booking->number_of_people == 1 ? 'person' : 'people' }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Booking Date</label>
                            <p class="text-lg text-gray-900">{{ \Carbon\Carbon::parse($booking->created_at)->format('M d, Y \a\t g:i A') }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Last Updated</label>
                            <p class="text-lg text-gray-900">{{ \Carbon\Carbon::parse($booking->updated_at)->format('M d, Y \a\t g:i A') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Special Requests -->
                @if($booking->special_requests)
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Special Requests</h2>
                    <p class="text-gray-900 bg-gray-50 p-4 rounded-lg">{{ $booking->special_requests }}</p>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Price Breakdown -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Price Breakdown</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal:</span>
                            <span class="font-medium">Rs {{ number_format($booking->price) }}</span>
                        </div>
                        
                        @if($booking->discount_percentage > 0)
                        <div class="flex justify-between text-red-600">
                            <span>Discount ({{ $booking->discount_percentage }}%):</span>
                            <span class="font-medium">-Rs {{ number_format($booking->discount_amount) }}</span>
                        </div>
                        @endif
                        
                        <div class="border-t pt-3">
                            <div class="flex justify-between text-xl font-bold">
                                <span>Total Price:</span>
                                <span class="text-green-600">Rs {{ number_format($booking->price) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Actions -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Actions</h2>
                    <div class="space-y-3">
                        <a href="{{ route('booking.form') }}" 
                           class="w-full inline-flex justify-center items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to Bookings
                        </a>
                        
                        @if($booking->status == 'pending')
                        <button onclick="alert('Contact support to cancel your booking')" 
                                class="w-full inline-flex justify-center items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Cancel Booking
                        </button>
                        @endif
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Need Help?</h2>
                    <div class="space-y-3">
                        <p class="text-sm text-gray-600">If you have any questions about your booking, please contact our support team.</p>
                        <div class="space-y-2">
                            <p class="text-sm text-gray-600">
                                <span class="font-medium">Email:</span> support@travel.com
                            </p>
                            <p class="text-sm text-gray-600">
                                <span class="font-medium">Phone:</span> +977-1-1234567
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
