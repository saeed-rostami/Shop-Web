<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Post;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Category;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{

   public function __construct()
   {
       return $this->middleware('admin');
   }

    public function adminPanel()
    {
        $orders = Order::all();
        $users = User::query()->count();
        $products = Product::query()->count();
        $customers = User::query()->whereHas('orders')->count();
        return view('Admin.Panel' , compact('orders' , 'users' , 'products' , 'customers'));
    }
}
