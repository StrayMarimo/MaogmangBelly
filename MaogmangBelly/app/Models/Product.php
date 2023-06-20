<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $model = \App\Models\Product::class;
    protected $fillable = [
        'name',
        'description',
        'price',
        'price_10pax',
        'price_20pax',
        'stock',
        'gallery',
        'category_id',
        'is_trending',
        'is_featured',
        'total_sold'
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function scopeTrending($query)
    {
        return $query->where('is_trending', true)->get();
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->get();
    }

    public function scopeOfPattern($query, $str)
    {
        return $query->where('name', 'like', '%' . $str . '%')->get();
    }
}
