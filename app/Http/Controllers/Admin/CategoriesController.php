<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategoryRequest;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
//    index
    public function categories()
    {
        $categories = Category::query()->orderByDesc('created_at')->paginate('20');
        return view('Admin.Views.AdminCategories', compact('categories'));
    }

//    store
    public function storeCategory(Request $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->parent_id = $request->parent_id;
        $image = $request->file('image');
        $title = $request->title;
        $extension = $image->getClientOriginalExtension();
        $fileName = $title . '.' . $extension;
        $image->move("Images/Categories/", $fileName);

        $category->image = $fileName;
        $category->save();
        $img = Image::make(public_path('/images/categories/' . $fileName))->resize('525', '295');
        $img->save();
        return redirect()->back()->with('success', 'دسته ورزشی جدید با موفقیت ثبت شد');
    }


//update
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('Admin.Partials._EditCategory', compact(['category' , 'categories']));
    }

    public function update(AdminCategoryRequest $request, Category $category)
    {
        dd($request->all());
        if ($request->image !== null) {
            $oldImage = $category->image;
            $oldFile_img = public_path("/images/categories/{$oldImage}");
            File::delete($oldFile_img);

            $newImage = $request->file('image');
            $title = $request->title;

            $extension = $newImage->getClientOriginalExtension();
            $image = $title . "." . $extension;
            $newImage->move("Images/Categories/", $image);

            $category->update([
                'title' => $request->title,
                'image' => $image,
                'parent_id' => $request->parent_id
            ]);

            $img = Image::make(public_path('/images/categories/' . $image))->resize('525', '295');
            $img->save();

            return redirect()->route('Admin-Categories')->with('success', 'تغییرات با موفقیت اعمال شدند');
        } elseif ($request->image == null) {
            $category->update([
                'title' => $request->title,
                'parent_id' => $request->parent_id

            ]);
            return redirect()->route('Admin-Categories')->with('success', 'تغییرات با موفقیت اعمال شدند');
        } else
            return redirect()->back()->with('success', 'تغییری اعمال نشد');
    }

//    delete
    public function deleteCategory(Category $category)
    {
        $file_img = public_path("/images/categories/{$category->image}");
        File::delete($file_img);
        $category->delete();
        return redirect()->back()->with('success', 'دسته ورزشی مورد نظر با موفقیت حذف شد');
    }
}
