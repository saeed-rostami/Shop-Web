<div class="d-md-none d-flex justify-content-around black-bg">
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


    {{--search--}}
        <form class="form-inline w-50">
            <div class="input-group ">
                <input type="text" class="form-control" placeholder="جستجو">
                <div class="input-group-append">
                    <button class="btn purple-bg" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>

        </form>
    {{--end-search--}}

</div>
