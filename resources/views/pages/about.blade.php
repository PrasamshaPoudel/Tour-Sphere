@extends('layouts.app')

@section('title', 'About Us - Tour Sphere Nepal')

@section('content')
    {{--  Hero Section --}}
    <section class="hero">
        <div class="hero-bg" style="background-image:url('{{ asset('images/back.jpg') }}')"></div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <h1>About <span>Tour Sphere</span></h1>
            <p>Your trusted partner in discovering Nepal's most incredible adventures and experiences</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#story" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Our Story
                </a>
                <a href="{{ route('contact') }}" class="bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 border border-white/30">
                    Get In Touch
                </a>
            </div>
        </div>

        {{-- bottom wave --}}
        <svg class="wave" viewBox="0 0 1440 100" preserveAspectRatio="none">
            <path d="M0,80 C300,120 600,0 900,60 C1100,100 1300,80 1440,60 L1440,100 L0,100 Z"></path>
        </svg>
    </section>

    {{-- 🎯 Stats Section --}}
    <section class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="space-y-2">
                    <div class="text-4xl font-bold">15+</div>
                    <div class="text-blue-100">Years Experience</div>
                </div>
                <div class="space-y-2">
                    <div class="text-4xl font-bold">5000+</div>
                    <div class="text-blue-100">Happy Travelers</div>
                </div>
                <div class="space-y-2">
                    <div class="text-4xl font-bold">100+</div>
                    <div class="text-blue-100">Destinations</div>
                </div>
                <div class="space-y-2">
                    <div class="text-4xl font-bold">24/7</div>
                    <div class="text-blue-100">Support</div>
                </div>
            </div>
        </div>
    </section>

    {{-- 🌟 Our Story Section --}}
    <section id="story" class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-block bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-medium mb-6">
                    Our Journey
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-8">
                    More Than Just a <span class="text-blue-600">Travel Company</span>
                </h2>
                <p class="text-xl text-gray-600 leading-relaxed mb-12">
                    <strong>Tour Sphere</strong> was born from a deep passion for Nepal's breathtaking landscapes, 
                    rich culture, and warm hospitality. We are a team of explorers, storytellers, and mountain lovers 
                    who believe that every journey should be extraordinary.
                </p>
            </div>
        </div>
    </section>

    {{-- 🎯 Mission & Vision Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12">
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-10 shadow-xl">
                    <h3 class="text-3xl font-bold text-center mb-6 text-blue-600">Our Mission</h3>
                    <p class="text-gray-700 text-lg leading-relaxed text-center">
                        To inspire and connect people with the natural and cultural wonders of Nepal 
                        through sustainable, safe, and unforgettable adventures that create lasting memories.
                    </p>
                </div>
                
                <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-3xl p-10 shadow-xl">
                    <h3 class="text-3xl font-bold text-center mb-6 text-indigo-600">Our Vision</h3>
                    <p class="text-gray-700 text-lg leading-relaxed text-center">
                        To become Nepal's most trusted adventure brand, known for authentic experiences, 
                        responsible tourism, and creating meaningful connections between travelers and local communities.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- 🌟 Why Choose Us Section --}}
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Why Choose <span class="text-blue-600">Tour Sphere</span>?
                </h2>
            </div>
            
            <div class="grid gap-8 md:grid-cols-3">
                <div class="bg-white rounded-3xl shadow-xl p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <h3 class="text-2xl font-bold mb-4 text-gray-900">Expert Guides</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Our licensed guides bring decades of mountain expertise, local knowledge, and 
                        a passion for sharing Nepal's beauty with travelers.
                    </p>
                </div>
                
                <div class="bg-white rounded-3xl shadow-xl p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <h3 class="text-2xl font-bold mb-4 text-gray-900">Unique Journeys</h3>
                    <p class="text-gray-600 leading-relaxed">
                        From Everest treks to village homestays, every trip is custom-tailored to create 
                        authentic and unforgettable experiences.
                    </p>
                </div>
                
                <div class="bg-white rounded-3xl shadow-xl p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <h3 class="text-2xl font-bold mb-4 text-gray-900">Sustainable Travel</h3>
                    <p class="text-gray-600 leading-relaxed">
                        We prioritize eco-friendly practices, support local communities, and ensure 
                        our adventures leave a positive impact on Nepal's environment and people.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- 👥 Team Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Meet Our <span class="text-blue-600">Expert Team</span>
                </h2>
            </div>
            
            <div class="grid gap-8 md:grid-cols-3">
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-32 h-32 mx-auto rounded-full mb-6 overflow-hidden shadow-lg">
                        <img src="{{ asset('images/sir.jpg') }}" alt="Steve Adhikari" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-2xl font-bold mb-2 text-gray-900">Steve Adhikari</h3></h3>
                    <p class="text-blue-600 font-semibold mb-3">Founder & Trekking Guide</p>
                </div>
                
                <div class="bg-gradient-to-br from-green-50 to-teal-50 rounded-3xl p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-32 h-32 mx-auto rounded-full mb-6 overflow-hidden shadow-lg">
                        <img src="{{ asset('images/sejal.jpg') }}" alt="Sejal" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-2xl font-bold mb-2 text-gray-900">Sejal</h3>
                    <p class="text-green-600 font-semibold mb-3">Adventure Coordinator</p>
                </div>
                
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-32 h-32 mx-auto rounded-full mb-6 overflow-hidden shadow-lg">
                        <img src="{{ asset('images/boy.jpg') }}" alt="Prabesh Poudel" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-2xl font-bold mb-2 text-gray-900">Prabesh Poudel</h3>
                    <p class="text-purple-600 font-semibold mb-3">Climbing Expert</p>
                </div>
            </div>
        </div>
    </section>

    {{-- 📞 CTA Section --}}
    <section class="py-20 bg-gradient-to-br from-blue-600 via-indigo-600 to-blue-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-black">
                Ready to Start Your <span class="text-yellow-300">Adventure</span>?
            </h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Join thousands of satisfied travelers who have experienced the magic of Nepal with Tour Sphere. 
                Let us create your perfect adventure today.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="{{ route('destinations') }}" 
                   class="bg-white text-blue-600 font-bold px-8 py-4 rounded-full text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl">
                    Explore Destinations
                </a>
                <a href="{{ route('contact') }}" 
                   class="bg-transparent border-2 border-white text-white font-bold px-8 py-4 rounded-full text-lg hover:bg-white hover:text-blue-600 transition-all duration-300">
                    Contact Us
                </a>
            </div>
        </div>
    </section>
<style>
/* Hero Section Styles */
.hero {
    position: relative;
    height: 60vh;
    min-height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    overflow: hidden;
}

.hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
}

.hero-content {
    position: relative;
    z-index: 10;
    color: white;
    max-width: 800px;
    padding: 0 20px;
}

.hero-content h1 {
    font-size: 3.5rem;
    font-weight: bold;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.hero-content h1 span {
    color: #3b82f6;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.hero-content p {
    font-size: 1.25rem;
    opacity: 0.9;
    margin-bottom: 2rem;
}

.wave {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100px;
    fill: #f8fafc;
}

/* Responsive Hero */
@media (max-width: 768px) {
    .hero {
        height: 50vh;
        min-height: 300px;
    }
    
    .hero-content h1 {
        font-size: 2.5rem;
    }
    
    .hero-content p {
        font-size: 1.1rem;
    }
}
</style>
@endsection
