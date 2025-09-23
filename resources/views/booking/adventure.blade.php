@extends('layouts.app')

@section('title', 'Adventure Booking - ' . $data['category'] . ' in ' . $data['destination'])

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">
                {{ $data['category'] }} in {{ $data['destination'] }}
            </h1>
            <p class="text-lg text-gray-600">Book your adventure experience</p>
            <div class="mt-4 inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-lg">
                <span class="font-semibold">Price Range: {{ $data['price_range'] }}</span>
            </div>
        </div>

        <!-- Booking Form -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <form action="{{ route('booking.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Hidden fields for pre-filled data -->
                <input type="hidden" name="type" value="adventure">
                <input type="hidden" name="destination_id" value="{{ $data['destination_id'] }}">
                <input type="hidden" name="category" value="{{ $data['category'] }}">
                <input type="hidden" name="price_range" value="{{ $data['price_range'] }}">

                <!-- Travel Date -->
                <div>
                    <label for="travel_date" class="block text-sm font-medium text-gray-700 mb-2">
                        Travel Date <span class="text-red-500">*</span>
                    </label>
                    <input type="date" 
                           id="travel_date" 
                           name="travel_date" 
                           value="{{ old('travel_date') }}"
                           min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('travel_date') border-red-500 @enderror"
                           required>
                    @error('travel_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Number of People -->
                <div>
                    <label for="number_of_people" class="block text-sm font-medium text-gray-700 mb-2">
                        Number of People <span class="text-red-500">*</span>
                    </label>
                    <select id="number_of_people" 
                            name="number_of_people" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('number_of_people') border-red-500 @enderror"
                            required>
                        <option value="">Select number of people</option>
                        @for($i = 1; $i <= 20; $i++)
                            <option value="{{ $i }}" {{ old('number_of_people') == $i ? 'selected' : '' }}>
                                {{ $i }} {{ $i == 1 ? 'person' : 'people' }}
                            </option>
                        @endfor
                    </select>
                    @error('number_of_people')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Special Requests -->
                <div>
                    <label for="special_requests" class="block text-sm font-medium text-gray-700 mb-2">
                        Special Requests
                    </label>
                    <textarea id="special_requests" 
                              name="special_requests" 
                              rows="4" 
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('special_requests') border-red-500 @enderror"
                              placeholder="Any special requirements or requests...">{{ old('special_requests') }}</textarea>
                    @error('special_requests')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price Information -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Pricing Information</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Activity:</span>
                            <span class="font-medium">{{ $data['category'] }} in {{ $data['destination'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Price Range:</span>
                            <span class="font-medium text-blue-600">{{ $data['price_range'] }}</span>
                        </div>
                        <div class="border-t pt-2">
                            <p class="text-sm text-gray-500">
                                * Final price will be calculated based on the number of people and selected date
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ url()->previous() }}" 
                       class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Book Adventure
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


