@extends('layouts.app')

@section('title', 'Contact Us - Tour Sphere Nepal')

@section('content')
    {{-- 📞 Hero Section --}}
    <section class="hero">
        <div class="hero-bg" style="background-image:url('{{ asset('images/back.jpg') }}')"></div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <h1>Get In <span>Touch</span></h1>
            <p>We're here to help you plan your perfect Nepal adventure</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#contact" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Contact Us
                </a>
                <a href="{{ route('destinations') }}" class="bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 border border-white/30">
                    Explore Tours
                </a>
            </div>
        </div>

        {{-- bottom wave --}}
        <svg class="wave" viewBox="0 0 1440 100" preserveAspectRatio="none">
            <path d="M0,80 C300,120 600,0 900,60 C1100,100 1300,80 1440,60 L1440,100 L0,100 Z"></path>
        </svg>
    </section>

    {{-- 🎯 Quick Contact Section --}}
    <section class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="space-y-4">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold">Visit Us</h3>
                    <p class="text-blue-100">Thamel, Kathmandu, Nepal</p>
                </div>
                <div class="space-y-4">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold">Call Us</h3>
                    <p class="text-blue-100">+977-1-4XXXXXX</p>
                </div>
                <div class="space-y-4">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold">Email Us</h3>
                    <p class="text-blue-100">info@toursphere.com</p>
                </div>
            </div>
        </div>
    </section>

    {{-- 📝 Contact Form & Info Section --}}
    <section id="contact" class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Let's Start Your <span class="text-blue-600">Adventure</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Have questions about our tours, need help with booking, or want to customize your trip? 
                    We're here to help you plan the perfect Nepal experience.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-16 max-w-6xl mx-auto">
                {{-- Contact Form --}}
                <div class="bg-white rounded-3xl shadow-2xl p-10">
                    <h3 class="text-3xl font-bold mb-8 text-gray-900">Send Us a Message</h3>
                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                <input type="text" name="first_name" required
                                    class="w-full border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Your first name">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                <input type="text" name="last_name" required
                                    class="w-full border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Your last name">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <input type="email" name="email" required
                                class="w-full border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                placeholder="your.email@example.com">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" name="phone"
                                class="w-full border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                placeholder="+1 (555) 123-4567">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                            <select name="subject" required
                                class="w-full border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                <option value="">Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="booking">Booking & Reservations</option>
                                <option value="custom">Custom Tour Request</option>
                                <option value="support">Customer Support</option>
                                <option value="partnership">Partnership</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                            <textarea name="message" rows="5" required
                                class="w-full border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                placeholder="Tell us about your travel plans, questions, or how we can help..."></textarea>
                        </div>
                        
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                            Send Message
                        </button>
                    </form>
                </div>

                {{-- Contact Information --}}
                <div class="space-y-8">
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-8">
                        <h3 class="text-2xl font-bold mb-6 text-blue-600">Office Hours</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="font-medium">Monday - Friday</span>
                                <span class="text-gray-600">9:00 AM - 6:00 PM</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-medium">Saturday</span>
                                <span class="text-gray-600">10:00 AM - 4:00 PM</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-medium">Sunday</span>
                                <span class="text-gray-600">Closed</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-green-50 to-teal-50 rounded-3xl p-8">
                        <h3 class="text-2xl font-bold mb-6 text-green-600">Emergency Contact</h3>
                        <p class="text-gray-700 mb-4">For urgent matters outside office hours:</p>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <span class="text-green-600 font-bold">📱</span>
                                <span>+977-980-XXXXXXX (24/7)</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-green-600 font-bold">📧</span>
                                <span>emergency@toursphere.com</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-8">
                        <h3 class="text-2xl font-bold mb-6 text-purple-600">Social Media</h3>
                        <p class="text-gray-700 mb-4">Follow us for updates and inspiration:</p>
                        <div class="flex gap-4">
                            <a href="#" class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white hover:bg-blue-700 transition-colors">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-12 h-12 bg-pink-600 rounded-full flex items-center justify-center text-white hover:bg-pink-700 transition-colors">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="w-12 h-12 bg-blue-400 rounded-full flex items-center justify-center text-white hover:bg-blue-500 transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center text-white hover:bg-red-700 transition-colors">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 🗺️ Map Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Find Our <span class="text-blue-600">Office</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Located in the heart of Thamel, Kathmandu - the tourist hub of Nepal
                </p>
            </div>
            
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <iframe class="w-full h-[500px] border-0"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.439089176685!2d83.95686431506135!3d28.209583982589053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3995953a4f07c3ed%3A0x4ad1c6f2f8f63b90!2sThamel%2C%20Kathmandu!5e0!3m2!1sen!2snp!4v1674567890123"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    {{-- 📞 CTA Section --}}
    <section class="py-20 bg-gradient-to-br from-blue-600 via-indigo-600 to-blue-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Ready to Start Your <span class="text-yellow-300">Journey</span>?
            </h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Don't wait to experience the magic of Nepal. Contact us today and let's start planning 
                your unforgettable adventure together.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="{{ route('destinations') }}" 
                   class="bg-white text-blue-600 font-bold px-8 py-4 rounded-full text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl">
                    Explore Tours
                </a>
                <a href="{{ route('booking') }}" 
                   class="bg-transparent border-2 border-white text-white font-bold px-8 py-4 rounded-full text-lg hover:bg-white hover:text-blue-600 transition-all duration-300">
                    Book Now
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
