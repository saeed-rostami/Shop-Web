<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminTrainerRequest;
use App\Http\Resources\Product;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Trainer;
use Illuminate\Http\Request;

class TrainersController extends Controller
{
    public function index()
    {
        $trainers = Trainer::all();
        return view('Admin.Views.AdminTrainers', compact('trainers'));
    }

//store
    public function storeTrainer(AdminTrainerRequest $request)
    {
        $trainer = new Trainer();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $request->name;
            $extension = $image->getClientOriginalExtension();
            $fileName = time() . '.' . $name . '.' . $extension;
            $image->move("Images/Trainers/", $fileName);

            $trainer->name = $request->name;
//            $trainer->description = $request->description;
            $trainer->image = $fileName;
            $trainer->save();
            $img = Image::make(public_path('/images/trainers/' . $fileName))->resize('300', '300');
            $img->save();
        } else {
            $trainer->name = $request->name;
//            $trainer->description = $request->description;
            $trainer->save();
        }


        return redirect()->back()->with('success', 'تمرین دهنده جدید با موفقیت ثبت شد');
    }

//edit
    public function edit(Trainer $trainer)
    {
        return view('Admin.Partials._EditTrainer', compact('trainer'));
    }

//update
    public function update(AdminTrainerRequest $request, Trainer $trainer)
    {

        if ($request->image !== null) {
            $oldImage = $trainer->image;
            $oldFile_img = public_path("/images/trainers/{$oldImage}");
            File::delete($oldFile_img);

            $newImage = $request->file('image');
            $name = $request->name;

            $extension = $newImage->getClientOriginalExtension();
            $image = $name . "." . $extension;
            $newImage->move("Images/trainers/", $image);

            $trainer->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image
            ]);
            $trainer->save();


            $img = Image::make(public_path('/images/trainers/' . $image))->resize('300', '300');
            $img->save();

            return redirect()->route('Admin-Trainer')->with('success', 'تغییرات با موفقیت اعمال شدند');
        } elseif ($request->image == null) {
            $oldImage = $trainer->image;
            $oldFile_img = public_path("/images/trainers/{$oldImage}");
            File::delete($oldFile_img);

            $trainer->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => null
            ]);
            $trainer->save();
            return redirect()->route('Admin-Trainer')->with('success', 'تغییرات با موفقیت اعمال شدند');
        } else
            return redirect()->back()->with('success', 'تغییری اعمال نشد');
    }

//    delete
    public function deleteTrainer(Trainer $trainer)
    {
        $file_img = public_path("/images/trainers/{$trainer->image}");
        File::delete($file_img);
        $trainer->delete();
        return redirect()->back()->with('success', 'تمرین دهنده مورد نظر با موفقیت حذف شد');
    }
}
