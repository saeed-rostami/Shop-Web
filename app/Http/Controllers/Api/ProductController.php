<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Post;
use App\Product;
use function Couchbase\basicEncoderV1;
use Illuminate\Http\Request;
use App\Http\Resources\Product as ProductResource;


class ProductController extends Controller
{

//    index
    public function index(Request $request, Category $category, Post $post, Product $product)
    {
        $products = new ProductCollection($post->products()->get());
//        $products = $post->products()->paginate(9);
        $counts = $post->products()->count();
//
        if ($request->expectsJson()) {
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
//        $product = new ProductCollection(Product::query()->where('slug' , $product->slug)->get());
        $product = Product::query()->where('slug', $product->slug)->firstOrFail();
        if ($request->expectsJson()) {
            return response()->json([
                "product" => $product,
                "sttaus" => 201
            ]);
        }

        return false;
    }
}
