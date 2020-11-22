

<div class="container d-md-none d-flex justify-content-between black-bg">

    <div>
        <a class="purple" href="{{route('Home')}}">
            فروشگاه
            <img class="rounded-circle ml-1" src="{{asset('images/logo.jpg')}}" alt="">
        </a>
    </div>


    {{--login--}}
@guest()
        <div>
            <a
                class="btn rounded purple font-weight-bold"
                type="button" href="" data-toggle="modal"
                data-target="#RegisterModal">
                ثبت نام</a>
            <a
                class="btn rounded purple font-weight-bold"
                type="button" href="" data-toggle="modal"
                data-target="#LoginModal">
                ورود</a>
        </div>
    @endguest

    @auth()
        <div class="d-flex justify-content-center">
            @include('Partials._basketShop')
            @include('Partials.dropdown')
        </div>
    @endauth

    {{--login--}}

</div>
