@extends('layouts.app')

@section('title', 'Destinations')

@section('content')
<section class="hero">
    <div class="hero-bg" style="background-image:url('{{ asset('images/back.jpg') }}')"></div>
    <div class="hero-overlay"></div>

    <div class="hero-content">
      <h1>Find your next <br><span>destination</span></h1>
      <p>From local escapes to far‑flung adventures, pick a trip that fits you.</p>
    </div>

    <svg class="wave" viewBox="0 0 1440 100" preserveAspectRatio="none">
      <path d="M0,80 C300,120 600,0 900,60 C1100,100 1300,80 1440,60 L1440,100 L0,100 Z"></path>
    </svg>
</section>

<!-- Destination Grid -->
<section class="destination-list">
    <div class="section-header section-header--center">
      <h2 class="section-title">Packages</h2>
    </div>

    <div class="dest-grid">
      <div class="dest-card">
        <img src="{{ asset('images/annapurnabasecamp.jpg') }}" alt="Annapurna Base Camp">
        <h3>Annapurna Base Camp</h3>
        <p>Glacial sanctuary beneath towering peaks.</p>
        <span>7 days</span>
        <strong>From Rs 60,000</strong>
        <div class="dest-card-actions">
          <a href="{{ route('destination.details', ['id' => 1]) }}" class="btn btn-outline">View Details</a>
          <a href="{{ route('booking.form') }}?destination_id=7&destination_title=Annapurna Base Camp&price=60000&description=Glacial sanctuary beneath towering peaks." class="btn">Book Now</a>
        </div>
      </div>

      <div class="dest-card">
        <img src="{{ asset('images/ghandruk.jpg') }}" alt="Ghandruk">
        <h3>Ghandruk</h3>
        <p>Traditional Gurung village with spectacular Annapurna mountain views.</p>
        <span>3 days</span>
        <strong>From Rs 15,000</strong>
        <div class="dest-card-actions">
          <a href="{{ route('destination.details', ['id' => 2]) }}" class="btn btn-outline">View Details</a>
          <a href="{{ route('booking.form') }}?destination_id=8&destination_title=Ghandruk&price=15000&description=Traditional Gurung village with spectacular Annapurna mountain views." class="btn">Book Now</a>
        </div>
      </div>

      <div class="dest-card">
        <img src="{{ asset('images/dhorpatan.jpg') }}" alt="Dhorpatan">
        <h3>Dhorpatan</h3>
        <p>renowned for its unique wildlife, hunting reserve nestled beneath the Dhaulagiri range.</p>
        <span>7 days</span>
        <strong>From Rs 35,000</strong>
        <div class="dest-card-actions">
          <a href="{{ route('destination.details', ['id' => 3]) }}" class="btn btn-outline">View Details</a>
          <a href="{{ route('booking.form') }}?destination_id=9&destination_title=Dhorpatan&price=35000&description=Remote valley with wild beauty." class="btn">Book Now</a>
        </div>
      </div>

      <div class="dest-card">
        <img src="{{ asset('images/illam.jpg') }}" alt="Ilam">
        <h3>Ilam</h3>
        <p>Tea gardens and mountain views in eastern Nepal.</p>
        <span>4 days</span>
        <strong>From Rs 8,000</strong>
        <div class="dest-card-actions">
          <a href="{{ route('destination.details', ['id' => 4]) }}" class="btn btn-outline">View Details</a>
          <a href="{{ route('booking.form') }}?destination_id=10&destination_title=Ilam&price=8000&description=Tea gardens and mountain views in eastern Nepal." class="btn">Book Now</a>
        </div>
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
                Explore Nepal's festivals, art, dance, and heritage sites.
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

{{-- Special Packages Section --}}
<h2 class="text-3xl font-bold mb-8 text-center mt-16">Special Packages</h2>
<div class="grid md:grid-cols-4 gap-6">

    {{-- Honeymoon --}}
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden text-center">
        <img src="{{ asset('images/pokhara-romantic.jpg') }}" alt="Honeymoon" class="w-full h-40 object-cover">
        <div class="p-4">
            <h3 class="text-lg font-bold text-pink-600">Honeymoon</h3>
            <p class="text-gray-600 text-sm mb-4">
                Romantic getaways with candlelight dinners and luxury accommodations.
            </p>
            <a href="{{ route('honeymoon') }}" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg">Explore</a>
        </div>
    </div>

    {{-- Family --}}
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden text-center">
        <img src="{{ asset('images/chitwan-family.jpg') }}" alt="Family" class="w-full h-40 object-cover">
        <div class="p-4">
            <h3 class="text-lg font-bold text-blue-600">Family</h3>
            <p class="text-gray-600 text-sm mb-4">
                Fun activities for all ages with safe and educational experiences.
            </p>
            <a href="{{ route('family') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Explore</a>
        </div>
    </div>

    {{-- Romantic --}}
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden text-center">
        <img src="{{ asset('images/candlelight-dinner.jpg') }}" alt="Romantic" class="w-full h-40 object-cover">
        <div class="p-4">
            <h3 class="text-lg font-bold text-purple-600">Romantic</h3>
            <p class="text-gray-600 text-sm mb-4">
                Intimate experiences and candlelight dinners for couples.
            </p>
            <a href="{{ route('romantic') }}" class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg">Explore</a>
        </div>
    </div>

    {{-- Luxury --}}
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden text-center">
        <img src="{{ asset('images/luxury-himalayan.jpg') }}" alt="Luxury" class="w-full h-40 object-cover">
        <div class="p-4">
            <h3 class="text-lg font-bold text-yellow-600">Luxury</h3>
            <p class="text-gray-600 text-sm mb-4">
                5-star accommodations with exclusive access and private services.
            </p>
            <a href="{{ route('luxury') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">Explore</a>
        </div>
    </div>

</div>
@endsection
