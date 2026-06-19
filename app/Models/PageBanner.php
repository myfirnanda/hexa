<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageBanner extends Model
{
    protected $fillable = ['page', 'title', 'hero_title', 'hero_title_id', 'hero_description', 'hero_description_id', 'button_text', 'button_text_id', 'button_url', 'image_path', 'image_position', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public static array $pages = [
        'home'     => 'Homepage',
        'works'    => 'Works',
        'about'    => 'About Us',
        'products' => 'Products',
        'services' => 'Services',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeForPage($query, string $page)
    {
        return $query->where('page', $page);
    }
}
