@extends('layouts.app')

@section('title', 'Trekking in Nepal')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-gradient-to-r from-green-900 to-blue-800 text-white">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="relative z-10 container mx-auto px-4 h-full flex items-center">
        <div class="max-w-4xl">
            <h1 class="text-5xl font-bold mb-6">Himalayan Trekking in Nepal</h1>
            <p class="text-xl mb-8">Embark on the world's most spectacular trekking adventures. From Everest Base Camp to hidden valleys, discover the majesty of the Himalayas with expert guidance.</p>
            <div class="flex flex-wrap gap-4">
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">World's Best Treks</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Expert Guides</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">All Difficulty Levels</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Treks Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Choose Your Himalayan Adventure</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                From classic routes to hidden gems, discover the perfect trek for your skill level and interests.
            </p>
        </div>

        <div class="space-y-16">
            @foreach($treks as $index => $trek)
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden {{ $index % 2 == 1 ? 'md:flex-row-reverse' : '' }} md:flex">
                <!-- Trek Image -->
                <div class="md:w-1/2 relative">
                    <img src="{{ asset('images/' . $trek['image']) }}" 
                         alt="{{ $trek['name'] }}" 
                         class="w-full h-96 md:h-full object-cover">
                    <div class="absolute top-6 left-6 
                        {{ $trek['difficulty'] == 'Strenuous' ? 'bg-red-500' : ($trek['difficulty'] == 'Moderate' ? 'bg-orange-500' : 'bg-green-500') }} 
                        text-white px-4 py-2 rounded-full font-bold">
                        {{ $trek['difficulty'] }}
                    </div>
                    <div class="absolute bottom-6 right-6 bg-black bg-opacity-70 text-white px-4 py-2 rounded-full">
                        {{ $trek['cost'] }}
                    </div>
                </div>

                <!-- Trek Details -->
                <div class="md:w-1/2 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-3xl font-bold text-gray-900">{{ $trek['name'] }}</h3>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-500">📍</span>
                            <span class="text-sm text-gray-600">{{ $trek['location'] }}</span>
                        </div>
                    </div>

                    <p class="text-gray-600 mb-6 leading-relaxed">{{ $trek['description'] }}</p>

                    <!-- Key Info -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-green-50 p-4 rounded-lg">
                            <div class="text-sm text-green-600 font-semibold">Duration</div>
                            <div class="text-lg font-bold text-gray-900">{{ $trek['duration'] }}</div>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <div class="text-sm text-blue-600 font-semibold">Best Season</div>
                            <div class="text-lg font-bold text-gray-900">{{ $trek['best_season'] }}</div>
                        </div>
                    </div>

                    <!-- Weather Widget -->
                    <div class="bg-gradient-to-r from-green-600 to-blue-700 text-white p-4 rounded-lg mb-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-sm opacity-90">Current Weather</div>
                                <div class="text-2xl font-bold">{{ $trek['weather']['temperature'] }}°C</div>
                                <div class="text-sm">{{ $trek['weather']['description'] }}</div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm opacity-90">Humidity: {{ $trek['weather']['humidity'] }}%</div>
                                <div class="text-sm opacity-90">Wind: {{ $trek['weather']['wind_speed'] }} m/s</div>
                            </div>
                        </div>
                    </div>

                    <!-- Highlights -->
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">Highlights</h4>
                        <ul class="space-y-2">
                            @foreach($trek['highlights'] as $highlight)
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span class="text-gray-600">{{ $highlight }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4">
                        <button onclick="toggleDetails('trek-{{ $index }}')" 
                                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            View Details
                        </button>
                        <a href="{{ route('booking') }}?tour=trek-{{ strtolower(str_replace(' ', '-', $trek['name'])) }}&category=adventure" 
                           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Expandable Details -->
            <div id="details-trek-{{ $index }}" class="hidden bg-white rounded-2xl shadow-lg p-8 mb-8">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Itinerary -->
                    <div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">🗓️ Trek Itinerary</h4>
                        <div class="space-y-3">
                            @foreach($trek['itinerary'] as $day)
                            <div class="flex items-start">
                                <div class="bg-green-100 text-green-600 w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold mr-3 flex-shrink-0">
                                    {{ $loop->iteration }}
                                </div>
                                <p class="text-gray-700">{{ $day }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Gear List -->
                    <div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">🎒 Essential Gear</h4>
                        <div class="grid grid-cols-1 gap-2">
                            @foreach($trek['things_to_carry'] as $item)
                            <div class="flex items-center">
                                <span class="text-green-500 mr-2">•</span>
                                <span class="text-gray-700">{{ $item }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Trek Information -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="grid md:grid-cols-4 gap-6">
                        <div class="text-center">
                            <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🏔️</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">High Altitude</h5>
                            <p class="text-sm text-gray-600">Professional guides trained in altitude sickness management.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🏕️</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Accommodation</h5>
                            <p class="text-sm text-gray-600">Comfortable teahouses and camping options available.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">📋</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Permits Included</h5>
                            <p class="text-sm text-gray-600">All necessary permits and paperwork handled for you.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🚁</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Emergency Support</h5>
                            <p class="text-sm text-gray-600">Helicopter evacuation insurance and emergency support.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Difficulty Guide Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Trek Difficulty Guide</h2>
            <p class="text-xl text-gray-600">Choose the right trek based on your experience and fitness level</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-6 bg-green-50 rounded-2xl">
                <div class="bg-green-500 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl text-white">😊</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Easy</h3>
                <p class="text-gray-600 mb-4">Suitable for beginners with basic fitness. Lower altitudes with comfortable accommodations.</p>
                <ul class="text-sm text-gray-500 space-y-1">
                    <li>• 2-7 days duration</li>
                    <li>• Below 3,500m altitude</li>
                    <li>• Well-marked trails</li>
                </ul>
            </div>
            <div class="text-center p-6 bg-orange-50 rounded-2xl">
                <div class="bg-orange-500 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl text-white">💪</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Moderate</h3>
                <p class="text-gray-600 mb-4">Requires good fitness and some hiking experience. Higher altitudes with varied terrain.</p>
                <ul class="text-sm text-gray-500 space-y-1">
                    <li>• 7-14 days duration</li>
                    <li>• 3,500-5,000m altitude</li>
                    <li>• Some challenging sections</li>
                </ul>
            </div>
            <div class="text-center p-6 bg-red-50 rounded-2xl">
                <div class="bg-red-500 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl text-white">🏔️</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Strenuous</h3>
                <p class="text-gray-600 mb-4">For experienced trekkers with excellent fitness. High altitude and challenging conditions.</p>
                <ul class="text-sm text-gray-500 space-y-1">
                    <li>• 14+ days duration</li>
                    <li>• Above 5,000m altitude</li>
                    <li>• Technical challenges</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-green-600 to-blue-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-6">Ready for Your Himalayan Adventure?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Book your trekking adventure today and experience the world's most spectacular mountain landscapes.
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
