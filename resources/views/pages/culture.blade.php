@extends('layouts.app')

@section('title', 'Cultural Experiences - Nepal')

@section('content')
    {{-- 🎭 Hero Section --}}
    <section class="hero">
        <div class="hero-bg" style="background-image:url('{{ asset('images/hya.jpg') }}')"></div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <h1>Cultural <span>Experiences</span></h1>
            <p>Immerse yourself in Nepal's vibrant traditions, festivals, and living heritage</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#experiences" class="bg-orange-600 hover:bg-orange-700 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Explore Culture
                </a>
                <a href="{{ route('booking') }}" class="bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 border border-white/30">
                    Book Tour
                </a>
            </div>
        </div>

        {{-- bottom wave --}}
        <svg class="wave" viewBox="0 0 1440 100" preserveAspectRatio="none">
            <path d="M0,80 C300,120 600,0 900,60 C1100,100 1300,80 1440,60 L1440,100 L0,100 Z"></path>
        </svg>
    </section>

    {{-- 🎯 Stats Section --}}
    <section class="bg-gradient-to-r from-orange-600 to-red-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="space-y-2">
                    <div class="text-4xl font-bold">125+</div>
                    <div class="text-orange-100">Ethnic Groups</div>
                </div>
                <div class="space-y-2">
                    <div class="text-4xl font-bold">50+</div>
                    <div class="text-orange-100">Festivals</div>
                </div>
                <div class="space-y-2">
                    <div class="text-4xl font-bold">100+</div>
                    <div class="text-orange-100">Languages</div>
                </div>
                <div class="space-y-2">
                    <div class="text-4xl font-bold">1000+</div>
                    <div class="text-orange-100">Years Heritage</div>
                </div>
            </div>
        </div>
    </section>

    {{-- 🌟 Intro Section --}}
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-block bg-orange-100 text-orange-800 px-4 py-2 rounded-full text-sm font-medium mb-6">
                    Why Explore Nepal's Culture?
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-8">
                    Where <span class="text-orange-600">Traditions</span> Come Alive
                </h2>
                <p class="text-xl text-gray-600 leading-relaxed mb-12">
                    Nepal's culture is a living museum of festivals, art, music, and history. 
                    From vibrant street celebrations to sacred temples, immerse yourself in 
                    the unique identity and traditions that define this remarkable nation.
                </p>
            </div>
        </div>
    </section>

    {{-- 🎭 Cultural Experiences Grid --}}
    <section id="experiences" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Discover <span class="text-orange-600">Cultural Treasures</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    From colorful festivals to traditional arts, explore the rich cultural heritage 
                    that makes Nepal a fascinating destination for cultural enthusiasts.
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                {{-- Festivals --}}
                <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/festival.jpg') }}" alt="Colorful Festivals" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Vibrant
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Colorful Festivals</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Experience vibrant festivals like Dashain, Tihar, and Holi with locals. 
                            Witness traditional dances, music, and cultural celebrations.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold">Duration:</span> 1-7 days
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('culture-details') }}?focus=festivals" 
                                   class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                    Learn More
                                </a>
                                <a href="{{ route('booking') }}?category=culture&tour=festivals" 
                                   class="bg-white text-orange-600 px-6 py-2 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Local Cuisine --}}
                <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/cuisine.jpg') }}" alt="Local Cuisine" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Authentic
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Local Cuisine</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Taste authentic Nepali dishes like Dal Bhat, Momo, and Newari food. 
                            Learn cooking techniques and discover unique flavors.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold">Duration:</span> 2-4 hours
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('culture-details') }}?focus=cuisine" 
                                   class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                    Learn More
                                </a>
                                <a href="{{ route('booking') }}?category=culture&tour=cuisine" 
                                   class="bg-white text-orange-600 px-6 py-2 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Art & Crafts --}}
                <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/art.jpg') }}" alt="Art & Handicrafts" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Traditional
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Art & Handicrafts</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Discover unique Thangka paintings, pottery, and handmade souvenirs. 
                            Learn traditional crafts from skilled artisans.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold">Duration:</span> 3-6 hours
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('culture-details') }}?focus=handicrafts" 
                                   class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                    Learn More
                                </a>
                                <a href="{{ route('booking') }}?category=culture&tour=handicrafts" 
                                   class="bg-white text-orange-600 px-6 py-2 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 📞 Contact & CTA Section --}}
    <section class="py-20 bg-gradient-to-br from-orange-600 via-red-600 to-orange-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Ready to Explore <span class="text-yellow-300">Culture</span>?
            </h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Our cultural experts are here to guide you through Nepal's rich traditions. 
                Join cultural tours and dive deep into Nepal's living heritage.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-6 justify-center mb-12">
                <a href="{{ route('booking') }}" 
                   class="bg-white text-orange-600 font-bold px-8 py-4 rounded-full text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl">
                    Book Cultural Tour
                </a>
                <a href="{{ route('contact') }}" 
                   class="bg-transparent border-2 border-white text-white font-bold px-8 py-4 rounded-full text-lg hover:bg-white hover:text-orange-600 transition-all duration-300">
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
    color: #ea580c;
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
