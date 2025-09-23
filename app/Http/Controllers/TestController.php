<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        // Test 1: Simple response
        return response('Simple test - working!');
    }
    
    public function testUser()
    {
        // Test 2: User data
        $user = auth()->user();
        return response('User: ' . $user->name);
    }
    
    public function testBooking()
    {
        // Test 3: Booking data
        $user = auth()->user();
        $bookings = \App\Models\Booking::where('user_id', $user->id)->get();
        return response('Bookings count: ' . $bookings->count());
    }
    
    public function testView()
    {
        // Test 4: Simple view
        $user = auth()->user();
        return view('test-simple', compact('user'));
    }
}


