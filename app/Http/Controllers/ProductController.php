<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Category $category, Post $post, Product $product)
    {
        $products = $post->products()->get();
        $counts = $post->products()->count();

        if ($request->wantsJson()) {
            if (!count($products)) {
                return response()->json('در حال حاضر محتوایی برای این بخش وجود ندارد');
            }
            return response()->json([
                'products' => $products,
                'counts' => $counts,
                'status' => 201
            ]);

        }


        if (!count($products)) {
            return abort(403, 'در حال حاضر محصولی برای این بخش وجود ندارد');
        }
        return view('Main.Products', compact(['products', 'counts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Category $category, Post $post, Product $product)
    {
        $product = Product::query()->where('slug', $product->slug)->firstOrFail();
        return view('Main.Product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
