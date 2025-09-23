@extends('layouts.app')

@section('title', 'Booking Test - Tour Sphere')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-900 mb-6">Unified Booking Form Test</h1>
            <p class="text-xl text-gray-700">Test the unified booking form with different query parameters</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Test Card 1: Low Budget -->
            <div class="bg-white rounded-xl shadow-lg p-6 border-2 border-gray-200 hover:shadow-xl transition-shadow">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-leaf text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Low Budget Test</h3>
                    <p class="text-gray-600 mb-4">Test with low budget destination</p>
                    <div class="text-2xl font-bold text-green-600 mb-4">Rs 12,000</div>
                    <a href="{{ route('booking.form', ['destination_title' => 'Ghandruk Trek', 'price' => 12000]) }}" 
                       class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                        Test Booking
                    </a>
                </div>
            </div>

            <!-- Test Card 2: Medium Budget -->
            <div class="bg-white rounded-xl shadow-lg p-6 border-2 border-gray-200 hover:shadow-xl transition-shadow">
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-star text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Medium Budget Test</h3>
                    <p class="text-gray-600 mb-4">Test with medium budget destination</p>
                    <div class="text-2xl font-bold text-blue-600 mb-4">Rs 35,000</div>
                    <a href="{{ route('booking.form', ['destination_title' => 'Annapurna Base Camp', 'price' => 35000]) }}" 
                       class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                        Test Booking
                    </a>
                </div>
            </div>

            <!-- Test Card 3: Expensive Budget -->
            <div class="bg-white rounded-xl shadow-lg p-6 border-2 border-gray-200 hover:shadow-xl transition-shadow">
                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-crown text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Expensive Budget Test</h3>
                    <p class="text-gray-600 mb-4">Test with expensive destination</p>
                    <div class="text-2xl font-bold text-purple-600 mb-4">Rs 80,000</div>
                    <a href="{{ route('booking.form', ['destination_title' => 'Everest Base Camp', 'price' => 80000]) }}" 
                       class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                        Test Booking
                    </a>
                </div>
            </div>

            <!-- Test Card 4: With Destination ID -->
            <div class="bg-white rounded-xl shadow-lg p-6 border-2 border-gray-200 hover:shadow-xl transition-shadow">
                <div class="text-center">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-database text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Database Destination</h3>
                    <p class="text-gray-600 mb-4">Test with destination_id parameter</p>
                    <div class="text-2xl font-bold text-indigo-600 mb-4">From DB</div>
                    <a href="{{ route('booking.form', ['destination_id' => 4]) }}" 
                       class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                        Test Booking
                    </a>
                </div>
            </div>

            <!-- Test Card 5: Special Package -->
            <div class="bg-white rounded-xl shadow-lg p-6 border-2 border-gray-200 hover:shadow-xl transition-shadow">
                <div class="text-center">
                    <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-heart text-pink-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Special Package</h3>
                    <p class="text-gray-600 mb-4">Test with special package pricing</p>
                    <div class="text-2xl font-bold text-pink-600 mb-4">Rs 25,000</div>
                    <a href="{{ route('booking.form', ['destination_title' => 'Honeymoon Package', 'price' => 25000]) }}" 
                       class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                        Test Booking
                    </a>
                </div>
            </div>

            <!-- Test Card 6: Adventure Activity -->
            <div class="bg-white rounded-xl shadow-lg p-6 border-2 border-gray-200 hover:shadow-xl transition-shadow">
                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-parachute-box text-orange-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Adventure Activity</h3>
                    <p class="text-gray-600 mb-4">Test with adventure activity</p>
                    <div class="text-2xl font-bold text-orange-600 mb-4">Rs 8,000</div>
                    <a href="{{ route('booking.form', ['destination_title' => 'Paragliding Adventure', 'price' => 8000]) }}" 
                       class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                        Test Booking
                    </a>
                </div>
            </div>
        </div>

        <!-- Instructions -->
        <div class="mt-12 bg-blue-50 border-2 border-blue-200 rounded-xl p-6">
            <h3 class="text-xl font-bold text-blue-900 mb-4">How to Test</h3>
            <div class="space-y-2 text-blue-800">
                <p>• Click on any test card above to open the unified booking form</p>
                <p>• The form will automatically suggest a budget range based on the price</p>
                <p>• You can override the budget range selection</p>
                <p>• The pricing will update dynamically based on your selection</p>
                <p>• All forms use the same controller logic and styling</p>
            </div>
        </div>
    </div>
</div>
@endsection