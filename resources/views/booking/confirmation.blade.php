@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Success Message -->
        <div class="bg-green-50 border border-green-200 rounded-lg p-6 mb-8">
            <div class="flex items-center">
                <svg class="w-8 h-8 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <div>
                    <h2 class="text-xl font-semibold text-green-800">Booking Confirmed!</h2>
                    <p class="text-green-700">Your tour booking has been successfully created. Please complete the payment to secure your reservation.</p>
                </div>
            </div>
        </div>

        <!-- Booking Details -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-blue-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">Booking Details</h1>
                <p class="text-blue-100">Booking ID: #{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</p>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Destination Info -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Destination Information</h3>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <span class="font-medium text-gray-700 w-24">Tour:</span>
                                <span class="text-gray-900">{{ $booking->tour_title }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="font-medium text-gray-700 w-24">Date:</span>
                                <span class="text-gray-900">{{ $booking->travel_date->format('F j, Y') }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="font-medium text-gray-700 w-24">People:</span>
                                <span class="text-gray-900">{{ $booking->people }} {{ $booking->people == 1 ? 'person' : 'people' }}</span>
                            </div>
                            @if($booking->budget_tier)
                            <div class="flex items-center">
                                <span class="font-medium text-gray-700 w-24">Tier:</span>
                                <span class="text-gray-900 capitalize">{{ str_replace('_', ' ', $booking->budget_tier) }}</span>
                            </div>
                            @endif
                            <div class="flex items-center">
                                <span class="font-medium text-gray-700 w-24">Status:</span>
                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                    {{ $booking->status === 'Pending' ? 'bg-yellow-100 text-yellow-800' : 
                                       ($booking->status === 'Confirmed' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                    {{ $booking->status }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing Info -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Pricing Breakdown</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-700">Price per person:</span>
                                <span class="font-medium">Rs {{ number_format($booking->price_per_person) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700">Number of people:</span>
                                <span class="font-medium">{{ $booking->people }}</span>
                            </div>
                            <hr class="my-2">
                            <div class="flex justify-between text-lg font-bold">
                                <span class="text-gray-900">Total Amount:</span>
                                <span class="text-blue-600">Rs {{ number_format($booking->price) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Special Requests -->
                @if($booking->special_requests)
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Special Requests</h3>
                    <p class="text-gray-700 bg-gray-50 p-3 rounded-lg">{{ $booking->special_requests }}</p>
                </div>
                @endif

                <!-- Payment Section -->
                <div class="mt-8 bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Payment Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-medium text-gray-700 mb-2">Payment Methods</h4>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="credit_card" class="mr-2" checked>
                                    <span>Credit/Debit Card</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="bank_transfer" class="mr-2">
                                    <span>Bank Transfer</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="cash" class="mr-2">
                                    <span>Cash on Arrival</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-700 mb-2">Payment Instructions</h4>
                            <p class="text-sm text-gray-600">
                                Complete your payment to confirm your booking. You will receive a confirmation email once payment is processed.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                    <button onclick="processPayment()" 
                            class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg transition duration-200">
                        Complete Payment
                    </button>
                    <a href="{{ route('user.profile') }}" 
                       class="px-8 py-3 border border-gray-300 text-gray-700 hover:bg-gray-50 font-medium rounded-lg transition duration-200 text-center">
                        View All Bookings
                    </a>
                    <a href="{{ route('home') }}" 
                       class="px-8 py-3 border border-blue-300 text-blue-700 hover:bg-blue-50 font-medium rounded-lg transition duration-200 text-center">
                        Book Another Tour
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function processPayment() {
    // Simulate payment processing
    const button = event.target;
    const originalText = button.textContent;
    
    button.textContent = 'Processing...';
    button.disabled = true;
    
    setTimeout(() => {
        // Update booking status to confirmed
        fetch(`/booking/{{ $booking->id }}/confirm`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                button.textContent = 'Payment Completed!';
                button.classList.remove('bg-green-600', 'hover:bg-green-700');
                button.classList.add('bg-green-500');
                
                // Show success message
                alert('Payment completed successfully! Your booking is now confirmed.');
                
                // Reload page to show updated status
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            } else {
                throw new Error(data.message || 'Payment failed');
            }
        })
        .catch(error => {
            button.textContent = originalText;
            button.disabled = false;
            alert('Payment failed: ' + error.message);
        });
    }, 2000);
}
</script>
@endsection

