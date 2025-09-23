@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Book Your Tour</h1>
            <p class="text-lg text-gray-600">Complete your booking details below</p>
        </div>

        <form action="{{ route('booking.unified.store') }}" method="POST" class="space-y-8">
            @csrf
            
            <!-- Hidden fields for tracking -->
            <input type="hidden" name="entry_point" value="{{ $entryPoint ?? 'homepage' }}">
            <input type="hidden" name="destination_id" value="{{ $selectedDestination->id ?? '' }}" id="destination_id">
            
            <!-- Destination Display -->
            <div class="bg-blue-50 p-6 rounded-lg">
                <h2 class="text-xl font-semibold text-gray-900 mb-2">Selected Destination</h2>
                <div class="flex items-center space-x-4">
                    @if($selectedDestination->image)
                        <img src="{{ asset('storage/' . $selectedDestination->image) }}" 
                             alt="{{ $selectedDestination->name }}" 
                             class="w-20 h-20 object-cover rounded-lg">
                    @endif
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">{{ $selectedDestination->name }}</h3>
                        <p class="text-gray-600">{{ Str::limit($selectedDestination->description, 100) }}</p>
                    </div>
                </div>
            </div>

            <!-- Pricing Type Selection (only for category/special package entries) -->
            @if(($entryPoint ?? '') === 'category' || ($entryPoint ?? '') === 'special')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-4">Choose Your Budget Tier</label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($selectedDestination->getBudgetTiers() as $tierKey => $tier)
                    <div class="border-2 border-gray-200 rounded-lg p-4 cursor-pointer hover:border-blue-500 transition-colors budget-tier-option" 
                         data-tier="{{ $tierKey }}" data-price="{{ $tier['price'] }}">
                        <div class="flex items-center mb-2">
                            <input type="radio" name="budget_tier" value="{{ $tierKey }}" 
                                   id="tier_{{ $tierKey }}" class="mr-2" 
                                   {{ $loop->first ? 'checked' : '' }}>
                            <label for="tier_{{ $tierKey }}" class="font-medium text-gray-900 cursor-pointer">
                                {{ $tier['name'] }}
                            </label>
                        </div>
                        <p class="text-sm text-gray-600 mb-2">{{ $tier['description'] }}</p>
                        <p class="text-lg font-semibold text-blue-600">Rs {{ number_format($tier['price']) }}/person</p>
                    </div>
                    @endforeach
                </div>
                @error('budget_tier')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            @else
            <!-- Fixed pricing display for homepage entries -->
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Pricing</h3>
                <p class="text-2xl font-bold text-blue-600">Rs {{ number_format($selectedDestination->price) }}/person</p>
                <p class="text-sm text-gray-600">Fixed rate for all bookings</p>
            </div>
            @endif

            <!-- Travel Date -->
            <div>
                <label for="travel_date" class="block text-sm font-medium text-gray-700 mb-2">Travel Date</label>
                <input type="date" id="travel_date" name="travel_date" required
                       value="{{ old('travel_date') }}"
                       min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                @error('travel_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Number of People -->
            <div>
                <label for="people" class="block text-sm font-medium text-gray-700 mb-2">Number of People</label>
                <input type="number" id="people" name="people" required min="1" max="20"
                       value="{{ old('people', 1) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                @error('people')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Special Requests -->
            <div>
                <label for="special_requests" class="block text-sm font-medium text-gray-700 mb-2">Special Requests (Optional)</label>
                <textarea id="special_requests" name="special_requests" rows="3"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Any special dietary requirements, accessibility needs, or other requests...">{{ old('special_requests') }}</textarea>
                @error('special_requests')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Price Calculation -->
            <div id="price-calculation" class="bg-gray-50 p-6 rounded-lg" style="display: none;">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Booking Summary</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span>Price per person:</span>
                        <span id="price-per-person">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Number of people:</span>
                        <span id="people-count">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Subtotal:</span>
                        <span id="subtotal">-</span>
                    </div>
                    <hr class="my-3">
                    <div class="flex justify-between text-xl font-bold">
                        <span>Total Price:</span>
                        <span id="total-price" class="text-blue-600">-</span>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center space-x-4">
                <a href="{{ url()->previous() }}" 
                   class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-200">
                    Back
                </a>
                <button type="submit" 
                        class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg transition duration-200">
                    Proceed to Payment
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const peopleInput = document.getElementById('people');
    const priceCalculation = document.getElementById('price-calculation');
    const pricePerPerson = document.getElementById('price-per-person');
    const peopleCount = document.getElementById('people-count');
    const subtotal = document.getElementById('subtotal');
    const totalPrice = document.getElementById('total-price');
    const budgetTierOptions = document.querySelectorAll('.budget-tier-option');
    const entryPoint = '{{ $entryPoint ?? "homepage" }}';

    function updatePrice() {
        const people = parseInt(peopleInput.value) || 0;
        
        if (people > 0) {
            let pricePerPersonValue;
            
            if (entryPoint === 'category' || entryPoint === 'special') {
                // For tiered pricing
                const selectedTier = document.querySelector('input[name="budget_tier"]:checked');
                if (selectedTier) {
                    pricePerPersonValue = parseFloat(selectedTier.dataset.price);
                } else {
                    pricePerPersonValue = 0;
                }
            } else {
                // For fixed pricing
                pricePerPersonValue = {{ $selectedDestination->price ?? 0 }};
            }
            
            if (pricePerPersonValue > 0) {
                const subtotalValue = pricePerPersonValue * people;
                
                pricePerPerson.textContent = 'Rs ' + pricePerPersonValue.toLocaleString();
                peopleCount.textContent = people;
                subtotal.textContent = 'Rs ' + subtotalValue.toLocaleString();
                totalPrice.textContent = 'Rs ' + subtotalValue.toLocaleString();
                
                priceCalculation.style.display = 'block';
            }
        } else {
            priceCalculation.style.display = 'none';
        }
    }

    // Event listeners
    peopleInput.addEventListener('input', updatePrice);
    
    // For tiered pricing, listen to tier changes
    budgetTierOptions.forEach(option => {
        option.addEventListener('click', function() {
            const radio = this.querySelector('input[type="radio"]');
            radio.checked = true;
            updatePrice();
        });
    });

    // Initial calculation
    updatePrice();
});
</script>
@endsection

