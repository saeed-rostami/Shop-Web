<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Http\Requests\AdminPostRequest;

class PostsController extends Controller
{
//    index
    public function posts()
    {
        $categories = Category::all();
        $posts = Post::all();
        $products = Product::all();
        return view('Admin.Views.AdminPosts', compact(['categories', 'posts', 'products']));
    }

//    store
    public function storePost(AdminPostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->category_id = $request->category_id;

        $image = $request->file('image');
        $title = $request->title;
        $extension = $image->getClientOriginalExtension();
        $fileName = time() . '.' . $title . '.' . $extension;
        $image->move("Images/Posts/", $fileName);


        $post->image = $fileName;
        $post->save();
        $img = Image::make(public_path('/images/posts/' . $fileName))->resize('340', '255');
        $img->save();
        return redirect()->back()->with('success', 'رشته ورزشی جدید با موفقیت ثبت شد');
    }

    //update
    public function edit(Post $post, Category $category)
    {
        $categories = Category::all();
        return view('Admin.Partials._EditPost', compact(['post', 'categories']));
    }

    public function update(AdminPostRequest $request, Post $post)
    {
        if ($request->image !== null) {
            $oldImage = $post->image;
            $oldFile_img = public_path("/images/Posts/{$oldImage}");
            File::delete($oldFile_img);

            $newImage = $request->file('image');
            $title = $request->title;

            $extension = $newImage->getClientOriginalExtension();
            $image = $title . "." . $extension;
            $newImage->move("Images/Posts/", $image);

            $post->update([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'image' => $image
            ]);

            $img = Image::make(public_path('/images/posts/' . $image))->resize('340', '255');
            $img->save();

            return redirect()->route('Admin-Posts')->with('success', 'تغییرات با موفقیت اعمال شدند');
        } elseif ($request->image == null) {
            $post->update([
                'title' => $request->title,
                'category_id' => $request->category_id,
            ]);
            return redirect()->route('Admin-Posts')->with('success', 'تغییرات با موفقیت اعمال شدند');
        } else
            return redirect()->back()->with('success', 'تغییری اعمال نشد');
    }

//    delete
    public function deletePost(Post $post)
    {
        $file_img = public_path("/images/posts/{$post->image}");
        File::delete($file_img);
        $post->delete();
        return redirect()->back()->with('success', 'رشته ورزشی مورد نظر با موفقیت حذف  شد');
    }

}
