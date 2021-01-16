@extends('Admin.Layouts.Parent')

@section('AdminContent')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <table class="table table-hover">

                            <hr>

                            <thead>
                            <tr>
                                <th>شماره سفارش</th>
                                <th>شناسه سفارش</th>
                                <th>خریدار</th>
                                <th>وضعیت پرداخت</th>
                                <th>تاریخ پرداخت</th>
                                <th>مبلغ سفارش</th>
                                <th>وضعیت ارسال</th>
                                <th>شناسه مرسوله</th>
                                <th> جزئیات سفارش</th>
                            </tr>

                            </thead>
                            <tbody>

                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>
                                        {{$order->refID}}
                                    </td>
                                    <td>{{$order->user->fullname}}</td>
                                    <td><strong class="badge badge-{{$order->status ? 'success' : 'danger'}}">

                                            @if($order->status)
                                                پرداخت شده
                                            @else
                                                پرداخت نشده
                                            @endif


                                        </strong></td>

                                    <td><strong class="label
                                    label-danger">{{$order->created_at}}</strong></td>

                                    <td><strong>{{$order->total}}</strong></td>
                                    <td>
                                        @if($order->ship_status === null)
                                            <strong class="badge badge-warning">در حال بررسی</strong>
                                        @elseif($order->ship_status === 1)
                                            <strong class="badge badge-success">رسال شد</strong>

                                        @else
                                            <strong class="badge badge-danger">ارسال نشد</strong>

                                        @endif
                                    </td>

                                    <td>
                                        {{$order->ship_id}}
                                    </td>

                                    <td>
                                        <a href="{{route('Admin-Order' , $order->id)}}" type="button" class="btn
                                        btn-warning">
                                            <span></span> جزئیات
                                        </a>
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
