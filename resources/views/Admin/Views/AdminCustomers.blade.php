@extends('Admin.Layouts.Parent')

@section('AdminContent')
<div class="app-content content">

    <div class="content-wrapper">
        <div class="content-body">

            <div class="col-12 mb-3">
                <h1>مدیریت مشتریان</h1>
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
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <th scope="row">{{$customer->id}}</th>
                            <td>
                                {{$customer->name}}
                            </td>
                            <td>
                                {{$customer->family}}
                            </td>

                            <td>
                                {{$customer->email}}
                                @if($customer->email &&  $customer->email_verified_at === null)
                                    <span class="badge badge-danger">تایید نشده</span>
                                @elseif(! $customer->email)
                                    <span class="badge badge-info">ایمیل واردنشده</span>
                                @endif
                            </td>

                            <td>
                                {{$customer->phone}}
                            </td>

                            <td>
                                {{$customer->created_at}}
                            </td>

                            <td class="text-center">
                                @if(count($customer->orders))
                                {{count($customer->orders)}}
                                @else
                                بدون سفارش
                                @endif
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
