@extends('Layouts.Parent')

@section('Content')
    @includeIf('Partials._messages')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="img">
                    <div class="lazy">
                        @foreach($product->image as $image)
                            <div>
                                <img loading="lazy" src="{{asset("images/Products/placeholder.png")}}"
                                     data-src="{{asset("/Images/Products/".$image)}}"
                                     class="img-fluid rounded"
                                     alt="">
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 d-flex flex-column justify-content-around">
                <div class="info text-white text-center">
                    <h1>{{$product->title}}</h1>
                    <p class="text-muted">{{$product->description}}</p>
                </div>

                <div class="act d-flex justify-content-around text-white">
                    <span>{{$product->price}}</span>
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

                        <button type="submit" class="btn add-too-card-btn
                    ">
                            <img src="{{asset('images/add-to-basket.png')}}" alt="" style="width: 48px;height: 48px">
                            اضافه
                            کردن به سبد خرید
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('Products.css')
    <link rel="stylesheet" href="{{asset('CSS/Products/Products.css')}}">
@endpush
