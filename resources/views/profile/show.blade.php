@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">My Profile</h1>
            <p class="text-lg text-gray-600">Manage your account and view booking history</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- User Details -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">User Details</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Name</label>
                            <p class="text-lg text-gray-900">{{ $user->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Email</label>
                            <p class="text-lg text-gray-900">{{ $user->email }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Member Since</label>
                            <p class="text-lg text-gray-900">{{ \Carbon\Carbon::parse($user->created_at)->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking History -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Booking History</h2>
                    
                    @if($bookings->count() > 0)
                        <div class="space-y-4">
                            @foreach($bookings as $booking)
                            <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $booking->destination->name }}</h3>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($booking->status == 'Pending') bg-yellow-100 text-yellow-800
                                        @elseif($booking->status == 'Confirmed') bg-green-100 text-green-800
                                        @elseif($booking->status == 'Cancelled') bg-red-100 text-red-800
                                        @else bg-gray-100 text-gray-800 @endif">
                                        {{ $booking->status }}
                                    </span>
                                </div>
                                
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                                    <div>
                                        <span class="text-gray-500">Travel Date:</span>
                                        <p class="font-medium">{{ \Carbon\Carbon::parse($booking->travel_date)->format('M d, Y') }}</p>
                                    </div>
                                    <div>
                                        <span class="text-gray-500">People:</span>
                                        <p class="font-medium">{{ $booking->people }} {{ $booking->people == 1 ? 'person' : 'people' }}</p>
                                    </div>
                                    <div>
                                        <span class="text-gray-500">Total Price:</span>
                                        <p class="font-medium text-green-600">{{ $booking->formatted_price }}</p>
                                    </div>
                                    <div>
                                        <span class="text-gray-500">Booked On:</span>
                                        <p class="font-medium">{{ \Carbon\Carbon::parse($booking->created_at)->format('M d, Y') }}</p>
                                    </div>
                                </div>
                                
                                @if($booking->discount_percentage > 0)
                                <div class="mt-3 p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <div class="flex justify-between items-center text-sm">
                                        <div>
                                            <span class="text-red-600 font-medium">Special Offer Applied!</span>
                                            <p class="text-gray-600">{{ $booking->discount_percentage }}% discount</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-gray-500">Original: Rs {{ number_format($booking->price ?? 0) }}</p>
                                            <p class="text-red-600 font-medium">Saved: Rs {{ number_format($booking->discount_amount ?? 0) }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <!-- Action Buttons -->
                                <div class="mt-4 flex flex-wrap gap-2">
                                    @if($booking->canBeCancelled())
                                        <form action="{{ route('booking.cancel', $booking->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to cancel this booking?')">
                                            @csrf
                                            <button type="submit" class="inline-flex items-center px-3 py-2 border border-red-300 shadow-sm text-sm leading-4 font-medium rounded-md text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                                Cancel Booking
                                            </button>
                                        </form>
                                    @endif

                                    @if($booking->canBeReviewed())
                                        <a href="{{ route('review.create', $booking->id) }}" class="inline-flex items-center px-3 py-2 border border-blue-300 shadow-sm text-sm leading-4 font-medium rounded-md text-blue-700 bg-white hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                            </svg>
                                            Write Review
                                        </a>
                                    @endif

                                    @if($booking->hasReview())
                                        <span class="inline-flex items-center px-3 py-2 border border-green-300 shadow-sm text-sm leading-4 font-medium rounded-md text-green-700 bg-green-50">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Review Submitted
                                        </span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        @if($bookings->hasPages())
                        <div class="mt-6">
                            {{ $bookings->links() }}
                        </div>
                        @endif

                    @else
                        <!-- Empty State -->
                        <div class="text-center py-12">
                            <div class="mx-auto flex items-center justify-center h-24 w-24 rounded-full bg-gray-100 mb-4">
                                <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">No bookings found</h3>
                            <p class="text-gray-500 mb-6">You haven't made any bookings yet. Start exploring our destinations!</p>
                            <a href="{{ route('booking.form') }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Book a Tour
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
