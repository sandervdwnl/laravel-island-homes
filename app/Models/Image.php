<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'property_id',
    ];

    // Eloquent relationships

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
