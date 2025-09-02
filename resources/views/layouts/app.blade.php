<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tour Sphere')</title>

    <!-- Tailwind CSS (or your own CSS) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100 text-gray-900">
<!-- Navbar -->
<header class="site-header">
    <div class="container nav">
        <a href="{{ route('home') }}" class="brand">
            <span>Tour</span>Sphere
        </a>

        <nav class="links">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'font-bold' : '' }}">Home</a>
            <a href="{{ route('destinations') }}" class="{{ request()->routeIs('destinations') ? 'font-bold' : '' }}">Destinations</a>
            <a href="{{ route('booking') }}" class="{{ request()->routeIs('booking') ? 'font-bold' : '' }}">Booking</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'font-bold' : '' }}">About Us</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'font-bold' : '' }}">Contact Us</a>
        </nav>

        <div class="cta">
            <!-- Login button -->
<a href="{{ route('login') }}" class="btn-login">Login</a>

<!-- Signup button -->
<a href="{{ route('signup') }}" class="btn-signup">Signup</a>

        </div>
    </div>
</header>


      <!-- Page Content -->
    <main class="container mx-auto p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Scripts -->
    @stack('scripts')
</body>
</html>
