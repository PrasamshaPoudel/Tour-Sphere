@extends('layouts.app')

@section('title', 'Destinations')

@section('content')
<section class="hero">
    <div class="hero-bg" style="background-image:url('{{ asset('images/back.jpg') }}')"></div>
    <div class="hero-overlay"></div>

    <div class="hero-content">
      <h1>Your world of <br><span>joy</span></h1>
      <p>From local escapes to far-flung adventures, find what makes you happy anytime, anywhere</p>
    </div>

    {{-- bottom wave --}}
    <svg class="wave" viewBox="0 0 1440 100" preserveAspectRatio="none">
      <path d="M0,80 C300,120 600,0 900,60 C1100,100 1300,80 1440,60 L1440,100 L0,100 Z"></path>
    </svg>
</section>

<!-- Destination Grid -->
<section class="destination-list">
    <div class="section-header">
      <h2>Packages</h2>
    </div>

    <div class="dest-grid">
      <div class="dest-card">
        <img src="{{ asset('images/annapurnabasecamp.jpg') }}" alt="Annapurna Base Camp">
        <h3>Annapurna Base Camp</h3>
        <p>Glacial sanctuary beneath towering peaks.</p>
        <span>7 days</span>
        <strong>From Rs 18000</strong>
        <a href="{{ url('destination-details/1') }}" class="btn">View Details</a>
      </div>

      <div class="dest-card">
        <img src="{{ asset('images/ghandruk.jpg') }}" alt="Ghandruk">
        <h3>Ghandruk</h3>
        <p>Gurung village with Himalayan views.</p>
        <span>3 days</span>
        <strong>From Rs 12000</strong>
        <a href="{{ url('destination-details/2') }}" class="btn">View Details</a>
      </div>

      <div class="dest-card">
        <img src="{{ asset('images/dhorpatan.jpg') }}" alt="Dhorpatan">
        <h3>Dhorpatan</h3>
        <p>Remote valley with wild beauty.</p>
        <span>7 days</span>
        <strong>From Rs 20000</strong>
        <a href="{{ url('destination-details/3') }}" class="btn">View Details</a>
      </div>

      <div class="dest-card">
        <img src="{{ asset('images/illam.jpg') }}" alt="Ilam">
        <h3>Ilam</h3>
        <p>Tea paradise with winding hills.</p>
        <span>4 days</span>
        <strong>From Rs 10000</strong>
        <a href="{{ url('destination-details/4') }}" class="btn">View Details</a>
      </div>
    </div>
</section>

{{-- Categories Section --}}
<h2 class="text-3xl font-bold mb-8 text-center">Explore By Categories</h2>
<div class="grid md:grid-cols-5 gap-6">

    {{-- Adventure --}}
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden text-center">
        <img src="{{ asset('images/bunji.jpg') }}" alt="Adventure" class="w-full h-40 object-cover">
        <div class="p-4">
            <h3 class="text-lg font-bold text-blue-600">Adventure</h3>
            <p class="text-gray-600 text-sm mb-4">
                Thrilling experiences like rafting, paragliding, and trekking.
            </p>
            <a href="{{ route('adventure') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Explore</a>
        </div>
    </div>

    {{-- Culture --}}
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden text-center">
        <img src="{{ asset('images/culture.jpg') }}" alt="Culture" class="w-full h-40 object-cover">
        <div class="p-4">
            <h3 class="text-lg font-bold text-blue-600">Culture</h3>
            <p class="text-gray-600 text-sm mb-4">
                Explore Nepal’s festivals, art, dance, and heritage sites.
            </p>
            <a href="{{ route('culture') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Explore</a>
        </div>
    </div>

    {{-- Nature --}}
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden text-center">
        <img src="{{ asset('images/rara.jpg') }}" alt="Nature" class="w-full h-40 object-cover">
        <div class="p-4">
            <h3 class="text-lg font-bold text-blue-600">Nature</h3>
            <p class="text-gray-600 text-sm mb-4">
                From serene lakes to the Himalayas, nature at its best.
            </p>
            <a href="{{ route('nature') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Explore</a>
        </div>
    </div>

    {{-- Spiritual --}}
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden text-center">
        <img src="{{ asset('images/lumbini.jpg') }}" alt="Spiritual" class="w-full h-40 object-cover">
        <div class="p-4">
            <h3 class="text-lg font-bold text-blue-600">Spiritual</h3>
            <p class="text-gray-600 text-sm mb-4">
                Visit sacred temples, monasteries, meditation hubs.
            </p>
            <a href="{{ route('spiritual') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Explore</a>
        </div>
    </div>

    {{-- Historical --}}
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden text-center">
        <img src="{{ asset('images/bhaktapur.jpg') }}" alt="Historical" class="w-full h-40 object-cover">
        <div class="p-4">
            <h3 class="text-lg font-bold text-blue-600">Historical</h3>
            <p class="text-gray-600 text-sm mb-4">
                Tour ancient palaces, forts, and landmarks of Nepal.
            </p>
            <a href="{{ route('historical') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Explore</a>
        </div>
    </div>

</div>
@endsection
