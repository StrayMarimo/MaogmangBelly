<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;
    public $table="order_lines";

    public function scopeOfOrder($query, $orderId)
    {
        return $query->where('order_id', '=', $orderId)->get();
    }

    public function orderCount($query, $orderId)
    {
        return  $query->where('order_id', '=', $orderId)->count(); 
    }
}
