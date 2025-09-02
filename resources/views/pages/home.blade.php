@extends('layouts.app')
@section('title','Home | Tour Sphere')

@section('content')
  {{-- HERO --}}
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

  {{-- WHY CHOOSE --}}
  <section class="why">
    <h2 class="section-title">Why choose Tour Sphere?</h2>

    <div class="features">
      <article class="feature">
        <div class="ico"><i class="fa-solid fa-ticket"></i></div>
        <h3>Ultimate flexibility</h3>
        <p>You’re in control, with free cancellation and payment options to fit any plan or budget.</p>
      </article>

      <article class="feature">
        <div class="ico"><i class="fa-solid fa-map"></i></div>
        <h3>Memorable experiences</h3>
        <p>Browse and book tours so incredible, you’ll want to tell your friends.</p>
      </article>

      <article class="feature">
        <div class="ico"><i class="fa-regular fa-gem"></i></div>
        <h3>Quality at our core</h3>
        <p>High standards and trusted reviews. A tour company you can count on.</p>
      </article>

      <article class="feature">
        <div class="ico"><i class="fa-solid fa-award"></i></div>
        <h3>Award-winning support</h3>
        <p>New plan? No problem. We’re here to help, 24/7.</p>
      </article>
    </div>
  </section>

<section class="trending">
  <h2 class="section-title">Trending Destinations</h2>
  <div class="grid">
    <div class="circle">
      <img src="{{ asset('images/pokhara.jpg') }}" alt="Pokhara">
      <h3>Pokhara</h3>
    </div>
    <div class="circle">
      <img src="{{ asset('images/ktm.jpg') }}" alt="Kathmandu">
      <h3>Kathmandu</h3>
    </div>
    <div class="circle">
      <img src="{{ asset('images/chitwan.jpg') }}" alt="Chitwan">
      <h3>Chitwan</h3>
    </div>
    <div class="circle">
      <img src="{{ asset('images/pachpokhari.jpg') }}" alt="Pachpokhari">
      <h3>Pachpokhari</h3>
    </div>
    <div class="circle">
      <img src="{{ asset('images/tilicho.jpg') }}" alt="Tilicho">
      <h3>Tilicho</h3>
    </div>
    <div class="circle">
      <img src="{{ asset('images/rara.jpg') }}" alt="Rara">
      <h3>Rara</h3>
    </div>
    <div class="circle">
      <img src="{{ asset('images/pathibhara.jpg') }}" alt="Pathibhara">
      <h3>Pathibhara</h3>
    </div>
  </div>
</section>
<section class="popular">
  <h2 class="section-title">Popular Destinations</h2>
  <div class="popular-grid">

    <!-- Everest -->
    <div class="destination-card">
      <img src="{{ asset('images/everest.jpg') }}" alt="Everest">
      <div class="destination-info">
        <h3>Everest Base Camp</h3>
        <p>Majestic trek to Everest’s base.</p>
        <a href="{{ route('booking') }}" class="book-btn">Book Now</a>
        <div class="destination-footer">
          <span>16 days</span>
          <span>From <strong>Rs 80,000</strong></span>
        </div>
      </div>
    </div>

    <!-- Lumbini -->
    <div class="destination-card">
      <img src="{{ asset('images/lumbini.jpg') }}" alt="Lumbini">
      <div class="destination-info">
        <h3>Lumbini</h3>
        <p>Visit the birthplace of Lord Buddha.</p>
        <a href="{{ route('booking') }}" class="book-btn">Book Now</a>
        <div class="destination-footer">
          <span>3 days</span>
          <span>From <strong>Rs 10,000</strong></span>
        </div>
      </div>
    </div>

    <!-- Mustang -->
    <div class="destination-card">
      <img src="{{ asset('images/mustang.jpg') }}" alt="Mustang">
      <div class="destination-info">
        <h3>Upper Mustang</h3>
        <p>Discover the hidden kingdom of Mustang.</p>
        <a href="{{ route('booking') }}" class="book-btn">Book Now</a>
        <div class="destination-footer">
          <span>10 days</span>
          <span>From <strong>Rs 45,000</strong></span>
        </div>
      </div>
    </div>

    <!-- Pokhara -->
    <div class="destination-card">
      <img src="{{ asset('images/pokhara.jpg') }}" alt="Pokhara">
      <div class="destination-info">
        <h3>Pokhara</h3>
        <p>Relax by Phewa Lake and enjoy panoramic mountain views.</p>
        <a href="{{ route('booking') }}" class="book-btn">Book Now</a>
        <div class="destination-footer">
          <span>4 days</span>
          <span>From <strong>Rs 12,000</strong></span>
        </div>
      </div>
    </div>

    <!-- Chitwan Safari -->
    <div class="destination-card">
      <img src="{{ asset('images/chitwan.jpg') }}" alt="Chitwan">
      <div class="destination-info">
        <h3>Chitwan Safari</h3>
        <p>Wildlife safari with rhinos, tigers, and jungle adventures.</p>
        <a href="{{ route('booking') }}" class="book-btn">Book Now</a>
        <div class="destination-footer">
          <span>3 days</span>
          <span>From <strong>Rs 15,000</strong></span>
        </div>
      </div>
    </div>

    <!-- Annapurna Circuit -->
    <div class="destination-card">
      <img src="{{ asset('images/annapurnabasecamp.jpg') }}" alt="Annapurna">
      <div class="destination-info">
        <h3>Annapurna Circuit</h3>
        <p>Legendary trek through diverse landscapes and villages.</p>
        <a href="{{ route('booking') }}" class="book-btn">Book Now</a>
        <div class="destination-footer">
          <span>14 days</span>
          <span>From <strong>Rs 70,000</strong></span>
        </div>
      </div>
    </div>

    <!-- Gosaikunda -->
    <div class="destination-card">
      <img src="{{ asset('images/gosaikunda.jpg') }}" alt="Gosaikunda">
      <div class="destination-info">
        <h3>Gosaikunda</h3>
        <p>Scenic alpine lake and sacred pilgrimage site in Langtang.</p>
        <a href="{{ route('booking') }}" class="book-btn">Book Now</a>
        <div class="destination-footer">
          <span>5 days</span>
          <span>From <strong>Rs 25,000</strong></span>
        </div>
      </div>
    </div>

  </div> 
</section>
<!-- Promo Offer Section -->
<section class="promo-offer">
  <div class="promo-content">
    <h2 class="section-title">Grab up to <span>35% off</span> on your favorite Destination</h2>
    <p>Limited time offer, don't miss the opportunity</p>
    <a href="{{ route('booking') }}" class="btn">Book Now</a>
  </div>
  <div class="promo-image">
    <img src="images/temple-tour.jpg" alt="Travel Offer">
  </div>
</section>
<!-- Popular Things To Do Section -->
<section class="things-to-do">
  <div class="section-header">
    <h2 class="section-title">Popular things to do</h2>
    <a href="things-to-do.php" class="see-all">See all</a>
  </div>

  <div class="things-grid">
    <div class="thing-card">
      <img src="images/treeking.jpg" alt="Trekking">
      <h3>Trekking</h3>
    </div>
    <div class="thing-card">
      <img src="images/junglesafari.jpg" alt="Jungle Safari">
      <h3>Jungle Safari</h3>
    </div>
    <div class="thing-card">
      <img src="images/city-tour.jpg" alt="City Tour">
      <h3>City Tour</h3>
    </div>
    <div class="thing-card">
      <img src="images/temple-tour.jpg" alt="Temple Tour">
      <h3>Temple Tour</h3>
    </div>
    <div class="thing-card">
      <img src="images/food-haunt.jpg" alt="Food Haunt">
      <h3>Food Haunt</h3>
    </div>
    <div class="thing-card">
      <img src="images/paragliding.jpg" alt="Paragliding">
      <h3>Paragliding</h3>
    </div>
     <div class="thing-card">
      <img src="images/mountaineering.jpg" alt="Mountaineering">
      <h3>Mountaineering</h3>
    </div>
     <div class="thing-card">
      <img src="images/rafting.jpg" alt="Rafting">
      <h3>Rafting</h3>
    </div>
  </div>
</section>
<!-- Top Trending Section -->
<section class="top-trending">
  <div class="section-header">
    <h2 class="section-title">Top Trending</h2>
    <a href="trending.php" class="see-all">See all</a>
  </div>

  <div class="trending-cards">
    <div class="trending-card">
      <img src="images/annapurnabasecamp.jpg" alt="Annapurna Base Camp">
      <h3>Annapurna Base Camp</h3>
      <p>Glacial sanctuary beneath towering peaks.</p>
      <span>7 days</span>
      <strong>From Rs 18000</strong>
    </div>

    <div class="trending-card">
      <img src="images/ghandruk.jpg" alt="Ghandruk">
      <h3>Ghandruk</h3>
      <p>Gurung village with Himalayan views.</p>
      <span>3 days</span>
      <strong>From Rs 12000</strong>
    </div>

    <div class="trending-card">
      <img src="images/dhorpatan.jpg" alt="Dhorpatan">
      <h3>Dhorpatan</h3>
      <p>Remote valley with wild beauty.</p>
      <span>7 days</span>
      <strong>From Rs 20000</strong>
    </div>

    <div class="trending-card">
      <img src="images/illam.jpg" alt="Ilam">
      <h3>Ilam</h3>
      <p>Tea paradise with winding hills.</p>
      <span>4 days</span>
      <strong>From Rs 10000</strong>
    </div>
  </div>
</section>

<!-- Customer Reviews Section -->
<section class="reviews">
  <h2 class="section-title">Customer Reviews</h2>
  <div class="review-box">
    <div class="review-text">
      <h4>Excellent Service!</h4>
      <p>I had an amazing experience with this company. 
         The service was top-notch, and the staff was incredibly friendly. 
         I highly recommend them!</p>
    </div>
    <div class="review-author">
      <img src="images/sejal.jpg" alt="Customer">
      <p>- Sarah <br>Traveller </br></p>
    </div>
  </div>
</section>


    <section class="articles-section">
        <h2>Travel Articles</h2>
        <div class="article-card-container">
            <div class="article-card">
                <img src="images/dhorpatantrek.jpg" alt="Dhorpatan Trek">
                <div class="card-content">
                    <h3>🏞 Dhorpatan Trek: Nepal's Untamed Wilderness Alternative</h3>
                    <p>April 06 2025 | By Ali Ansari</p>
                </div>
            </div>
            <div class="article-card">
                <img src="images/bardiya.jpg" alt="Bardiya Wildlife Adventure">
                <div class="card-content">
                    <h3>Exploring the bardiya : A Wildlife Adventure</h3>
                    <p>April 07 2025 | By James Tamanag</p>
                </div>
            </div>
            <div class="article-card">
                <img src="images/everestbasecamp.jpg" alt="Everest Base Camp Trek">
                <div class="card-content">
                    <h3>🏔 Into the Heights: An Unforgettable Everest Base Camp Trek</h3>
                    <p>April 08 2025 | By Steven Adhikari</p>
                </div>
            </div>
        </div>
        <a href="#" class="see-all">See all</a>
    </section>




@endsection
