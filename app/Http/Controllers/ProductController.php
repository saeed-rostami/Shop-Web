<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    public $productsId = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category, $id)
    {
        $cat = Category::query()->find($id);
        $products = $cat->products()->orderByDesc('views')->paginate(9);
        $cat->increment('views');

        if (!count($products)) {
            return abort(403, 'در حال حاضر محصولی برای این بخش وجود ندارد');
        }
        return view('Main.Products', compact(['products']));
    }

//    function fetch_data(Request $request, Category $category, Product $product)
//    {
////        $products = $post->products()->paginate(9);
//        return View::make('Partials._productsPagination')->with('products', $products)->render();
//    }


    public function allProducts()
    {
        $products = Product::all();
        return view("Main.AllProducts", compact("products"));
    }


    public function show(Category $category, $id, Product $product)
    {
        if (Auth::check()) {
            $boughtProducts = Auth::user()->products()->get();
            foreach ($boughtProducts as $boughtProduct) {
                array_push($this->productsId, $boughtProduct->id);
            }
        }
        else
            $boughtProducts = null;



        $product->increment('views');
        $product = Product::query()->where('slug', $product->slug)->firstOrFail();

        $bought = in_array($product->id, $this->productsId);
        return view('Main.Product', compact('product', 'bought'));
    }
}
