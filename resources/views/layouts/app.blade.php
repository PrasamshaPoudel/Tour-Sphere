<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Tour Sphere')</title>
    <link rel="icon" href="data:,">
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
            <a href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.*') ? 'font-bold' : '' }}">Blog</a>
            <a href="{{ route('booking.form') }}" class="{{ request()->routeIs('booking.form') ? 'font-bold' : '' }}">Booking</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'font-bold' : '' }}">About Us</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'font-bold' : '' }}">Contact Us</a>
        </nav>

        <div class="cta">
            @auth
                <!-- Profile Button -->
                <a href="{{ route('user.profile') }}" class="btn-auth mr-2">Profile</a>
                
                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}" class="inline-block mr-2">
                    @csrf
                    <button type="submit" class="btn-auth btn-logout">Logout</button>
                </form>
                
                <!-- User Dropdown -->
                <div class="relative inline-block">
                    <button class="btn-auth dropdown-toggle" id="userDropdown">
                        {{ auth()->user()->name }} ▼
                    </button>
                    <div class="dropdown-menu" id="userDropdownMenu" style="display: none;">
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item">Admin Dashboard</a>
                            <a href="{{ route('admin.blog.manage') }}" class="dropdown-item">Manage Blog</a>
                        @else
                            <a href="{{ route('user.dashboard') }}" class="dropdown-item">User Dashboard</a>
                        @endif
                        <a href="{{ route('blog.index') }}" class="dropdown-item">Blog</a>
                        <a href="{{ route('booking.form') }}" class="dropdown-item">Book Trip</a>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn-auth mr-2">Login</a>
                <a href="{{ route('register') }}" class="btn-auth">Register</a>
            @endauth
        </div>
    </div>
</header>

<main class="container mx-auto p-6">
 @if (session('success'))
    @if (is_array(session('success')))
        @foreach (session('success') as $msg)
            <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-800 px-4 py-3">
                {{ $msg }}
            </div>
        @endforeach
    @else
        <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-800 px-4 py-3">
            {{ session('success') }}
        </div>
    @endif
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

    // User dropdown functionality
    const userDropdown = document.getElementById('userDropdown');
    const userDropdownMenu = document.getElementById('userDropdownMenu');
    
    if (userDropdown && userDropdownMenu) {
        userDropdown.addEventListener('click', function(e) {
            e.preventDefault();
            if (userDropdownMenu.style.display === 'none' || userDropdownMenu.style.display === '') {
                userDropdownMenu.style.display = 'block';
                userDropdownMenu.classList.add('show');
            } else {
                userDropdownMenu.style.display = 'none';
                userDropdownMenu.classList.remove('show');
            }
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!userDropdown.contains(e.target) && !userDropdownMenu.contains(e.target)) {
                userDropdownMenu.style.display = 'none';
                userDropdownMenu.classList.remove('show');
            }
        });
    }
});
</script>
</body>
</html>
