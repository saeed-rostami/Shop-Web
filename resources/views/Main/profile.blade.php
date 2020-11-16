@extends('Layouts.Parent')

@section('Content')
    @includeIf('Partials._emailActivationAlert')
    <div class="text-muted row justify-content-end">
        <div class="col-12 col-md-6 rounded black-bg">
            <h5> نام : {{$user->name}}<img style="width: 40px; height: 40px" src="{{asset('images/test-account.png')}}"
                                           alt=""></h5>
            <h5> نام خانوادگی : {{$user->family}}<img style="width: 40px; height: 40px"
                                                      src="{{asset('images/family.png')}}" alt=""></h5>
            @includeIf('Partials._emailActivationBadge')

            <h5>{{$user->email}} : پست الکترونیکی <img style="width: 40px; height: 40px"
                                                       src="{{asset('images/email.png')}}" alt=""></h5>
            <h5>{{$user->phone}} : شماره همراه <img style="width: 40px; height: 40px"
                                                    src="{{asset('images/phone.png')}}" alt=""></h5>
        </div>


    </div>
@endsection

