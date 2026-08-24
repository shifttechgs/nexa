<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'quote',
        'name',
        'title',
        'company',
        'is_placeholder',
        'published',
        'sort',
    ];

    protected function casts(): array
    {
        return [
            'is_placeholder' => 'boolean',
            'published' => 'boolean',
        ];
    }

    public function scopePublished(Builder $query): void
    {
        $query->where('published', true);
    }
}
