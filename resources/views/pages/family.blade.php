@extends('layouts.app')

@section('title', 'Family Packages in Nepal')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-gradient-to-r from-blue-800 to-green-600 text-white">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative z-10 container mx-auto px-4 h-full flex items-center">
        <div class="max-w-4xl">
            <h1 class="text-5xl font-bold mb-6">Family Packages in Nepal</h1>
            <p class="text-xl mb-8">Create unforgettable family memories in Nepal with activities designed for all ages. From wildlife safaris to cultural experiences, there's something for everyone.</p>
            <div class="flex flex-wrap gap-4">
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">All Ages Welcome</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Safe & Fun</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Educational</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Family Packages Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Choose Your Family Adventure</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                From wildlife encounters to cultural discoveries, create lasting memories with activities perfect for families of all sizes.
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
                    <div class="absolute top-6 left-6 bg-blue-500 text-white px-4 py-2 rounded-full font-bold">
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
                            <span class="text-sm text-gray-500">👨‍👩‍👧‍👦</span>
                            <span class="text-sm text-gray-600">{{ $package['location'] }}</span>
                        </div>
                    </div>

                    <p class="text-gray-600 mb-6 leading-relaxed">{{ $package['description'] }}</p>

                    <!-- Key Info -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <div class="text-sm text-blue-600 font-semibold">Duration</div>
                            <div class="text-lg font-bold text-gray-900">{{ $package['duration'] }}</div>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg">
                            <div class="text-sm text-green-600 font-semibold">Best Season</div>
                            <div class="text-lg font-bold text-gray-900">{{ $package['best_season'] }}</div>
                        </div>
                    </div>

                    <!-- Weather Widget -->
                    @if(isset($weatherData[$package['name']]))
                    <div class="bg-gradient-to-r from-blue-500 to-green-600 text-white p-4 rounded-lg mb-6">
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
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">Family Highlights</h4>
                        <ul class="space-y-2">
                            @foreach($package['highlights'] as $highlight)
                            <li class="flex items-start">
                                <span class="text-blue-500 mr-2">👨‍👩‍👧‍👦</span>
                                <span class="text-gray-600">{{ $highlight }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4">
                        <button onclick="toggleDetails('family-{{ $index }}')" 
                                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            View Details
                        </button>
                        <a href="{{ route('booking') }}?tour=family-{{ strtolower(str_replace(' ', '-', $package['name'])) }}&category=family" 
                           class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Expandable Details -->
            <div id="details-family-{{ $index }}" class="hidden bg-white rounded-2xl shadow-lg p-8 mb-8">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Itinerary -->
                    <div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">👨‍👩‍👧‍👦 Family Itinerary</h4>
                        <div class="space-y-3">
                            @foreach($package['itinerary'] as $day)
                            <div class="flex items-start">
                                <div class="bg-blue-100 text-blue-600 w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold mr-3 flex-shrink-0">
                                    {{ $loop->iteration }}
                                </div>
                                <p class="text-gray-700">{{ $day }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Things to Carry -->
                    <div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">🎒 Family Packing List</h4>
                        <div class="grid grid-cols-1 gap-2">
                            @foreach($package['things_to_carry'] as $item)
                            <div class="flex items-center">
                                <span class="text-blue-500 mr-2">👨‍👩‍👧‍👦</span>
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
                            <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">👨‍👩‍👧‍👦</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Family-Friendly</h5>
                            <p class="text-sm text-gray-600">Activities designed for all family members and ages.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🛡️</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Safe & Secure</h5>
                            <p class="text-sm text-gray-600">All activities are safe and supervised for families.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">📚</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Educational</h5>
                            <p class="text-sm text-gray-600">Learn about Nepal's culture, wildlife, and heritage together.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-green-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-6">Ready for Your Family Adventure?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Book your family package today and create memories that will bring your family closer together in the beautiful landscapes of Nepal.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('booking') }}?category=family" 
               class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Book Now
            </a>
            <a href="{{ route('contact') }}" 
               class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors">
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
