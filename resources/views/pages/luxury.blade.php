@extends('layouts.app')

@section('title', 'Luxury Packages in Nepal')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-gradient-to-r from-yellow-800 to-amber-600 text-white">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative z-10 container mx-auto px-4 h-full flex items-center">
        <div class="max-w-4xl">
            <h1 class="text-5xl font-bold mb-6">Luxury Packages in Nepal</h1>
            <p class="text-xl mb-8">Experience Nepal in ultimate luxury with 5-star accommodations, private services, and exclusive access to the country's most prestigious experiences.</p>
            <div class="flex flex-wrap gap-4">
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">5-Star Luxury</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Private Services</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Exclusive Access</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Luxury Packages Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Choose Your Luxury Experience</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                From royal palace accommodations to private helicopter tours, indulge in Nepal's most exclusive and luxurious experiences.
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
                    <div class="absolute top-6 left-6 bg-yellow-500 text-white px-4 py-2 rounded-full font-bold">
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
                            <span class="text-sm text-gray-500">👑</span>
                            <span class="text-sm text-gray-600">{{ $package['location'] }}</span>
                        </div>
                    </div>

                    <p class="text-gray-600 mb-6 leading-relaxed">{{ $package['description'] }}</p>

                    <!-- Key Info -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-yellow-50 p-4 rounded-lg">
                            <div class="text-sm text-yellow-600 font-semibold">Duration</div>
                            <div class="text-lg font-bold text-gray-900">{{ $package['duration'] }}</div>
                        </div>
                        <div class="bg-amber-50 p-4 rounded-lg">
                            <div class="text-sm text-amber-600 font-semibold">Best Season</div>
                            <div class="text-lg font-bold text-gray-900">{{ $package['best_season'] }}</div>
                        </div>
                    </div>

                    <!-- Weather Widget -->
                    @if(isset($weatherData[$package['name']]))
                    <div class="bg-gradient-to-r from-yellow-500 to-amber-600 text-white p-4 rounded-lg mb-6">
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
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">Luxury Highlights</h4>
                        <ul class="space-y-2">
                            @foreach($package['highlights'] as $highlight)
                            <li class="flex items-start">
                                <span class="text-yellow-500 mr-2">👑</span>
                                <span class="text-gray-600">{{ $highlight }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4">
                        <button onclick="toggleDetails('luxury-{{ $index }}')" 
                                class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            View Details
                        </button>
                        <a href="{{ route('booking.form') }}?tour=luxury-{{ strtolower(str_replace(' ', '-', $package['name'])) }}&category=luxury" 
                           class="bg-amber-600 hover:bg-amber-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Expandable Details -->
            <div id="details-luxury-{{ $index }}" class="hidden bg-white rounded-2xl shadow-lg p-8 mb-8">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Itinerary -->
                    <div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">👑 Luxury Itinerary</h4>
                        <div class="space-y-3">
                            @foreach($package['itinerary'] as $day)
                            <div class="flex items-start">
                                <div class="bg-yellow-100 text-yellow-600 w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold mr-3 flex-shrink-0">
                                    {{ $loop->iteration }}
                                </div>
                                <p class="text-gray-700">{{ $day }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Things to Carry -->
                    <div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">👑 Luxury Essentials</h4>
                        <div class="grid grid-cols-1 gap-2">
                            @foreach($package['things_to_carry'] as $item)
                            <div class="flex items-center">
                                <span class="text-yellow-500 mr-2">👑</span>
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
                            <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">👑</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Premium</h5>
                            <p class="text-sm text-gray-600">Only the finest accommodations and services.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-amber-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🚁</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Exclusive</h5>
                            <p class="text-sm text-gray-600">Private access to restricted areas and experiences.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-orange-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🎩</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Personalized</h5>
                            <p class="text-sm text-gray-600">Dedicated staff and personalized services throughout.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-yellow-600 to-amber-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-6">Ready for Ultimate Luxury?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Book your luxury experience today and indulge in Nepal's most exclusive and prestigious offerings with unparalleled service and comfort.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('booking.form') }}?category=luxury" 
               class="bg-white text-yellow-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Book Now
            </a>
            <a href="{{ route('contact') }}" 
               class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-yellow-600 transition-colors">
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






