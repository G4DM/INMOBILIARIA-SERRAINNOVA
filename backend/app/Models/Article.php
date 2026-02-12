<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'title',
        'excerpt',
        'category',
        'date',
        'image',
        'content',
        'hidden',
    ];

    public $timestamps = false;

    protected $casts = [
        'date' => 'date',
        'hidden' => 'boolean',
    ];

    // Categorías disponibles (equivalente a blogCategories)
    public const CATEGORIES = [
        'Estilos de vida',
        'Agenda 2030',
        'Subvenciones',
    ];
}
