<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;
    public $table="orders";
    protected $fillable = ['is_purchased', 'delivery_type'];
    protected $dates = ['date_needed'];

    public function orderLines()
    {
        return $this->hasMany(OrderLine::class);
    }

    public function scopeOfDate($query, $date)
    {
        return $query->whereDate('date_needed', $date)->exists();
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
