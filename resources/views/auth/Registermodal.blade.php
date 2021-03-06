<!-- Modal -->
    <div id="RegisterModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-white">
                    <button type="button" class="close" data-dismiss="modal"><i><span class="fa
                    fa-close"></span></i></button>
                    <h4 class="modal-title">ثبت نام در سایت</h4>
                </div>
                <div class="modal-body">
                    {{--body--}}

                    <div class="col-lg-12">
                        <form id="registerForm" method="POST" action="{{ route('register') }}" class="login-form">
                            @csrf

                            <div class="row">
                                <p class="login-text">
                                    <img src="{{asset('images/sign-up.png')}}" alt="" style="width: 48px; height: 48px">
                                </p>
                            </div>

                            <div class="form-group row">
                                <img style="width: 40px; height: 40px" src="{{asset('images/test-account.png')}}" alt="">

                                <input id="name" type="text" class="form-control input" name="name"
                                       value="{{ old('name') }}" autocomplete="name" autofocus placeholder="نام">

                            </div>


                            <div class="form-group row">
                                <img style="width: 40px; height: 40px" src="{{asset('images/family.png')}}" alt="">

                                <input id="family" type="text" class="form-control input" name="family"
                                       value="{{ old('family') }}" autocomplete="family"
                                       placeholder="نام خانوادگی">
                            </div>

                            <div class="form-group row">

                                <img style="width: 40px; height: 40px" src="{{asset('images/email.png')}}" alt="">

                                <input id="email" class="form-control input" name="email" value="{{ old('email') }}"
                                       autocomplete="email" placeholder="(پست الکترونیکی (اختیاری">

                            </div>

                            <div class="form-group row">

                                <img style="width: 40px; height: 40px" src="{{asset('images/phone.png')}}" alt="">

                                <input id="phone" class="form-control input" name="phone" value="{{ old('phone')
                                    }}" autocomplete="phone" placeholder="شماره موبایل">

                            </div>


                            <div class="form-group row">
                                <img style="width: 40px; height: 40px" src="{{asset('images/password.png')}}" alt="">

                                <input id="password" type="password" class="form-control input" name="password"
                                       autocomplete="new-password" placeholder="رمز عبور">

                            </div>


                            <div class="form-group row">

                                <img style="width: 40px; height: 40px" src="{{asset('images/password.png')}}" alt="">

                                <input id="password-confirm" type="password" class="form-control input"
                                       name="password_confirmation" autocomplete="new-password"
                                       placeholder="تکرار رمز عبور">
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <button id="registerSubmit" type="submit" class="btn custom-btn">
                                    {{ __('ثبت نام') }}
                                </button>
                            </div>
                        </form>
                    </div>

                    {{--body--}}
                </div>
            </div>

        </div>
    </div>

