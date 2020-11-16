@extends('Layouts.Parent')

@section('Title')
    آموزش
    {{$product->title}}
@endsection

@section('Content')
    <section class="container">
        <div class="row ">
            {{--products-gallery--}}
            <div class="col-12 col-md-6 products-gallery text-white text-center">
                <h1 class=>گالری تصاویر</h1>
                <div class="row">
                    @foreach($product->image as $image)
                        <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4  thumb">
                            <a href="{{asset('Images/Products/'.$image)}}">
                                <figure><img class="img-fluid img-thumbnail" src="{{asset("images/products/".$image)}}"
                                             alt="">
                                </figure>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            {{--end-products-gallery--}}

            {{--products-detail--}}
            <div class="col-12 col-md-6">
                <div class=" d-flex flex-column justify-content-around shadow">
                    <div class="info text-white text-center">
                        <h1>{{$product->title}}</h1>
                        <p class="text-muted">{{$product->description}}</p>
                        <p class="text-muted">{{$product->extra_description}}</p>
                    </div>

                    <div class="d-flex flex-column align-items-end black rounded p-2 mb-3">
                        <h3 class="text-muted text-center">مشخصات</h3>

                        <div class="text-white ml-1 d-flex">
                            <h5 class="text-muted ">{{$product->price}} تومان </h5>
                            <span class="purple font-weight-bold"> : قیمت</span>
                        </div>

                        <div class="text-white ml-1 d-flex">
                            <h5 class="text-muted ">{{$product->off}} تومان </h5>
                            <span class="purple font-weight-bold"> : تخفیف</span>
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
                            <h5 class="text-muted ">{{$product->duration}}  </h5>
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
                                <img src="{{asset('images/add-to-basket.png')}}" alt=""
                                     style="width: 48px;height: 48px">
                                اضافه
                                کردن به سبد خرید
                            </button>
                        </form>
                    </div>
                </div>

                {{--tags--}}
                @include('Partials._productTags')
                {{--tags--}}
            </div>
            {{--end-products-detail--}}

        </div>


    </section>

@endsection


