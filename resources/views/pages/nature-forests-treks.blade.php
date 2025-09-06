@extends('layouts.app')
@section('title', 'Forests & Himalayan Treks')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-gradient-to-r from-emerald-900 to-indigo-700 text-white">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative z-10 container mx-auto px-4 h-full flex items-center">
        <div class="max-w-4xl">
            <h1 class="text-5xl font-bold mb-6">Forests & Himalayan Treks</h1>
            <p class="text-xl mb-8">From tiger forests to glacier valleys—pick your perfect trekking experience across Nepal.</p>
            <div class="flex flex-wrap gap-4">
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full"><span class="font-semibold">2 Forests</span></div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full"><span class="font-semibold">3 Classic Treks</span></div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full"><span class="font-semibold">Guided Trips</span></div>
            </div>
        </div>
    </div>
</section>

@php
$entries = [
  [
    'type' => 'Forest',
    'name' => 'Chitwan National Park',
    'image' => 'chitwan.jpg',
    'location' => 'Chitwan',
    'description' => 'Jungle safaris with rhinos, crocodiles, and hundreds of bird species.',
    'duration' => '2–3 days',
    'best_season' => 'Oct–Mar',
    'highlights' => ['Jeep safari', 'Canoe ride', 'Tharu culture show'],
    'plan' => ['Drive to Sauraha', 'Evening cultural program', 'Full-day safari inside park'],
  ],
  [
    'type' => 'Forest',
    'name' => 'Bardiya Reserve',
    'image' => 'bardiya.jpg',
    'location' => 'Bardiya',
    'description' => 'Remote wildlife haven with higher chance of tiger sightings.',
    'duration' => '3–4 days',
    'best_season' => 'Oct–Apr',
    'highlights' => ['Walking safari', 'River float', 'Birding'],
    'plan' => ['Fly to Nepalgunj', 'Transfer to lodge', 'Guided walking safaris'],
  ],
  [
    'type' => 'Trek',
    'name' => 'Annapurna Base Camp',
    'image' => 'annapurnabasecamp.jpg',
    'location' => 'Annapurna',
    'description' => 'Iconic amphitheater of Himalayan giants and diverse landscapes.',
    'duration' => '7–10 days',
    'best_season' => 'Mar–May, Oct–Nov',
    'highlights' => ['Hot springs', 'Mountain sunrise', 'Gurung villages'],
    'plan' => ['Drive to trailhead', 'Tea-house trekking', 'Sunrise at ABC bowl'],
  ],
  [
    'type' => 'Trek',
    'name' => 'Everest Base Camp',
    'image' => 'everestbasecamp.jpg',
    'location' => 'Khumbu',
    'description' => 'Sherpa culture, suspension bridges, and legendary glacier views.',
    'duration' => '12–14 days',
    'best_season' => 'Apr–May, Oct–Nov',
    'highlights' => ['Namche Bazaar', 'Tengboche monastery', 'Kala Patthar sunset'],
    'plan' => ['Fly to Lukla', 'Acclimatization in Namche', 'EBC & Kala Patthar'],
  ],
  [
    'type' => 'Trek',
    'name' => 'Ghandruk Loop',
    'image' => 'ghandruk.jpg',
    'location' => 'Annapurna',
    'description' => 'Short family-friendly trek through rhododendron forests and village life.',
    'duration' => '3–4 days',
    'best_season' => 'Year round',
    'highlights' => ['Rhododendron bloom', 'Gurung Museum', 'Tea houses'],
    'plan' => ['Drive to Kimche', 'Stay in Ghandruk', 'Loop via Landruk or Tadapani'],
  ],
];
@endphp

<section class="py-20 bg-gray-50">
  <div class="container mx-auto px-4">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold text-gray-900 mb-4">Pick Your Nature Journey</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">Alternating forests and Himalayan treks—choose what fits your time and style.</p>
    </div>

    <div class="space-y-16">
      @foreach($destinations as $index => $destination)
      <div class="bg-white rounded-3xl shadow-2xl overflow-hidden {{ $index % 2 == 1 ? 'md:flex-row-reverse' : '' }} md:flex">
        <div class="md:w-1/2 relative">
          <img src="{{ asset('images/' . $destination['image']) }}" alt="{{ $destination['name'] }}" class="w-full h-96 md:h-full object-cover">
          <div class="absolute top-6 left-6 {{ $destination['type']=='Forest Park' ? 'bg-green-600' : 'bg-indigo-600' }} text-white px-4 py-2 rounded-full font-bold">
            {{ $destination['type'] == 'Forest Park' ? 'Forest' : 'Trek' }}
          </div>
          <div class="absolute bottom-6 right-6 bg-black bg-opacity-70 text-white px-4 py-2 rounded-full">{{ $destination['duration'] }}</div>
        </div>
        <div class="md:w-1/2 p-8">
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-3xl font-bold text-gray-900">{{ $destination['name'] }}</h3>
            <div class="flex items-center space-x-2"><span class="text-sm text-gray-500">📍</span><span class="text-sm text-gray-600">{{ $destination['location'] }}</span></div>
          </div>
                      <p class="text-gray-600 mb-6 leading-relaxed">{{ $destination['description'] }}</p>
                      <div class="grid grid-cols-2 gap-4 mb-6">
              <div class="bg-emerald-50 p-4 rounded-lg"><div class="text-sm text-emerald-600 font-semibold">Duration</div><div class="text-lg font-bold text-gray-900">{{ $destination['duration'] }}</div></div>
              <div class="bg-blue-50 p-4 rounded-lg"><div class="text-sm text-blue-600 font-semibold">Best Season</div><div class="text-lg font-bold text-gray-900">{{ $destination['best_season'] }}</div></div>
            </div>
                      <div class="mb-6">
              <h4 class="text-lg font-semibold text-gray-900 mb-3">Highlights</h4>
              <ul class="space-y-2">
                @foreach($destination['highlights'] as $h)
                <li class="flex items-start"><span class="text-green-500 mr-2">✓</span><span class="text-gray-600">{{ $h }}</span></li>
                @endforeach
              </ul>
            </div>
            

          <div class="flex gap-4">
            <button onclick="toggleForestDetails('{{ $index }}')" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">View Details</button>
            <a href="{{ route('booking') }}?tour={{ strtolower(str_replace(' ', '-', $destination['name'])) }}&category=nature" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">Book Now</a>
          </div>
        </div>
      </div>

      <div id="forest-details-{{ $index }}" class="hidden bg-white rounded-2xl shadow-lg p-8 mb-8">
        <div class="grid md:grid-cols-2 gap-8">
          <div>
            <h4 class="text-xl font-bold text-gray-900 mb-4">🗺️ Suggested Plan</h4>
            <div class="space-y-3">
              @foreach($destination['details'] as $step)
              <div class="flex items-start"><div class="bg-indigo-100 text-indigo-600 w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold mr-3 flex-shrink-0">{{ $loop->iteration }}</div><p class="text-gray-700">{{ $step }}</p></div>
              @endforeach
            </div>
          </div>
          <div>
            <h4 class="text-xl font-bold text-gray-900 mb-4">🎒 What to Carry</h4>
            <div class="grid gap-2">
              <div class="flex items-center"><span class="text-indigo-500 mr-2">•</span><span class="text-gray-700">Layered clothing</span></div>
              <div class="flex items-center"><span class="text-indigo-500 mr-2">•</span><span class="text-gray-700">Rain/wind protection</span></div>
              <div class="flex items-center"><span class="text-indigo-500 mr-2">•</span><span class="text-gray-700">Sturdy footwear</span></div>
              <div class="flex items-center"><span class="text-indigo-500 mr-2">•</span><span class="text-gray-700">Sun protection & water</span></div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-indigo-600 to-emerald-700 text-white">
  <div class="container mx-auto px-4 text-center">
    <h2 class="text-4xl font-bold mb-6">Plan Your Nature Journey</h2>
    <p class="text-xl mb-8 max-w-2xl mx-auto">We\'ll tailor forests and trek combinations to match your time and fitness.</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="{{ route('booking') }}?category=nature" class="bg-white text-indigo-700 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">Book Now</a>
      <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-indigo-700 transition-colors">Contact Us</a>
    </div>
  </div>
</section>

<script>
function toggleForestDetails(index){
  const el = document.getElementById('forest-details-' + index);
  const btn = event.target;
  if(el.classList.contains('hidden')){ el.classList.remove('hidden'); btn.textContent='Hide Details'; }
  else { el.classList.add('hidden'); btn.textContent='View Details'; }
}
</script>
@endsection
