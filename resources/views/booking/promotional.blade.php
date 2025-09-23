@extends('layouts.app')

@section('title', 'Promotional Offer Booking')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">
                Special Promotional Offer
            </h1>
            <p class="text-lg text-gray-600">Get {{ $data['discount_percentage'] }}% off on your booking!</p>
            <div class="mt-4 inline-flex items-center px-4 py-2 bg-red-100 text-red-800 rounded-lg">
                <span class="font-semibold">{{ $data['discount_percentage'] }}% Discount Available</span>
            </div>
        </div>

        <!-- Booking Form -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <form action="{{ route('booking.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Hidden fields for pre-filled data -->
                <input type="hidden" name="type" value="promotional">
                <input type="hidden" name="discount_percentage" value="{{ $data['discount_percentage'] }}">

                <!-- Destination Selection -->
                <div>
                    <label for="destination_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Select Destination <span class="text-red-500">*</span>
                    </label>
                    <select id="destination_id" 
                            name="destination_id" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('destination_id') border-red-500 @enderror"
                            required>
                        <option value="">Choose a destination</option>
                        @foreach($data['destinations'] as $destination)
                            <option value="{{ $destination->id }}" 
                                    data-price="{{ $destination->price }}"
                                    {{ old('destination_id') == $destination->id ? 'selected' : '' }}>
                                {{ $destination->name }} - Rs {{ number_format($destination->price) }}
                            </option>
                        @endforeach
                    </select>
                    @error('destination_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

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
                            <span class="text-gray-600">Destination:</span>
                            <span class="font-medium" id="selected-destination">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Original Price per Person:</span>
                            <span class="font-medium text-gray-600" id="original-price">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Number of People:</span>
                            <span class="font-medium" id="people-count">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal:</span>
                            <span class="font-medium" id="subtotal">-</span>
                        </div>
                        <div class="flex justify-between text-red-600">
                            <span>Discount ({{ $data['discount_percentage'] }}%):</span>
                            <span class="font-medium" id="discount-amount">-</span>
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
                            class="px-6 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        Book with Discount
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const destinationSelect = document.getElementById('destination_id');
    const peopleSelect = document.getElementById('number_of_people');
    const selectedDestination = document.getElementById('selected-destination');
    const originalPrice = document.getElementById('original-price');
    const peopleCount = document.getElementById('people-count');
    const subtotal = document.getElementById('subtotal');
    const discountAmount = document.getElementById('discount-amount');
    const totalPrice = document.getElementById('total-price');
    const discountPercentage = {{ $data['discount_percentage'] }};

    function updatePrice() {
        const selectedOption = destinationSelect.options[destinationSelect.selectedIndex];
        const people = parseInt(peopleSelect.value) || 0;
        
        if (selectedOption.value && people > 0) {
            const pricePerPerson = parseFloat(selectedOption.dataset.price);
            const total = people * pricePerPerson;
            const discount = total * (discountPercentage / 100);
            const finalTotal = total - discount;

            selectedDestination.textContent = selectedOption.text.split(' - ')[0];
            originalPrice.textContent = 'Rs ' + pricePerPerson.toLocaleString();
            peopleCount.textContent = people;
            subtotal.textContent = 'Rs ' + total.toLocaleString();
            discountAmount.textContent = '-Rs ' + discount.toLocaleString();
            totalPrice.textContent = 'Rs ' + finalTotal.toLocaleString();
        } else {
            selectedDestination.textContent = '-';
            originalPrice.textContent = '-';
            peopleCount.textContent = '-';
            subtotal.textContent = '-';
            discountAmount.textContent = '-';
            totalPrice.textContent = '-';
        }
    }

    destinationSelect.addEventListener('change', updatePrice);
    peopleSelect.addEventListener('change', updatePrice);
});
</script>
@endsection


