<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category',
        'client_id',
        'description',
        'description_id',
        'hero_description',
        'hero_description_id',
        'summary_title',
        'summary_title_id',
        'image',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function projectImages()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('sort_order');
    }
}
