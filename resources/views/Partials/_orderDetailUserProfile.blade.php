<div class="collapse position-absolute rounded" id="collapseExample" style="width: 50%">
    <div class="card card-body bg-light">
        <strong>مبلغ سفارش <img style="width: 40px; height: 40px"
                                src="{{asset('images/price.png')}}" alt=""></strong>
        <span
            class="badge badge-success"> {{$order->total}}</span>
        <hr>
            <strong> محصولات خریداری شده
                <img style="width: 40px; height: 40px"
                     src="{{asset('images/product.png')}}" alt="">
            </strong>
        @foreach($order->products as $product)

        <strong class="badge badge-success mt-1"><a
                    style="text-decoration: none"
                    class="text-white"
                    href="{{route('Product' ,
                                        [$product->post->category->title, $product->post->title,  $product->slug])}}">{{$product->title}}</a>
            </strong>
        @endforeach
    </div>
</div>
