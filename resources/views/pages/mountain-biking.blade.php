@extends('layouts.app')

@section('title', 'Mountain Biking in Nepal')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-gradient-to-r from-green-900 to-blue-700 text-white">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="relative z-10 container mx-auto px-4 h-full flex items-center">
        <div class="max-w-4xl">
            <h1 class="text-5xl font-bold mb-6">Mountain Biking in Nepal</h1>
            <p class="text-xl mb-8">Pedal through Nepal's diverse landscapes on thrilling mountain bike adventures. From cultural heritage tours to challenging high-altitude expeditions.</p>
            <div class="flex flex-wrap gap-4">
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">4 Routes</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">All Skill Levels</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Professional Bikes</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Biking Routes Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Choose Your Biking Adventure</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Experience Nepal's diverse terrain on mountain bikes, from cultural heritage tours to challenging high-altitude expeditions.
            </p>
        </div>

        <div class="space-y-16">
            @foreach($bikingRoutes as $index => $route)
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden {{ $index % 2 == 1 ? 'md:flex-row-reverse' : '' }} md:flex">
                <!-- Route Image -->
                <div class="md:w-1/2 relative">
                    <img src="{{ asset('images/' . $route['image']) }}" 
                         alt="{{ $route['name'] }}" 
                         class="w-full h-96 md:h-full object-cover">
                    <div class="absolute top-6 left-6 bg-green-500 text-white px-4 py-2 rounded-full font-bold">
                        {{ $route['difficulty'] }}
                    </div>
                    <div class="absolute bottom-6 right-6 bg-black bg-opacity-70 text-white px-4 py-2 rounded-full">
                        {{ $route['cost'] }}
                    </div>
                </div>

                <!-- Route Details -->
                <div class="md:w-1/2 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-3xl font-bold text-gray-900">{{ $route['name'] }}</h3>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-500">📍</span>
                            <span class="text-sm text-gray-600">{{ $route['location'] }}</span>
                        </div>
                    </div>

                    <p class="text-gray-600 mb-6 leading-relaxed">{{ $route['description'] }}</p>

                    <!-- Key Info -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-green-50 p-4 rounded-lg">
                            <div class="text-sm text-green-600 font-semibold">Duration</div>
                            <div class="text-lg font-bold text-gray-900">{{ $route['duration'] }}</div>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <div class="text-sm text-blue-600 font-semibold">Best Season</div>
                            <div class="text-lg font-bold text-gray-900">{{ $route['best_season'] }}</div>
                        </div>
                    </div>

                    <!-- Weather Widget -->
                    @if(isset($weatherData[$route['name']]))
                    <div class="bg-gradient-to-r from-green-500 to-blue-600 text-white p-4 rounded-lg mb-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div>
                                    <img src="https://openweathermap.org/img/wn/{{ $weatherData[$route['name']]['icon'] }}@2x.png" 
                                         alt="Weather icon" class="w-16 h-16">
                                </div>
                                <div>
                                    <div class="text-sm opacity-90">Current Weather - {{ explode(',', $route['location'])[0] }}</div>
                                    <div class="text-2xl font-bold">{{ $weatherData[$route['name']]['temperature'] }}°C</div>
                                    <div class="text-sm capitalize">{{ $weatherData[$route['name']]['description'] }}</div>
                                    <div class="text-xs opacity-80">Feels like {{ $weatherData[$route['name']]['feels_like'] }}°C</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm opacity-90">Humidity: {{ $weatherData[$route['name']]['humidity'] }}%</div>
                                <div class="text-sm opacity-90">Wind: {{ $weatherData[$route['name']]['wind_speed'] }} m/s</div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Highlights -->
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">Highlights</h4>
                        <ul class="space-y-2">
                            @foreach($route['highlights'] as $highlight)
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span class="text-gray-600">{{ $highlight }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4">
                        <button onclick="toggleDetails('{{ $index }}')" 
                                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            View Details
                        </button>
                        <a href="{{ route('booking') }}?tour=mountain-biking-{{ strtolower(str_replace(' ', '-', $route['name'])) }}&category=adventure" 
                           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Expandable Details -->
            <div id="details-{{ $index }}" class="hidden bg-white rounded-2xl shadow-lg p-8 mb-8">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Itinerary -->
                    <div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">📅 Itinerary</h4>
                        <div class="space-y-3">
                            @foreach($route['itinerary'] as $item)
                            <div class="flex items-start">
                                <div class="bg-green-100 text-green-600 w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold mr-3 flex-shrink-0">
                                    {{ $loop->iteration }}
                                </div>
                                <p class="text-gray-700">{{ $item }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Things to Carry -->
                    <div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">🎒 Things to Carry</h4>
                        <div class="grid grid-cols-1 gap-2">
                            @foreach($route['things_to_carry'] as $item)
                            <div class="flex items-center">
                                <span class="text-green-500 mr-2">•</span>
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
                                <span class="text-2xl">🚲</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Professional Bikes</h5>
                            <p class="text-sm text-gray-600">High-quality mountain bikes provided with maintenance support.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🗺️</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Expert Guides</h5>
                            <p class="text-sm text-gray-600">Experienced biking guides with local knowledge.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">📸</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Photo Service</h5>
                            <p class="text-sm text-gray-600">Professional photos of your biking adventure included.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Safety & Tips Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Safety & Tips</h2>
            <p class="text-xl text-gray-600">Everything you need to know for a safe and enjoyable mountain biking experience</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="bg-green-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">🦺</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Safety Equipment</h3>
                <p class="text-gray-600 text-sm">Helmets, knee pads, and all safety gear provided by certified operators.</p>
            </div>
            <div class="text-center">
                <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">👨‍🏫</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Expert Guides</h3>
                <p class="text-gray-600 text-sm">Licensed and experienced biking guides with first aid certification.</p>
            </div>
            <div class="text-center">
                <div class="bg-yellow-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">📋</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Pre-Ride Briefing</h3>
                <p class="text-gray-600 text-sm">Comprehensive safety briefing and biking techniques before starting.</p>
            </div>
            <div class="text-center">
                <div class="bg-red-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">🚨</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Emergency Support</h3>
                <p class="text-gray-600 text-sm">24/7 emergency support and rescue services available.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-green-600 to-blue-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-6">Ready for Your Mountain Biking Adventure?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Book your mountain biking experience today and explore Nepal's diverse landscapes on two wheels.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('booking') }}?category=adventure" 
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
