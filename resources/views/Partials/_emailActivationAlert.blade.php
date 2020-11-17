@if(auth()->user()->email !== null &&  auth()->user()->email_verified_at === null)
<div class="alert alert-warning row justify-content-center flex-column align-items-center">
    <h4 class="black">کاربر گرامی لطفا حساب کاربری خود را فعال نمایید</h4>
    <br>
    {{ __('لطفا پست الکترونیکی خود را بررسی کنید') }}
    <br>
    <a href="{{ route('verification.resend') }}">{{ __('ارسال مجدد لینک فعال سازی') }}</a>
</div>
@endif
