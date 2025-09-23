@props([
    'type' => 'adventure',
    'destination' => '',
    'category' => '',
    'priceRange' => '',
    'pricePerPerson' => '',
    'discountPercentage' => '',
    'class' => 'inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2'
])

@php
    $route = match($type) {
        'adventure' => 'book.adventure',
        'package' => 'book.package', 
        'destination' => 'book.destination',
        'promotional' => 'book.promotional',
        default => 'book.adventure'
    };
    
    $params = [];
    switch($type) {
        case 'adventure':
            $params = [
                'category' => $category,
                'destination' => $destination,
                'price_range' => $priceRange
            ];
            break;
        case 'package':
        case 'destination':
            $params = [
                'destination' => $destination,
                'price_per_person' => $pricePerPerson
            ];
            break;
        case 'promotional':
            $params = [
                'discount_percentage' => $discountPercentage
            ];
            break;
    }
@endphp

<a href="{{ route($route, $params) }}" 
   class="{{ $class }}">
    @if($type === 'adventure')
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
        </svg>
        Book Adventure
    @elseif($type === 'package')
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
        </svg>
        Book Package
    @elseif($type === 'destination')
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
        </svg>
        Book Destination
    @elseif($type === 'promotional')
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
        </svg>
        Book with Discount
    @endif
</a>

