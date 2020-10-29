<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        return view('Main.profile');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }


    public function checkEmail(Request $request)
    {
        if ($request->get('email')) {
            if (DB::table('users')->where('email', $request->get('email'))->exists()) {
                echo 'false';
            } else {
                echo 'true';
            }
        }
    }

    public function checkPhone(Request $request)
    {
        if ($request->get('phone')) {
            if (DB::table('users')->where('phone', $request->get('phone'))->exists()) {
                echo 'false';
            } else {
                echo 'true';
            }
        }
    }
}
