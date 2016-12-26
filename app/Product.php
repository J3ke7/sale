<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\OrderDetail;

class Product extends Model
{
    protected $fillable = ['name', 'code', 'image', 'price', 'quantity', 'local', 
        'description', 'category_id'];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function OrderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
