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
        'hero_description',
        'summary_title',
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
