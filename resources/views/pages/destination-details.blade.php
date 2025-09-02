@extends('layouts.app')

@section('title', 'Destination Details')

@section('content')
@php
  $packages = [
    1 => [
      'name' => 'Annapurna Base Camp',
      'image' => 'images/annapurnabasecamp.jpg',
      'duration' => '7 days',
      'difficulty' => 'Moderate',
      'price' => 'Rs 18,000',
      'overview' => 'Glacial sanctuary beneath towering peaks with rich Gurung culture along the way.',
      'itinerary' => [
        'Day 1: Arrival in Pokhara and walk briefing',
        'Day 2: Drive to Nayapul, trek to Tikhedhunga',
        'Day 3: Trek to Ghorepani',
        'Day 4: Poon Hill sunrise, trek to Tadapani',
        'Day 5: Trek to Deurali',
        'Day 6: Trek to Annapurna Base Camp and back to Deurali',
        'Day 7: Trek to Siwai and drive back to Pokhara',
      ],
      'inclusions' => [
        'Accommodation during trek',
        'Breakfasts and dinners on trek',
        'TIMS and Annapurna Conservation permits',
        'Experienced local guide',
        'Pick-up and drop-off',
      ],
    ],
    2 => [
      'name' => 'Ghandruk',
      'image' => 'images/ghandruk.jpg',
      'duration' => '3 days',
      'difficulty' => 'Easy',
      'price' => 'Rs 12,000',
      'overview' => 'Gurung village with Himalayan views and cultural homestays.',
      'itinerary' => [
        'Day 1: Drive to Kimche and hike to Ghandruk',
        'Day 2: Sunrise viewpoint and village tour',
        'Day 3: Hike down and return to Pokhara',
      ],
      'inclusions' => [
        'Homestay accommodation',
        'Breakfast included',
        'Local guide',
        'Permits and entries',
      ],
    ],
    3 => [
      'name' => 'Dhorpatan',
      'image' => 'images/dhorpatan.jpg',
      'duration' => '7 days',
      'difficulty' => 'Moderate',
      'price' => 'Rs 20,000',
      'overview' => 'Remote valley with wild beauty and alpine meadows.',
      'itinerary' => [
        'Day 1: Drive to Baglung',
        'Day 2-5: Trekking through rural hamlets and meadows',
        'Day 6: Return trek',
        'Day 7: Drive back',
      ],
      'inclusions' => [
        'Lodge accommodation',
        'Guide and porter',
        'Permits',
      ],
    ],
    4 => [
      'name' => 'Ilam',
      'image' => 'images/illam.jpg',
      'duration' => '4 days',
      'difficulty' => 'Easy',
      'price' => 'Rs 10,000',
      'overview' => 'Tea paradise with winding hills and quiet sunrise points.',
      'itinerary' => [
        'Day 1: Flight/drive and tea garden walk',
        'Day 2: Kanyam and viewpoints',
        'Day 3: Local villages and homestays',
        'Day 4: Return',
      ],
      'inclusions' => [
        'Hotel stays',
        'Breakfasts',
        'Local transfers',
      ],
    ],
  ];

  $pkg = $packages[$id] ?? $packages[1];
  $slug = Str::slug($pkg['name']);
@endphp

<section class="hero">
    <div class="hero-bg" style="background-image:url('{{ asset($pkg['image']) }}')"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <h1>{{ $pkg['name'] }} <br><span>Package</span></h1>
      <p>Itinerary, inclusions, and helpful tips for your trip.</p>
    </div>
    <svg class="wave" viewBox="0 0 1440 100" preserveAspectRatio="none">
      <path d="M0,80 C300,120 600,0 900,60 C1100,100 1300,80 1440,60 L1440,100 L0,100 Z"></path>
    </svg>
</section>

<section class="container pad">
  <h2 class="section-title">Package Overview</h2>
  <div class="dest-card" style="max-width:1024px;margin:0 auto;">
    <img src="{{ asset($pkg['image']) }}" alt="{{ $pkg['name'] }}" style="width:100%;height:340px;object-fit:cover;border-radius:12px;">
    <div style="padding:16px">
      <h3 style="margin:0 0 8px;font-size:22px;color:#1e293b">{{ $pkg['name'] }}</h3>
      <p style="color:#475569;margin:0 0 12px">{{ $pkg['overview'] }}</p>
      <div style="display:flex;gap:16px;color:#334155;font-size:14px;margin-bottom:12px;flex-wrap:wrap">
        <span>Duration: {{ $pkg['duration'] }}</span>
        <span>Difficulty: {{ $pkg['difficulty'] }}</span>
        <span>From <strong style="color:var(--brand)">{{ $pkg['price'] }}</strong></span>
      </div>
      <a href="{{ route('booking') }}?tour={{ $slug }}" class="btn btn-dark">Book Now</a>
    </div>
  </div>
</section>

<section class="container pad">
  <h2 class="section-title">Itinerary</h2>
  <div class="dest-card" style="max-width:1024px;margin:0 auto;padding:16px">
    <ul style="margin:0;padding-left:18px;color:#334155;line-height:1.8">
      @foreach($pkg['itinerary'] as $line)
        <li>{{ $line }}</li>
      @endforeach
    </ul>
  </div>
</section>

<section class="container pad">
  <h2 class="section-title">Inclusions</h2>
  <div class="dest-card" style="max-width:1024px;margin:0 auto;padding:16px">
    <ul style="margin:0;padding-left:18px;color:#334155;line-height:1.8">
      @foreach($pkg['inclusions'] as $inc)
        <li>{{ $inc }}</li>
      @endforeach
    </ul>
  </div>
</section>
@endsection


