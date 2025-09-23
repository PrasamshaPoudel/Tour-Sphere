@extends('layouts.app')

@section('title', 'Write a Review - Tour Sphere')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Write a Review</h1>
            <p class="text-lg text-gray-600">Share your experience with this destination</p>
        </div>

        <!-- Booking Details -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Booking Details</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <span class="text-gray-500">Destination:</span>
                    <p class="font-medium">{{ $booking->destination->name }}</p>
                </div>
                <div>
                    <span class="text-gray-500">Travel Date:</span>
                    <p class="font-medium">{{ \Carbon\Carbon::parse($booking->travel_date)->format('M d, Y') }}</p>
                </div>
                <div>
                    <span class="text-gray-500">People:</span>
                    <p class="font-medium">{{ $booking->people }} {{ $booking->people == 1 ? 'person' : 'people' }}</p>
                </div>
                <div>
                    <span class="text-gray-500">Total Price:</span>
                    <p class="font-medium text-green-600">Rs {{ number_format($booking->price) }}</p>
                </div>
            </div>
        </div>

        <!-- Review Form -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <form action="{{ route('review.store', $booking->id) }}" method="POST">
                @csrf
                
                <!-- Rating Section -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Rate your experience</label>
                    <div class="flex space-x-1">
                        @for($i = 1; $i <= 5; $i++)
                            <button type="button" class="star-rating text-3xl text-gray-300 hover:text-yellow-400 focus:outline-none" data-rating="{{ $i }}">
                                ★
                            </button>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="rating" value="0" required>
                    <p class="text-sm text-gray-500 mt-2">Click on a star to rate (1-5 stars)</p>
                    @error('rating')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Comment Section -->
                <div class="mb-6">
                    <label for="comment" class="block text-sm font-medium text-gray-700 mb-2">Write your review</label>
                    <textarea 
                        name="comment" 
                        id="comment" 
                        rows="6" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Tell us about your experience... What did you like? What could be improved?"
                    >{{ old('comment') }}</textarea>
                    @error('comment')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('profile.show') }}" 
                       class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Submit Review
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.star-rating');
    const ratingInput = document.getElementById('rating');
    
    stars.forEach((star, index) => {
        star.addEventListener('click', function() {
            const rating = index + 1;
            ratingInput.value = rating;
            
            // Update star display
            stars.forEach((s, i) => {
                if (i < rating) {
                    s.classList.remove('text-gray-300');
                    s.classList.add('text-yellow-400');
                } else {
                    s.classList.remove('text-yellow-400');
                    s.classList.add('text-gray-300');
                }
            });
        });
        
        star.addEventListener('mouseenter', function() {
            const rating = index + 1;
            stars.forEach((s, i) => {
                if (i < rating) {
                    s.classList.remove('text-gray-300');
                    s.classList.add('text-yellow-400');
                } else {
                    s.classList.remove('text-yellow-400');
                    s.classList.add('text-gray-300');
                }
            });
        });
    });
    
    // Reset stars on mouse leave
    document.querySelector('.flex.space-x-1').addEventListener('mouseleave', function() {
        const currentRating = parseInt(ratingInput.value);
        stars.forEach((s, i) => {
            if (i < currentRating) {
                s.classList.remove('text-gray-300');
                s.classList.add('text-yellow-400');
            } else {
                s.classList.remove('text-yellow-400');
                s.classList.add('text-gray-300');
            }
        });
    });
});
</script>
@endsection
