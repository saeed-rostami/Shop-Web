<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{

    public function products()
    {
        $categories = Category::all();
        $posts = Post::all();
        $products = Product::all();
        return view('Admin.Views.AdminProducts' , compact(['categories' , 'posts' , 'products']));
    }

    public function storeProduct(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->post_id = $request->post_id;
        $product->price = $request->price;
        $product->coach = $request->coach;
        $product->year = $request->year;

        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $title = $request->title;

            foreach ($images as $image) {
                $extension = $image->getClientOriginalName();
                $fileName = time() . '.' . $extension;
                $image->move(public_path() . "/Images/Products/", $fileName);
                $file[] = $fileName;
            }
        }


        $product->image = $file;
        $product->save();

        foreach ($file as $image){
            $img = Image::make(public_path('/images/products/'.$image))->resize('500','650');
            $img->save();
        }

        return redirect()->back()->with('success', 'محصول جدید با موفقیت ثبت شد');
    }
}
