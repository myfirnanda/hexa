<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'role',
        'role_id',
        'quote',
        'quote_id',
        'rating',
    ];
}
