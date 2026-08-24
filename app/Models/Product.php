<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'sku',
        'category',
        'summary',
        'description',
        'sort',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
