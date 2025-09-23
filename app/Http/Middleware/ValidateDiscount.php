<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateDiscount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $discount = $request->query('discount');
        
        // If discount is provided, validate it
        if ($discount !== null) {
            if (!is_numeric($discount) || $discount < 0 || $discount > 100) {
                return redirect()->route('booking')->with('error', 'Invalid discount percentage. Must be between 0-100.');
            }
            
            // Additional security: Check if discount is too high
            if ($discount > 50) {
                return redirect()->route('booking')->with('error', 'Maximum discount allowed is 50%.');
            }
        }
        
        return $next($request);
    }
}