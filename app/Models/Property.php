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
        'energy_certification',
        'energy_type',
        'materials',
        'co2_emissions',
        'co2_savings',
        'description',
        'features',
        'sustainability_checklist',
        'certifications',
    ];

    protected $casts = [
        'energy_type' => 'array',
        'materials' => 'array',
        'features' => 'array',
        'sustainability_checklist' => 'array',
        'certifications' => 'array',
    ];
}
