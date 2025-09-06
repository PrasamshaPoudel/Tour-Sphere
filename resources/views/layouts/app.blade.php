<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tour Sphere')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100 text-gray-900">
<header class="site-header">
    <div class="container nav">
        <a href="{{ route('home') }}" class="brand">
            <span>Tour</span>Sphere
        </a>

        <button class="mobile-menu-btn" id="mobileMenuBtn">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="links" id="mainNav">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'font-bold' : '' }}">Home</a>
            <a href="{{ route('destinations') }}" class="{{ request()->routeIs('destinations') ? 'font-bold' : '' }}">Destinations</a>
            <a href="{{ route('booking') }}" class="{{ request()->routeIs('booking') ? 'font-bold' : '' }}">Booking</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'font-bold' : '' }}">About Us</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'font-bold' : '' }}">Contact Us</a>
        </nav>

        <div class="cta">
            <a href="{{ route('login') }}" class="btn-login">Login</a>
            <a href="{{ route('signup') }}" class="btn-signup">Signup</a>
        </div>
    </div>
</header>

<main class="container mx-auto p-6">
    @if (session('success'))
    <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-800 px-4 py-3">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="mb-4 rounded-lg bg-red-50 border border-red-200 text-red-800 px-4 py-3">
        {{ session('error') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="mb-4 rounded-lg bg-yellow-50 border border-yellow-200 text-yellow-800 px-4 py-3">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @yield('content')
</main>

@include('layouts.footer')
@stack('scripts')

<script>
document.addEventListener('DOMContentLoaded', function() {
    const menuBtn = document.getElementById('mobileMenuBtn');
    const nav = document.getElementById('mainNav');
    
    menuBtn.addEventListener('click', function() {
        nav.classList.toggle('show');
        menuBtn.classList.toggle('active');
    });
});
</script>
</body>
</html>
