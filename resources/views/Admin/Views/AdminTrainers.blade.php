@extends('Admin.Panel')

@section('Admin.Content')
    <div class="col-12 mb-3">
        <h1 class="text-dark"> مدیریت تمرین دهنده ها</h1>
        <button class="btn btn-block btn-warning" data-toggle="modal"
                data-target="#AddTrainer">وارد کردن تمرین دهنده جدید
        </button>
    </div>
    <div class="col-12">

        <table class="table table-hover table-striped table-dark">
            <thead>
            <tr class="text-warning">
                <th scope="col">#</th>
                <th scope="col">نام تمرین دهنده</th>
                <th scope="col">تصویر</th>
                <th scope="col">عملیات حذف</th>
                <th scope="col">عملیات ویرایش</th>

            </tr>
            </thead>
            <tbody>
            @foreach($trainers as $trainer)

                <tr>
                    <th scope="row">{{$trainer->id}}</th>
                    <td>{{$trainer->name}}</td>
                    <td>{{$trainer->image}}</td>
                    <td>
                        <form action="{{route('Delete-Trainer' , $trainer->name)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn
                             btn-outline-danger">حذف
                            </button>
                        </form>
                    </td>

                    <td>
                        <a href="{{route('edit-Trainer', $trainer->name)}}" class="btn
                             btn-outline-info">ویرایش
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>
@endsection

@include('Admin.Partials._AddTrainer')
