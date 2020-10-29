<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request, Category $category)
    {
        $categories = Category::all();
        $allProducts =Product::all();
        if ($request->expectsJson()){
            return response()->json([
                'categories' => $categories,
                'allProducts' => $allProducts,
                'status' => 201
            ]);
        }
       return false;
    }
}
