<div class="container">
    <div class="row mb-2">
        <div class="choose-field col d-flex flex-wrap text-uppercase justify-content-center align-items-center shadow">
            <h3 class="font-weight-bold align-self-center mx-1 text-light text-dynamic ">
                آخرین آموزش های اضافه شده در سایت</h3>
        </div>

    </div>


    <div class="responsive">
        @foreach($prods as $prod)
            <div class="card car-card ml-2">
                <a href="{{route('Product', [$prod->post->category->title, $prod->post->title,  $prod->slug])}}">
                    <img loading="lazy" src="{{asset("images/placeholder-slider.png")}}"  data-src="{{asset
                    ('/images/products/'.array_values($prod->image)[0])}}" class="img-fluid
                    slider-img" alt="">
                </a>

                <!--footer-->
                <div class="card-footer text-capitalize d-flex flex-column justify-content-around text-white-50">
                    <p>{{Str::limit($prod->title ,'25')
                    }}</p>
                    <span class="car-price">{{$prod->coach}} : گرد آورنده</span>
                    <span class="car-price">قیمت :  {{$prod->price}} تومان </span>
                </div>
            </div>
        @endforeach
    </div>

</div>




