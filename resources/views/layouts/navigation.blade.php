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

            <!-- Links -->
            <div class="hidden sm:flex sm:space-x-8 items-center">
                <a href="{{ route('home') }}" 
                   class="text-gray-700 hover:text-blue-600 {{ request()->routeIs('home') ? 'font-bold' : '' }}">
                    Home
                </a>

                <a href="{{ route('destinations') }}" 
                   class="text-gray-700 hover:text-blue-600 {{ request()->routeIs('destinations') ? 'font-bold' : '' }}">
                    Destinations
                </a>
            </div>
        </div>
    </div>
</nav>
