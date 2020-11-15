<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{

//    index
    public function products()
    {
        $categories = Category::all();
        $posts = Post::all();
        $products = Product::all();
        $tags = Tag::all();
        return view('Admin.Views.AdminProducts', compact(['categories', 'posts', 'products', 'tags']));
    }

//    store
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
                $fileName = $title . '.' . $extension;
                $image->move(public_path() . "/Images/Products/", $fileName);
                $file[] = $fileName;
            }
        }

        $product->image = $file;
        $product->save();

        foreach ($file as $image) {
            $img = Image::make(public_path('/images/products/' . $image))->resize('500', '650');
            $img->save();

            $product->tags()->sync($request->tags, false);
        }

        return redirect()->back()->with('success', 'محصول جدید با موفقیت ثبت شد');
    }

//    update
    public function edit(Product $product, Post $post, Category $category)
    {
        $categories = Category::all();
        $posts = Post::all();
        $tags = Tag::all();
        return view('Admin.Partials._EditProduct', compact(['product', 'posts', 'categories', 'tags']));
    }

    public function update(Request $request, Product $product)
    {
        if ($request->image !== null) {
            $oldImages = $product->image;
            foreach ($oldImages as $oldImage) {
                $oldFile_img = public_path("/images/Products/{$oldImage}");
                File::delete($oldFile_img);
            }

            $title = $request->title;
            $newImages = $request->file('image');

            foreach ($newImages as $newImage) {
                $extension = $newImage->getClientOriginalName();
                $image = time() . "." . $title . "." . $extension;
                $newImage->move("Images/Products/", $image);

                $images[] = $image;

            }


            $product->update([
                'title' => $request->title,
                'description' => $request->description,
                'post_id' => $request->post_id,
                'price' => $request->price,
                'coach' => $request->coach,
                'year' => $request->year,
                'image' => $images,

            ]);


            if (isset($request->tags)) {
                $product->tags()->sync($request->tags);
            } else {
                $product->tags()->sync(array());

            }

            foreach ($images as $image) {
                $img = Image::make(public_path('/images/products/' . $image))->resize('500', '650');
                $img->save();
            }
            return redirect()->route('Admin-Products')->with('success', 'تغییرات با موفقیت اعمال شدند');
        } elseif ($request->image == null) {
            $product->update([
                'title' => $request->title,
                'description' => $request->description,
                'post_id' => $request->post_id,
                'price' => $request->price,
                'coach' => $request->coach,
                'year' => $request->year,
            ]);


            if (isset($request->tags)) {
                $product->tags()->sync($request->tags);
            } else {
                $product->tags()->sync(array());

            }

            return redirect()->route('Admin-Products')->with('success', 'تغییرات با موفقیت اعمال شدند');
        } else
            return redirect()->back()->with('success', 'تغییری اعمال نشد');
    }

//    delete
    public function deleteProduct(Product $product)
    {
        $images = $product->image;
        foreach ($images as $image) {
            $file_img = public_path("/images/products/{$image}");
            File::delete($file_img);
        }
        $product->delete();
        return redirect()->back()->with('success', 'محصول مورد نظر مورد نظر با موفقیت حذف  شد');
    }
}
