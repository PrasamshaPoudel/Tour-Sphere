@extends('layouts.app')

@section('title', $packageData['title'] ?? 'Special Packages')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-gradient-to-r from-{{ $packageData['color'] ?? 'blue' }}-900 to-{{ $packageData['color'] ?? 'blue' }}-700 text-white">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="relative z-10 container mx-auto px-4 h-full flex items-center">
        <div class="max-w-4xl">
            <h1 class="text-5xl font-bold mb-6">{{ $packageData['icon'] ?? '🎯' }} {{ $packageData['title'] ?? 'Special Packages' }}</h1>
            <p class="text-xl mb-8">{{ $packageData['description'] ?? 'Discover amazing experiences tailored for you' }}</p>
            <div class="flex flex-wrap gap-4">
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">{{ count($destinations) }} Packages</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">All Skill Levels</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Year Round</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Packages Section -->
<section class="py-24 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-20">
            <h2 class="text-4xl font-light text-gray-900 mb-6 tracking-wide">Our {{ $packageData['title'] ?? 'Special Packages' }}</h2>
            <div class="w-16 h-px bg-gray-300 mx-auto mb-8"></div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto font-light leading-relaxed">
                Each package offers a unique experience, carefully curated to provide unforgettable memories.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            @foreach($destinations as $index => $destination)
            <div class="bg-white rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                <!-- Package Image -->
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset($destination['image']) }}" 
                         alt="{{ $destination['name'] }}" 
                         class="w-full h-full object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="bg-white text-gray-700 px-3 py-1 rounded-full text-sm font-medium shadow-sm">
                            {{ $destination['difficulty'] }}
                        </span>
                    </div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-{{ $packageData['color'] ?? 'blue' }}-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                            {{ $destination['duration'] }}
                        </span>
                    </div>
                </div>

                <!-- Package Details -->
                <div class="md:w-1/2 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-3xl font-bold text-gray-900">{{ $destination['name'] }}</h3>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-500">📍</span>
                            <span class="text-sm text-gray-600">{{ $destination['location'] }}</span>
                        </div>
                    </div>

                    <p class="text-gray-600 mb-6 leading-relaxed">{{ $destination['description'] }}</p>

                    <!-- Key Info -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-{{ $packageData['color'] ?? 'blue' }}-50 p-4 rounded-lg">
                            <div class="text-sm text-{{ $packageData['color'] ?? 'blue' }}-600 font-semibold">Duration</div>
                            <div class="text-lg font-bold text-gray-900">{{ $destination['duration'] }}</div>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg">
                            <div class="text-sm text-green-600 font-semibold">Best Season</div>
                            <div class="text-lg font-bold text-gray-900">{{ $destination['best_season'] }}</div>
                        </div>
                    </div>

                    <!-- Weather Widget -->
                    @if($destination['weather'])
                    <div class="bg-gradient-to-r from-{{ $packageData['color'] ?? 'blue' }}-500 to-{{ $packageData['color'] ?? 'blue' }}-600 text-white p-4 rounded-lg mb-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div>
                                    <span class="text-4xl">{{ $destination['weather_icon'] }}</span>
                                </div>
                                <div>
                                    <div class="text-sm opacity-90">Current Weather - {{ $destination['location'] }}</div>
                                    <div class="text-2xl font-bold">{{ round($destination['weather']['temperature']) }}°C</div>
                                    <div class="text-sm capitalize">{{ $destination['weather']['description'] }}</div>
                                    <div class="text-xs opacity-80">Humidity: {{ $destination['weather']['humidity'] }}%</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm opacity-90">Wind: {{ $destination['weather']['wind_speed'] }} m/s</div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Highlights -->
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">Package Highlights</h4>
                        <ul class="space-y-2">
                            @foreach($destination['highlights'] as $highlight)
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
                                class="bg-{{ $packageData['color'] ?? 'blue' }}-600 hover:bg-{{ $packageData['color'] ?? 'blue' }}-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            View Details
                        </button>
                        <a href="{{ route('booking.form', [
                            'category' => 'special-package',
                            'special_package' => $destination['id'],
                            'destination_title' => $destination['name'],
                            'price' => $destination['pricing']['medium']
                        ]) }}" 
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
                            @foreach($destination['itinerary'] as $day)
                            <div class="flex items-start">
                                <div class="bg-{{ $packageData['color'] ?? 'blue' }}-100 text-{{ $packageData['color'] ?? 'blue' }}-600 w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold mr-3 flex-shrink-0">
                                    {{ $loop->iteration }}
                                </div>
                                <p class="text-gray-700">{{ $day }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Things to Carry -->
                    <div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">🎒 Things to Carry</h4>
                        <div class="grid grid-cols-1 gap-2">
                            @foreach($destination['things_to_carry'] as $item)
                            <div class="flex items-center">
                                <span class="text-{{ $packageData['color'] ?? 'blue' }}-500 mr-2">•</span>
                                <span class="text-gray-700">{{ $item }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Pricing Details -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <h4 class="text-xl font-bold text-gray-900 mb-6">Package Pricing</h4>
                    <div class="grid md:grid-cols-3 gap-6">
                        @foreach($destination['pricing'] as $tier => $price)
                        <div class="text-center p-6 bg-{{ $packageData['color'] ?? 'blue' }}-50 rounded-lg">
                            <div class="text-2xl font-bold text-{{ $packageData['color'] ?? 'blue' }}-600 mb-2">Rs {{ number_format($price) }}</div>
                            <div class="text-lg font-semibold text-gray-900 mb-2 capitalize">{{ $tier }} Package</div>
                            <div class="text-sm text-gray-600">Per person</div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="bg-{{ $packageData['color'] ?? 'blue' }}-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🏨</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Accommodation</h5>
                            <p class="text-sm text-gray-600">Luxury accommodations included in all packages.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🍽️</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Meals Included</h5>
                            <p class="text-sm text-gray-600">All meals and dining experiences included.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🎯</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Personalized Service</h5>
                            <p class="text-sm text-gray-600">Tailored experiences for your special occasion.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-{{ $packageData['color'] ?? 'blue' }}-600 text-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">Ready to Experience {{ $packageData['title'] ?? 'Special Packages' }}?</h2>
            <p class="text-xl">Contact us for custom packages and special arrangements</p>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="tel:+977-1-1234567" 
               class="bg-white text-{{ $packageData['color'] ?? 'blue' }}-600 font-bold py-3 px-8 rounded-lg hover:bg-gray-100 transition-colors">
                📞 Call Now
            </a>
            <a href="mailto:info@travelnepal.com" 
               class="border-2 border-white text-white font-bold py-3 px-8 rounded-lg hover:bg-white hover:text-{{ $packageData['color'] ?? 'blue' }}-600 transition-colors">
                ✉️ Email Us
            </a>
        </div>
    </div>
</section>

<script>
function toggleDetails(index) {
    const element = document.getElementById('details-' + index);
    
    if (element.classList.contains('hidden')) {
        element.classList.remove('hidden');
    } else {
        element.classList.add('hidden');
    }
}
</script>
@endsection
