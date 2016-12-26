<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Product;

class OrderDetail extends Model
{
    protected $fillable = ['quantity', 'order_id', 'product_id'];

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
