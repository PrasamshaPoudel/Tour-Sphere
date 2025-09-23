@extends('layouts.app')

@section('title', 'Book Your Trip - Tour Sphere')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-5xl font-bold text-gray-900 mb-6 bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Book Your Adventure</h1>
            <p class="text-xl text-gray-700 font-semibold">Fill in your details and let's make your dream trip happen!</p>
            
        </div>

        <!-- Booking Form -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border-2 border-gray-200">
            <form action="{{ route('booking.process') }}" method="POST" class="p-10" id="bookingForm">
                @csrf
                
                <!-- Hidden fields for destination data -->
                <input type="hidden" name="destination_id" id="destination_id" value="{{ $pendingBooking['destination_id'] ?? $destination_id ?? 4 }}">
                <input type="hidden" name="destination_title" id="destination_title" value="{{ $pendingBooking['destination_title'] ?? $destination_title ?? 'Selected Destination' }}">
                <input type="hidden" name="price" id="price" value="{{ $pendingBooking['price'] ?? $price ?? 0 }}">
                <input type="hidden" name="total_amount" id="total_amount" value="{{ $pendingBooking['total_amount'] ?? $total_amount ?? 0 }}">

                @if(($isPromo ?? false) === true || ($isPromo ?? false) === 1)
                <!-- Promo Banner -->
                <div class="mb-8">
                    <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl p-6 mb-6 shadow-lg text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-3xl font-bold mb-2">🎉 Special Promo Offer!</h2>
                                <p class="text-xl font-semibold">{{ $discount ?? 35 }}% OFF on all destinations</p>
                                <p class="text-green-100">Limited time offer - Don't miss out!</p>
                            </div>
                            <div class="text-right">
                                <div class="text-4xl font-bold">{{ $discount ?? 35 }}%</div>
                                <div class="text-lg">OFF</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Destination Selection for Promo -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Choose Your Destination</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @php
                            // Hardcoded realistic prices for promo destinations with correct descriptions
                            $promoDestinations = [
                                // Popular Destinations
                                [
                                    'id' => 4,
                                    'name' => 'Everest Base Camp Trek',
                                    'description' => 'Trek to the base of the world\'s highest peak with stunning mountain views.',
                                    'price' => 80000
                                ],
                                [
                                    'id' => 12,
                                    'name' => 'Lumbini Pilgrimage',
                                    'description' => 'Visit the birthplace of Lord Buddha and sacred monasteries.',
                                    'price' => 10000
                                ],
                                [
                                    'id' => 14,
                                    'name' => 'Muktinath Temple',
                                    'description' => 'Sacred temple at 3,800m altitude in Mustang region.',
                                    'price' => 45000
                                ],
                                [
                                    'id' => 4,
                                    'name' => 'Pokhara',
                                    'description' => 'Adventure hub with paragliding, boating, and stunning Annapurna mountain views.',
                                    'price' => 12000
                                ],
                                [
                                    'id' => 5,
                                    'name' => 'Chitwan Safari',
                                    'description' => 'Wildlife safari with rhinos, tigers, elephants, and jungle adventures.',
                                    'price' => 15000
                                ],
                                [
                                    'id' => 6,
                                    'name' => 'Annapurna Circuit',
                                    'description' => 'Legendary trek through diverse landscapes, villages, and mountain views.',
                                    'price' => 70000
                                ],
                                [
                                    'id' => 7,
                                    'name' => 'Gosaikunda',
                                    'description' => 'Scenic alpine lake and sacred Hindu pilgrimage site in Langtang.',
                                    'price' => 25000
                                ],
                                [
                                    'id' => 8,
                                    'name' => 'Pathivara',
                                    'description' => 'Sacred pilgrimage site in Taplejung with panoramic mountain views.',
                                    'price' => 18000
                                ],
                                [
                                    'id' => 9,
                                    'name' => 'Annapurna Base Camp',
                                    'description' => 'Glacial sanctuary beneath towering peaks.',
                                    'price' => 60000
                                ],
                                [
                                    'id' => 10,
                                    'name' => 'Ghandruk',
                                    'description' => 'Traditional Gurung village with spectacular Annapurna mountain views.',
                                    'price' => 15000
                                ],
                                [
                                    'id' => 11,
                                    'name' => 'Dhorpatan',
                                    'description' => 'Remote valley with wild beauty.',
                                    'price' => 35000
                                ],
                                [
                                    'id' => 12,
                                    'name' => 'Ilam',
                                    'description' => 'Tea gardens and mountain views in eastern Nepal.',
                                    'price' => 8000
                                ],
                                // Additional Adventure Activities
                                [
                                    'id' => 17,
                                    'name' => 'Pokhara Paragliding',
                                    'description' => 'Soar above Phewa Lake with paragliding and enjoy panoramic mountain views.',
                                    'price' => 10000
                                ],
                                [
                                    'id' => 18,
                                    'name' => 'Trishuli River Rafting',
                                    'description' => 'Exciting white water rafting on the Trishuli River.',
                                    'price' => 4000
                                ],
                                [
                                    'id' => 19,
                                    'name' => 'Bungee Jumping',
                                    'description' => 'Thrilling bungee jump from 160m high suspension bridge.',
                                    'price' => 8000
                                ],
                                [
                                    'id' => 20,
                                    'name' => 'Kathmandu Durbar Square',
                                    'description' => 'Explore ancient royal palaces and temples in the heart of Kathmandu.',
                                    'price' => 1500
                                ]
                            ];
                        @endphp
                        @foreach($promoDestinations as $dest)
                            <div class="bg-white border-2 border-gray-200 rounded-xl p-4 hover:border-blue-400 hover:shadow-lg transition-all cursor-pointer destination-option" 
                                 data-id="{{ $dest['id'] }}" 
                                 data-name="{{ $dest['name'] }}" 
                                 data-price="{{ $dest['price'] }}"
                                 data-description="{{ $dest['description'] }}">
                                <div class="text-center">
                                    
                                    <h3 class="font-bold text-gray-900 mb-2">{{ $dest['name'] }}</h3>
                                    <p class="text-sm text-gray-600 mb-3">{{ Str::limit($dest['description'], 50) }}</p>
                                    <div class="space-y-1">
                                        <div class="text-lg font-bold text-red-600 line-through">
                                            Rs {{ number_format($dest['price']) }}
                                        </div>
                                        <div class="text-xl font-bold text-green-600">
                                            Rs {{ number_format($dest['price'] * (1 - ($discount ?? 35) / 100)) }}
                                        </div>
                                        <div class="text-sm font-bold text-green-700 bg-green-100 px-2 py-1 rounded-full">
                                            {{ $discount ?? 35 }}% OFF
                                        </div>
                                        <div class="text-sm text-gray-500">per person</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Destination Display -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">
                        @if($isPromo ?? false)
                            Selected Destination
                        @else
                            Selected Destination
                        @endif
                    </h2>
                    
                    <div class="bg-gradient-to-r from-blue-100 to-indigo-100 border-2 border-blue-300 rounded-xl p-6 mb-6 shadow-lg">
                        <div class="flex items-center space-x-4">
                            <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-md">
                                <i class="fas fa-mountain text-white text-2xl"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-gray-900" id="destination_display_title">
                                    @if($isPromo ?? false)
                                        Choose a destination above
                                    @else
                                        {{ $pendingBooking['destination_title'] ?? $destination->name ?? 'Destination' }}
                                    @endif
                                </h3>
                                <p class="text-gray-700 mb-3 font-medium" id="destination_description">
                                    @if($isPromo ?? false)
                                        Select a destination to see details and pricing
                                    @else
                                        {{ $destination->description ?? 'Amazing destination for your next adventure' }}
                                    @endif
                                </p>
                                
                                <!-- Adventure Type and Category -->
                                <div class="flex flex-wrap gap-2 mb-4" id="adventure-tags">
                                    @if($isPromo ?? false)
                                        <span class="px-4 py-2 text-sm font-bold rounded-full shadow-md bg-gradient-to-r from-green-200 to-emerald-200 text-green-900 border-2 border-green-300">
                                            🎉 Promo Offer
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="flex items-center space-x-4">
                                    @if($isPromo ?? false)
                                        <div class="text-center">
                                            <div class="text-3xl font-bold text-green-600" id="price_display">
                                                Select destination
                                            </div>
                                            <div class="text-lg font-semibold text-gray-600">per person</div>
                                        </div>
                                    @else
                                        <span class="text-3xl font-bold text-blue-700" id="price_display">
                                            Rs {{ number_format($pendingBooking['price'] ?? $destination->price ?? 0) }}
                                        </span>
                                        <span class="text-lg font-semibold text-gray-600">per person</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Travel Details -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Travel Details</h2>
                    
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-200 rounded-xl p-6 shadow-lg">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Travel Date -->
                            <div>
                                <label for="travel_date" class="block text-lg font-bold text-gray-800 mb-3">
                                    Travel Date <span class="text-red-600">*</span>
                                </label>
                                <input type="date" 
                                       name="travel_date" 
                                       id="travel_date"
                                       value="{{ old('travel_date') }}"
                                       min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                       class="w-full rounded-lg border-2 border-green-300 shadow-md focus:border-green-500 focus:ring-2 focus:ring-green-200 focus:ring-opacity-50 text-lg font-semibold py-3 px-4"
                                       required>
                                @error('travel_date')
                                    <p class="mt-2 text-sm font-bold text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Number of People -->
                            <div>
                                <label for="num_people" class="block text-lg font-bold text-gray-800 mb-3">
                                    Number of People <span class="text-red-600">*</span>
                                </label>
                                <input type="number" 
                                       name="num_people" 
                                       id="num_people"
                                       value="{{ old('num_people', $pendingBooking['num_people'] ?? 1) }}"
                                       min="1" 
                                       max="20"
                                       class="w-full rounded-lg border-2 border-green-300 shadow-md focus:border-green-500 focus:ring-2 focus:ring-green-200 focus:ring-opacity-50 text-lg font-semibold py-3 px-4"
                                       onchange="calculateTotal()"
                                       required>
                                @error('num_people')
                                    <p class="mt-2 text-sm font-bold text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Personal Information -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Your Information</h2>
                    
                    <div class="bg-gradient-to-r from-purple-50 to-pink-50 border-2 border-purple-200 rounded-xl p-6 shadow-lg">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-lg font-bold text-gray-800 mb-3">
                                    Full Name <span class="text-red-600">*</span>
                                </label>
                                <input type="text" 
                                       name="name" 
                                       id="name"
                                       value="{{ old('name', $pendingBooking['name'] ?? $user->name ?? '') }}"
                                       class="w-full rounded-lg border-2 border-purple-300 shadow-md focus:border-purple-500 focus:ring-2 focus:ring-purple-200 focus:ring-opacity-50 text-lg font-semibold py-3 px-4"
                                       required>
                                @error('name')
                                    <p class="mt-2 text-sm font-bold text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-lg font-bold text-gray-800 mb-3">
                                    Email Address <span class="text-red-600">*</span>
                                </label>
                                <input type="email" 
                                       name="email" 
                                       id="email"
                                       value="{{ old('email', $pendingBooking['email'] ?? $user->email ?? '') }}"
                                       class="w-full rounded-lg border-2 border-purple-300 shadow-md focus:border-purple-500 focus:ring-2 focus:ring-purple-200 focus:ring-opacity-50 text-lg font-semibold py-3 px-4"
                                       required>
                                @error('email')
                                    <p class="mt-2 text-sm font-bold text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="md:col-span-2">
                                <label for="phone" class="block text-lg font-bold text-gray-800 mb-3">
                                    Phone Number
                                </label>
                                <input type="tel" 
                                       name="phone" 
                                       id="phone"
                                       value="{{ old('phone', $pendingBooking['phone'] ?? $user->phone ?? '') }}"
                                       class="w-full rounded-lg border-2 border-purple-300 shadow-md focus:border-purple-500 focus:ring-2 focus:ring-purple-200 focus:ring-opacity-50 text-lg font-semibold py-3 px-4">
                                @error('phone')
                                    <p class="mt-2 text-sm font-bold text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Price Summary -->
                <div class="bg-gradient-to-r from-orange-50 to-yellow-50 border-2 border-orange-200 rounded-xl p-6 mb-8 shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Price Summary</h3>
                    <div class="bg-white rounded-lg p-4 shadow-md">
                        <table class="w-full">
                            <tbody class="space-y-4">
                                <tr class="border-b-2 border-gray-200">
                                    <td class="py-3 text-lg font-bold text-gray-800">Price per person:</td>
                                    <td class="py-3 text-right text-xl font-bold text-blue-700" id="price-per-person">
                                        Rs {{ number_format($pendingBooking['price'] ?? $destination->price ?? 0) }}
                                    </td>
                                </tr>
                                <tr class="border-b-2 border-gray-200">
                                    <td class="py-3 text-lg font-bold text-gray-800">Number of people:</td>
                                    <td class="py-3 text-right text-xl font-bold text-green-700" id="people-count">1</td>
                                </tr>
                                <tr class="bg-gradient-to-r from-blue-100 to-indigo-100">
                                    <td class="py-4 text-xl font-bold text-gray-900">Total Price:</td>
                                    <td class="py-4 text-right text-2xl font-bold text-blue-800" id="total-price">
                                        Rs {{ number_format($pendingBooking['price'] ?? $destination->price ?? 0) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" 
                            class="inline-flex items-center px-12 py-4 border-2 border-transparent text-xl font-bold rounded-xl shadow-xl text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-calendar-check mr-3 text-2xl"></i>
                        Confirm Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize pricing calculation
    calculateTotal();
    
    // Add event listeners
    const peopleInput = document.getElementById('num_people');
    
    if (peopleInput) {
        peopleInput.addEventListener('input', calculateTotal);
    }
    
    // Set adventure types based on destination
    setAdventureTypes();
    
    // Handle destination selection for promo bookings
    handlePromoDestinationSelection();
});

function setAdventureTypes() {
    const destinationTitleElement = document.getElementById('destination_display_title');
    const adventureTagsContainer = document.getElementById('adventure-tags');
    
    if (!destinationTitleElement || !adventureTagsContainer) {
        return; // Exit if elements don't exist
    }
    
    const destinationTitle = destinationTitleElement.textContent;
    
    // Define adventure types for each destination
    const adventureTypes = {
        'Everest Base Camp': [
            { text: '🏔️ Trekking', class: 'bg-gradient-to-r from-green-200 to-emerald-200 text-green-900 border-2 border-green-300' },
            { text: '🥾 Adventure', class: 'bg-gradient-to-r from-blue-200 to-cyan-200 text-blue-900 border-2 border-blue-300' },
            { text: '🌟 Premium', class: 'bg-gradient-to-r from-purple-200 to-violet-200 text-purple-900 border-2 border-purple-300' }
        ],
        'Lumbini': [
            { text: '🙏 Cultural/Spiritual', class: 'bg-gradient-to-r from-yellow-200 to-amber-200 text-yellow-900 border-2 border-yellow-300' },
            { text: '🏛️ Heritage', class: 'bg-gradient-to-r from-orange-200 to-red-200 text-orange-900 border-2 border-orange-300' },
            { text: '🕉️ Pilgrimage', class: 'bg-gradient-to-r from-red-200 to-pink-200 text-red-900 border-2 border-red-300' }
        ],
        'Upper Mustang': [
            { text: '🏔️ Adventure & Culture', class: 'bg-gradient-to-r from-blue-200 to-indigo-200 text-blue-900 border-2 border-blue-300' },
            { text: '🏜️ Desert Trek', class: 'bg-gradient-to-r from-yellow-200 to-orange-200 text-yellow-900 border-2 border-yellow-300' },
            { text: '🏛️ Cultural', class: 'bg-gradient-to-r from-orange-200 to-amber-200 text-orange-900 border-2 border-orange-300' }
        ],
        'Pokhara': [
            { text: '🪂 Adventure (Paragliding)', class: 'bg-gradient-to-r from-blue-200 to-sky-200 text-blue-900 border-2 border-blue-300' },
            { text: '🏔️ Mountain Views', class: 'bg-gradient-to-r from-green-200 to-teal-200 text-green-900 border-2 border-green-300' },
            { text: '🏞️ Nature', class: 'bg-gradient-to-r from-purple-200 to-indigo-200 text-purple-900 border-2 border-purple-300' }
        ],
        'Pokhara Paragliding': [
            { text: '🪂 Adventure (Paragliding)', class: 'bg-gradient-to-r from-blue-200 to-sky-200 text-blue-900 border-2 border-blue-300' },
            { text: '🏔️ Mountain Views', class: 'bg-gradient-to-r from-green-200 to-teal-200 text-green-900 border-2 border-green-300' },
            { text: '🏞️ Nature', class: 'bg-gradient-to-r from-purple-200 to-indigo-200 text-purple-900 border-2 border-purple-300' }
        ],
        'Chitwan Safari': [
            { text: '🦏 Wildlife Safari', class: 'bg-gradient-to-r from-green-200 to-lime-200 text-green-900 border-2 border-green-300' },
            { text: '🐅 Jungle Adventure', class: 'bg-gradient-to-r from-orange-200 to-yellow-200 text-orange-900 border-2 border-orange-300' },
            { text: '🌿 Nature', class: 'bg-gradient-to-r from-purple-200 to-pink-200 text-purple-900 border-2 border-purple-300' }
        ],
        'Annapurna Circuit': [
            { text: '🥾 Trekking', class: 'bg-gradient-to-r from-green-200 to-emerald-200 text-green-900 border-2 border-green-300' },
            { text: '🏔️ Mountain Views', class: 'bg-gradient-to-r from-blue-200 to-cyan-200 text-blue-900 border-2 border-blue-300' },
            { text: '🌟 Legendary', class: 'bg-gradient-to-r from-purple-200 to-violet-200 text-purple-900 border-2 border-purple-300' }
        ],
        'Gosaikunda': [
            { text: '🙏 Spiritual & Nature', class: 'bg-gradient-to-r from-yellow-200 to-amber-200 text-yellow-900 border-2 border-yellow-300' },
            { text: '🏔️ Alpine Lake', class: 'bg-gradient-to-r from-blue-200 to-cyan-200 text-blue-900 border-2 border-blue-300' },
            { text: '🕉️ Pilgrimage', class: 'bg-gradient-to-r from-red-200 to-pink-200 text-red-900 border-2 border-red-300' }
        ],
        'Pathivara': [
            { text: '🙏 Spiritual Tour', class: 'bg-gradient-to-r from-yellow-200 to-amber-200 text-yellow-900 border-2 border-yellow-300' },
            { text: '🏔️ Mountain Views', class: 'bg-gradient-to-r from-blue-200 to-cyan-200 text-blue-900 border-2 border-blue-300' },
            { text: '🕉️ Pilgrimage', class: 'bg-gradient-to-r from-red-200 to-pink-200 text-red-900 border-2 border-red-300' }
        ],
        'Bungee Jumping': [
            { text: '🎢 Extreme Sports', class: 'bg-gradient-to-r from-red-200 to-pink-200 text-red-900 border-2 border-red-300' },
            { text: '💪 Adventure', class: 'bg-gradient-to-r from-blue-200 to-cyan-200 text-blue-900 border-2 border-blue-300' },
            { text: '⚡ Thrilling', class: 'bg-gradient-to-r from-purple-200 to-violet-200 text-purple-900 border-2 border-purple-300' }
        ],
        'Trishuli River Rafting': [
            { text: '🚣 Water Sports', class: 'bg-gradient-to-r from-blue-200 to-cyan-200 text-blue-900 border-2 border-blue-300' },
            { text: '🌊 Rafting', class: 'bg-gradient-to-r from-green-200 to-teal-200 text-green-900 border-2 border-green-300' },
            { text: '💪 Adventure', class: 'bg-gradient-to-r from-orange-200 to-red-200 text-orange-900 border-2 border-orange-300' }
        ],
        'Kathmandu Durbar Square': [
            { text: '🏛️ Cultural Tour', class: 'bg-gradient-to-r from-yellow-200 to-amber-200 text-yellow-900 border-2 border-yellow-300' },
            { text: '🏺 Heritage', class: 'bg-gradient-to-r from-orange-200 to-red-200 text-orange-900 border-2 border-orange-300' },
            { text: '📚 Historical', class: 'bg-gradient-to-r from-purple-200 to-indigo-200 text-purple-900 border-2 border-purple-300' }
        ],
        'Everest Base Camp Trek': [
            { text: '🏔️ Trekking', class: 'bg-gradient-to-r from-green-200 to-emerald-200 text-green-900 border-2 border-green-300' },
            { text: '🥾 Adventure', class: 'bg-gradient-to-r from-blue-200 to-cyan-200 text-blue-900 border-2 border-blue-300' },
            { text: '🌟 Premium', class: 'bg-gradient-to-r from-purple-200 to-violet-200 text-purple-900 border-2 border-purple-300' }
        ],
        'Annapurna Base Camp': [
            { text: '🏔️ Trekking', class: 'bg-gradient-to-r from-green-200 to-emerald-200 text-green-900 border-2 border-green-300' },
            { text: '🥾 Adventure', class: 'bg-gradient-to-r from-blue-200 to-cyan-200 text-blue-900 border-2 border-blue-300' },
            { text: '🌟 Glacial Sanctuary', class: 'bg-gradient-to-r from-purple-200 to-violet-200 text-purple-900 border-2 border-purple-300' }
        ],
        'Ghandruk': [
            { text: '🏘️ Cultural Village', class: 'bg-gradient-to-r from-yellow-200 to-amber-200 text-yellow-900 border-2 border-yellow-300' },
            { text: '🏔️ Mountain Views', class: 'bg-gradient-to-r from-blue-200 to-cyan-200 text-blue-900 border-2 border-blue-300' },
            { text: '🥾 Short Trek', class: 'bg-gradient-to-r from-green-200 to-emerald-200 text-green-900 border-2 border-green-300' }
        ],
        'Dhorpatan': [
            { text: '🏔️ Remote Valley', class: 'bg-gradient-to-r from-blue-200 to-cyan-200 text-blue-900 border-2 border-blue-300' },
            { text: '🥾 Adventure Trek', class: 'bg-gradient-to-r from-green-200 to-emerald-200 text-green-900 border-2 border-green-300' },
            { text: '🌿 Wild Beauty', class: 'bg-gradient-to-r from-purple-200 to-pink-200 text-purple-900 border-2 border-purple-300' }
        ],
        'Ilam': [
            { text: '🍃 Tea Gardens', class: 'bg-gradient-to-r from-green-200 to-lime-200 text-green-900 border-2 border-green-300' },
            { text: '🏔️ Mountain Views', class: 'bg-gradient-to-r from-blue-200 to-cyan-200 text-blue-900 border-2 border-blue-300' },
            { text: '🌿 Nature', class: 'bg-gradient-to-r from-purple-200 to-indigo-200 text-purple-900 border-2 border-purple-300' }
        ],
        'Annapurna Circuit Trek': [
            { text: '🥾 Trekking', class: 'bg-gradient-to-r from-green-200 to-emerald-200 text-green-900 border-2 border-green-300' },
            { text: '🏔️ Mountain Views', class: 'bg-gradient-to-r from-blue-200 to-cyan-200 text-blue-900 border-2 border-blue-300' },
            { text: '🌟 Legendary', class: 'bg-gradient-to-r from-purple-200 to-violet-200 text-purple-900 border-2 border-purple-300' }
        ],
        'Annapurna Circuit': [
            { text: '🥾 Trekking', class: 'bg-gradient-to-r from-green-200 to-emerald-200 text-green-900 border-2 border-green-300' },
            { text: '🏔️ Mountain Views', class: 'bg-gradient-to-r from-blue-200 to-cyan-200 text-blue-900 border-2 border-blue-300' },
            { text: '🌟 Legendary', class: 'bg-gradient-to-r from-purple-200 to-violet-200 text-purple-900 border-2 border-purple-300' }
        ],
        'Everest Base Camp': [
            { text: '🏔️ Trekking', class: 'bg-gradient-to-r from-green-200 to-emerald-200 text-green-900 border-2 border-green-300' },
            { text: '🥾 Adventure', class: 'bg-gradient-to-r from-blue-200 to-cyan-200 text-blue-900 border-2 border-blue-300' },
            { text: '🌟 Premium', class: 'bg-gradient-to-r from-purple-200 to-violet-200 text-purple-900 border-2 border-purple-300' }
        ],
        'Lumbini': [
            { text: '🙏 Cultural/Spiritual', class: 'bg-gradient-to-r from-yellow-200 to-amber-200 text-yellow-900 border-2 border-yellow-300' },
            { text: '🏛️ Heritage', class: 'bg-gradient-to-r from-orange-200 to-red-200 text-orange-900 border-2 border-orange-300' },
            { text: '🕉️ Pilgrimage', class: 'bg-gradient-to-r from-red-200 to-pink-200 text-red-900 border-2 border-red-300' }
        ],
        'Upper Mustang': [
            { text: '🏔️ Adventure & Culture', class: 'bg-gradient-to-r from-blue-200 to-indigo-200 text-blue-900 border-2 border-blue-300' },
            { text: '🏜️ Desert Trek', class: 'bg-gradient-to-r from-yellow-200 to-orange-200 text-yellow-900 border-2 border-yellow-300' },
            { text: '🏛️ Cultural', class: 'bg-gradient-to-r from-orange-200 to-amber-200 text-orange-900 border-2 border-orange-300' }
        ],
        'Pokhara': [
            { text: '🪂 Adventure (Paragliding)', class: 'bg-gradient-to-r from-blue-200 to-sky-200 text-blue-900 border-2 border-blue-300' },
            { text: '🏔️ Mountain Views', class: 'bg-gradient-to-r from-green-200 to-teal-200 text-green-900 border-2 border-green-300' },
            { text: '🏞️ Nature', class: 'bg-gradient-to-r from-purple-200 to-indigo-200 text-purple-900 border-2 border-purple-300' }
        ],
        'Chitwan Safari': [
            { text: '🦏 Wildlife Safari', class: 'bg-gradient-to-r from-green-200 to-lime-200 text-green-900 border-2 border-green-300' },
            { text: '🐅 Jungle Adventure', class: 'bg-gradient-to-r from-orange-200 to-yellow-200 text-orange-900 border-2 border-orange-300' },
            { text: '🌿 Nature', class: 'bg-gradient-to-r from-purple-200 to-pink-200 text-purple-900 border-2 border-purple-300' }
        ],
        'Pathivara': [
            { text: '🙏 Spiritual Tour', class: 'bg-gradient-to-r from-yellow-200 to-amber-200 text-yellow-900 border-2 border-yellow-300' },
            { text: '🏔️ Mountain Views', class: 'bg-gradient-to-r from-blue-200 to-cyan-200 text-blue-900 border-2 border-blue-300' },
            { text: '🕉️ Pilgrimage', class: 'bg-gradient-to-r from-red-200 to-pink-200 text-red-900 border-2 border-red-300' }
        ]
    };
    
    // Get adventure types for current destination or default
    const types = adventureTypes[destinationTitle] || [
        { text: '🏔️ Adventure', class: 'bg-gradient-to-r from-blue-200 to-cyan-200 text-blue-900 border-2 border-blue-300' },
        { text: '🥾 Trekking', class: 'bg-gradient-to-r from-green-200 to-emerald-200 text-green-900 border-2 border-green-300' },
        { text: '🌟 Premium', class: 'bg-gradient-to-r from-purple-200 to-violet-200 text-purple-900 border-2 border-purple-300' }
    ];
    
    // Clear existing tags
    adventureTagsContainer.innerHTML = '';
    
    // Add new tags
    types.forEach(type => {
        const tag = document.createElement('span');
        tag.className = `px-4 py-2 text-sm font-bold rounded-full shadow-md ${type.class}`;
        tag.textContent = type.text;
        adventureTagsContainer.appendChild(tag);
    });
}

function calculateTotal() {
    const peopleInput = document.getElementById('num_people');
    const pricePerPersonSpan = document.getElementById('price-per-person');
    const peopleCountSpan = document.getElementById('people-count');
    const totalPriceSpan = document.getElementById('total-price');
    const totalAmountInput = document.getElementById('total_amount');
    const priceDisplay = document.getElementById('price_display');
    const priceInput = document.getElementById('price');
    
    if (!peopleInput) {
        return; // Exit if required element doesn't exist
    }
    
    const people = parseInt(peopleInput.value) || 0;
    
    // Get price from the hidden input field (which contains the actual price to use)
    let price = parseFloat(priceInput.value) || 0;
    
    // If no price in input, try to extract from price display
    if (price === 0 && pricePerPersonSpan) {
        const priceText = pricePerPersonSpan.textContent;
        price = parseFloat(priceText.replace(/[^\d.]/g, '')) || 0;
    }
    
    const total = price * people;
    
    if (peopleCountSpan) peopleCountSpan.textContent = people;
    if (totalPriceSpan) totalPriceSpan.textContent = 'Rs ' + total.toLocaleString();
    if (totalAmountInput) totalAmountInput.value = total;
    
    // Update the price display in the destination card only if it's not a promo booking
    const isPromo = {{ $isPromo ?? false ? 'true' : 'false' }};
    if (priceDisplay && !isPromo) {
        priceDisplay.textContent = 'Rs ' + price.toLocaleString();
    }
}

function handlePromoDestinationSelection() {
    const destinationOptions = document.querySelectorAll('.destination-option');
    const isPromo = {{ $isPromo ?? false ? 'true' : 'false' }};
    const discount = {{ $discount ?? 35 }};
    
    if (!isPromo) return;
    
    destinationOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Remove previous selection
            destinationOptions.forEach(opt => opt.classList.remove('border-blue-500', 'bg-blue-50'));
            
            // Add selection to clicked option
            this.classList.add('border-blue-500', 'bg-blue-50');
            
            // Get destination data
            const destId = this.dataset.id;
            const destName = this.dataset.name;
            const destPrice = parseFloat(this.dataset.price);
            const destDescription = this.dataset.description;
            
            // Calculate discounted price
            const discountedPrice = destPrice * (1 - discount / 100);
            
            // Update form fields
            const destIdInput = document.getElementById('destination_id');
            const destTitleInput = document.getElementById('destination_title');
            const priceInput = document.getElementById('price');
            const destTitleDisplay = document.getElementById('destination_display_title');
            const destDescDisplay = document.getElementById('destination_description');
            
            if (destIdInput) destIdInput.value = destId;
            if (destTitleInput) destTitleInput.value = destName;
            if (priceInput) priceInput.value = discountedPrice;
            
            // Update display
            if (destTitleDisplay) destTitleDisplay.textContent = destName;
            if (destDescDisplay) destDescDisplay.textContent = destDescription;
            const priceDisplay = document.getElementById('price_display');
            if (priceDisplay) {
                priceDisplay.innerHTML = `
                    <div class="text-center">
                        <div class="text-2xl font-bold text-red-600 line-through">Rs ${destPrice.toLocaleString()}</div>
                        <div class="text-3xl font-bold text-green-600">Rs ${discountedPrice.toLocaleString()}</div>
                        <div class="text-sm font-bold text-green-700 bg-green-100 px-3 py-1 rounded-full inline-block mt-1">
                            ${discount}% OFF
                        </div>
                    </div>
                `;
            }
            
            // Update price summary
            const pricePerPerson = document.getElementById('price-per-person');
            if (pricePerPerson) {
                pricePerPerson.innerHTML = `
                    <div class="text-center">
                        <div class="text-lg font-bold text-red-600 line-through">Rs ${destPrice.toLocaleString()}</div>
                        <div class="text-xl font-bold text-green-600">Rs ${discountedPrice.toLocaleString()}</div>
                        <div class="text-xs font-bold text-green-700 bg-green-100 px-2 py-1 rounded-full inline-block mt-1">
                            ${discount}% OFF
                        </div>
                    </div>
                `;
            }
            
            // Update adventure tags
            setAdventureTypes();
            
            // Recalculate total
            calculateTotal();
        });
    });
}
</script>
@endsection
