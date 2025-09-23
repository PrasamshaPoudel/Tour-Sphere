@extends('layouts.app')

@section('title', 'View Destination - Admin Panel')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Destination Details</h1>
                    <p class="text-gray-600">{{ $destination->name }}</p>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.destinations.edit', $destination->id) }}" class="bg-yellow-600 text-white px-4 py-2 rounded-md hover:bg-yellow-700">
                        Edit Destination
                    </a>
                    <a href="{{ route('admin.destinations') }}" class="text-gray-500 hover:text-gray-700">
                        ← Back to Destinations
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Destination Details -->
            <div class="lg:col-span-2">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-6">Destination Information</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Destination ID</label>
                                <p class="mt-1 text-sm text-gray-900">#{{ $destination->id }}</p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Name</label>
                                <p class="mt-1 text-sm text-gray-900 font-semibold">{{ $destination->name }}</p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Price per Person</label>
                                <p class="mt-1 text-sm text-gray-900 font-semibold">Rs {{ number_format($destination->price, 2) }}</p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Total Bookings</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $destination->bookings_count ?? 0 }}</p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Created</label>
                                <p class="mt-1 text-sm text-gray-900">
                                    {{ isset($destination->created_at) && $destination->created_at ? \Carbon\Carbon::parse($destination->created_at)->format('M d, Y') : 'N/A' }}
                                </p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Last Updated</label>
                                <p class="mt-1 text-sm text-gray-900">
                                    {{ isset($destination->updated_at) && $destination->updated_at ? \Carbon\Carbon::parse($destination->updated_at)->format('M d, Y H:i') : 'N/A' }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700">Description</label>
                            <div class="mt-1 text-sm text-gray-900 bg-gray-50 p-4 rounded-md">
                                {{ $destination->description }}
                            </div>
                        </div>
                        
                        @if($destination->image)
                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700">Image</label>
                            <div class="mt-1">
                                <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}" class="h-32 w-32 object-cover rounded-lg">
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Statistics & Actions -->
            <div class="space-y-6">
                <!-- Destination Statistics -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Statistics</h3>
                        
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-sm font-medium text-gray-700">Total Bookings</span>
                                <span class="text-sm text-gray-900">{{ $destination->bookings_count ?? 0 }}</span>
                            </div>
                            
                            <div class="flex justify-between">
                                <span class="text-sm font-medium text-gray-700">Price per Person</span>
                                <span class="text-sm text-gray-900">Rs {{ number_format($destination->price, 2) }}</span>
                            </div>
                            
                            <div class="flex justify-between">
                                <span class="text-sm font-medium text-gray-700">Potential Revenue</span>
                                <span class="text-sm text-gray-900">Rs {{ number_format(($destination->bookings_count ?? 0) * $destination->price, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Quick Actions</h3>
                        
                        <div class="space-y-3">
                            <a href="{{ route('admin.destinations.edit', $destination->id) }}" class="w-full bg-yellow-600 text-white px-4 py-2 rounded-md hover:bg-yellow-700 text-sm font-medium text-center block">
                                Edit Destination
                            </a>
                            
                            <form method="POST" action="{{ route('admin.destinations.delete', $destination->id) }}" class="w-full" onsubmit="return confirm('Are you sure you want to delete this destination? This will also delete all associated bookings.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 text-sm font-medium">
                                    Delete Destination
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Bookings for this Destination -->
        @if($recentBookings->count() > 0)
        <div class="mt-8">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-6">Recent Bookings ({{ $recentBookings->count() }})</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Booking ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Travel Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">People</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($recentBookings as $booking)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        #{{ $booking->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $booking->user_name ?? 'Unknown User' }}</div>
                                        <div class="text-sm text-gray-500">{{ $booking->user_email ?? 'Unknown Email' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ isset($booking->travel_date) && $booking->travel_date ? \Carbon\Carbon::parse($booking->travel_date)->format('M d, Y') : 'Not set' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $booking->number_of_people ?? $booking->people ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        Rs {{ number_format($booking->price ?? 0, 2) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            @if($booking->status === 'confirmed') bg-green-100 text-green-800
                                            @elseif($booking->status === 'pending') bg-yellow-100 text-yellow-800
                                            @elseif($booking->status === 'cancelled') bg-red-100 text-red-800
                                            @else bg-gray-100 text-gray-800
                                            @endif">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.bookings.view', $booking->id) }}" class="text-blue-600 hover:text-blue-900">View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="mt-8">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="px-4 py-5 sm:p-6">
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No bookings found</h3>
                        <p class="mt-1 text-sm text-gray-500">No bookings have been made for this destination yet.</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

