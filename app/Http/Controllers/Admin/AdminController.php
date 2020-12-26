<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Product;
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
        return view('Admin.Panel');
    }
}
