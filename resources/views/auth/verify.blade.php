@extends('Layouts.Parent')

@section('Content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-white-50">
                <div class="card-header">{{ __('حساب شما تایید نشده است') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('یک ایمیل حاوی لینک تایید حساب کاربری شما به پست الکترونیکی شما ارسال شد') }}
                        </div>
                    @endif

                    {{ __('لطفا پست الکترونیکی خود را بررسی کنید') }}
                        <br>
                    {{ __('لینک تایید را دریافت نکردید؟') }}, <a href="{{ route('verification.resend') }}">{{ __('ارسال مجدد') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
