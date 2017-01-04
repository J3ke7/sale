<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Lang;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(config('view.paginate'));

        return view('admin/order/index', compact('orders'));
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->route('admin.order.index')->with([
                'flash_level' => Lang::get('admin.danger'),
                'flash_message' => Lang::get('admin.message.not_found', ['name' => 'Order'])
            ]);
        }
        $order->delete();
        
        return redirect()->route('admin.order.index')->with([
            'flash_level' => Lang::get('admin.success'),
            'flash_message' => Lang::get('admin.message.delete_success')
        ]);
    }
}
