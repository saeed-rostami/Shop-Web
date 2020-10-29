<header>
    <nav id='cssmenu'>

        <div class="logo d-lg-flex justify-content-center d-none"><a href="{{route('Home')}}"><h3
                    class="brand-title">فروشگاه</h3>
            </a>
            <img class="rounded-circle" src="{{asset('images/logo.jpg')}}" alt="">
        </div>
        <div id="head-mobile"></div>
        <div class="button"></div>
        <ul>
            <li><a href='{{route("Home")}}'>صفحه اصلی</a></li>


            <li><a href='#'>آموزش ها</a>
                <ul>
                    @foreach($cats as $cat)
                        <li ><a href='{{route('Category' , $cat->title)}}'>{{$cat->title}}</a>
                            @if($cat->posts->count())
                                <ul>
                                    @foreach($cat->posts as $item)
                                        <li><a href='{{route('Posts', [$cat->title, $item->title])
                                    }}'>{{$item->title}}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </li>


            <li><a href='#'>ارتباط با ما</a></li>


            @guest()
                <li class="mr-lg-5 d-none d-lg-block"><a type="button" href="" data-toggle="modal"
                                                         data-target="#RegisterModal">
                        <img src="{{asset('images/sign-up.png')}}" alt="" style="width: 38px; height: 38px">
                        ثبت نام</a>
                </li>

                <li class="d-none d-md-block"><a type="button" href="" data-toggle="modal"
                                                 data-target="#LoginModal">

                        <img src="{{asset('images/login-rounded-right.png')}}" alt="" style="width: 38px; height: 38px">


                        ورود</a></li>
            @endguest

            @auth()
                <div class="d-none d-lg-block">
                    @include('Partials._basketShop')
                    @include('Partials.dropdown')
                </div>
            @endauth

        </ul>


        @guest()
            <div class="d-lg-none logo d-flex justify-content-start">

                <a class="d-lg-inline-block nav-link p-0 ml-3" type="button" href="" data-toggle="modal"
                   data-target="#LoginModal"
                   role="button">
                    <img src="{{asset('images/login-rounded-right.png')}}" alt="" style="width: 38px; height: 38px">
                    <span>ورود</span>
                </a>
                <a class="d-lg-inline-block nav-link p-0 mr-2" type="button" href="" data-toggle="modal"
                   data-target="#RegisterModal" role="button">
                    <img src="{{asset('images/sign-up.png')}}" alt="" style="width: 38px; height: 38px">

                    <span>ثبت نام</span>
                </a>
            </div>
        @endguest

        @auth()
            <div class="d-lg-none logo d-flex justify-content-start">
                @include('Partials._basketShop')
                @include('Partials.dropdown')
            </div>
        @endauth
    </nav>


</header>

@includeIf('auth.Registermodal')
@includeIf('auth.Loginmodal')
