@extends('layouts.app')

@section('title', 'Romantic Experiences in Nepal')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-gradient-to-r from-purple-800 to-pink-600 text-white">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative z-10 container mx-auto px-4 h-full flex items-center">
        <div class="max-w-4xl">
            <h1 class="text-5xl font-bold mb-6">Romantic Experiences in Nepal</h1>
            <p class="text-xl mb-8">Ignite the spark of romance with intimate experiences designed for couples. From candlelight dinners to mountain retreats, create magical moments together.</p>
            <div class="flex flex-wrap gap-4">
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Candlelight Dinners</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Private Experiences</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Romantic Settings</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Romantic Packages Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Choose Your Romantic Experience</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                From intimate candlelight dinners to mountain escapes, create unforgettable romantic moments in Nepal's most beautiful settings.
            </p>
        </div>

        <div class="space-y-16">
            @foreach($packages as $index => $package)
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden {{ $index % 2 == 1 ? 'md:flex-row-reverse' : '' }} md:flex">
                <!-- Package Image -->
                <div class="md:w-1/2 relative">
                    <img src="{{ asset('images/' . $package['image']) }}" 
                         alt="{{ $package['name'] }}" 
                         class="w-full h-96 md:h-full object-cover">
                    <div class="absolute top-6 left-6 bg-purple-500 text-white px-4 py-2 rounded-full font-bold">
                        {{ $package['type'] }}
                    </div>
                    <div class="absolute bottom-6 right-6 bg-black bg-opacity-70 text-white px-4 py-2 rounded-full">
                        {{ $package['cost'] }}
                    </div>
                </div>

                <!-- Package Details -->
                <div class="md:w-1/2 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-3xl font-bold text-gray-900">{{ $package['name'] }}</h3>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-500">💕</span>
                            <span class="text-sm text-gray-600">{{ $package['location'] }}</span>
                        </div>
                    </div>

                    <p class="text-gray-600 mb-6 leading-relaxed">{{ $package['description'] }}</p>

                    <!-- Key Info -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-purple-50 p-4 rounded-lg">
                            <div class="text-sm text-purple-600 font-semibold">Duration</div>
                            <div class="text-lg font-bold text-gray-900">{{ $package['duration'] }}</div>
                        </div>
                        <div class="bg-pink-50 p-4 rounded-lg">
                            <div class="text-sm text-pink-600 font-semibold">Best Season</div>
                            <div class="text-lg font-bold text-gray-900">{{ $package['best_season'] }}</div>
                        </div>
                    </div>

                    <!-- Weather Widget -->
                    @if(isset($weatherData[$package['name']]))
                    <div class="bg-gradient-to-r from-purple-500 to-pink-600 text-white p-4 rounded-lg mb-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div>
                                    <img src="https://openweathermap.org/img/wn/{{ $weatherData[$package['name']]['icon'] }}@2x.png" 
                                         alt="Weather icon" class="w-16 h-16">
                                </div>
                                <div>
                                    <div class="text-sm opacity-90">Current Weather - {{ explode(',', $package['location'])[0] }}</div>
                                    <div class="text-2xl font-bold">{{ $weatherData[$package['name']]['temperature'] }}°C</div>
                                    <div class="text-sm capitalize">{{ $weatherData[$package['name']]['description'] }}</div>
                                    
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm opacity-90">Humidity: {{ $weatherData[$package['name']]['humidity'] }}%</div>
                                <div class="text-sm opacity-90">Wind: {{ $weatherData[$package['name']]['wind_speed'] }} m/s</div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Highlights -->
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">Romantic Highlights</h4>
                        <ul class="space-y-2">
                            @foreach($package['highlights'] as $highlight)
                            <li class="flex items-start">
                                <span class="text-purple-500 mr-2">💕</span>
                                <span class="text-gray-600">{{ $highlight }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4">
                        <button onclick="toggleDetails('romantic-{{ $index }}')" 
                                class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            View Details
                        </button>
                        <a href="{{ route('booking') }}?tour=romantic-{{ strtolower(str_replace(' ', '-', $package['name'])) }}&category=romantic" 
                           class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Expandable Details -->
            <div id="details-romantic-{{ $index }}" class="hidden bg-white rounded-2xl shadow-lg p-8 mb-8">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Itinerary -->
                    <div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">💕 Romantic Timeline</h4>
                        <div class="space-y-3">
                            @foreach($package['itinerary'] as $day)
                            <div class="flex items-start">
                                <div class="bg-purple-100 text-purple-600 w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold mr-3 flex-shrink-0">
                                    {{ $loop->iteration }}
                                </div>
                                <p class="text-gray-700">{{ $day }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Things to Carry -->
                    <div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">💝 Romantic Essentials</h4>
                        <div class="grid grid-cols-1 gap-2">
                            @foreach($package['things_to_carry'] as $item)
                            <div class="flex items-center">
                                <span class="text-purple-500 mr-2">💕</span>
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
                            <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">💕</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Intimate</h5>
                            <p class="text-sm text-gray-600">Private experiences designed for couples only.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-pink-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🕯️</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Romantic</h5>
                            <p class="text-sm text-gray-600">Candlelight dinners and romantic settings.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">📸</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Memorable</h5>
                            <p class="text-sm text-gray-600">Professional photography to capture your moments.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-purple-600 to-pink-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-6">Ready to Spark Romance?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Book your romantic experience today and create magical moments that will strengthen your bond in Nepal's most beautiful settings.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('booking') }}?category=romantic" 
               class="bg-white text-purple-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Book Now
            </a>
            <a href="{{ route('contact') }}" 
               class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-purple-600 transition-colors">
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
