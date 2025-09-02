@extends('layouts.app')

@section('title', 'Spiritual Experiences - Nepal')

@section('content')
    {{-- 🕉️ Hero Section --}}
    <section class="hero">
        <div class="hero-bg" style="background-image:url('{{ asset('images/lumbini.jpg') }}')"></div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <h1>Spiritual <span>Journeys</span></h1>
            <p>Find inner peace and spiritual awakening in the birthplace of Buddha</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#experiences" class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Explore Experiences
                </a>
                <a href="{{ route('booking') }}" class="bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 border border-white/30">
                    Book Retreat
                </a>
            </div>
        </div>

        {{-- bottom wave --}}
        <svg class="wave" viewBox="0 0 1440 100" preserveAspectRatio="none">
            <path d="M0,80 C300,120 600,0 900,60 C1100,100 1300,80 1440,60 L1440,100 L0,100 Z"></path>
        </svg>
    </section>

    {{-- 🎯 Stats Section --}}
    <section class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="space-y-2">
                    <div class="text-4xl font-bold">2500+</div>
                    <div class="text-purple-100">Years of Buddhism</div>
                </div>
                <div class="space-y-2">
                    <div class="text-4xl font-bold">1000+</div>
                    <div class="text-purple-100">Sacred Temples</div>
                </div>
                <div class="space-y-2">
                    <div class="text-4xl font-bold">50+</div>
                    <div class="text-purple-100">Monasteries</div>
                </div>
                <div class="space-y-2">
                    <div class="text-4xl font-bold">24/7</div>
                    <div class="text-purple-100">Prayer Services</div>
                </div>
            </div>
        </div>
    </section>

    {{-- 🌟 Intro Section --}}
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-block bg-purple-100 text-purple-800 px-4 py-2 rounded-full text-sm font-medium mb-6">
                    Why Choose Nepal for Spiritual Journey?
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-8">
                    Where <span class="text-purple-600">Enlightenment</span> Begins
                </h2>
                <p class="text-xl text-gray-600 leading-relaxed mb-12">
                    Nepal is the sacred birthplace of Buddha and home to countless spiritual sanctuaries. 
                    From ancient temples to peaceful monasteries, discover inner peace and spiritual wisdom 
                    in this divine land of meditation and mindfulness.
                </p>
            </div>
        </div>
    </section>

    {{-- 🕉️ Spiritual Experiences Grid --}}
    <section id="experiences" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Discover <span class="text-purple-600">Spiritual Experiences</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    From sacred temples to meditation retreats, explore the spiritual essence 
                    that makes Nepal a haven for seekers of inner peace and enlightenment.
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                {{-- Temples --}}
                <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/temple.jpg') }}" alt="Sacred Temples" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Sacred
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Sacred Temples</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Visit Pashupatinath, Muktinath, and countless sacred shrines. 
                            Experience divine energy and witness ancient spiritual rituals.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold">Duration:</span> 3-5 hours
                            </div>
                            <a href="{{ route('spiritual-details') }}" 
                               class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Meditation --}}
                <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/meditation.jpg') }}" alt="Meditation Retreats" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-indigo-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Peaceful
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Meditation Retreats</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Join Vipassana retreats and mindfulness journeys. Learn ancient 
                            meditation techniques from experienced spiritual masters.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold">Duration:</span> 3-10 days
                            </div>
                            <a href="{{ route('spiritual-details') }}" 
                               class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Monasteries --}}
                <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/monasteries.jpg') }}" alt="Monasteries" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Monastic
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Monasteries</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Experience prayer ceremonies and monastic life. Stay in peaceful 
                            monasteries and learn from Buddhist monks and nuns.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold">Duration:</span> 1-7 days
                            </div>
                            <a href="{{ route('spiritual-details') }}" 
                               class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 📞 Contact & CTA Section --}}
    <section class="py-20 bg-gradient-to-br from-purple-600 via-indigo-600 to-purple-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Ready for Your <span class="text-yellow-300">Spiritual Journey</span>?
            </h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Our spiritual guides are here to help you find inner peace and enlightenment. 
                Begin your transformative journey in the sacred land of Nepal.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-6 justify-center mb-12">
                <a href="{{ route('booking') }}" 
                   class="bg-white text-purple-600 font-bold px-8 py-4 rounded-full text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl">
                    Book Spiritual Retreat
                </a>
                <a href="{{ route('contact') }}" 
                   class="bg-transparent border-2 border-white text-white font-bold px-8 py-4 rounded-full text-lg hover:bg-white hover:text-purple-600 transition-all duration-300">
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
    color: #a855f7;
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
