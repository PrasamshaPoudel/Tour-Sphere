<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

abstract class BaseController extends Controller
{
    /**
     * Safely execute database queries with output buffering and error handling
     */
    protected function safeQuery(callable $callback, $errorMessage = 'Database error occurred')
    {
        // Start output buffering to prevent any premature output
        ob_start();
        
        try {
            // Execute the callback function
            $result = $callback();
            
            // Clean any output that might have been generated
            ob_clean();
            
            return $result;
        } catch (\Exception $e) {
            // Clean output buffer and log the error
            ob_clean();
            
            // Log the error for debugging
            \Log::error('Safe query error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            
            // Return a safe error response
            return response()->view('errors.safe-error', [
                'message' => $errorMessage,
                'details' => config('app.debug') ? $e->getMessage() : 'Please try again later.'
            ], 500);
        } finally {
            // Ensure output buffer is always cleaned
            if (ob_get_level()) {
                ob_end_clean();
            }
        }
    }
    
    /**
     * Safely paginate database results
     */
    protected function safePaginate($query, $perPage = 15, $request = null)
    {
        return $this->safeQuery(function() use ($query, $perPage, $request) {
            $paginatedData = $query->paginate($perPage);
            
            // Convert to collection of objects
            $collection = $paginatedData->getCollection()->map(function($item) {
                return (object) $item;
            });
            
            // Replace the collection in pagination
            $paginatedData->setCollection($collection);
            
            return $paginatedData;
        });
    }
    
    /**
     * Safely render a view with data
     */
    protected function safeView($view, $data = [], $status = 200)
    {
        return $this->safeQuery(function() use ($view, $data, $status) {
            return response()->view($view, $data, $status);
        });
    }
}


