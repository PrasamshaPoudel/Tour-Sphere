<!-- resources/views/layouts/navigation.blade.php -->
<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600">
                    TourSphere
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden sm:flex sm:space-x-8 items-center">
                <a href="{{ route('home') }}" 
                   class="text-gray-700 hover:text-blue-600 {{ request()->routeIs('home') ? 'font-bold' : '' }}">
                    Home
                </a>

                <a href="{{ route('destinations') }}" 
                   class="text-gray-700 hover:text-blue-600 {{ request()->routeIs('destinations') ? 'font-bold' : '' }}">
                    Destinations
                </a>

                <a href="{{ route('booking.form') }}" 
                   class="text-gray-700 hover:text-blue-600 {{ request()->routeIs('booking.form') ? 'font-bold' : '' }}">
                    Booking
                </a>

                <a href="{{ route('contact') }}" 
                   class="text-gray-700 hover:text-blue-600 {{ request()->routeIs('contact') ? 'font-bold' : '' }}">
                    Contact
                </a>

                <!-- Authentication Links -->
                @auth
                    <!-- Profile Button -->
                    <a href="{{ route('profile.show') }}" 
                       class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white px-4 py-2 rounded-lg hover:from-purple-700 hover:to-indigo-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Profile
                    </a>
                    
                    <div class="relative group">
                        <button class="flex items-center text-gray-700 hover:text-blue-600 focus:outline-none">
                            <span>{{ auth()->user()->name }}</span>
                            <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden group-hover:block">
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Admin Dashboard
                                </a>
                            @else
                                <a href="{{ route('user.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    User Dashboard
                                </a>
                            @endif
                            <a href="{{ route('user.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Profile
                            </a>
                            <a href="{{ route('booking.form') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Book Trip
                            </a>
                            <div class="border-t border-gray-100"></div>
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
    @else
        <div class="flex space-x-3">
            <a href="{{ route('login') }}"
               class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white px-4 py-2 rounded-lg hover:from-purple-700 hover:to-indigo-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                Login
            </a>
            <a href="{{ route('register') }}"
               class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-4 py-2 rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                Register
            </a>
        </div>
    @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="sm:hidden flex items-center">
                <button type="button" class="text-gray-700 hover:text-blue-600 focus:outline-none focus:text-blue-600" id="mobile-menu-button">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div class="sm:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t">
                <a href="{{ route('home') }}" 
                   class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                    Home
                </a>
                <a href="{{ route('destinations') }}" 
                   class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                    Destinations
                </a>
                <a href="{{ route('booking.form') }}" 
                   class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                    Booking
                </a>
                <a href="{{ route('contact') }}" 
                   class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                    Contact
                </a>
                
                @auth
                    <div class="border-t border-gray-200 pt-4">
                        <div class="px-3 py-2 text-base font-medium text-gray-800">
                            {{ auth()->user()->name }}
                        </div>
                        
                        <!-- Profile Button for Mobile -->
                        <a href="{{ route('user.profile') }}" 
                           class="block px-3 py-2 text-base font-medium text-white bg-gradient-to-r from-purple-600 to-indigo-600 rounded-lg mx-3 text-center hover:from-purple-700 hover:to-indigo-700 transition-all duration-300 mb-3">
                            Profile
                        </a>
                        
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" 
                               class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                                Admin Dashboard
                            </a>
                        @else
                            <a href="{{ route('user.dashboard') }}" 
                               class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                                User Dashboard
                            </a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-3 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                                Logout
                            </button>
                        </form>
                    </div>
    @else
        <div class="border-t border-gray-200 pt-4 space-y-2">
            <a href="{{ route('login') }}"
               class="block px-3 py-2 text-base font-medium text-white bg-gradient-to-r from-purple-600 to-indigo-600 rounded-lg mx-3 text-center hover:from-purple-700 hover:to-indigo-700 transition-all duration-300">
                Login
            </a>
            <a href="{{ route('register') }}"
               class="block px-3 py-2 text-base font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 rounded-lg mx-3 text-center hover:from-indigo-700 hover:to-purple-700 transition-all duration-300">
                Register
            </a>
        </div>
    @endauth
            </div>
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    mobileMenuButton.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
    });
});
</script>
