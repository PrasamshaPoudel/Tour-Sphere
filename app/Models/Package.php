<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'package_type',
        'price',
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
