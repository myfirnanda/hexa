<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'project_description',
        'categories',
        'budget',
        'file_path',
        'status',
    ];

    protected $casts = [
        'categories' => 'array',
    ];
}
