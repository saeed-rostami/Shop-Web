@extends('Layouts.Parent')

@section('Content')
    @includeIf('Partials._emailActivationAlert')
    <div class="text-muted row">
        <div class="col-12 col-md-6 rounded black-bg">
            <h3 class="text-white-50">مشخصات کاربری</h3>

            <strong> نام : {{$user->name}}<img class="mt-2" style="width: 40px; height: 40px"
                                               src="{{asset('images/test-account.png')}}"
                                               alt=""></strong>
            <br>
            <strong> نام خانوادگی : {{$user->family}}<img class="mt-2" style="width: 40px; height: 40px"
                                                          src="{{asset('images/family.png')}}" alt=""></strong>
            <br>

            @includeIf('Partials._emailActivationBadge')

            <strong>{{$user->email}} : پست الکترونیکی <img class="mt-2" style="width: 40px; height: 40px"
                                                           src="{{asset('images/email.png')}}" alt=""></strong>
            <br>

            <strong>{{$user->phone}} : شماره همراه <img class="mt-2" style="width: 40px; height: 40px"
                                                        src="{{asset('images/phone.png')}}" alt=""></strong>
            <br>

            <strong>{{$user->created_at}} : تاریخ عضویت <img class="mt-2" style="width: 40px; height: 40px"
                                                             src="{{asset('images/date.png')}}" alt=""></strong>
        </div>

        {{--order--}}
        <div class="col-12 col-md-6 rounded black-bg">
            <h3 class="text-white-50">فاکتورها</h3>

            <table class="table table-hover">

                <hr>

                <thead>
                <tr>
                    <th>تاریخ سفارش
                        <img style="width: 40px; height: 40px"
                             src="{{asset('images/date.png')}}" alt="">
                    </th>
                    <th>وضعیت
                        <img style="width: 40px; height: 40px"
                             src="{{asset('images/check.png')}}" alt="">
                    </th>
                    <th> جزئیات سفارش
                        <img style="width: 40px; height: 40px"
                             src="{{asset('images/detail.png')}}" alt="">
                    </th>
                </tr>

                </thead>
                <tbody>

                @foreach($user->orders as $order)
                    <tr>
                        <td>
                            <strong>{{$order->created_at}}</strong>

                        </td>
                        <td><strong class="badge badge-{{$order->status ? 'success' : 'danger'}}">

                                @if($order->status)
                                    پرداخت شده
                                @else
                                    پرداخت نشده
                                @endif


                            </strong></td>
                        <td>

                            <a class="btn purple toggle"
                            >
                                <strong>جزئیات</strong>
                            </a>

                        </td>

                    </tr>


                    @include('Partials._orderDetailUserProfile')

                @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection
