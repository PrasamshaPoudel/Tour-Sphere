@extends('layouts.app')

@section('title', 'Cultural Experiences in Nepal')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-gradient-to-r from-orange-800 to-red-600 text-white">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative z-10 container mx-auto px-4 h-full flex items-center">
        <div class="max-w-4xl">
            <h1 class="text-5xl font-bold mb-6">Cultural Experiences in Nepal</h1>
            <p class="text-xl mb-8">Immerse yourself in Nepal's rich cultural heritage. Experience authentic traditions, festivals, arts, and cuisine that have been preserved for centuries.</p>
            <div class="flex flex-wrap gap-4">
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Authentic Traditions</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Local Festivals</span>
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <span class="font-semibold">Traditional Arts</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Experiences Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Choose Your Cultural Journey</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                From vibrant festivals to traditional crafts, experience the authentic culture of Nepal.
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
                    <div class="absolute top-6 left-6 bg-orange-500 text-white px-4 py-2 rounded-full font-bold">
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
                        <div class="bg-orange-50 p-4 rounded-lg">
                            <div class="text-sm text-orange-600 font-semibold">Duration</div>
                            <div class="text-lg font-bold text-gray-900">{{ $experience['duration'] }}</div>
                        </div>
                        <div class="bg-red-50 p-4 rounded-lg">
                            <div class="text-sm text-red-600 font-semibold">Best Season</div>
                            <div class="text-lg font-bold text-gray-900">{{ $experience['best_season'] }}</div>
                        </div>
                    </div>

                    <!-- Weather Widget -->
                    <div class="bg-gradient-to-r from-orange-500 to-red-600 text-white p-4 rounded-lg mb-6">
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
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">Highlights</h4>
                        <ul class="space-y-2">
                            @foreach($experience['highlights'] as $highlight)
                            <li class="flex items-start">
                                <span class="text-orange-500 mr-2">✓</span>
                                <span class="text-gray-600">{{ $highlight }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4">
                        <button onclick="toggleDetails('culture-{{ $index }}')" 
                                class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            View Details
                        </button>
                        <a href="{{ route('booking') }}?tour=culture-{{ strtolower(str_replace(' ', '-', $experience['name'])) }}&category=culture" 
                           class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Expandable Details -->
            <div id="details-culture-{{ $index }}" class="hidden bg-white rounded-2xl shadow-lg p-8 mb-8">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Itinerary -->
                    <div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">📅 Cultural Program</h4>
                        <div class="space-y-3">
                            @foreach($experience['itinerary'] as $activity)
                            <div class="flex items-start">
                                <div class="bg-orange-100 text-orange-600 w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold mr-3 flex-shrink-0">
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
                                <span class="text-orange-500 mr-2">•</span>
                                <span class="text-gray-700">{{ $item }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Cultural Information -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="bg-orange-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🎭</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Authentic Experience</h5>
                            <p class="text-sm text-gray-600">Real cultural experiences with local families and artisans.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">📚</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Cultural Learning</h5>
                            <p class="text-sm text-gray-600">Learn about history, traditions, and customs from experts.</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-2xl">🎁</span>
                            </div>
                            <h5 class="font-semibold text-gray-900 mb-2">Take Home Memories</h5>
                            <p class="text-sm text-gray-600">Create your own crafts and learn recipes to take home.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-orange-600 to-red-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-6">Ready to Experience Authentic Nepal?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Book your cultural experience today and immerse yourself in the rich traditions of Nepal.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('booking') }}?category=culture" 
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

