<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmed</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen py-8">
        <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg p-8">
            <div class="text-center mb-8">
                @if($booking->status === 'Pending')
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Booking Created!</h1>
                    <p class="text-gray-600">Complete payment to confirm your adventure</p>
                @else
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Booking Confirmed!</h1>
                    <p class="text-gray-600">Your adventure is ready to go</p>
                @endif
            </div>

            <!-- Booking Details -->
            <div class="bg-green-50 rounded-lg p-6 mb-8">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Booking Details</h2>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="font-semibold">Booking ID:</span>
                        <span class="text-blue-600 font-bold">#{{ $booking->id }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-semibold">Destination:</span>
                        <span>{{ $booking->tour_title }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-semibold">Travel Date:</span>
                        <span>{{ \Carbon\Carbon::parse($booking->travel_date)->format('M d, Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-semibold">Number of People:</span>
                        <span>{{ $booking->people }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-semibold">Total Amount:</span>
                        <span class="text-green-600 font-bold">Rs {{ number_format($booking->price) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-semibold">Status:</span>
                        <span class="px-2 py-1 rounded-full text-sm font-semibold
                            @if($booking->status === 'Pending') bg-yellow-100 text-yellow-800
                            @elseif($booking->status === 'Confirmed') bg-green-100 text-green-800
                            @elseif($booking->status === 'Cancelled') bg-red-100 text-red-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ $booking->status }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Next Steps -->
            <div class="bg-blue-50 rounded-lg p-6 mb-8">
                <h3 class="text-lg font-bold text-gray-900 mb-3">What's Next?</h3>
                @if($booking->status === 'Pending')
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Complete payment to confirm your booking
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            You will receive a confirmation email after payment
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Our team will contact you within 24 hours
                        </li>
                    </ul>
                @else
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            You will receive a confirmation email shortly
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Our team will contact you within 24 hours
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Prepare for your amazing adventure!
                        </li>
                    </ul>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4">
                @if($booking->status === 'Pending')
                    <a href="{{ route('payment.esewa', $booking->id) }}" 
                       target="_blank"
                       class="flex-1 bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg text-center transition duration-200">
                        Pay with eSewa QR
                    </a>
                    <a href="{{ route('home') }}" 
                       class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-center transition duration-200">
                        Back to Home
                    </a>
                @else
                    <a href="{{ route('home') }}" 
                       class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-center transition duration-200">
                        Back to Home
                    </a>
                    <a href="{{ route('booking.form') }}" 
                       class="flex-1 bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-lg text-center transition duration-200">
                        Book Another Trip
                    </a>
                @endif
            </div>
        </div>
    </div>
</body>
</html>