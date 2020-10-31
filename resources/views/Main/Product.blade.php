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
                {{--tags--}}
            <div class="black-bg rounded">
                <img src="{{asset('images/tag.png')}}" alt="">
                <div class="d-flex justify-content-end text-muted">
                    @foreach($product->tags as $tag)
                        <a href="#" class="mr-1"><span class="purple">{{$tag->name}}</span></a>
                    @endforeach
                </div>
            </div>
                {{--tags--}}
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 d-flex flex-column justify-content-around">
                <div class="info text-white text-center shadow">
                    <h1>{{$product->title}}</h1>
                    <p class="text-muted">{{$product->description}}</p>
                </div>

                <div class="d-flex flex-column align-items-end black rounded shadow p-2 mb-3">
                    <h3 class="text-muted text-center">مشخصات</h3>

                    <div class="text-white ml-1 d-flex">
                        <h5 class="text-muted ">{{$product->price}}  تومان </h5>
                        <span class="purple font-weight-bold"> : قیمت</span>
                    </div>

                    <div class="text-white ml-1 d-flex ">
                        <h5 class="text-muted ">30000$ </h5>
                        <span class="purple font-weight-bold">: قیمت در آمازون</span>
                    </div>

                    <div class="text-white ml-1 d-flex">
                        <h5 class="text-muted ">{{$product->year}}  </h5>
                        <span class="purple font-weight-bold"> : سال انتشار</span>
                    </div>

                    <div class="text-white ml-1 d-flex">
                        <h5 class="text-muted ">{{$product->coach}}  </h5>
                        <span class="purple font-weight-bold"> : گردآورنده</span>
                    </div>

                    <div class="text-white ml-1 d-flex">
                        <h5 class="text-muted ">{{$product->coach}}  </h5>
                        <span class="purple font-weight-bold"> : مدت آموزش</span>
                    </div>

                </div>

                <div class="act d-flex justify-content-around text-white">
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

                        <button type="submit" class="btn custom-btn
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
