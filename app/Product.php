<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\OrderDetail;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'code', 'image', 'price', 'quantity', 'local', 
        'description', 'category_id'];

    public function scopeSearch($query, $str)
    {
        return $query->where('name', 'like', '%' . $str . '%')->orWhere('code', 'like', '%' . $str . '%');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
