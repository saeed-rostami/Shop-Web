<!-- Modal -->
<div id="LoginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header text-white">
                <button type="button" class="close" data-dismiss="modal">
                    <i><span class="fa
                    fa-close"></span></i>

                </button>
                <h4 class="modal-title">ورود به حساب کاربری</h4>
            </div>
            <div class="modal-body">
                {{--body--}}
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form id="loginForm" method="POST" action="{{ route('login') }}" class="login-form">
                                @csrf

                                <div class="row">
                                    <p class="login-text">
                                        <img src="{{asset('images/login-rounded-right.png')}}" alt="" style="width: 48px; height: 48px">
                                    </p>
                                </div>

                                <div class="form-group row">

                                    <input type="text" class="form-control input" name="email"
                                           value="{{ old('email') }}" autocomplete="email" autofocus
                                           placeholder="پست الکترونیکی یا شماره موبایل">


                                </div>

                                <div class="form-group row">


                                    <input type="password" class="form-control input" name="password"
                                           autocomplete="current-password" placeholder="رمز عبور">


                                </div>

                                <div class="form-check d-flex justify-content-end">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }} >

                                    <label class="form-check-label" for="remember">
                                        <span class="rem">مرا بخاطر بسپار</span>
                                    </label>
                                </div>

                                <div>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" style="text-decoration: none" href="{{ route('password.request')
                              }}">
                              <span class="forg">
                                   رمز عبور را فراموش کردم
                              </span>
                                        </a>
                                    @endif
                                </div>

                                <div class="form-group d-flex justify-content-center">
                                    <button id="loginSubmit" type="submit" class="btn custom-btn">
                                        {{ __('ورود') }}
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                {{--body--}}
            </div>
        </div>

    </div>
</div>
