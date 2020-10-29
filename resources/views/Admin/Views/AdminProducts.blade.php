@extends('Admin.Panel')

@section('Admin.Content')
    <div class="col-12 mb-3">
        <h1 class="text-dark">مدیریت محصولات</h1>
        <button class="btn btn-block btn-warning" data-toggle="modal"
                data-target="#AddProduct">وارد کردن محصول جدید
        </button>
    </div>
    <div class="col-12">

        <table class="table table-hover table-striped table-dark">
            <thead>
            <tr class="text-warning">
                <th scope="col">#</th>
                <th scope="col">تیتر محصول</th>
                <th scope="col"> رشته ورزشی</th>
                <th scope="col">دسته ورزشی</th>
                <th scope="col">آموزش دهندگان</th>
                <th scope="col">قیمت</th>
                <th scope="col">سال انتشار</th>
                <th scope="col"> عملیات حذف</th>
                <th scope="col"> عملیات ویرایش</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)

                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->title}}</td>
                    <td>{{$product->post->title}}</td>
                    <td>{{$product->post->category->title}}</td>
                    <td>{{$product->coach}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->year}}</td>
                    <td>
                        <form action="{{route('Delete-Product' , $product->title)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn
                             btn-outline-danger">حذف
                            </button>
                        </form>
                    </td>

                    <td>
                        <a href="{{route('edit-product' , $product->id)}}" class="btn
                             btn-outline-info">ویرایش
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>
@endsection

@include('Admin.Partials._AddProduct')

