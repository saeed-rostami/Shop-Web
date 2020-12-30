@extends('Layouts.Parent')

@section('Content')
    @includeIf('Partials._emailActivationAlert')
    <div class="text-muted row">
        <div class="col-8 rounded black-bg">
            <h3 class="text-white-50">مشخصات کاربری</h3>

            <strong> نام : {{$user->name}}<img class="mt-2" style="width: 40px; height: 40px"
                                               src="{{asset('images/test-account.png')}}"
                                               alt=""></strong>
            <br>
            <strong> نام خانوادگی : {{$user->family}}<img class="mt-2" style="width: 40px; height: 40px"
                                                          src="{{asset('images/family.png')}}" alt=""></strong>
            <br>

            @includeIf('Partials._emailActivationBadge')

            <strong>{{$user->email}} : پست الکترونیکی <img class="mt-2" style="width: 40px; height: 40px"
                                                           src="{{asset('images/email.png')}}" alt=""></strong>
            <br>

            <strong>{{$user->phone}} : شماره همراه <img class="mt-2" style="width: 40px; height: 40px"
                                                        src="{{asset('images/phone.png')}}" alt=""></strong>
            <br>

            <strong>{{$user->created_at}} : تاریخ عضویت <img class="mt-2" style="width: 40px; height: 40px"
                                                             src="{{asset('images/date.png')}}" alt=""></strong>
        </div>

        {{--order--}}



    </div>
@endsection
