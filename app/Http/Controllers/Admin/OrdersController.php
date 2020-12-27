<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function index()
    {
        $orders = Order::query()->orderByDesc('created_at')->paginate(20);
        return view('Admin.Views.AdminOrders', compact('orders'));
    }

    public function order(Order $order)
    {
        return view('Admin.Views.AdminSingleOrder', compact('order'));
    }

    public function changeStatus(Order $order)
    {
       $order->update([
        'status' =>  $order->status ? false : true
       ]);
       $order->save();
       return redirect()->back()->with('success' , 'تغییرات با موفقیت اعما شدند');
    }
}
