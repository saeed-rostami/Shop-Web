@include('Partials._smExtraNavbar')


<nav class="navbar navbar-expand-lg black-bg w-100">
    {{--logo--}}
    <a class="navbar-brand d-none d-md-block" href="#">
        فروشگاه
        <img class="rounded-circle" src="{{asset('images/logo.jpg')}}" alt="">
    </a>
    {{--end--logo--}}

    {{--search--}}
    <div>
        <form class="form-inline my-2 my-lg-0 d-none d-lg-block">
            <input class="form-control mr-sm-2" type="search" placeholder="آموزش مورد نظر خود را جستجو کنید"
                   aria-label="Search">
            <button class="btn my-2 my-sm-0 p-0" type="submit">
                <img class="rounded-circle" src="{{asset('images/search.png')}}" alt="">
            </button>
        </form>
    </div>
    {{--end-search--}}

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
                <a class="nav-link dropdown-toggle" href="#" id="educateDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    آموزش ها
                </a>
                <div class="dropdown-menu black-bg text-white-50" aria-labelledby="educateDropdown">
                @foreach($cats as $cat)
                <a class="dropdown-item purple" href='{{route('Category' , $cat->title)}}'>{{$cat->title}}</a>
                @endforeach
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="#">صفحه اصلی</a>
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

<style>

    .dropdown:hover>.dropdown-menu {
        display: block;
    }
    .custom {
        border: 2px solid;
        border-top-color: var(--mainBlue);
        border-bottom-color: var(--mainBlue);
        border-right-color: var(--mainOrange);
        border-left-color: var(--mainOrange);
        color: var(--mainOrange);
        text-decoration: none;
        font-size: 1rem;
        font-weight: bold;
    }
</style>
