<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $guarded = [];

    protected $casts = [
        'packages' => 'array',
        'reviews' => 'array',
    ];

    public function templateReviews()
    {
        return $this->hasMany(TemplateReview::class)->where('is_approved', true)->latest();
    }

    public function averageRating()
    {
        return $this->templateReviews()->avg('rating') ?? 0;
    }
}
