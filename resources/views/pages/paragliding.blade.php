@extends('layouts.app')

@section('title', 'Paragliding in Nepal')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-gradient-to-r from-blue-800 to-sky-600 text-white">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative z-10 container mx-auto px-4 h-full flex items-center">
        <div class="max-w-4xl">
            <h1 class="text-5xl font-bold mb-6">Paragliding in Nepal</h1>
            <p class="text-xl mb-8">Soar like an eagle above the majestic Himalayas and pristine valleys. Experience the ultimate freedom of flight with our professional paragliding adventures.</p>
            <div class="flex flex-wrap gap-4">
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">All Skill Levels</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Tandem Flights</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Mountain Views</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Locations Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Choose Your Flying Destination</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                From the famous Pokhara valley to hidden gems, discover the best paragliding spots in Nepal.
            </p>
        </div>

        <div class="space-y-16">
            @foreach($locations as $index => $location)
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden {{ $index % 2 == 1 ? 'md:flex-row-reverse' : '' }} md:flex">
                <!-- Location Image -->
                <div class="md:w-1/2 relative">
                    <img src="{{ asset('images/' . $location['image']) }}" 
                         alt="{{ $location['name'] }}" 
                         class="w-full h-96 md:h-full object-cover">
                    <div class="absolute top-6 left-6 bg-blue-500 text-white px-4 py-2 rounded-full font-bold">
                        {{ $location['difficulty'] }}
                    </div>
                    <div class="absolute bottom-6 right-6 bg-black bg-opacity-70 text-white px-4 py-2 rounded-full">
                        {{ $location['cost'] }}
                    </div>
                </div>

                <!-- Location Details -->
                <div class="md:w-1/2 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-3xl font-bold text-gray-900">{{ $location['name'] }}</h3>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-500">📍</span>
                            <span class="text-sm text-gray-600">{{ $location['location'] }}</span>
                        </div>
                    </div>

                    <p class="text-gray-600 mb-6 leading-relaxed">{{ $location['description'] }}</p>

                    <!-- Key Info -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-sky-50 p-4 rounded-lg">
                            <div class="text-sm text-sky-600 font-semibold">Duration</div>
                            <div class="text-lg font-bold text-gray-900">{{ $location['duration'] }}</div>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg">
                            <div class="text-sm text-green-600 font-semibold">Best Season</div>
                            <div class="text-lg font-bold text-gray-900">{{ $location['best_season'] }}</div>
                        </div>
                    </div>

                    <!-- Weather Widget -->
                    @if(isset($weatherData[$location['name']]))
                    <div class="bg-gradient-to-r from-sky-500 to-blue-600 text-white p-4 rounded-lg mb-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div>
                                    <img src="https://openweathermap.org/img/wn/{{ $weatherData[$location['name']]['icon'] }}@2x.png" 
                                         alt="Weather icon" class="w-16 h-16">
                                </div>
                                <div>
                                    <div class="text-sm opacity-90">Current Weather - {{ explode(',', $location['location'])[0] }}</div>
                                    <div class="text-2xl font-bold">{{ $weatherData[$location['name']]['temperature'] }}°C</div>
                                    <div class="text-sm capitalize">{{ $weatherData[$location['name']]['description'] }}</div>
                                    <div class="text-xs opacity-80">Feels like {{ $weatherData[$location['name']]['feels_like'] }}°C</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm opacity-90">Humidity: {{ $weatherData[$location['name']]['humidity'] }}%</div>
                                <div class="text-sm opacity-90">Wind: {{ $weatherData[$location['name']]['wind_speed'] }} m/s</div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Highlights -->
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">Highlights</h4>
                        <ul class="space-y-2">
                            @foreach($location['highlights'] as $highlight)
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span class="text-gray-600">{{ $highlight }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4">
                        <button onclick="toggleDetails('paragliding-{{ $index }}')" 
                                class="bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            View Details
                        </button>
                        <a href="{{ route('booking') }}?tour=paragliding-{{ strtolower(str_replace(' ', '-', $location['name'])) }}&category=adventure" 
                           class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Expandable Details -->
            <div id="details-paragliding-{{ $index }}" class="hidden bg-white rounded-2xl shadow-lg p-8 mb-8">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Itinerary -->
                    <div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">🕐 Flight Schedule</h4>
                        <div class="space-y-3">
                            @foreach($location['itinerary'] as $step)
                            <div class="flex items-start">
                                <div class="bg-sky-100 text-sky-600 w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold mr-3 flex-shrink-0">
                                    {{ $loop->iteration }}
                                </div>
                                <p class="text-gray-700">{{ $step }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Things to Carry -->
                    <div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">🎒 What to Bring</h4>
                        <div class="grid grid-cols-1 gap-2">
                            @foreach($location['things_to_carry'] as $item)
                            <div class="flex items-center">
                                <span class="text-sky-500 mr-2">•</span>
                                <span class="text-gray-700">{{ $item }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Safety Information -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🛡️</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Safety First</h5>
                            <p class="text-sm text-gray-600">International certified equipment and experienced pilots.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">📹</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Photo & Video</h5>
                            <p class="text-sm text-gray-600">Professional photos and videos of your flight included.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🏆</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Certificate</h5>
                            <p class="text-sm text-gray-600">Flight certificate and memorable experience guaranteed.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Safety & Requirements Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Safety & Requirements</h2>
            <p class="text-xl text-gray-600">Everything you need to know for a safe and enjoyable paragliding experience</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="bg-sky-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">👥</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Age Requirement</h3>
                <p class="text-gray-600 text-sm">Minimum age 5 years, maximum weight 120kg for tandem flights.</p>
            </div>
            <div class="text-center">
                <div class="bg-green-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">🌤️</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Weather Dependent</h3>
                <p class="text-gray-600 text-sm">Flights depend on weather conditions. Alternative dates offered if needed.</p>
            </div>
            <div class="text-center">
                <div class="bg-yellow-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">🏥</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Health Requirements</h3>
                <p class="text-gray-600 text-sm">Basic fitness required. Heart conditions and pregnancy not recommended.</p>
            </div>
            <div class="text-center">
                <div class="bg-purple-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">📋</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Insurance Included</h3>
                <p class="text-gray-600 text-sm">Comprehensive insurance coverage provided for all participants.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-sky-600 to-blue-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-6">Ready to Touch the Sky?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Book your paragliding adventure today and experience the freedom of flight above Nepal's stunning landscapes.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('booking') }}?category=adventure" 
               class="bg-white text-sky-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Book Now
            </a>
            <a href="{{ route('contact') }}" 
               class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-sky-600 transition-colors">
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

