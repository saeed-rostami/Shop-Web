@extends('Admin.Layouts.Parent')

@section('AdminContent')

    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">
                <div class="container">
                    <form class="form" action="{{route('Update-Trainer' , $trainer->name)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">
                                نام
                            </label>
                            <input type="text" value="{{$trainer->name}}" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="info">
                                بیوگرافی مبارز
                            </label>
                            <input type="text" value="{{$trainer->info}}" name="info" class="form-control">
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
