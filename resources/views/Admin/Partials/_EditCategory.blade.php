@extends('Admin.Panel')

@section('Admin.Content')
    <div class="container">
        <form class="form" action="{{route('Update-Category' , $category->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">
                    تیتر
                </label>
                <input type="text" value="{{$category->title}}" name="title" class="form-control">

            </div>

            <div class="form-group">
                <label for="image">
                    تصویر
                </label>
                <input type="file" name="image" class="form-control-file">
            </div>

            <div class="form-group">
                <button class="btn btn-block btn-info" type="submit">ثبت تغییرات</button>
            </div>
        </form>
    </div>
@endsection
