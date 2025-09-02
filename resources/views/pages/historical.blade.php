@extends('layouts.app')

@section('title', 'Historical Experiences - Nepal')

@section('content')
    {{-- 🏛️ Hero Section --}}
    <section class="hero">
        <div class="hero-bg" style="background-image:url('{{ asset('images/bhaktapur.jpg') }}')"></div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <h1>Historical <span>Journeys</span></h1>
            <p>Step into Nepal's glorious past through ancient palaces, forts, and heritage sites</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#sites" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Explore Sites
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
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="space-y-2">
                    <div class="text-4xl font-bold">1000+</div>
                    <div class="text-indigo-100">Years of History</div>
                </div>
                <div class="space-y-2">
                    <div class="text-4xl font-bold">10</div>
                    <div class="text-indigo-100">UNESCO Sites</div>
                </div>
                <div class="space-y-2">
                    <div class="text-4xl font-bold">50+</div>
                    <div class="text-indigo-100">Ancient Temples</div>
                </div>
                <div class="space-y-2">
                    <div class="text-4xl font-bold">100+</div>
                    <div class="text-indigo-100">Heritage Sites</div>
                </div>
            </div>
        </div>
    </section>

    {{-- 🌟 Intro Section --}}
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-block bg-indigo-100 text-indigo-800 px-4 py-2 rounded-full text-sm font-medium mb-6">
                    Why Explore Nepal's History?
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-8">
                    Where Every Stone Tells a <span class="text-indigo-600">Story</span>
                </h2>
                <p class="text-xl text-gray-600 leading-relaxed mb-12">
                    From ancient kingdoms to modern times, Nepal's history is etched in its magnificent architecture, 
                    royal palaces, and sacred monuments. Discover the tales of kings, warriors, and civilizations 
                    that shaped this remarkable land.
                </p>
            </div>
        </div>
    </section>

    {{-- 🏛️ Historical Sites Grid --}}
    <section id="sites" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Discover <span class="text-indigo-600">Historical Treasures</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    From royal palaces to ancient temples, explore the architectural marvels 
                    and historical landmarks that define Nepal's rich heritage.
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                {{-- Palaces --}}
                <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/bhaktapur.jpg') }}" alt="Ancient Palaces" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-indigo-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Royal
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Royal Palaces</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Walk through the magnificent Durbar Squares of Kathmandu, Patan, and Bhaktapur. 
                            Experience the grandeur of ancient royal architecture.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold">Duration:</span> 4-6 hours
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('historical-details') }}?focus=palaces" 
                                   class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                    Learn More
                                </a>
                                <a href="{{ route('booking') }}?category=historical&tour=palaces" 
                                   class="bg-white text-indigo-600 px-6 py-2 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Heritage Sites --}}
                <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/ruins.jpg') }}" alt="Heritage Sites" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            UNESCO
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Heritage Sites</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Visit UNESCO World Heritage sites including Swayambhunath, Boudhanath, 
                            and the sacred birthplace of Buddha in Lumbini.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold">Duration:</span> 6-8 hours
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('historical-details') }}?focus=heritage" 
                                   class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                    Learn More
                                </a>
                                <a href="{{ route('booking') }}?category=historical&tour=heritage" 
                                   class="bg-white text-indigo-600 px-6 py-2 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Museums --}}
                <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/museum.jpg') }}" alt="Museums" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Cultural
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Museums & Galleries</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Explore Nepal's rich history through art, artifacts, and preserved collections. 
                            Learn about ancient civilizations and cultural evolution.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold">Duration:</span> 2-4 hours
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('historical-details') }}?focus=museums" 
                                   class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                    Learn More
                                </a>
                                <a href="{{ route('booking') }}?category=historical&tour=museums" 
                                   class="bg-white text-indigo-600 px-6 py-2 rounded-full font-semibold hover:bg-gray-100 transition-colors">
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
    <section class="py-20 bg-gradient-to-br from-indigo-600 via-purple-600 to-indigo-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Ready to Explore <span class="text-yellow-300">History</span>?
            </h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Our historical experts are here to guide you through Nepal's fascinating past. 
                Book your heritage tour and uncover the stories that shaped this remarkable land.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-6 justify-center mb-12">
                <a href="{{ route('booking') }}" 
                   class="bg-white text-indigo-600 font-bold px-8 py-4 rounded-full text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl">
                    Book Historical Tour
                </a>
                <a href="{{ route('contact') }}" 
                   class="bg-transparent border-2 border-white text-white font-bold px-8 py-4 rounded-full text-lg hover:bg-white hover:text-indigo-600 transition-all duration-300">
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
    color: #8b5cf6;
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
