@extends('Layouts.Parent')

@section('Content')


    <div class="container">
        <div class="row d-flex justify-content-center">
           <div class="col-sm-12 col-md-8 col-lg-6 col-xl-6">
               <form method="POST" action="{{ route('login') }}" class="login-form">
                   @csrf

                   <div class="row">
                       <p class="login-text">
    <span class="fa-stack fa-lg">
      <i class="fa fa-sign-in fa-sign-in-1x"></i>
    </span>
                       </p>
                   </div>

                   <div class="form-group row">

                           <input id="email" type="text" class="form-control input @error('email') is-invalid @enderror"
                                  name="email" value="{{ old('email') }}" autocomplete="email" autofocus
                                  placeholder="پست الکترونیکی یا شماره موبایل">

                           @error('email')
                           <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
                           @enderror

                   </div>

                   <div class="form-group row">


                           <input id="password" type="password" class="form-control input @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="رمز عبور">

                           @error('password')
                           <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
                           @enderror

                   </div>

                           <div class="form-check d-flex justify-content-end">
                               <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >

                               <label class="form-check-label" for="remember">
                                 <span class="rem">مرا بخاطر بسپار</span>
                               </label>
                           </div>

                      <div style="width: 170px">
                          @if (Route::has('password.request'))
                              <a class="btn btn-link" style="text-decoration: none" href="{{ route('password.request')
                              }}">
                              <span class="rem">
                                   رمز عبور را فراموش کردم
                              </span>
                              </a>
                          @endif
                      </div>

                   <div class="form-group d-flex justify-content-center">
                           <button type="submit" class="btn login-submit">
                               {{ __('ورود') }}
                           </button>
                   </div>
               </form>
           </div>

        </div>
    </div>
@endsection

