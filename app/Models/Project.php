<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'image',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function projectImages()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('sort_order');
    }
}
