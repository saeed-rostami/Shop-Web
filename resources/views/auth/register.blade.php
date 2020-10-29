@extends('Layouts.Parent')

@section('Content')
<div class="container">
    <div class="row d-flex justify-content-center">
       <div class="col-sm-12 col-md-8 col-lg-6 col-xl-6">
           <form method="POST" action="{{ route('register') }}" class="login-form">
               @csrf

               <div class="row">
                   <p class="login-text">
    <span class="fa-stack fa-lg">
      <i class="fa fa-edit fa-stack-1x"></i>
    </span>
                   </p>
               </div>

               <div class="form-group row">
                       <input id="name" type="text" class="form-control input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="نام">

                       @error('name')
                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
               </div>


               <div class="form-group row">

                       <input id="family" type="text" class="form-control input @error('family') is-invalid @enderror" name="family" value="{{ old('family') }}" autocomplete="family" autofocus placeholder="نام خانوادگی">
                       @error('family')
                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
               </div>

               <div class="form-group row">


                       <input id="email" class="form-control input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="پست الکترونیکی">

                       @error('email')
                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
               </div>

               <div class="form-group row">


                       <input id="phone" class="form-control input @error('phone') is-invalid @enderror" name="phone"
                              value="{{ old('phone') }}" autocomplete="phone" placeholder="شماره موبایل ">

                       @error('phone')
                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
               </div>



               <div class="form-group row">

                       <input id="password" type="password" class="form-control input @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="رمز عبور">

                       @error('password')
                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
               </div>


               <div class="form-group row">


                       <input id="password-confirm" type="password" class="form-control input" name="password_confirmation" autocomplete="new-password" placeholder="تکرار رمز عبور">
               </div>

               <div class="form-group d-flex justify-content-center">
                   <button type="submit" class="btn login-submit">
                       {{ __('ثبت نام') }}
                   </button>
               </div>
           </form>
       </div>
    </div>
</div>
@endsection
