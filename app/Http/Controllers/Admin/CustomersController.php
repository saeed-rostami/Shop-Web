<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = User::query()->whereHas('orders')->get();
        return view('Admin.Views.AdminCustomers' , compact('customers'));
    }
}
