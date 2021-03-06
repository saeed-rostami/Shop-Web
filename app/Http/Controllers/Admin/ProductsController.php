<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProductRequest;
use App\Product;
use App\Tag;
use App\Trainer;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{

//    index
    public function products()
    {
        $categories = Category::all();
        $products = Product::all();
        $tags = Tag::all();
        $trainers = Trainer::all();
        return view('Admin.Views.AdminProducts', compact(['categories', 'products', 'tags', 'trainers']));
    }

//    store
    public function storeProduct(AdminProductRequest $request)
    {
        $title = $request->title;

        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->extra_description = $request->extra_description;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->off = $request->off;
        $product->trainer_id = $request->trainer_id;
        $product->duration = $request->duration;
        $product->year = $request->year;

       if ($request->hasFile('demo')){
           $demo = $request->file('demo');
//           $extension = $demo->getClientOriginalName();
           $demoFileName = $title;
           $demo->move(public_path() . "/videos/Products", $demoFileName);
           $product->demo = $demoFileName;
       }


        $images = $request->file('image');
        foreach ($images as $image) {
            $extension = $image->getClientOriginalName();
            $fileName = $extension;
            $image->move(public_path() . "/Images/Products/", $fileName);
            $file[] = $fileName;
        }


        $product->image = $file;
        $product->save();

        foreach ($file as $image) {
            $img = Image::make(public_path('/images/products/' . $image))->resize('500', '650');
            $img->save();

            $product->tags()->sync($request->tags, false);
        }

        return redirect()->back()->with('success', '?????????? ???????? ???? ???????????? ?????? ????');
    }

//    update
    public function edit(Product $product, Category $category)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $trainers = Trainer::all();
        return view('Admin.Partials._EditProduct', compact(['product', 'categories', 'tags', 'trainers']));
    }

    public function update(AdminProductRequest $request, Product $product)
    {

        if ($request->image !== null) {
            $oldImages = $product->image;
            foreach ($oldImages as $oldImage) {
                $oldFile_img = public_path("/images/Products/{$oldImage}");
                File::delete($oldFile_img);
            }

            $newImages = $request->file('image');

            foreach ($newImages as $newImage) {
                $extension = $newImage->getClientOriginalName();
                $image = $extension;
                $newImage->move("Images/Products/", $image);

                $images[] = $image;

            }


            $product->update([
                'title' => $request->title,
                'description' => $request->description,
                'extra_description' => $request->extra_description,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'off' => $request->off,
                'trainer_id' => $request->trainer_id,
                'duration' => $request->duration,
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
            return redirect()->route('Admin-Products')->with('success', '?????????????? ???? ???????????? ?????????? ????????');
        } elseif ($request->image == null) {
            $product->update([
                'title' => $request->title,
                'description' => $request->description,
                'extra_description' => $request->extra_description,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'off' => $request->off,
                'trainer_id' => $request->trainer_id,
                'duration' => $request->duration,
                'year' => $request->year,
            ]);


            if (isset($request->tags)) {
                $product->tags()->sync($request->tags);
            } else {
                $product->tags()->sync(array());

            }

            return redirect()->route('Admin-Products')->with('success', '?????????????? ???? ???????????? ?????????? ????????');
        } else
            return redirect()->back()->with('success', '???????????? ?????????? ??????');
    }

//    delete
    public function deleteProduct(Product $product)
    {
        $images = $product->image;
        foreach ($images as $image) {
            $file_img = public_path("/images/products/{$image}");
            File::delete($file_img);
        }

        $demo = $product->demo;
        $file_demo = public_path("/videos/Products/{$demo}");
        File::delete($file_demo);
        $product->delete();
        return redirect()->back()->with('success', '?????????? ???????? ?????? ???????? ?????? ???? ???????????? ??????  ????');
    }
}
