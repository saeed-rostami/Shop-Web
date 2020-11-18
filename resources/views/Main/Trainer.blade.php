@extends('Layouts.Parent')

@section('Title')
    آموزش های
    {{$trainer->name}}
@endsection

@section('Content')
    @includeIf('Partials._breadcrumb')
    <h2 class="product-count text-white-50 badge badge-pill">تعداد آموزش : {{count($trainer->products)}}  </h2>


    <div class="row shadow">
        <div class="my-3 col-12 col-sm-12 col-md-6  col-lg-8 col-xl-8 text-white">
            <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut commodi dolore eligendi enim eos eum
                eveniet laboriosam magnam, neque nulla omnis placeat possimus quas qui quos ratione repellendus
                voluptates voluptatibus.</h5>
        </div>

        <div class="col-12 col-sm-12 col-md-6  col-lg-4 col-xl-4">
            <img laoding="lazy"
                 src="{{asset("images/Trainers/".$trainer->image)}}"
                 class="img-fluid rounded-circle shadow"
                 alt="">
        </div>
    </div>

    <div class="d-flex justify-content-center my-3">
        <h4 class="text-white"> {{$trainer->name}}  دوره های  </h4>
    </div>


    <div class="row my-3 shadow">
        @foreach($trainer->products as $product)
            <div class="my-3 col-sm-6 col-md-6 col-lg-3 col-xl-3 animate__animated
               animate__fadeIn">
                <div class="card products-card">
                    <a href="{{route('Product' , [$product->post->category->title, $product->post->title , $product->slug])}}">

                        <img src="{{asset('/images/products/'.array_values($product->image)[0])}}"
                             class="img-fluid" alt="">

                    </a>

                    <!--footer-->
                    <div class="d-flex flex-column justify-content-around text-center">
                        <p class="text-white-50 font-weight-bold">{{Str::limit($product->title ,'25')
                    }}</p>
                        <div class="card-footer text-capitalize d-flex flex-column">
                            <h5 class="car-price purple-bg rounded text-white-50">قیمت : {{$product->price}}
                                تومان </h5>
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
@endsection

