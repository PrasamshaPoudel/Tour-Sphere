<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    /**
     * Show eSewa QR payment modal
     */
    public function showEsewaPayment($bookingId)
    {
        try {
            // Get booking details
            $booking = DB::table('bookings')
                ->leftJoin('destinations', 'bookings.destination_id', '=', 'destinations.id')
                ->leftJoin('users', 'bookings.user_id', '=', 'users.id')
                ->select('bookings.*', 'destinations.name as destination_name', 'users.name as user_name', 'users.email as user_email')
                ->where('bookings.id', $bookingId)
                ->first();
            
            if (!$booking) {
                return response()->view('errors.404', [], 404);
            }
            
            // Update booking status to pending when QR is displayed
            DB::table('bookings')
                ->where('id', $bookingId)
                ->update([
                    'status' => 'Pending',
                    'updated_at' => now()
                ]);
            
            Log::info('QR Payment - Booking ID: ' . $bookingId . ' status updated to Pending');
            
            return view('payments.esewa_modal', compact('bookingId'));
            
        } catch (\Exception $e) {
            Log::error('QR Payment Error: ' . $e->getMessage());
            return response()->view('errors.500', [], 500);
        }
    }
    
    /**
     * Process eSewa payment (simulate payment completion)
     */
    public function processEsewaPayment(Request $request, $bookingId)
    {
        try {
            $booking = DB::table('bookings')->where('id', $bookingId)->first();
            
            if (!$booking) {
                return response()->json(['success' => false, 'error' => 'Booking not found'], 404);
            }
            
            // Update booking to paid and confirmed
            DB::table('bookings')
                ->where('id', $bookingId)
                ->update([
                    'paid' => true,
                    'status' => 'Confirmed',
                    'updated_at' => now()
                ]);
            
            Log::info('eSewa Payment - Booking ID: ' . $bookingId . ' payment completed and status updated to Confirmed');
            
            return response()->json([
                'success' => true,
                'message' => 'Payment completed successfully!'
            ]);
            
        } catch (\Exception $e) {
            Log::error('eSewa Payment Processing Error: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => 'Payment processing failed'], 500);
        }
    }
}


