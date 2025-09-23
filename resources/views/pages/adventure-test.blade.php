@extends('layouts.app')

@section('title', 'Adventure Categories Test - Tour Sphere')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-6">Adventure Categories Test</h1>
            <p class="text-xl text-gray-700">Test all adventure categories with their specific destinations and booking functionality</p>
        </div>

        @php
            $adventureCategories = \App\Services\AdventureDestinationService::getAllDestinations();
        @endphp

        @foreach($adventureCategories as $categoryKey => $categoryData)
        <div class="mb-16">
            <!-- Category Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $categoryData['title'] }}</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">{{ $categoryData['description'] }}</p>
            </div>

            <!-- Destinations Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($categoryData['destinations'] as $destination)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border-2 border-gray-200 hover:shadow-xl transition-shadow">
                    <!-- Destination Image -->
                    <div class="relative h-48">
                        <img src="{{ asset($destination['image']) }}" 
                             alt="{{ $destination['name'] }}" 
                             class="w-full h-full object-cover">
                        <div class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                            {{ $destination['difficulty'] }}
                        </div>
                        <div class="absolute top-4 right-4 bg-black bg-opacity-70 text-white px-3 py-1 rounded-full text-sm">
                            {{ $destination['duration'] }}
                        </div>
                    </div>

                    <!-- Destination Content -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $destination['name'] }}</h3>
                        <p class="text-gray-600 mb-4 text-sm">{{ Str::limit($destination['description'], 100) }}</p>
                        
                        <!-- Highlights -->
                        <div class="mb-4">
                            <div class="flex flex-wrap gap-1">
                                @foreach(array_slice($destination['highlights'], 0, 2) as $highlight)
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">
                                    {{ $highlight }}
                                </span>
                                @endforeach
                            </div>
                        </div>

                        <!-- Pricing -->
                        <div class="mb-4">
                            <div class="text-sm text-gray-500 mb-1">Price Range (per person)</div>
                            <div class="flex justify-between items-center">
                                <div class="text-green-600 font-bold">Rs {{ number_format($destination['pricing']['low']) }}</div>
                                <div class="text-gray-400">-</div>
                                <div class="text-purple-600 font-bold">Rs {{ number_format($destination['pricing']['expensive']) }}</div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-2">
                            <a href="{{ route('booking.form', ['category' => $categoryKey, 'adventure_destination' => $destination['id']]) }}" 
                               class="flex-1 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-semibold text-center transition-colors">
                                Book Now
                            </a>
                            <button onclick="showDestinationDetails('{{ $destination['id'] }}')" 
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold transition-colors">
                                Details
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Category Book All Button -->
            <div class="text-center mt-8">
                <a href="{{ route('booking.form', ['category' => $categoryKey]) }}" 
                   class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-8 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105">
                    Book All {{ $categoryData['title'] }}
                </a>
            </div>
        </div>
        @endforeach

        <!-- Instructions -->
        <div class="mt-16 bg-blue-50 border-2 border-blue-200 rounded-xl p-8">
            <h3 class="text-2xl font-bold text-blue-900 mb-6">How to Test Adventure Booking</h3>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-lg font-semibold text-blue-800 mb-3">Individual Destination Booking</h4>
                    <ul class="space-y-2 text-blue-700">
                        <li>• Click "Book Now" on any specific destination</li>
                        <li>• The form will show the destination name and description</li>
                        <li>• Pricing tiers will be displayed (Low/Medium/Expensive)</li>
                        <li>• Prices are per person and update based on selection</li>
                        <li>• Number of people affects total pricing</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-blue-800 mb-3">Category Booking</h4>
                    <ul class="space-y-2 text-blue-700">
                        <li>• Click "Book All [Category]" for general booking</li>
                        <li>• You can select from multiple destinations</li>
                        <li>• Same pricing logic applies across all categories</li>
                        <li>• All categories use the same unified booking form</li>
                        <li>• Consistent styling and functionality</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Destination Details Modal -->
<div id="destinationModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-xl max-w-2xl w-full max-h-96 overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-2xl font-bold text-gray-900" id="modalTitle">Destination Details</h3>
                    <button onclick="closeDestinationDetails()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <div id="modalContent">
                    <!-- Content will be populated by JavaScript -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function showDestinationDetails(destinationId) {
    // This would typically fetch destination details via AJAX
    // For now, we'll just show a placeholder
    document.getElementById('modalTitle').textContent = 'Destination Details';
    document.getElementById('modalContent').innerHTML = `
        <p class="text-gray-600">Detailed information about ${destinationId} would be displayed here.</p>
        <p class="text-gray-600 mt-4">This includes full description, itinerary, highlights, and more.</p>
    `;
    document.getElementById('destinationModal').classList.remove('hidden');
}

function closeDestinationDetails() {
    document.getElementById('destinationModal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('destinationModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDestinationDetails();
    }
});
</script>
@endsection






