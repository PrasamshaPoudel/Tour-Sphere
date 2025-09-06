@extends('layouts.app')

@section('title', $pkg['name'] . ' Package')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-gradient-to-r from-green-900 to-green-700 text-white">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="relative z-10 container mx-auto px-4 h-full flex items-center">
        <div class="max-w-4xl">
            <h1 class="text-5xl font-bold mb-6">{{ $pkg['name'] }}</h1>
            <p class="text-xl mb-8">{{ $pkg['overview'] }}</p>
            <div class="flex flex-wrap gap-4">
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Duration: {{ $pkg['duration'] }}</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Difficulty: {{ $pkg['difficulty'] }}</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">From {{ $pkg['price'] }}</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Package Overview Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden md:flex">
            <!-- Package Image -->
            <div class="md:w-1/2 relative">
                <img src="{{ asset($pkg['image']) }}" 
                     alt="{{ $pkg['name'] }}" 
                     class="w-full h-96 md:h-full object-cover">
            </div>

            <!-- Package Details -->
            <div class="md:w-1/2 p-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-3xl font-bold text-gray-900">{{ $pkg['name'] }}</h3>
                    <div class="text-green-600 font-bold text-xl">{{ $pkg['price'] }}</div>
                </div>
                <p class="text-gray-600 mb-6 leading-relaxed">{{ $pkg['overview'] }}</p>

                <!-- Action Buttons -->
                <div class="flex gap-4">
                    <button onclick="toggleDetails('itinerary')" 
                            class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                        View Details
                    </button>
                    <a href="{{ route('booking') }}?tour={{ $slug }}&category=trekking" 
                       class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                        Book Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Expandable Details -->
<div id="details-itinerary" class="hidden container mx-auto px-4 bg-white rounded-2xl shadow-lg p-8 mb-16">
    <div class="grid md:grid-cols-2 gap-8">
        <!-- Itinerary -->
        <div>
            <h4 class="text-xl font-bold text-gray-900 mb-4">📅 Itinerary</h4>
            <div class="space-y-3">
                @foreach($pkg['itinerary'] as $day)
                <div class="flex items-start">
                    <div class="bg-green-100 text-green-600 w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold mr-3 flex-shrink-0">
                        {{ $loop->iteration }}
                    </div>
                    <p class="text-gray-700">{{ $day }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Inclusions -->
        <div>
            <h4 class="text-xl font-bold text-gray-900 mb-4">🎒 Inclusions</h4>
            <div class="grid grid-cols-1 gap-2">
                @foreach($pkg['inclusions'] as $inc)
                <div class="flex items-center">
                    <span class="text-green-500 mr-2">•</span>
                    <span class="text-gray-700">{{ $inc }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Safety & Tips Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Tips & Preparation</h2>
            <p class="text-xl text-gray-600">Make the most out of your trekking adventure with these tips.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="bg-green-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">🥾</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Gear Up</h3>
                <p class="text-gray-600 text-sm">Wear proper trekking boots and pack light but essential items.</p>
            </div>
            <div class="text-center">
                <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">💧</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Stay Hydrated</h3>
                <p class="text-gray-600 text-sm">Carry a reusable water bottle and purification tablets.</p>
            </div>
            <div class="text-center">
                <div class="bg-yellow-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">🧥</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Layer Clothing</h3>
                <p class="text-gray-600 text-sm">Mountain weather changes fast—dress in layers for comfort.</p>
            </div>
            <div class="text-center">
                <div class="bg-red-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">⛰️</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Acclimatize</h3>
                <p class="text-gray-600 text-sm">Take it slow to adjust to altitude and avoid sickness.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-green-600 to-green-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-6">Ready for Your Trekking Adventure?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Book your trek today and immerse yourself in Nepal’s majestic landscapes and culture.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('booking') }}?tour={{ $slug }}&category=trekking" 
               class="bg-white text-green-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Book Now
            </a>
            <a href="{{ route('contact') }}" 
               class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-green-600 transition-colors">
                Contact Us
            </a>
        </div>
    </div>
</section>

<script>
function toggleDetails(index) {
    const details = document.getElementById('details-' + index);
    const button = event.target;

    if (details.classList.contains('hidden')) {
        details.classList.remove('hidden');
        button.textContent = 'Hide Details';
    } else {
        details.classList.add('hidden');
        button.textContent = 'View Details';
    }
}
</script>
@endsection
