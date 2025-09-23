@extends('layouts.app')

@section('title', 'Adventure Experiences - Nepal')

@section('content')
    {{--  Hero Section --}}
    <section class="hero">
        <div class="hero-bg" style="background-image:url('{{ asset('images/pokhara.jpg') }}')"></div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <h1>Adventure <span>Awaits</span></h1>
            <p>Discover the thrill of Nepal's most exciting outdoor experiences</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#activities" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Explore Activities
                </a>
                <a href="{{ route('booking.form') }}" class="bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 border border-white/30">
                    Book Now
                </a>
            </div>
        </div>

        {{-- bottom wave --}}
        <svg class="wave" viewBox="0 0 1440 100" preserveAspectRatio="none">
            <path d="M0,80 C300,120 600,0 900,60 C1100,100 1300,80 1440,60 L1440,100 L0,100 Z"></path>
        </svg>
    </section>

    {{--  Stats Section --}}
    <section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="space-y-2">
                    <div class="text-4xl font-bold">50+</div>
                    <div class="text-blue-100">Adventure Spots</div>
                </div>
                <div class="space-y-2">
                    <div class="text-4xl font-bold">1000+</div>
                    <div class="text-blue-100">Happy Adventurers</div>
                </div>
                <div class="space-y-2">
                    <div class="text-4xl font-bold">15+</div>
                    <div class="text-blue-100">Years Experience</div>
                </div>
                <div class="space-y-2">
                    <div class="text-4xl font-bold">24/7</div>
                    <div class="text-blue-100">Safety Support</div>
                </div>
            </div>
        </div>
    </section>

    {{--  Intro Section --}}
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-block bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-medium mb-6">
                    Why Choose Nepal for Adventure?
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-8">
                    Where Every Day is an <span class="text-blue-600">Adventure</span>
                </h2>
                <p class="text-xl text-gray-600 leading-relaxed mb-12">
                    From the world's highest peaks to raging rivers, Nepal offers unparalleled adventure experiences. 
                    Whether you're a seasoned thrill-seeker or a first-time adventurer, our diverse landscape and 
                    experienced guides ensure unforgettable memories.
                </p>
                
                {{-- Feature highlights --}}
                <div class="grid md:grid-cols-3 gap-8 mt-16">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Safety First</h3>
                        <p class="text-gray-600">Certified guides and top-quality equipment</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Unique Locations</h3>
                        <p class="text-gray-600">Access to remote and pristine adventure spots</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Local Expertise</h3>
                        <p class="text-gray-600">Insider knowledge and cultural insights</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Adventure Activities Grid --}}
    <section id="activities" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Choose Your <span class="text-blue-600">Adventure</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    From adrenaline-pumping extreme sports to serene nature experiences, 
                    find the perfect adventure that matches your spirit.
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                {{-- Rafting --}}
                <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/rafting.jpg') }}" alt="Rafting in Nepal" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Extreme
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-2xl font-bold text-gray-900">White Water Rafting</h3>
                            <div class="flex space-x-1">
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Navigate through thrilling rapids of Trishuli and Bhote Koshi rivers. 
                            Experience the perfect blend of excitement and natural beauty.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold">Duration:</span> 1-3 days
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('rafting') }}" 
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                    Learn More
                                </a>
                                <a href="{{ route('booking.form') }}?tour=rafting-trishuli&category=adventure" 
                                   class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Paragliding --}}
                <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/para.jpg') }}" alt="Paragliding in Nepal" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Moderate
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-2xl font-bold text-gray-900">Paragliding</h3>
                            <div class="flex space-x-1">
                                <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Soar above Pokhara valley with panoramic views of the Annapurna range. 
                            A peaceful yet exhilarating experience for all skill levels.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold">Duration:</span> 2-4 hours
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('paragliding') }}" 
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                    Learn More
                                </a>
                                <a href="{{ route('booking.form') }}?tour=pokhara-paragliding&category=adventure" 
                                   class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Trekking --}}
                <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/trekking.jpg') }}" alt="Trekking in Nepal" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Popular
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-2xl font-bold text-gray-900">Himalayan Trekking</h3>
                            <div class="flex space-x-1">
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            From Everest Base Camp to Annapurna Circuit, discover the world's most 
                            spectacular trekking routes with expert guidance.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold">Duration:</span> 5-21 days
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('trekking') }}" 
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                    Learn More
                                </a>
                                <a href="{{ route('booking.form') }}?tour=everest-base-camp&category=adventure" 
                                   class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Bungee Jump --}}
                <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/bungee.jpg') }}" alt="Bungee Jump Nepal" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Extreme
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-2xl font-bold text-gray-900">Bungee Jumping</h3>
                            <div class="flex space-x-1">
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Take the ultimate leap of faith into one of the world's deepest gorges. 
                            Experience pure adrenaline with the highest safety standards.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold">Duration:</span> 2-3 hours
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('bungee') }}" 
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                    Learn More
                                </a>
                                <a href="{{ route('booking.form') }}?tour=bungee-jump&category=adventure" 
                                   class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Mountain Biking --}}
                <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/mountainbiking.jpg') }}" alt="Mountain Biking in Nepal" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Challenging
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-2xl font-bold text-gray-900">Mountain Biking</h3>
                            <div class="flex space-x-1">
                                <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Navigate through rugged trails and discover Nepal's hidden villages. 
                            Perfect for adventure cyclists seeking authentic experiences.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold">Duration:</span> 1-7 days
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('mountain-biking') }}" 
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                    Learn More
                                </a>
                                <a href="{{ route('booking.form') }}?tour=mountain-biking&category=adventure" 
                                   class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Rock Climbing --}}
                <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/rock.jpg') }}" alt="Rock Climbing Nepal" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Technical
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-2xl font-bold text-gray-900">Rock Climbing</h3>
                            <div class="flex space-x-1">
                                <div class="w-3 h-3 bg-purple-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-purple-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-purple-500 rounded-full"></div>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Test your skills on natural rock formations and indoor climbing walls. 
                            Suitable for beginners to advanced climbers with expert instruction.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold">Duration:</span> 3-8 hours
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('rock-climbing') }}" 
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                    Learn More
                                </a>
                                <a href="{{ route('booking.form') }}?tour=rock-climbing&category=adventure" 
                                   class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-full font-semibold transition-colors">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 🎯 Adventure Levels Guide --}}
    <section class="py-20 bg-gradient-to-r from-gray-900 to-gray-800 text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    Understanding <span class="text-blue-400">Adventure Levels</span>
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Choose activities that match your experience and comfort level
                </p>
            </div>

            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center p-6 rounded-2xl bg-white/10 backdrop-blur-sm">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold">1</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Beginner</h3>
                    <p class="text-gray-300">Suitable for first-time adventurers with basic fitness</p>
                </div>
                <div class="text-center p-6 rounded-2xl bg-white/10 backdrop-blur-sm">
                    <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold">2</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Moderate</h3>
                    <p class="text-gray-300">Some experience required, moderate physical exertion</p>
                </div>
                <div class="text-center p-6 rounded-2xl bg-white/10 backdrop-blur-sm">
                    <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold">3</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Challenging</h3>
                    <p class="text-gray-300">Good fitness and some technical skills needed</p>
                </div>
                <div class="text-center p-6 rounded-2xl bg-white/10 backdrop-blur-sm">
                    <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold">4</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Extreme</h3>
                    <p class="text-gray-300">High fitness, technical skills, and experience required</p>
                </div>
            </div>
        </div>
    </section>

    {{-- 📞 Contact & CTA Section --}}
    <section class="py-20 bg-gradient-to-br from-blue-600 via-purple-600 to-blue-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Ready to Start Your <span class="text-yellow-300">Adventure</span>?
            </h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Our adventure experts are here to help you plan the perfect experience. 
                Get in touch today and let's create memories that will last a lifetime.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-6 justify-center mb-12">
                <a href="{{ route('booking.form') }}" 
                   class="bg-white text-blue-600 font-bold px-8 py-4 rounded-full text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl">
                    Book Your Adventure
                </a>
                <a href="{{ route('contact') }}" 
                   class="bg-transparent border-2 border-white text-white font-bold px-8 py-4 rounded-full text-lg hover:bg-white hover:text-blue-600 transition-all duration-300">
                    Contact Us
                </a>
            </div>

            {{-- Contact info --}}
            <div class="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <div class="text-center">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-2">Call Us</h3>
                    <p class="text-blue-100">+977-1-4XXXXXX</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-2">Email Us</h3>
                    <p class="text-blue-100">info@toursphere.com</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-2">Visit Us</h3>
                    <p class="text-blue-100">Thamel, Kathmandu</p>
                </div>
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
