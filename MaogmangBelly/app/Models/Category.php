<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['name'];

    public function scopeOfName($query, $name)
    {
        return $query->where('name', '=', $name)->exists();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
}
