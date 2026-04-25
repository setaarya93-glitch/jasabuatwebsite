<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemplateReview extends Model
{
    protected $fillable = [
        'template_id',
        'name',
        'email',
        'rating',
        'comment',
        'is_approved',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
