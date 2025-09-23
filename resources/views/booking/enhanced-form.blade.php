@extends('layouts.app')

@section('title', 'Book a Tour')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Book Your Tour</h1>
            <p class="text-lg text-gray-600">Choose your destination and budget tier</p>
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

        <!-- Error Message -->
        @if(session('error'))
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                </svg>
                {{ session('error') }}
            </div>
        </div>
        @endif

        <!-- Booking Form -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <form action="{{ route('booking.enhanced.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Destination Selection -->
                <div>
                    <label for="destination_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Destination <span class="text-red-500">*</span>
                    </label>
                    <select id="destination_id" name="destination_id" required
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="">Select a Destination</option>
                        @foreach($destinations as $destination)
                            <option value="{{ $destination->id }}" 
                                    data-normal-price="{{ $destination->getPriceForTier('normal') }}"
                                    data-medium-price="{{ $destination->getPriceForTier('medium') }}"
                                    data-five-star-price="{{ $destination->getPriceForTier('five_star') }}"
                                    {{ (request('destination_id') == $destination->id) ? 'selected' : '' }}>
                                {{ $destination->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('destination_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Budget Tier Selection -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Budget Tier <span class="text-red-500">*</span>
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="budget-tier-option" data-tier="normal">
                            <input type="radio" id="tier_normal" name="budget_tier" value="normal" class="sr-only" required>
                            <label for="tier_normal" class="budget-tier-card cursor-pointer">
                                <div class="text-center">
                                    <div class="text-lg font-semibold text-gray-900">Normal</div>
                                    <div class="text-sm text-gray-500 mt-1">Standard accommodation</div>
                                    <div class="text-2xl font-bold text-blue-600 mt-2" id="normal-price">-</div>
                                </div>
                            </label>
                        </div>
                        
                        <div class="budget-tier-option" data-tier="medium">
                            <input type="radio" id="tier_medium" name="budget_tier" value="medium" class="sr-only" required>
                            <label for="tier_medium" class="budget-tier-card cursor-pointer">
                                <div class="text-center">
                                    <div class="text-lg font-semibold text-gray-900">Medium (Affordable)</div>
                                    <div class="text-sm text-gray-500 mt-1">Comfortable amenities</div>
                                    <div class="text-2xl font-bold text-green-600 mt-2" id="medium-price">-</div>
                                </div>
                            </label>
                        </div>
                        
                        <div class="budget-tier-option" data-tier="five_star">
                            <input type="radio" id="tier_five_star" name="budget_tier" value="five_star" class="sr-only" required>
                            <label for="tier_five_star" class="budget-tier-card cursor-pointer">
                                <div class="text-center">
                                    <div class="text-lg font-semibold text-gray-900">Five-Star (Expensive)</div>
                                    <div class="text-sm text-gray-500 mt-1">Luxury services</div>
                                    <div class="text-2xl font-bold text-purple-600 mt-2" id="five-star-price">-</div>
                                </div>
                            </label>
                        </div>
                    </div>
                    @error('budget_tier')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Travel Date -->
                <div>
                    <label for="travel_date" class="block text-sm font-medium text-gray-700 mb-2">
                        Travel Date <span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="travel_date" name="travel_date" required
                           min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                           value="{{ old('travel_date') }}"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('travel_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Number of People -->
                <div>
                    <label for="people" class="block text-sm font-medium text-gray-700 mb-2">
                        Number of People <span class="text-red-500">*</span>
                    </label>
                    <input type="number" id="people" name="people" required min="1" max="20"
                           value="{{ old('people', 1) }}"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('people')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price Calculation -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Price Calculation</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Selected Tier:</span>
                            <span class="font-medium" id="selected-tier">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Price per Person:</span>
                            <span class="font-medium" id="price-per-person">-</span>
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
                <div class="flex justify-center">
                    <button type="submit" 
                            class="w-full px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 font-semibold">
                        Book Now
                    </button>
                </div>
            </form>

            <!-- Back to Destinations -->
            <div class="text-center mt-6">
                <a href="{{ route('destinations') }}"
                   class="text-blue-600 hover:text-blue-800 font-medium">
                    ← Back to Destinations
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.budget-tier-card {
    @apply border-2 border-gray-200 rounded-lg p-4 transition-all duration-200 hover:border-blue-300 hover:shadow-md;
}

.budget-tier-option input:checked + .budget-tier-card {
    @apply border-blue-500 bg-blue-50 shadow-md;
}

.budget-tier-option input:checked + .budget-tier-card .text-gray-900 {
    @apply text-blue-700;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const destinationSelect = document.getElementById('destination_id');
    const peopleInput = document.getElementById('people');
    const budgetTierInputs = document.querySelectorAll('input[name="budget_tier"]');
    
    const normalPriceEl = document.getElementById('normal-price');
    const mediumPriceEl = document.getElementById('medium-price');
    const fiveStarPriceEl = document.getElementById('five-star-price');
    const selectedTierEl = document.getElementById('selected-tier');
    const pricePerPersonEl = document.getElementById('price-per-person');
    const peopleCountEl = document.getElementById('people-count');
    const totalPriceEl = document.getElementById('total-price');

    function updatePrices() {
        const selectedOption = destinationSelect.options[destinationSelect.selectedIndex];
        
        if (selectedOption.value) {
            const normalPrice = parseFloat(selectedOption.dataset.normalPrice);
            const mediumPrice = parseFloat(selectedOption.dataset.mediumPrice);
            const fiveStarPrice = parseFloat(selectedOption.dataset.fiveStarPrice);
            
            normalPriceEl.textContent = 'Rs ' + normalPrice.toLocaleString();
            mediumPriceEl.textContent = 'Rs ' + mediumPrice.toLocaleString();
            fiveStarPriceEl.textContent = 'Rs ' + fiveStarPrice.toLocaleString();
        } else {
            normalPriceEl.textContent = '-';
            mediumPriceEl.textContent = '-';
            fiveStarPriceEl.textContent = '-';
        }
        
        updateTotalPrice();
    }

    function updateTotalPrice() {
        const selectedOption = destinationSelect.options[destinationSelect.selectedIndex];
        const people = parseInt(peopleInput.value) || 0;
        const selectedTier = document.querySelector('input[name="budget_tier"]:checked');
        
        if (selectedOption.value && people > 0 && selectedTier) {
            const tier = selectedTier.value;
            let pricePerPerson = 0;
            
            switch (tier) {
                case 'normal':
                    pricePerPerson = parseFloat(selectedOption.dataset.normalPrice);
                    selectedTierEl.textContent = 'Normal';
                    break;
                case 'medium':
                    pricePerPerson = parseFloat(selectedOption.dataset.mediumPrice);
                    selectedTierEl.textContent = 'Medium (Affordable)';
                    break;
                case 'five_star':
                    pricePerPerson = parseFloat(selectedOption.dataset.fiveStarPrice);
                    selectedTierEl.textContent = 'Five-Star (Expensive)';
                    break;
            }
            
            const total = people * pricePerPerson;

            pricePerPersonEl.textContent = 'Rs ' + pricePerPerson.toLocaleString();
            peopleCountEl.textContent = people;
            totalPriceEl.textContent = 'Rs ' + total.toLocaleString();
        } else {
            selectedTierEl.textContent = '-';
            pricePerPersonEl.textContent = '-';
            peopleCountEl.textContent = '-';
            totalPriceEl.textContent = '-';
        }
    }

    // Event listeners
    destinationSelect.addEventListener('change', updatePrices);
    peopleInput.addEventListener('input', updateTotalPrice);
    budgetTierInputs.forEach(input => {
        input.addEventListener('change', updateTotalPrice);
    });

    // Auto-select first tier if destination is pre-selected
    if (destinationSelect.value) {
        updatePrices();
        if (!document.querySelector('input[name="budget_tier"]:checked')) {
            budgetTierInputs[0].checked = true;
            updateTotalPrice();
        }
    }
});
</script>
@endsection

