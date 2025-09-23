@extends('layouts.app')

@section('title', 'Travel Blog - Tour Sphere')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-gradient-to-r from-blue-900 to-indigo-700 text-white">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="relative z-10 container mx-auto px-4 h-full flex items-center">
        <div class="max-w-4xl text-center">
            <h1 class="text-5xl font-bold mb-6">📝 Travel Blog</h1>
            <p class="text-xl mb-8">Discover amazing travel stories, tips, and insights from our adventures around Nepal</p>
        </div>
    </div>
</section>

<!-- Blog Posts Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
        @if($blogs->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($blogs as $blog)
                <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    @if($blog->image)
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ asset($blog->image) }}" 
                             alt="{{ $blog->title }}" 
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <span class="mr-4">👤 {{ $blog->author }}</span>
                            <span>📅 {{ $blog->created_at->format('M d, Y') }}</span>
                        </div>
                        
                        <h2 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            {{ $blog->title }}
                        </h2>
                        
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ $blog->excerpt }}
                        </p>
                        
                        <a href="{{ route('blog.show', $blog->slug) }}" 
                           class="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold">
                            Read More 
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="mt-12">
                {{ $blogs->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <div class="text-6xl mb-4">📝</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">No Blog Posts Yet</h3>
                <p class="text-gray-600">Check back soon for amazing travel stories and tips!</p>
            </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-blue-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Ready for Your Next Adventure?</h2>
        <p class="text-xl mb-8">Explore our destinations and book your dream trip today!</p>
        <a href="{{ route('destinations') }}" 
           class="inline-flex items-center px-8 py-3 bg-white text-blue-600 font-bold rounded-lg hover:bg-gray-100 transition-colors">
            Explore Destinations
        </a>
    </div>
</section>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection



