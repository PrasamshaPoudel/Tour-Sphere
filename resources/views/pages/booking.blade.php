@extends('layouts.app')

@section('title', 'Book Your Adventure - Tour Sphere Nepal')

@section('content')
    {{-- 🎯 Hero Section --}}
   
<section class="hero">
    <div class="hero-bg" style="background-image:url('{{ asset('images/back.jpg') }}')"></div>
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <h1>Book Your <span>Adventure</span></h1>
        <p>Secure your spot for the adventure of a lifetime in Nepal</p>
    </div>

    {{-- bottom wave --}}
    <svg class="wave" viewBox="0 0 1440 100" preserveAspectRatio="none">
        <path d="M0,80 C300,120 600,0 900,60 C1100,100 1300,80 1440,60 L1440,100 L0,100 Z"></path>
    </svg>
</section>


    {{-- 🎯 Quick Stats --}}
    <section class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="space-y-2">
                    <div class="text-3xl font-bold">100+</div>
                    <div class="text-blue-100">Tours Available</div>
                </div>
                <div class="space-y-2">
                    <div class="text-3xl font-bold">24/7</div>
                    <div class="text-blue-100">Booking Support</div>
                </div>
                <div class="space-y-2">
                    <div class="text-3xl font-bold">Instant</div>
                    <div class="text-blue-100">Confirmation</div>
                </div>
                <div class="space-y-2">
                    <div class="text-3xl font-bold">100%</div>
                    <div class="text-blue-100">Secure</div>
                </div>
            </div>
        </div>
    </section>

    {{-- 📋 Booking Options --}}
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Choose Your <span class="text-blue-600">Booking Method</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Multiple ways to book your perfect Nepal adventure
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                {{-- Online Booking --}}
                <div class="bg-white rounded-3xl shadow-xl p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-900">Online Booking</h3>
                    <p class="text-gray-600 mb-6">Book instantly online with secure payment and instant confirmation</p>
                    <a href="#online-booking" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full font-semibold transition-colors">
                        Book Online
                    </a>
                </div>

                {{-- Phone Booking --}}
                <div class="bg-white rounded-3xl shadow-xl p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-900">Phone Booking</h3>
                    <p class="text-gray-600 mb-6">Call our experts for personalized assistance and custom packages</p>
                    <a href="tel:+977-1-4XXXXXX" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-full font-semibold transition-colors">
                        Call Now
                    </a>
                </div>

                {{-- WhatsApp Booking --}}
                <div class="bg-white rounded-3xl shadow-xl p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-900">WhatsApp Booking</h3>
                    <p class="text-gray-600 mb-6">Quick booking via WhatsApp with instant responses and support</p>
                    <a href="https://wa.me/977XXXXXXXXX" target="_blank" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-full font-semibold transition-colors">
                        WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- 📝 Adventure Booking Form --}}
    <section id="online-booking" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Book <span class="text-blue-600">Online</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Choose your destination and secure your adventure
                </p>
            </div>

            {{-- Adventure Booking Form Component --}}
            <x-adventure-booking-form 
                :destinations="$destinations ?? []" 
                :category="$category ?? 'Trekking'"
                :priceRange="$priceRange ?? '15000 - 25000'"
                :selectedDestination="$selectedDestination ?? null"
            />

            {{-- Success/Error Messages --}}
            @if(session('success'))
                <div class="max-w-4xl mx-auto mb-8">
                    <div class="bg-green-50 border border-green-200 rounded-2xl p-6">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-green-800 mb-2">{{ session('success.message') }}</h3>
                                <p class="text-green-700 mb-2"><strong>Booking Reference:</strong> {{ session('success.reference') }}</p>
                                <p class="text-green-700">{{ session('success.details') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="max-w-4xl mx-auto mb-8">
                    <div class="bg-red-50 border border-red-200 rounded-2xl p-6">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-red-800 mb-2">Please fix the following errors:</h3>
                                <ul class="text-red-700 space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li>• {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    {{-- 📞 Contact Support --}}
    <section class="py-20 bg-gradient-to-br from-gray-900 to-gray-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Need <span class="text-blue-400">Help</span> with Booking?
            </h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Our travel experts are here to help you plan the perfect adventure. 
                Get in touch for personalized assistance and custom packages.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="tel:+977-1-4XXXXXX" 
                   class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-8 py-4 rounded-full text-lg transition-all duration-300 transform hover:scale-105 shadow-xl">
                    <i class="fas fa-phone mr-2"></i>Call Us
                </a>
                <a href="https://wa.me/977XXXXXXXXX" target="_blank"
                   class="bg-green-500 hover:bg-green-600 text-white font-bold px-8 py-4 rounded-full text-lg transition-all duration-300 transform hover:scale-105 shadow-xl">
                    <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                </a>
                <a href="{{ route('contact') }}" 
                   class="bg-transparent border-2 border-white text-white font-bold px-8 py-4 rounded-full text-lg hover:bg-white hover:text-gray-900 transition-all duration-300">
                    <i class="fas fa-envelope mr-2"></i>Email Us
                </a>
            </div>
        </div>
    </section>

    {{-- 💰 Pricing Information --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Transparent <span class="text-blue-600">Pricing</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    No hidden fees. All prices include permits, guides, accommodation, and meals as specified.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-8 text-center">
                    <h3 class="text-2xl font-bold mb-4 text-blue-600">Budget Tours</h3>
                    <div class="text-4xl font-bold mb-2">Rs 10,000</div>
                    <div class="text-gray-600 mb-4">Starting from</div>
                    <ul class="text-left space-y-2 text-gray-700">
                        <li>✓ Basic accommodation</li>
                        <li>✓ Local guide</li>
                        <li>✓ Permits included</li>
                        <li>✓ Basic meals</li>
                    </ul>
                </div>

                <div class="bg-gradient-to-br from-green-50 to-teal-50 rounded-3xl p-8 text-center border-4 border-green-200">
                    <h3 class="text-2xl font-bold mb-4 text-green-600">Mid-Range Tours</h3>
                    <div class="text-4xl font-bold mb-2">Rs 50,000</div>
                    <div class="text-gray-600 mb-4">Starting from</div>
                    <ul class="text-left space-y-2 text-gray-700">
                        <li>✓ Comfortable hotels</li>
                        <li>✓ Experienced guide</li>
                        <li>✓ All permits included</li>
                        <li>✓ Quality meals</li>
                        <li>✓ Transportation</li>
                    </ul>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-8 text-center">
                    <h3 class="text-2xl font-bold mb-4 text-purple-600">Luxury Tours</h3>
                    <div class="text-4xl font-bold mb-2">Rs 100,000</div>
                    <div class="text-gray-600 mb-4">Starting from</div>
                    <ul class="text-left space-y-2 text-gray-700">
                        <li>✓ Premium accommodation</li>
                        <li>✓ Expert guide</li>
                        <li>✓ All permits included</li>
                        <li>✓ Gourmet meals</li>
                        <li>✓ Private transport</li>
                        <li>✓ Personal assistant</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

