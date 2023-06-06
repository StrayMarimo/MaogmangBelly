<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;
    public $table="orders";
    protected $fillable = ['is_purchased'];
    protected $dates = ['date_purchased'];

    public function scopeOfUser($query, $userId)
    {
        return $query->where('user_id', '=', $userId);
    }

    public function scopeUnpurchased($query)
    {
        return $query->where('is_purchased', '=', 0);
    }

    public function scopeOfType($query, $orderType)
    {
        return $query->where('order_type', '=', $orderType);
    }

}
