<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    protected $fillable = [
        'name',
        'company',
        'email',
        'phone',
        'service_interest',
        'message',
    ];
}
