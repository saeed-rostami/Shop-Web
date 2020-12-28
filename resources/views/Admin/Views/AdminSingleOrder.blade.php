@extends('Admin.Layouts.Parent')

@section('AdminContent')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>شماره سفارش</th>
                                <th>شناسه سفارش</th>
                                <th>خریدار</th>
                                <th>وضعیت پرداخت</th>
                                <th>تاریخ پرداخت</th>
                                <th>مبلغ سفارش</th>
                                <th> حذف سفارش</th>
                            </tr>

                            </thead>


                            <tbody>
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
                                    <a href="#" type="button" class="btn
                                        btn-danger">
                                        <span>حذف</span>
                                    </a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                        <hr>
                    </div>
                </div>


                <div class="row">
                    <div class="col-6">
                        <h1 class="my-2 badge badge-info">محصولات سفارش داده شده</h1>
                        @foreach($order->products as $product)
                            <div class="media mb-2">
                                <div class="media-left">
                                    <a href="{{route('Product' ,[$product->post->category->title, $product->post->title,  $product->slug])}}">
                                        <img class="media-object"
                                             src="{{asset('images/products/'.$product->image[0])}}" alt="..."
                                             style="width: 120px; height: 120px;">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$product->title}}</h4>
                                    <h5 class="media-heading">هزار تومان {{$product->price}}</h5>
                                    <h5 class="media-heading">By: {{$product->trainer->name}}</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-6">
                        <h1 class="my-2 badge badge-info">تغییر وضعیت پرداخت</h1>

                        <div>
                            <form action="{{route('Update-Order' , $order->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn
                                        btn-{{$order->status ? 'danger' : 'success'}}">
                                <span>
                                    @if($order->status)
                                        پرداخت نشده
                                    @else
                                        پرداخت شده
                                    @endif</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="col-6 border">
                       <span class="badge badge-info"> مشخصات و آدرس خریدار</span>
                        <h3>{{$order->address}}</h3>
                        <h3>{{$order->user->phone}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
