<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function getAddItem(Request $request)
    {
        $product = Product::find($request->id);
        if ($product) {
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price
            ]);
        }
        return view('cart.index'); 
    }

    public function getDeleteItem($id)
    {
        Cart::remove($id);
        return view('cart.index');
    }
}
