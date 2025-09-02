@extends('layouts.app')

@section('title', 'Nature Experiences - Nepal')

@section('content')
    {{-- 🌿 Hero Section --}}
    <section class="hero">
        <div class="hero-bg" style="background-image:url('{{ asset('images/na.jpg') }}')"></div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <h1>Nature <span>Escapes</span></h1>
            <p>Reconnect with pristine wilderness and breathtaking natural beauty</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#destinations" class="bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Explore Nature
                </a>
                <a href="{{ route('booking') }}" class="bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 border border-white/30">
                    Book Trip
                </a>
            </div>
        </div>

        {{-- bottom wave --}}
        <svg class="wave" viewBox="0 0 1440 100" preserveAspectRatio="none">
            <path d="M0,80 C300,120 600,0 900,60 C1100,100 1300,80 1440,60 L1440,100 L0,100 Z"></path>
        </svg>
    </section>

    {{-- 🎯 Stats Section --}}
    <section class="bg-gradient-to-r from-green-600 to-teal-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="space-y-2">
                    <div class="text-4xl font-bold">8</div>
                    <div class="text-green-100">Highest Peaks</div>
                </div>
                <div class="space-y-2">
                    <div class="text-4xl font-bold">200+</div>
                    <div class="text-green-100">Bird Species</div>
                </div>
                <div class="space-y-2">
                    <div class="text-4xl font-bold">50+</div>
                    <div class="text-green-100">Protected Areas</div>
                </div>
                <div class="space-y-2">
                    <div class="text-4xl font-bold">100%</div>
                    <div class="text-green-100">Eco-Friendly</div>
                </div>
            </div>
        </div>
    </section>

    {{-- 🌟 Intro Section --}}
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-block bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-medium mb-6">
                    Why Choose Nepal for Nature?
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-8">
                    Where <span class="text-green-600">Wilderness</span> Thrives
                </h2>
                <p class="text-xl text-gray-600 leading-relaxed mb-12">
                    From the world's highest peaks to pristine lakes and dense forests, Nepal offers 
                    unparalleled natural beauty. Escape the chaos and immerse yourself in untouched 
                    wilderness where nature reigns supreme.
                </p>
            </div>
        </div>
    </section>

    {{-- 🌿 Nature Destinations Grid --}}
    <section id="destinations" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Discover <span class="text-green-600">Natural Wonders</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    From serene lakes to towering mountains, explore the diverse natural landscapes 
                    that make Nepal a paradise for nature lovers and outdoor enthusiasts.
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                {{-- Lakes --}}
                <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/lake.jpg') }}" alt="Pristine Lakes" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Serene
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Pristine Lakes</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Visit Rara, Phewa, and Begnas lakes for ultimate serenity and peace. 
                            Experience crystal-clear waters reflecting majestic mountain peaks.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold">Duration:</span> 2-5 days
                            </div>
                            <a href="{{ route('nature-details') }}" 
                               class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Forest Treks --}}
                <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/forest.jpg') }}" alt="Forest Treks" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Wild
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Forest Treks</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Walk through lush jungles full of wildlife and birds. Discover 
                            rare species and experience the raw beauty of untouched forests.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold">Duration:</span> 3-7 days
                            </div>
                            <a href="{{ route('nature-details') }}" 
                               class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Himalayan Views --}}
                <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/himalayan.jpg') }}" alt="Himalayan Views" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Majestic
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Himalayan Views</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            See Everest, Annapurna, and other peaks from up close. Experience 
                            the awe-inspiring grandeur of the world's highest mountains.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold">Duration:</span> 5-14 days
                            </div>
                            <a href="{{ route('nature-details') }}" 
                               class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 📞 Contact & CTA Section --}}
    <section class="py-20 bg-gradient-to-br from-green-600 via-teal-600 to-green-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Ready to Reconnect with <span class="text-yellow-300">Nature</span>?
            </h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Our nature experts are here to guide you through Nepal's pristine wilderness. 
                Plan your eco-friendly trip and experience nature's untouched beauty.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-6 justify-center mb-12">
                <a href="{{ route('booking') }}" 
                   class="bg-white text-green-600 font-bold px-8 py-4 rounded-full text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl">
                    Book Nature Trip
                </a>
                <a href="{{ route('contact') }}" 
                   class="bg-transparent border-2 border-white text-white font-bold px-8 py-4 rounded-full text-lg hover:bg-white hover:text-green-600 transition-all duration-300">
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
    color: #10b981;
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
