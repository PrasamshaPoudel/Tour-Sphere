@extends('layouts.app')

@section('title', 'All Bookings')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">All Bookings</h1>

    <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 border-b text-left">#</th>
                <th class="py-2 px-4 border-b text-left">User Name</th>
                <th class="py-2 px-4 border-b text-left">User Email</th>
                <th class="py-2 px-4 border-b text-left">Destination</th>
                <th class="py-2 px-4 border-b text-left">Travel Date</th>
                <th class="py-2 px-4 border-b text-left">People</th>
                <th class="py-2 px-4 border-b text-left">Total Price</th>
                <th class="py-2 px-4 border-b text-left">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bookings as $booking)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b">{{ $booking->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->user->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->user->email }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->destination->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->travel_date }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->number_of_people }}</td>
                    <td class="py-2 px-4 border-b">${{ $booking->price }}</td>
                    <td class="py-2 px-4 border-b capitalize">{{ $booking->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="py-4 px-4 text-center text-gray-500">No bookings found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
