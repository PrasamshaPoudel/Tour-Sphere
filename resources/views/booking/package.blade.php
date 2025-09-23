@extends('layouts.app')

@section('title', 'Package Booking - ' . $data['destination'])

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">
                {{ $data['destination'] }} Package
            </h1>
            <p class="text-lg text-gray-600">Book your complete travel package</p>
            <div class="mt-4 inline-flex items-center px-4 py-2 bg-green-100 text-green-800 rounded-lg">
                <span class="font-semibold">Price per Person: Rs {{ number_format($data['price_per_person']) }}</span>
            </div>
        </div>

        <!-- Booking Form -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <form action="{{ route('booking.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Hidden fields for pre-filled data -->
                <input type="hidden" name="type" value="package">
                <input type="hidden" name="destination_id" value="{{ $data['destination_id'] }}">
                <input type="hidden" name="price_per_person" value="{{ $data['price_per_person'] }}">

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

                <!-- Price Calculation -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Price Calculation</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Package:</span>
                            <span class="font-medium">{{ $data['destination'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Price per Person:</span>
                            <span class="font-medium text-green-600">Rs {{ number_format($data['price_per_person']) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Number of People:</span>
                            <span class="font-medium" id="people-count">-</span>
                        </div>
                        <div class="border-t pt-2">
                            <div class="flex justify-between text-lg font-semibold">
                                <span>Total Price:</span>
                                <span class="text-green-600" id="total-price">-</span>
                            </div>
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
                            class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Book Package
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const peopleSelect = document.getElementById('number_of_people');
    const peopleCount = document.getElementById('people-count');
    const totalPrice = document.getElementById('total-price');
    const pricePerPerson = {{ $data['price_per_person'] }};

    function updatePrice() {
        const people = parseInt(peopleSelect.value) || 0;
        peopleCount.textContent = people;
        
        if (people > 0) {
            const total = people * pricePerPerson;
            totalPrice.textContent = 'Rs ' + total.toLocaleString();
        } else {
            totalPrice.textContent = '-';
        }
    }

    peopleSelect.addEventListener('change', updatePrice);
});
</script>
@endsection


