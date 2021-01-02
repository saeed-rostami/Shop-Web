@extends('Layouts.Parent')

@section('Content')
    <div class="col-12 rounded black-bg">
        <h3 class="text-white">فاکتورها</h3>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-responsive-stack" id="tableOne">

                <thead>
                <tr class="text-white-50">
                    <th>محصولات خریداری شده
                        <img style="width: 40px; height: 40px"
                             src="{{asset('images/product.png')}}" alt="">
                    </th>

                    <th>شماره تراکنش
                        <img style="width: 40px; height: 40px"
                             src="{{asset('images/transaction.png')}}" alt="">
                    </th>

                    <th>تاریخ سفارش
                        <img style="width: 40px; height: 40px"
                             src="{{asset('images/date.png')}}" alt="">
                    </th>
                    <th>وضعیت
                        <img style="width: 40px; height: 40px"
                             src="{{asset('images/check.png')}}" alt="">
                    </th>
                    <th> مبلغ سفارش
                        <img style="width: 40px; height: 40px"
                             src="{{asset('images/price.png')}}" alt="">
                    </th>


                </tr>

                </thead>
                <tbody>

                @foreach($user->orders as $order)
                    <tr class="text-white-50">
                        <td>
                            @foreach($order->products as $product)
                                <a style="text-decoration: none" href="{{route('Product' , [$product->post->category->title,
                            $product->post->title,
                            $product->slug])}}">
                                    <strong>{{$product->title}} <br></strong>
                                </a>
                            @endforeach
                        </td>

                        <td>
                            @if($order->refID)
                                <strong>{{$order->refID}}</strong>
                            @else
                                <strong>تراکنشی ثبت نشده</strong>
                            @endif

                        </td>

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
                            <strong>{{$order->total}}</strong>
                        </td>


                    </tr>

                @endforeach
                </tbody>
            </table>

        </div>

    </div>




@endsection

