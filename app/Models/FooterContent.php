<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterContent extends Model
{
    protected $fillable = [
        'column',
        'type',
        'title',
        'content',
        'url',
        'icon',
        'order',
        'is_active',
    ];
    
    protected $casts = [
        'order' => 'integer',
        'is_active' => 'boolean',
    ];
}