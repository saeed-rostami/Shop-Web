<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Resources\Product as ProductResource;


class ProductController extends Controller
{

//    index
    public function index(Request $request, Post $post)
    {
        $products = new ProductCollection(Product::all());
        $counts = $post->products()->count();
//
        if ($request->json()) {
            if (!count($products)) {
                return response()->json('در حال حاضر محتوایی برای این بخش وجود ندارد');
            }
            return response()->json([
                'products' => $products,
                'counts' => $counts,
                'status' => 201
            ]);
        }
        return false;
    }


//    show
    public function show(Request $request, Category $category, Post $post, Product $product)
    {
        $product = Product::query()->where('slug', $product->slug)->firstOrFail();
        if ($request->wantsJson()) {
            return response()->json([
                "product" => $product,
                "sttaus" => 201
            ]);
        }

        return false;
    }
}
