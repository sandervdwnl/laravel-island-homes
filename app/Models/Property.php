<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'user_id',
        'street',
        'number',
        'zip_code',
        'city',
        'asking_price',
        'status',
        'desciption',
        'location_id',
        'latitude',
        'longitude',
        'property_type',
        'built_in',
        'area_size_indoor',
        'area_size_outdoor',
        'bedrooms',
        'bathrooms',
        'feat_image_path',
        'is_featured',
        'approved',
    ];

    
    // Eloquent relationships

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public function images() {
        return $this->hasMany(Image::class);
    }
}
