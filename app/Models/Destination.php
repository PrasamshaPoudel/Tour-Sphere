<?php

namespace App\Models;
use App\Models\Booking;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    // Fillable fields (optional but recommended)
    protected $fillable = [
        'name',
        'description',
        'price',
        'normal_price',
        'medium_price',
        'five_star_price',
        'image',
    ];

    // -----------------------------
    // Relationships
    // -----------------------------

    // A destination can have many bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // A destination can have many packages
    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    // -----------------------------
    // Budget Tier Helper Methods
    // -----------------------------

    /**
     * Get price for specific budget tier
     */
    public function getPriceForTier($tier)
    {
        switch ($tier) {
            case 'normal':
                return $this->normal_price ?? $this->price;
            case 'medium':
                return $this->medium_price ?? $this->price * 1.5;
            case 'five_star':
                return $this->five_star_price ?? $this->price * 2.5;
            default:
                return $this->price;
        }
    }

    /**
     * Get all budget tiers with prices
     */
    public function getBudgetTiers()
    {
        return [
            'normal' => [
                'name' => 'Normal',
                'price' => $this->normal_price ?? $this->price,
                'description' => 'Standard accommodation and services'
            ],
            'medium' => [
                'name' => 'Medium (Affordable)',
                'price' => $this->medium_price ?? $this->price * 1.5,
                'description' => 'Comfortable accommodation with better amenities'
            ],
            'five_star' => [
                'name' => 'Five-Star (Expensive)',
                'price' => $this->five_star_price ?? $this->price * 2.5,
                'description' => 'Luxury accommodation with premium services'
            ]
        ];
    }
}
