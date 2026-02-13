<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'title',
        'price',
        'location',
        'bedrooms',
        'bathrooms',
        'area',
        'image',
        'energyCertification',
        'energyType',
        'materials',
        'co2Emissions',
        'co2Savings',
        'description',
        'features',
        'sustainabilityChecklist',
        'certifications',
        'hidden',
    ];

    protected $casts = [
        'price' => 'integer',
        'energyType' => 'array',
        'materials' => 'array',
        'features' => 'array',
        'sustainabilityChecklist' => 'array',
        'certifications' => 'array',
        'hidden' => 'boolean',
    ];
}
