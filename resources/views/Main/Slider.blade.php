<div class="container">
    <div class="row m-3">
        <div class="choose-field col d-flex flex-wrap text-uppercase justify-content-center align-items-center shadow">
            <h3 class="font-weight-bold align-self-center mx-1 text-light text-dynamic ">
                آخرین آموزش های اضافه شده در سایت</h3>
        </div>

    </div>


    <div class="responsive">
        @foreach($prods as $prod)
            <div class="card car-card ml-2">
                <a href="{{route('Product', [$prod->post->category->title, $prod->post->title,  $prod->slug])}}">
                    <img src="{{asset
                    ('/images/products/'.array_values($prod->image)[0])}}" class="img-fluid
                    slider-img" alt="">
                </a>

                <!--footer-->
                <div class="card-footer text-capitalize d-flex flex-column justify-content-around align-items-center text-white-50">
                    <p>{{Str::limit($prod->title ,'25')
                    }}</p>

                    <div class="purple-bg rounded p-2">
                        <h5 class="text-white-50">قیمت :  {{$prod->price}} تومان </h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>




