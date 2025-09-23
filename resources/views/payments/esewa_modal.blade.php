<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eSewa Payment - Tour Sphere</title>
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
                    eSewa Payment
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Complete your payment using eSewa
                </p>
            </div>
            
            <!-- Loading State -->
            <div id="loading" class="text-center">
                <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary mx-auto"></div>
                <p class="mt-4 text-gray-600">Processing payment...</p>
            </div>
            
            <!-- Error State -->
            <div id="error" class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline" id="error-message"></span>
            </div>
            
            <!-- Payment Details -->
            <div id="payment-details" class="hidden bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Payment Details</h3>
                
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
                
                <!-- QR Code Section -->
                <div class="mt-6 text-center">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Scan QR Code to Pay</h4>
                    <div class="relative inline-block">
                        <!-- 3D Card Container -->
                        <div class="bg-gradient-to-br from-gray-800 to-gray-900 p-6 rounded-2xl shadow-2xl transform rotate-1 hover:rotate-0 transition-transform duration-300">
                            <!-- Inner Card -->
                            <div class="bg-white p-4 rounded-xl shadow-lg">
                                <img src="{{ asset('images/esewa-qr.jpg') }}" 
                                     alt="eSewa QR Code" 
                                     class="w-64 h-64 mx-auto rounded-lg object-contain shadow-md"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                <div class="w-64 h-64 mx-auto bg-gray-100 border-2 border-dashed border-gray-300 rounded-lg flex items-center justify-center" style="display: none;">
                                    <div class="text-center">
                                        <div class="w-32 h-32 mx-auto mb-2 bg-gray-200 rounded flex items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm0 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V8zm0 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <p class="text-sm text-gray-600 font-medium">eSewa QR Code</p>
                                        <p class="text-xs text-gray-500 mt-1">Scan with eSewa app</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- 3D Effect Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent rounded-2xl pointer-events-none"></div>
                            
                            <!-- Glow Effect -->
                            <div class="absolute -inset-1 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 rounded-2xl blur opacity-30 group-hover:opacity-50 transition duration-300"></div>
                        </div>
                        
                        <!-- Floating Elements -->
                        <div class="absolute -top-2 -right-2 w-4 h-4 bg-green-400 rounded-full animate-pulse"></div>
                        <div class="absolute -bottom-2 -left-2 w-3 h-3 bg-blue-400 rounded-full animate-pulse delay-100"></div>
                    </div>
                    
                    <div class="mt-6 space-y-2">
                        <p class="text-sm text-gray-600">
                            Please scan the QR with your eSewa app.
                        </p>
                        <p class="text-sm text-gray-500">
                            Your booking will remain <span class="font-semibold text-yellow-600">Pending</span> until confirmed.
                        </p>
                        <div class="flex items-center justify-center space-x-2 mt-3">
                            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                            <span class="text-xs text-gray-500">Ready to scan</span>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 space-y-3">
                    <button id="close-payment" 
                            class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const bookingId = {{ $bookingId }};
        let booking = null;
        
        // Get CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
        
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
            document.getElementById('payment-details').classList.remove('hidden');
            
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
        
        // Event listeners
        document.getElementById('close-payment').addEventListener('click', () => {
            window.close();
        });
        
        // Load booking details on page load
        loadBookingDetails();
    </script>
</body>
</html>
