<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Product;
use App\Http\Resources\CategoryCollection;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request, Category $category)
    {
        $categories = new CategoryCollection(Category::all());
        $allProducts = new ProductCollection(Product::all());
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
