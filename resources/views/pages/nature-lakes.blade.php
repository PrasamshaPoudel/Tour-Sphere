@extends('layouts.app')
@section('title', 'Pristine Lakes of Nepal')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-gradient-to-r from-green-900 to-teal-700 text-white">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative z-10 container mx-auto px-4 h-full flex items-center">
        <div class="max-w-4xl">
            <h1 class="text-5xl font-bold mb-6">Pristine Lakes of Nepal</h1>
            <p class="text-xl mb-8">Calm waters, alpine reflections, and sacred shores. Explore the most beautiful lakes across Nepal.</p>
            <div class="flex flex-wrap gap-4">
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full"><span class="font-semibold">4 Lakes</span></div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full"><span class="font-semibold">Scenic & Sacred</span></div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full"><span class="font-semibold">Best Spring/Autumn</span></div>
            </div>
        </div>
    </div>
</section>

@php
$lakes = [
  [
    'name' => 'Rara Lake',
    'image' => 'rara.jpg',
    'location' => 'Mugu, Karnali',
    'description' => 'Nepal\'s largest lake with crystal blue waters and peaceful forests.',
    'duration' => '3–4 days',
    'best_season' => 'Mar–May, Sep–Nov',
    'highlights' => ['Crystal-clear water', 'Boat ride & lakeside walks', 'Bird watching'],
    'details' => ['Fly to Talcha/drive via Jumla', 'Hike to Murma Top viewpoint', 'Visit Rara National Park'],
  ],
  [
    'name' => 'Tilicho Lake',
    'image' => 'tilicho.jpg',
    'location' => 'Manang, Annapurna',
    'description' => 'Among the world\'s highest lakes, surrounded by dramatic rock walls.',
    'duration' => '7–10 days',
    'best_season' => 'Mar–May, Oct–Nov',
    'highlights' => ['High-altitude adventure', 'Annapurna vistas', 'Tea-house trekking'],
    'details' => ['Drive to Manang region', 'Acclimatization hikes', 'Day trip to Tilicho from base lodges'],
  ],
  [
    'name' => 'Gosaikunda',
    'image' => 'gosaikunda.jpg',
    'location' => 'Langtang',
    'description' => 'A sacred alpine lake set amongst rugged peaks and yak pastures.',
    'duration' => '4–5 days',
    'best_season' => 'Oct–Nov, Mar–May',
    'highlights' => ['Pilgrimage site', 'Ridge line views', 'Short but rewarding trek'],
    'details' => ['Drive to Dhunche', 'Steady ascent through forests', 'Explore multiple lakes near the pass'],
  ],
  [
    'name' => 'Phewa Lake',
    'image' => 'pokhara.jpg',
    'location' => 'Pokhara',
    'description' => 'Iconic lakeside ambience with Annapurna reflections and boat rides.',
    'duration' => '2–3 days',
    'best_season' => 'Year round',
    'highlights' => ['Boating & Tal Barahi temple', 'World Peace Pagoda view', 'Cafe-lined lakeside'],
    'details' => ['Stay near Lakeside', 'Sunrise at Sarangkot', 'Boat to the island temple'],
  ],
];
@endphp

<!-- Lakes Section -->
<section class="py-20 bg-gray-50">
  <div class="container mx-auto px-4">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold text-gray-900 mb-4">Choose Your Lake Escape</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">Each lake offers a unique mood—from serene family getaways to high-altitude adventures.</p>
    </div>

    <div class="space-y-16">
      @foreach($lakes as $index => $lake)
      <div class="bg-white rounded-3xl shadow-2xl overflow-hidden {{ $index % 2 == 1 ? 'md:flex-row-reverse' : '' }} md:flex">
        <!-- Image -->
        <div class="md:w-1/2 relative">
          <img src="{{ asset('images/' . $lake['image']) }}" alt="{{ $lake['name'] }}" class="w-full h-96 md:h-full object-cover">
          <div class="absolute top-6 left-6 bg-green-600 text-white px-4 py-2 rounded-full font-bold">Lake</div>
          <div class="absolute bottom-6 right-6 bg-black bg-opacity-70 text-white px-4 py-2 rounded-full">{{ $lake['duration'] }}</div>
        </div>
        <!-- Details -->
        <div class="md:w-1/2 p-8">
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-3xl font-bold text-gray-900">{{ $lake['name'] }}</h3>
            <div class="flex items-center space-x-2"><span class="text-sm text-gray-500">📍</span><span class="text-sm text-gray-600">{{ $lake['location'] }}</span></div>
          </div>
          <p class="text-gray-600 mb-6 leading-relaxed">{{ $lake['description'] }}</p>
          <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="bg-green-50 p-4 rounded-lg"><div class="text-sm text-green-600 font-semibold">Duration</div><div class="text-lg font-bold text-gray-900">{{ $lake['duration'] }}</div></div>
            <div class="bg-blue-50 p-4 rounded-lg"><div class="text-sm text-blue-600 font-semibold">Best Season</div><div class="text-lg font-bold text-gray-900">{{ $lake['best_season'] }}</div></div>
          </div>
          <div class="mb-6">
            <h4 class="text-lg font-semibold text-gray-900 mb-3">Highlights</h4>
            <ul class="space-y-2">
              @foreach($lake['highlights'] as $h)
              <li class="flex items-start"><span class="text-green-500 mr-2">✓</span><span class="text-gray-600">{{ $h }}</span></li>
              @endforeach
            </ul>
          </div>
          
          
          <div class="flex gap-4">
            <button onclick="toggleLakeDetails('{{ $index }}')" class="bg-teal-600 hover:bg-teal-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">View Details</button>
            <a href="{{ route('booking.form') }}?tour=lake-{{ strtolower(str_replace(' ', '-', $lake['name'])) }}&category=nature" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">Book Now</a>
          </div>
        </div>
      </div>

      <!-- Expandable Details -->
      <div id="lake-details-{{ $index }}" class="hidden bg-white rounded-2xl shadow-lg p-8 mb-8">
        <div class="grid md:grid-cols-2 gap-8">
          <div>
            <h4 class="text-xl font-bold text-gray-900 mb-4">🗺️ Suggested Plan</h4>
            <div class="space-y-3">
              @foreach($lake['details'] as $step)
              <div class="flex items-start"><div class="bg-teal-100 text-teal-600 w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold mr-3 flex-shrink-0">{{ $loop->iteration }}</div><p class="text-gray-700">{{ $step }}</p></div>
              @endforeach
            </div>
          </div>
          <div>
            <h4 class="text-xl font-bold text-gray-900 mb-4">🎒 What to Carry</h4>
            <div class="grid gap-2">
              <div class="flex items-center"><span class="text-teal-500 mr-2">•</span><span class="text-gray-700">Warm layers</span></div>
              <div class="flex items-center"><span class="text-teal-500 mr-2">•</span><span class="text-gray-700">Rain jacket</span></div>
              <div class="flex items-center"><span class="text-teal-500 mr-2">•</span><span class="text-gray-700">Comfortable shoes</span></div>
              <div class="flex items-center"><span class="text-teal-500 mr-2">•</span><span class="text-gray-700">Water & snacks</span></div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-teal-600 to-green-700 text-white">
  <div class="container mx-auto px-4 text-center">
    <h2 class="text-4xl font-bold mb-6">Ready for a Lakeside Escape?</h2>
    <p class="text-xl mb-8 max-w-2xl mx-auto">Tell us your dates and we\'ll plan the perfect itinerary around Nepal\'s most beautiful lakes.</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="{{ route('booking.form') }}?category=nature" class="bg-white text-teal-700 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">Book Now</a>
      <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-teal-700 transition-colors">Contact Us</a>
    </div>
  </div>
</section>

<script>
function toggleLakeDetails(index){
  const el = document.getElementById('lake-details-' + index);
  const btn = event.target;
  if(el.classList.contains('hidden')){ el.classList.remove('hidden'); btn.textContent='Hide Details'; }
  else { el.classList.add('hidden'); btn.textContent='View Details'; }
}
</script>
@endsection
