@extends('layouts.app')

@section('title', 'Nature Experiences in Nepal')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-gradient-to-r from-green-800 to-emerald-600 text-white">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative z-10 container mx-auto px-4 h-full flex items-center">
        <div class="max-w-4xl">
            <h1 class="text-5xl font-bold mb-6">Nature Experiences in Nepal</h1>
            <p class="text-xl mb-8">Immerse yourself in Nepal's pristine natural beauty. From serene lakes to towering peaks, discover the untouched wilderness that makes Nepal truly magical.</p>
            <div class="flex flex-wrap gap-4">
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Pristine Wilderness</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Wildlife Encounters</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Mountain Views</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Experiences Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Choose Your Nature Adventure</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                From tranquil lakes to wildlife safaris, experience the diverse natural wonders of Nepal.
            </p>
        </div>

        <div class="space-y-16">
            @foreach($experiences as $index => $experience)
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden {{ $index % 2 == 1 ? 'md:flex-row-reverse' : '' }} md:flex">
                <!-- Experience Image -->
                <div class="md:w-1/2 relative">
                    <img src="{{ asset('images/' . $experience['image']) }}" 
                         alt="{{ $experience['name'] }}" 
                         class="w-full h-96 md:h-full object-cover">
                    <div class="absolute top-6 left-6 bg-green-500 text-white px-4 py-2 rounded-full font-bold">
                        {{ $experience['type'] }}
                    </div>
                    <div class="absolute bottom-6 right-6 bg-black bg-opacity-70 text-white px-4 py-2 rounded-full">
                        {{ $experience['cost'] }}
                    </div>
                </div>

                <!-- Experience Details -->
                <div class="md:w-1/2 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-3xl font-bold text-gray-900">{{ $experience['name'] }}</h3>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-500">📍</span>
                            <span class="text-sm text-gray-600">{{ $experience['location'] }}</span>
                        </div>
                    </div>

                    <p class="text-gray-600 mb-6 leading-relaxed">{{ $experience['description'] }}</p>

                    <!-- Key Info -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-emerald-50 p-4 rounded-lg">
                            <div class="text-sm text-emerald-600 font-semibold">Duration</div>
                            <div class="text-lg font-bold text-gray-900">{{ $experience['duration'] }}</div>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg">
                            <div class="text-sm text-green-600 font-semibold">Best Season</div>
                            <div class="text-lg font-bold text-gray-900">{{ $experience['best_season'] }}</div>
                        </div>
                    </div>

                    <!-- Weather Widget -->
                    <div class="bg-gradient-to-r from-emerald-500 to-green-600 text-white p-4 rounded-lg mb-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-sm opacity-90">Current Weather</div>
                                <div class="text-2xl font-bold">{{ $experience['weather']['temperature'] }}°C</div>
                                <div class="text-sm">{{ $experience['weather']['description'] }}</div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm opacity-90">Humidity: {{ $experience['weather']['humidity'] }}%</div>
                                <div class="text-sm opacity-90">Wind: {{ $experience['weather']['humidity'] }} m/s</div>
                            </div>
                        </div>
                    </div>

                    <!-- Highlights -->
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">Highlights</h4>
                        <ul class="space-y-2">
                            @foreach($experience['highlights'] as $highlight)
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span class="text-gray-600">{{ $highlight }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4">
                        <button onclick="toggleDetails('nature-{{ $index }}')" 
                                class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            View Details
                        </button>
                        <a href="{{ route('booking') }}?tour=nature-{{ strtolower(str_replace(' ', '-', $experience['name'])) }}&category=nature" 
                           class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Expandable Details -->
            <div id="details-nature-{{ $index }}" class="hidden bg-white rounded-2xl shadow-lg p-8 mb-8">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Itinerary -->
                    <div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">🗓️ Experience Itinerary</h4>
                        <div class="space-y-3">
                            @foreach($experience['itinerary'] as $day)
                            <div class="flex items-start">
                                <div class="bg-emerald-100 text-emerald-600 w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold mr-3 flex-shrink-0">
                                    {{ $loop->iteration }}
                                </div>
                                <p class="text-gray-700">{{ $day }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Things to Carry -->
                    <div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">🎒 What to Pack</h4>
                        <div class="grid grid-cols-1 gap-2">
                            @foreach($experience['things_to_carry'] as $item)
                            <div class="flex items-center">
                                <span class="text-emerald-500 mr-2">•</span>
                                <span class="text-gray-700">{{ $item }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🌿</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Eco-Friendly</h5>
                            <p class="text-sm text-gray-600">Sustainable tourism practices protecting Nepal's nature.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">📸</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Photography</h5>
                            <p class="text-sm text-gray-600">Perfect opportunities for nature and wildlife photography.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🏕️</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Accommodation</h5>
                            <p class="text-sm text-gray-600">Comfortable lodges and eco-friendly accommodations.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-emerald-600 to-green-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-6">Ready to Connect with Nature?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Book your nature experience today and discover the pristine wilderness that makes Nepal extraordinary.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('booking') }}?category=nature" 
               class="bg-white text-emerald-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Book Now
            </a>
            <a href="{{ route('contact') }}" 
               class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-emerald-600 transition-colors">
                Contact Us
            </a>
        </div>
    </div>
</section>

<script>
function toggleDetails(id) {
    const details = document.getElementById('details-' + id);
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

