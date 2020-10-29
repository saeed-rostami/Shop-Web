@extends('Admin.Panel')

@section('Admin.Content')
    <div class="col-12 mb-3">
        <h1 class="text-dark">مدیریت دسته بندی</h1>
        <button class="btn btn-block btn-warning" data-toggle="modal"
                data-target="#AddCategoryModal">وارد کردن دسته بندی جدید
        </button>
    </div>
    <div class="col-12">

        <table class="table table-hover table-striped table-dark">
            <thead>
            <tr class="text-warning">
                <th scope="col">#</th>
                <th scope="col">تیتر دسته بندی</th>
                <th scope="col">عملیات حذف</th>
                <th scope="col">عملیات ویرایش</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>
                        {{$category->title}}
                    </td>
                    <td>
                        <form action="{{route('Delete-Category' , $category->title)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn
                             btn-outline-danger">حذف
                            </button>
                        </form>
                    </td>

                    <td>
                        <a href="{{route('edit-category' , $category->id)}}"
                           class="btn
                             btn-outline-info"
                        >ویرایش</a>
                    </td>

                </tr>

            @endforeach

            </tbody>
        </table>

    </div>
@endsection


@include('Admin.Partials._AddCategory')



