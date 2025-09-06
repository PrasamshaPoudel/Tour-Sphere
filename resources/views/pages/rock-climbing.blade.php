@extends('layouts.app')

@section('title', 'Rock Climbing in Nepal')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-gradient-to-r from-orange-900 to-red-700 text-white">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="relative z-10 container mx-auto px-4 h-full flex items-center">
        <div class="max-w-4xl">
            <h1 class="text-5xl font-bold mb-6">Rock Climbing in Nepal</h1>
            <p class="text-xl mb-8">Scale the heights of Nepal's magnificent rock formations with stunning Himalayan views. From beginner-friendly routes to challenging advanced climbs.</p>
            <div class="flex flex-wrap gap-4">
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">3 Locations</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">All Skill Levels</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Professional Guides</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Climbing Sites Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Choose Your Climbing Adventure</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Experience rock climbing with breathtaking mountain views and professional guidance at Nepal's premier climbing locations.
            </p>
        </div>

        <div class="space-y-16">
            @foreach($climbingSites as $index => $site)
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden {{ $index % 2 == 1 ? 'md:flex-row-reverse' : '' }} md:flex">
                <!-- Site Image -->
                <div class="md:w-1/2 relative">
                    <img src="{{ asset('images/' . $site['image']) }}" 
                         alt="{{ $site['name'] }}" 
                         class="w-full h-96 md:h-full object-cover">
                    <div class="absolute top-6 left-6 bg-orange-500 text-white px-4 py-2 rounded-full font-bold">
                        {{ $site['difficulty'] }}
                    </div>
                    <div class="absolute bottom-6 right-6 bg-black bg-opacity-70 text-white px-4 py-2 rounded-full">
                        {{ $site['cost'] }}
                    </div>
                </div>

                <!-- Site Details -->
                <div class="md:w-1/2 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-3xl font-bold text-gray-900">{{ $site['name'] }}</h3>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-500">📍</span>
                            <span class="text-sm text-gray-600">{{ $site['location'] }}</span>
                        </div>
                    </div>

                    <p class="text-gray-600 mb-6 leading-relaxed">{{ $site['description'] }}</p>

                    <!-- Key Info -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-orange-50 p-4 rounded-lg">
                            <div class="text-sm text-orange-600 font-semibold">Duration</div>
                            <div class="text-lg font-bold text-gray-900">{{ $site['duration'] }}</div>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg">
                            <div class="text-sm text-green-600 font-semibold">Best Season</div>
                            <div class="text-lg font-bold text-gray-900">{{ $site['best_season'] }}</div>
                        </div>
                    </div>

                    <!-- Weather Widget -->
                    @if(isset($weatherData[$site['name']]))
                    <div class="bg-gradient-to-r from-orange-500 to-red-600 text-white p-4 rounded-lg mb-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div>
                                    <img src="https://openweathermap.org/img/wn/{{ $weatherData[$site['name']]['icon'] }}@2x.png" 
                                         alt="Weather icon" class="w-16 h-16">
                                </div>
                                <div>
                                    <div class="text-sm opacity-90">Current Weather - {{ explode(',', $site['location'])[0] }}</div>
                                    <div class="text-2xl font-bold">{{ $weatherData[$site['name']]['temperature'] }}°C</div>
                                    <div class="text-sm capitalize">{{ $weatherData[$site['name']]['description'] }}</div>
                                    <div class="text-xs opacity-80">Feels like {{ $weatherData[$site['name']]['feels_like'] }}°C</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm opacity-90">Humidity: {{ $weatherData[$site['name']]['humidity'] }}%</div>
                                <div class="text-sm opacity-90">Wind: {{ $weatherData[$site['name']]['wind_speed'] }} m/s</div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Highlights -->
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">Highlights</h4>
                        <ul class="space-y-2">
                            @foreach($site['highlights'] as $highlight)
                            <li class="flex items-start">
                                <span class="text-orange-500 mr-2">✓</span>
                                <span class="text-gray-600">{{ $highlight }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4">
                        <button onclick="toggleDetails('{{ $index }}')" 
                                class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            View Details
                        </button>
                        <a href="{{ route('booking') }}?tour=rock-climbing-{{ strtolower(str_replace(' ', '-', $site['name'])) }}&category=adventure" 
                           class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
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
                            @foreach($site['itinerary'] as $item)
                            <div class="flex items-start">
                                <div class="bg-orange-100 text-orange-600 w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold mr-3 flex-shrink-0">
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
                            @foreach($site['things_to_carry'] as $item)
                            <div class="flex items-center">
                                <span class="text-orange-500 mr-2">•</span>
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
                            <div class="bg-orange-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🦺</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Safety First</h5>
                            <p class="text-sm text-gray-600">All climbing equipment provided. Professional guides included.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🏔️</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Mountain Views</h5>
                            <p class="text-sm text-gray-600">Stunning Himalayan views while climbing.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">📸</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Photo Service</h5>
                            <p class="text-sm text-gray-600">Professional photos of your climbing adventure included.</p>
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
            <p class="text-xl text-gray-600">Everything you need to know for a safe and enjoyable rock climbing experience</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="bg-orange-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">🦺</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Safety Equipment</h3>
                <p class="text-gray-600 text-sm">Helmets, harnesses, ropes, and all safety gear provided by certified operators.</p>
            </div>
            <div class="text-center">
                <div class="bg-green-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">👨‍🏫</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Expert Guides</h3>
                <p class="text-gray-600 text-sm">Licensed and experienced climbing guides with first aid certification.</p>
            </div>
            <div class="text-center">
                <div class="bg-yellow-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">📋</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Pre-Climb Briefing</h3>
                <p class="text-gray-600 text-sm">Comprehensive safety briefing and climbing techniques before starting.</p>
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
<section class="py-20 bg-gradient-to-r from-orange-600 to-red-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-6">Ready for Your Rock Climbing Adventure?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Book your rock climbing experience today and conquer new heights with stunning mountain views.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('booking') }}?category=adventure" 
               class="bg-white text-orange-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Book Now
            </a>
            <a href="{{ route('contact') }}" 
               class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-orange-600 transition-colors">
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
