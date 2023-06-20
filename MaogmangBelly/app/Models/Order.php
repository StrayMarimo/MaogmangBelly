<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;
    public $table="orders";
    protected $fillable = [
        'is_purchased', 
        'delivery_type', 
        'order_type', 
        'user_id', 
        'grand_total', 
        'comment', 
        'address'
    ];
    protected $dates = [
        'date_needed', 
        'date_completed'];

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

    public function getOrders()
    {
        $orders = $this->orderLines;
        foreach ($orders as $order)
        {
            $product = $order->product;
            $order->name = $product->name;
            $order->price = $product->price;
            $order->price_10pax = $product->price_10pax;
            $order->price_20pax = $product->price_20pax;
            unset($order->product);
        }
        return $orders->toArray();
    }

    public function countOrders()
    {
        return $this->orderLines->count();
    }

}
