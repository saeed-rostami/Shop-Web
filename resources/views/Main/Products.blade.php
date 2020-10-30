@extends('Layouts.Parent')

@section('Content')
    @includeIf('Partials._messages')

    <div class="container">
            @includeIf('Partials._breadcrumb')
            <h2 class="product-count text-white-50 badge badge-pill">تعداد محصولات : {{$counts}}  </h2>

    <div class="row">
        @foreach($products as $product)
        <div class="col-10 mx-auto my-3 col-md-6 col-lg-3 animate__animated
               animate__fadeIn">
            <div class="card products-card">
                <a href="{{route('Product' , [$product->post->category->title, $product->post->title , $product->slug])}}">

                    <img loading="lazy" src="{{asset("images/Products/placeholder.png")}}" data-src="{{asset('/images/products/'.array_values($product->image)[0])}}"
                         class="img-fluid" alt="">

                </a>

                <!--footer-->
                <div class="d-flex flex-column justify-content-around text-center">
                    <p class="text-white-50 font-weight-bold">{{Str::limit($product->title ,'25')
                    }}</p>
                    <div class="card-footer text-capitalize d-flex flex-column text-muted">
                        <span class="car-price">قیمت :  {{$product->price}} تومان </span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center align-content-center mb-1">
                        <form method="post" action="{{route('AddProduct')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <input type="hidden" name="title" value="{{$product->title}}">
                            <input type="hidden" name="price" value="{{$product->price}}">
                            <input type="hidden" name="coach" value="{{$product->coach}}">

                            <input type="hidden" name="slug" value="{{$product->slug}}">
                            <input type="hidden" name="post" value="{{$product->post->title}}">
                            <input type="hidden" name="cat" value="{{$product->post->category->title}}">

                            <input type="hidden" name="image" value="{{json_encode($product->image[0])}}">

                            <button type="submit" class="btn btn-sm btn-block custom-btn">
                                <img src="{{asset
                                ('images/add-to-basket.png')}}" alt="" style="width: 48px;
                                height: 48px">

                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
</div>
@endsection

@push('Products.css')
    <link rel="stylesheet" href="{{asset('CSS/Products/Products.css')}}">
@endpush
