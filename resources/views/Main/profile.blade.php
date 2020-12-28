@extends('Layouts.Parent')

@section('Content')
    @includeIf('Partials._emailActivationAlert')
    <div class="text-muted row">
        <div class="col-12 col-md-6 rounded black-bg">
            <h3 class="text-white-50">مشخصات کاربری</h3>

            <h5> نام : {{$user->name}}<img style="width: 40px; height: 40px" src="{{asset('images/test-account.png')}}"
                                           alt=""></h5>
            <h5> نام خانوادگی : {{$user->family}}<img style="width: 40px; height: 40px"
                                                      src="{{asset('images/family.png')}}" alt=""></h5>
            @includeIf('Partials._emailActivationBadge')

            <h5>{{$user->email}} : پست الکترونیکی <img style="width: 40px; height: 40px"
                                                       src="{{asset('images/email.png')}}" alt=""></h5>
            <h5>{{$user->phone}} : شماره همراه <img style="width: 40px; height: 40px"
                                                    src="{{asset('images/phone.png')}}" alt=""></h5>
        </div>

        {{--order--}}
        <div class="col-12 col-md-6 rounded black-bg">
            <h3 class="text-white-50">فاکتورها</h3>

            <table class="table table-hover">

                <hr>

                <thead>
                <tr>
                    <th>تاریخ سفارش</th>
                    <th>وضعیت</th>
                    <th> جزئیات سفارش</th>
                </tr>

                </thead>
                <tbody>

                @foreach($user->orders as $order)
                    <tr>
                        <td>{{$order->created_at}}</td>
                        <td><strong class="badge badge-{{$order->status ? 'success' : 'danger'}}">

                                @if($order->status)
                                    پرداخت شده
                                @else
                                    پرداخت نشده
                                @endif


                            </strong></td>
                        <td>

                            <a class="btn purple" data-toggle="collapse" href="#collapseExample" role="button"
                               aria-expanded="false" aria-controls="collapseExample">
                                جزئیات
                            </a>

                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <h5>مبلغ سفارش : <span class="badge badge-success"> {{$order->total}}</span></h5>
                                    <hr>
                                    @foreach($order->products as $product)
                                        <h5> محصولات خریداری شده</h5>
                                        <p class="badge badge-success"><a class="text-dark" href="{{route('Product' ,
                                        [$product->post->category->title, $product->post->title,  $product->slug])}}">{{$product->title}}</a>
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection

