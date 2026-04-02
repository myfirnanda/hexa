<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductBenefit extends Model
{
    protected $fillable = [
        'product_id',
        'icon',
        'title',
        'sort_order',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
