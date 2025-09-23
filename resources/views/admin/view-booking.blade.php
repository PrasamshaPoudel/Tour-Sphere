@extends('layouts.app')

@section('title', 'View Booking - Admin Panel')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Booking Details</h1>
                    <p class="text-gray-600">Booking #{{ $booking->id }}</p>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="bg-yellow-600 text-white px-4 py-2 rounded-md hover:bg-yellow-700">
                        Edit Booking
                    </a>
                    <a href="{{ route('admin.bookings') }}" class="text-gray-500 hover:text-gray-700">
                        ← Back to Bookings
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Booking Details -->
            <div class="lg:col-span-2">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-6">Booking Information</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Booking ID</label>
                                <p class="mt-1 text-sm text-gray-900">#{{ $booking->id }}</p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Status</label>
                                <span class="mt-1 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    @if($booking->status === 'confirmed') bg-green-100 text-green-800
                                    @elseif($booking->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($booking->status === 'cancelled') bg-red-100 text-red-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Travel Date</label>
                                <p class="mt-1 text-sm text-gray-900">
                                    {{ isset($booking->travel_date) && $booking->travel_date ? \Carbon\Carbon::parse($booking->travel_date)->format('M d, Y') : 'Not set' }}
                                </p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Number of People</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $booking->number_of_people ?? $booking->people ?? 'N/A' }}</p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Total Price</label>
                                <p class="mt-1 text-sm text-gray-900 font-semibold">Rs {{ number_format($booking->price ?? 0, 2) }}</p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Created At</label>
                                <p class="mt-1 text-sm text-gray-900">
                                    {{ isset($booking->created_at) && $booking->created_at ? \Carbon\Carbon::parse($booking->created_at)->format('M d, Y H:i') : 'N/A' }}
                                </p>
                            </div>
                        </div>
                        
                        @if($booking->special_requests)
                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700">Special Requests</label>
                            <p class="mt-1 text-sm text-gray-900 bg-gray-50 p-3 rounded-md">{{ $booking->special_requests }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Customer & Destination Info -->
            <div class="space-y-6">
                <!-- Customer Information -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Customer Information</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Name</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $booking->user_name ?? 'Unknown User' }}</p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Email</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $booking->user_email ?? 'Unknown Email' }}</p>
                            </div>
                            
                            @if($booking->user_phone)
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Phone</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $booking->user_phone }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Destination Information -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Destination Information</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Destination</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $booking->destination_name ?? 'Unknown Destination' }}</p>
                            </div>
                            
                            @if($booking->destination_description)
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Description</label>
                                <p class="mt-1 text-sm text-gray-900">{{ Str::limit($booking->destination_description, 150) }}</p>
                            </div>
                            @endif
                            
                            @if($booking->destination_price)
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Price per Person</label>
                                <p class="mt-1 text-sm text-gray-900">Rs {{ number_format($booking->destination_price, 2) }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Quick Actions</h3>
                        
                        <div class="space-y-3">
                            @if($booking->status === 'pending')
                                <form method="POST" action="{{ route('admin.bookings.update-status', $booking->id) }}" class="w-full">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="confirmed">
                                    <button type="submit" class="w-full bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 text-sm font-medium">
                                        Confirm Booking
                                    </button>
                                </form>
                                
                                <form method="POST" action="{{ route('admin.bookings.update-status', $booking->id) }}" class="w-full">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="cancelled">
                                    <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 text-sm font-medium">
                                        Cancel Booking
                                    </button>
                                </form>
                            @endif
                            
                            <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="w-full bg-yellow-600 text-white px-4 py-2 rounded-md hover:bg-yellow-700 text-sm font-medium text-center block">
                                Edit Booking
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

