@include('Partials._smExtraNavbar')


<nav class="navbar navbar-expand-lg black-bg w-100">
    {{--logo--}}
    <a class="navbar-brand d-none d-md-block purple" href="{{route('Home')}}">
        <img class="rounded-circle ml-1" src="{{asset('images/razmoamooz.png')}}" alt="" style="width: 75px; height:
        75px">
    </a>
    {{--end--logo--}}


    {{--navtoggler--}}
    <button class="navbar-toggler p-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <i class="fa fa-bars fa-x"></i>
        </span>
    </button>
    {{--end--navtogglec--}}

    {{--nav--itms--}}
    <div class="collapse navbar-collapse ml-4" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">ارتباط با ما <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">درباره ما</a>
            </li>

            {{--first-dropdown--}}
            <li class="nav-item dropdown">
                <a
            href="{{route('AllProducts')}}" class="nav-link dropdown-toggle"
            type="button"
            role="button"
                   id="dropdownMenu1"
                   {{-- data-toggle="dropdown" --}}
                   aria-haspopup="true"
                   aria-expanded="false">
                    آموزش ها
                </a>

                <ul class="dropdown-menu multi-level bg-black text-justify p-0" role="menu"
                    aria-labelledby="dropdownMenu">
                    @foreach($cats as $cat)
                        <li class="dropdown-submenu">
                            <a class="dropdown-item text-white"
                               href='{{route('Category' , $cat->title)}}'>{{$cat->title}}</a>
                            @if($cat->posts->count())

                                <ul class="dropdown-menu text-justify">
                                    @foreach($cat->posts as $item)

                                        <li class="dropdown-submenu "><a class="dropdown-item text-white" href='{{route('Posts', [$cat->title, $item->title])
                                    }}'>{{$item->title}}</a></li>
                                    @endforeach

                                </ul>
                            @endif
                        </li>
                    @endforeach

                </ul>

            </li>
            {{--dropdown--}}

            <li class="nav-item">
                <a class="nav-link" href="{{route('Trainers')}}">مبارزان و تمرین دهندگان</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('Home')}}">صفحه اصلی</a>
            </li>
        </ul>
    </div>
    {{--end--nav--itms--}}

    {{--login--}}
    @guest()
        <div class="mr-5 ml-1 d-none d-md-block">
            <a
                class="btn rounded custom"
                type="button" href="" data-toggle="modal"
                data-target="#RegisterModal">
                <img src="{{asset('images/sign-up.png')}}" alt="" style="width: 38px; height: 38px">
                ثبت نام</a>

            <a
                class="btn rounded custom"
                type="button" href="" data-toggle="modal"
                data-target="#LoginModal">

                <img src="{{asset('images/login-rounded-right.png')}}" alt="" style="width: 38px; height: 38px">
                ورود</a>
        </div>
    @endguest

    @auth()
        <div class="d-none d-md-flex justify-content-center">
            @include('Partials._basketShop')
            @include('Partials.dropdown')
        </div>
    @endauth
    {{--login--}}

</nav>


@includeIf('auth.Registermodal')
@includeIf('auth.Loginmodal')
