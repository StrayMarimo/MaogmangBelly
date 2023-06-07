<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;
    public $table="order_lines";

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
