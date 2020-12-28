@extends('Admin.Layouts.Parent')

@section('AdminContent')
    <div class="app-content content">

        <div class="content-wrapper">
            <div class="content-body">

                <div class="col-12 mb-3">
                    <h1>مدیریت کاربران</h1>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-hover table-striped table-dark">
                            <thead>
                            <tr class="text-warning">
                                <th scope="col">#</th>
                                <th scope="col">نام</th>
                                <th scope="col">نام خانوادگی</th>
                                <th scope="col">پست الکترونیکی</th>
                                <th scope="col">شماره همراه</th>
                                <th scope="col">تاریخ ثبت نام</th>
                                <th scope="col">تعداد سفارشات کاربر</th>
                                <th scope="col">حذف کاربر</th>
                                <th scope="col">ویرایش کاربر</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td>
                                        {{$user->family}}
                                    </td>

                                    <td>
                                        {{$user->email}}
                                        @if(! $user->email)
                                            <span class="badge badge-danger">تایید نشده</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{$user->phone}}
                                    </td>

                                    <td>
                                        {{$user->created_at}}
                                    </td>

                                    <td class="text-center">
                                        @if(count($user->orders))
                                            {{count($user->orders)}}
                                        @else
                                            بدون سفارش
                                        @endif
                                    </td>

                                    <td>
                                        <form action="{{route('Delete-User' , $user->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn
                btn-outline-danger">حذف
                                            </button>
                                        </form>
                                    </td>

                                    <td>
                                        <a href="{{route('Edit-User' , $user->id)}}"
                                           class="btn
                btn-outline-info mb-2 disabled"
                                        >ویرایش</a>
                                    </td>

                                </tr>

                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
