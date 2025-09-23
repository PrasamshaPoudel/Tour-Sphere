@extends('layouts.app')

@section('title', 'Edit Booking - Admin Panel')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Edit Booking</h1>
                    <p class="text-gray-600">Booking #{{ $booking->id }}</p>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.bookings.view', $booking->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        View Booking
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
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        
        @if(session('error'))
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Edit Form -->
            <div class="lg:col-span-2">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-6">Edit Booking Details</h3>
                        
                        <form method="POST" action="{{ route('admin.bookings.update', $booking->id) }}">
                            @csrf
                            @method('PATCH')
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="md:col-span-2">
                                    <label for="destination_id" class="block text-sm font-medium text-gray-700">Destination</label>
                                    <select name="destination_id" id="destination_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        @foreach($destinations as $destination)
                                            <option value="{{ $destination->id }}" {{ $booking->destination_id == $destination->id ? 'selected' : '' }}>
                                                {{ $destination->name }} - Rs {{ number_format($destination->price, 2) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('destination_id')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="travel_date" class="block text-sm font-medium text-gray-700">Travel Date</label>
                                    <input type="date" name="travel_date" id="travel_date" 
                                           value="{{ $booking->travel_date ? \Carbon\Carbon::parse($booking->travel_date)->format('Y-m-d') : '' }}"
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @error('travel_date')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="number_of_people" class="block text-sm font-medium text-gray-700">Number of People</label>
                                    <input type="number" name="number_of_people" id="number_of_people" min="1" max="20"
                                           value="{{ $booking->number_of_people ?? $booking->people ?? 1 }}"
                                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @error('number_of_people')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                    <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                    @error('status')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="md:col-span-2">
                                    <label for="special_requests" class="block text-sm font-medium text-gray-700">Special Requests</label>
                                    <textarea name="special_requests" id="special_requests" rows="3"
                                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ $booking->special_requests ?? '' }}</textarea>
                                    @error('special_requests')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mt-6 flex justify-end space-x-3">
                                <a href="{{ route('admin.bookings.view', $booking->id) }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">
                                    Cancel
                                </a>
                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                                    Update Booking
                                </button>
                            </div>
                        </form>
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

                <!-- Current Destination -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Current Destination</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Destination</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $booking->destination_name ?? 'Unknown Destination' }}</p>
                            </div>
                            
                            @if($booking->destination_price)
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Price per Person</label>
                                <p class="mt-1 text-sm text-gray-900">Rs {{ number_format($booking->destination_price, 2) }}</p>
                            </div>
                            @endif
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Current Total</label>
                                <p class="mt-1 text-sm text-gray-900 font-semibold">Rs {{ number_format($booking->price ?? 0, 2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Auto-calculate total price when destination or number of people changes
document.addEventListener('DOMContentLoaded', function() {
    const destinationSelect = document.getElementById('destination_id');
    const peopleInput = document.getElementById('number_of_people');
    
    function updatePrice() {
        const selectedOption = destinationSelect.options[destinationSelect.selectedIndex];
        const priceText = selectedOption.text.split(' - Rs ')[1];
        if (priceText) {
            const pricePerPerson = parseFloat(priceText.replace(/,/g, ''));
            const people = parseInt(peopleInput.value) || 1;
            const totalPrice = pricePerPerson * people;
            
            // You could display this somewhere if needed
            console.log('Total price would be: Rs ' + totalPrice.toFixed(2));
        }
    }
    
    destinationSelect.addEventListener('change', updatePrice);
    peopleInput.addEventListener('input', updatePrice);
});
</script>
@endsection

