@extends('layouts.app')

@section('title', 'Historical Experiences in Nepal')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-gradient-to-r from-indigo-800 to-gray-700 text-white">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative z-10 container mx-auto px-4 h-full flex items-center">
        <div class="max-w-4xl">
            <h1 class="text-5xl font-bold mb-6">Historical Experiences in Nepal</h1>
            <p class="text-xl mb-8">Journey through Nepal's rich history spanning millennia. Explore ancient palaces, archaeological wonders, and cultural treasures that tell the story of this remarkable nation.</p>
            <div class="flex flex-wrap gap-4">
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Ancient Heritage</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Royal Palaces</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Archaeological Sites</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Experiences Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Choose Your Historical Adventure</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                From royal palaces to ancient ruins, explore the fascinating history and heritage of Nepal.
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
                    <div class="absolute top-6 left-6 bg-indigo-500 text-white px-4 py-2 rounded-full font-bold">
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
                        <div class="bg-indigo-50 p-4 rounded-lg">
                            <div class="text-sm text-indigo-600 font-semibold">Duration</div>
                            <div class="text-lg font-bold text-gray-900">{{ $experience['duration'] }}</div>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="text-sm text-gray-600 font-semibold">Best Season</div>
                            <div class="text-lg font-bold text-gray-900">{{ $experience['best_season'] }}</div>
                        </div>
                    </div>

                    <!-- Weather Widget -->
                    <div class="bg-gradient-to-r from-indigo-500 to-gray-600 text-white p-4 rounded-lg mb-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-sm opacity-90">Current Weather</div>
                                <div class="text-2xl font-bold">{{ $experience['weather']['temperature'] }}°C</div>
                                <div class="text-sm">{{ $experience['weather']['description'] }}</div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm opacity-90">Humidity: {{ $experience['weather']['humidity'] }}%</div>
                                <div class="text-sm opacity-90">Wind: {{ $experience['weather']['wind_speed'] }} m/s</div>
                            </div>
                        </div>
                    </div>

                    <!-- Highlights -->
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">Historical Highlights</h4>
                        <ul class="space-y-2">
                            @foreach($experience['highlights'] as $highlight)
                            <li class="flex items-start">
                                <span class="text-indigo-500 mr-2">✓</span>
                                <span class="text-gray-600">{{ $highlight }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4">
                        <button onclick="toggleDetails('historical-{{ $index }}')" 
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            View Details
                        </button>
                        <a href="{{ route('booking') }}?tour=historical-{{ strtolower(str_replace(' ', '-', $experience['name'])) }}&category=historical" 
                           class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Expandable Details -->
            <div id="details-historical-{{ $index }}" class="hidden bg-white rounded-2xl shadow-lg p-8 mb-8">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Itinerary -->
                    <div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">🏛️ Historical Tour</h4>
                        <div class="space-y-3">
                            @foreach($experience['itinerary'] as $activity)
                            <div class="flex items-start">
                                <div class="bg-indigo-100 text-indigo-600 w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold mr-3 flex-shrink-0">
                                    {{ $loop->iteration }}
                                </div>
                                <p class="text-gray-700">{{ $activity }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Things to Carry -->
                    <div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">🎒 What to Bring</h4>
                        <div class="grid grid-cols-1 gap-2">
                            @foreach($experience['things_to_carry'] as $item)
                            <div class="flex items-center">
                                <span class="text-indigo-500 mr-2">•</span>
                                <span class="text-gray-700">{{ $item }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Historical Information -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🏺</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Ancient Artifacts</h5>
                            <p class="text-sm text-gray-600">Discover artifacts and treasures from Nepal's rich past.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-gray-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">📚</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Expert Guides</h5>
                            <p class="text-sm text-gray-600">Learn from knowledgeable historians and archaeologists.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🏛️</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">UNESCO Sites</h5>
                            <p class="text-sm text-gray-600">Visit World Heritage Sites and protected monuments.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-indigo-600 to-gray-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-6">Ready to Explore Nepal's History?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Book your historical experience today and journey through the fascinating heritage of Nepal.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('booking') }}?category=historical" 
               class="bg-white text-indigo-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Book Now
            </a>
            <a href="{{ route('contact') }}" 
               class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-indigo-600 transition-colors">
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


