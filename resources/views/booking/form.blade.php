@extends('layouts.app')

@section('title', 'Book a Tour')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Book a Tour</h1>
            <p class="text-lg text-gray-600">Choose your destination and travel details</p>
            
            @if($discount > 0)
            <div class="mt-4 inline-flex items-center px-4 py-2 bg-red-100 text-red-800 rounded-lg">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="font-semibold">Special Offer: {{ $discount }}% OFF!</span>
            </div>
            @endif
        </div>

        <!-- Success Message -->
        @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                {{ session('success') }}
            </div>
        </div>
        @endif

        <!-- Booking Form -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <form action="{{ route('booking.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Hidden discount field -->
                <input type="hidden" name="discount_percentage" value="{{ $discount }}" id="discount_percentage">

                <!-- Destination Dropdown -->
                <div>
                    <label for="destination_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Destination <span class="text-red-500">*</span>
                    </label>
                    <select id="destination_id" 
                            name="destination_id" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('destination_id') border-red-500 @enderror"
                            required>
                        <option value="">Select a destination</option>
                        @foreach($destinations as $destination)
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
                    <label for="people" class="block text-sm font-medium text-gray-700 mb-2">
                        Number of People <span class="text-red-500">*</span>
                    </label>
                    <input type="number" 
                           id="people" 
                           name="people" 
                           value="{{ old('people') }}"
                           min="1" 
                           max="20"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('people') border-red-500 @enderror"
                           required>
                    @error('people')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price Calculation -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Price Calculation</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Price per Person:</span>
                            <span class="font-medium" id="price-per-person">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Number of People:</span>
                            <span class="font-medium" id="people-count">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal:</span>
                            <span class="font-medium" id="subtotal">-</span>
                        </div>
                        @if($discount > 0)
                        <div class="flex justify-between text-red-600">
                            <span>Discount ({{ $discount }}%):</span>
                            <span class="font-medium" id="discount-amount">-</span>
                        </div>
                        @endif
                        <div class="border-t pt-2">
                            <div class="flex justify-between text-lg font-semibold">
                                <span>Total Price:</span>
                                <span class="text-green-600" id="total-price">-</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit" 
                            class="w-full px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 font-semibold">
                        Book Tour
                    </button>
                </div>
            </form>
        </div>

        <!-- View Profile Link -->
        <div class="text-center mt-6">
            <a href="{{ route('profile.show') }}" 
               class="text-blue-600 hover:text-blue-800 font-medium">
                View My Booking History
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const destinationSelect = document.getElementById('destination_id');
    const peopleInput = document.getElementById('people');
    const discountPercentage = document.getElementById('discount_percentage');
    const pricePerPerson = document.getElementById('price-per-person');
    const peopleCount = document.getElementById('people-count');
    const subtotal = document.getElementById('subtotal');
    const discountAmount = document.getElementById('discount-amount');
    const totalPrice = document.getElementById('total-price');

    function updatePrice() {
        const selectedOption = destinationSelect.options[destinationSelect.selectedIndex];
        const people = parseInt(peopleInput.value) || 0;
        const discount = parseFloat(discountPercentage.value) || 0;
        
        if (selectedOption.value && people > 0) {
            const price = parseFloat(selectedOption.dataset.price);
            const subtotalValue = people * price;
            const discountValue = subtotalValue * (discount / 100);
            const finalTotal = subtotalValue - discountValue;

            pricePerPerson.textContent = 'Rs ' + price.toLocaleString();
            peopleCount.textContent = people;
            subtotal.textContent = 'Rs ' + subtotalValue.toLocaleString();
            
            if (discount > 0) {
                discountAmount.textContent = '-Rs ' + discountValue.toLocaleString();
            }
            
            totalPrice.textContent = 'Rs ' + finalTotal.toLocaleString();
        } else {
            pricePerPerson.textContent = '-';
            peopleCount.textContent = '-';
            subtotal.textContent = '-';
            if (discountAmount) {
                discountAmount.textContent = '-';
            }
            totalPrice.textContent = '-';
        }
    }

    destinationSelect.addEventListener('change', updatePrice);
    peopleInput.addEventListener('input', updatePrice);
});
</script>
@endsection
