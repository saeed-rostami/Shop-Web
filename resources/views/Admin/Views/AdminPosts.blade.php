@extends('Admin.Panel')

@section('Admin.Content')
    <div class="col-12 mb-3">
        <h1 class="text-dark">مدیریت زیر دسته ها</h1>
        <button class="btn btn-block btn-warning" data-toggle="modal"
                data-target="#AddPostModal">وارد کردن زیر دسته جدید</button>
    </div>
    <div class="col-12">

        <table class="table table-hover table-striped table-dark">
            <thead>
            <tr class="text-warning">
                <th scope="col">#</th>
                <th scope="col">تیتر </th>
                <th scope="col"> دسته</th>
                <th scope="col"> تصویر</th>
                <th scope="col"> عملیات حذف</th>
                <th scope="col"> عملیات ویرایش</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)

                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category->title}}</td>


                    
                    @if ($post->image)
                    <td>
                        <a href="{{ asset('images/posts/' . $post->image) }}">نمایش</a></td>
            
                    @endif

                    <td>
                        <form action="{{route('Delete-Post' , $post->title)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn
                             btn-outline-danger">حذف
                            </button>
                        </form>
                    </td>

                    <td>
                            <a href="{{route('edit-post', $post->id)}}" class="btn
                             btn-outline-info">ویرایش
                            </a>
                    </td>


                </tr>
            @endforeach

            </tbody>
        </table>

    </div>
@endsection

@include('Admin.Partials._AddPost')


