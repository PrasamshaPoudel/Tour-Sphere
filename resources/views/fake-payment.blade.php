<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fake Payment - Travel Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#8B5CF6',
                        secondary: '#06B6D4'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Fake Payment System
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    This is a demo payment system for testing purposes
                </p>
            </div>
            
            <!-- Loading State -->
            <div id="loading" class="text-center">
                <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary mx-auto"></div>
                <p class="mt-4 text-gray-600">Loading booking details...</p>
            </div>
            
            <!-- Error State -->
            <div id="error" class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline" id="error-message"></span>
            </div>
            
            <!-- Booking Details -->
            <div id="booking-details" class="hidden bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Booking Details</h3>
                
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Booking ID:</span>
                        <span class="font-medium" id="booking-id"></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Destination:</span>
                        <span class="font-medium" id="destination-name"></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Travel Date:</span>
                        <span class="font-medium" id="travel-date"></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Number of People:</span>
                        <span class="font-medium" id="people-count"></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Status:</span>
                        <span class="font-medium" id="booking-status"></span>
                    </div>
                    <hr class="my-4">
                    <div class="flex justify-between text-lg font-bold">
                        <span>Total Amount:</span>
                        <span class="text-primary" id="total-amount"></span>
                    </div>
                </div>
                
                <div class="mt-6 space-y-3">
                    <button id="confirm-payment" 
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 disabled:opacity-50 disabled:cursor-not-allowed">
                        <span id="confirm-text">Confirm Fake Payment</span>
                        <span id="confirm-loading" class="hidden">Processing...</span>
                    </button>
                    
                    <button id="cancel-payment" 
                            class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Cancel
                    </button>
                </div>
            </div>
            
            <!-- Success State -->
            <div id="success" class="hidden bg-white shadow rounded-lg p-6 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                    <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="mt-4 text-lg font-medium text-gray-900">Payment Successful!</h3>
                <p class="mt-2 text-sm text-gray-600">Your booking has been confirmed and payment processed.</p>
                <div class="mt-6">
                    <button onclick="window.close()" 
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-primary hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Close Window
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const bookingId = {{ $bookingId }};
        let booking = null;
        
        // Get CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        // Load booking details
        async function loadBookingDetails() {
            try {
                const response = await fetch(`/api/booking/${bookingId}`);
                const data = await response.json();
                
                if (data.success) {
                    booking = data.booking;
                    displayBookingDetails();
                } else {
                    showError(data.error || 'Failed to load booking details');
                }
            } catch (error) {
                console.error('Error loading booking:', error);
                showError('Failed to load booking details');
            }
        }
        
        // Display booking details
        function displayBookingDetails() {
            document.getElementById('loading').classList.add('hidden');
            document.getElementById('booking-details').classList.remove('hidden');
            
            document.getElementById('booking-id').textContent = booking.id;
            document.getElementById('destination-name').textContent = booking.destination_name || 'N/A';
            document.getElementById('travel-date').textContent = booking.travel_date ? 
                new Date(booking.travel_date).toLocaleDateString() : 'N/A';
            document.getElementById('people-count').textContent = booking.number_of_people || booking.people || 'N/A';
            document.getElementById('booking-status').textContent = booking.status || 'N/A';
            document.getElementById('total-amount').textContent = `Rs ${(booking.price || 0).toLocaleString()}`;
        }
        
        // Show error message
        function showError(message) {
            document.getElementById('loading').classList.add('hidden');
            document.getElementById('error-message').textContent = message;
            document.getElementById('error').classList.remove('hidden');
        }
        
        // Process fake payment
        async function processPayment() {
            const confirmBtn = document.getElementById('confirm-payment');
            const confirmText = document.getElementById('confirm-text');
            const confirmLoading = document.getElementById('confirm-loading');
            
            // Show loading state
            confirmBtn.disabled = true;
            confirmText.classList.add('hidden');
            confirmLoading.classList.remove('hidden');
            
            try {
                const response = await fetch('/api/fake-pay', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ bookingId: bookingId })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    // Show success state
                    document.getElementById('booking-details').classList.add('hidden');
                    document.getElementById('success').classList.remove('hidden');
                } else {
                    showError(data.error || 'Payment processing failed');
                    // Reset button state
                    confirmBtn.disabled = false;
                    confirmText.classList.remove('hidden');
                    confirmLoading.classList.add('hidden');
                }
            } catch (error) {
                console.error('Payment error:', error);
                showError('Payment processing failed');
                // Reset button state
                confirmBtn.disabled = false;
                confirmText.classList.remove('hidden');
                confirmLoading.classList.add('hidden');
            }
        }
        
        // Event listeners
        document.getElementById('confirm-payment').addEventListener('click', processPayment);
        document.getElementById('cancel-payment').addEventListener('click', () => {
            window.close();
        });
        
        // Load booking details on page load
        loadBookingDetails();
    </script>
</body>
</html>


