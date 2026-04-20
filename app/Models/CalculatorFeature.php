<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalculatorFeature extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_recommended' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'integer',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatures($query)
    {
        return $query->where('category', 'feature');
    }

    public function scopeServices($query)
    {
        return $query->where('category', 'service');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }
}
