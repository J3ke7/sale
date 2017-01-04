<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use Auth;
use Cart;
use Lang;

class OrderController extends Controller
{
    public function getAddOrder(Request $request)
    {
        $total = (double)Cart::subtotal() * 1000;

        $order = [
            'user_id' => Auth::user()->id,
            'total_price' => $total,
            'status' => 0
        ];
        $order = Order::create($order);
        foreach (Cart::content() as $cart) {
            $detail = array(
                'quantity' => $cart->qty,
                'order_id' => $order->id,
                'product_id' => $cart->id
            );
            OrderDetail::create($detail);
        }
        return redirect()->route('home')->with([
            'flash_level' => Lang::get('admin.success'),
            'flash_message' => Lang::get('admin.message.thank_you')
        ]);
    }
}
