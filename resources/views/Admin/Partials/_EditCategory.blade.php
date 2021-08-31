@extends('Admin.Layouts.Parent')

@section('AdminContent')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">
                <div class="container">
                    <form class="form" action="{{route('Update-Category' , $category->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">
                                تیتر
                            </label>
                            <input type="text" value="{{$category->title}}" name="title" class="form-control">

                        </div>

                        <div class="form-group row">
                            <select name="parent_id" class="form-control">
                                <option value="" disabled selected>دسته ورزشی را انتخاب کنید</option>
                                @foreach($categories as $cat)
                                    <option
                                        @if($category->parent)
                                        {{($cat->id == $category->parent->id) ? 'selected' : ''}}
                                            @endif
                                        value="{{$cat->id}}">{{$cat->title}}</option>
                                @endforeach

                            </select>
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

            </div>

        </div>
    </div>
@endsection
