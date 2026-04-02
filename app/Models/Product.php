<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'image_cover',
        'slug',
        'name',
        'tagline',
        'description',
        'sort_order',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function features()
    {
        return $this->hasMany(ProductFeature::class)->orderBy('sort_order');
    }

    public function benefits()
    {
        return $this->hasMany(ProductBenefit::class)->orderBy('sort_order');
    }
}
