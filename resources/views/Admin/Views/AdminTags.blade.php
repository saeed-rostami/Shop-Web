@extends('Admin.Panel')

@section('Admin.Content')
    <div class="col-12 mb-3">
        <h1 class="text-dark">مدیریت برچسب ها</h1>
        <button class="btn btn-block btn-warning" data-toggle="modal"
                data-target="#AddTag">وارد کردن برچسب جدید
        </button>
    </div>
    <div class="col-12">

        <table class="table table-hover table-striped table-dark">
            <thead>
            <tr class="text-warning">
                <th scope="col">#</th>
                <th scope="col">نام برچسب</th>
                <th scope="col">عملیات حذف</th>
                <th scope="col">عملیات ویرایش</th>

            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)

                <tr>
                    <th scope="row">{{$tag->id}}</th>
                    <td>{{$tag->name}}</td>
                    <td>
                        <form action="#" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn
                             btn-outline-danger">حذف
                            </button>
                        </form>
                    </td>

                    <td>
                        <a href="#" class="btn
                             btn-outline-info">ویرایش
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>
@endsection

@include('Admin.Partials._AddTag')
