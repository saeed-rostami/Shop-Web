@extends('Admin.Layouts.Parent')
@section('Content')
    <div class="row">
        <div class="sidenav col-4 col-sm-4 col-md-2">
            <a class="btn btn-block btn-warning" href="{{route('Admin-Categories')}}"><h6 class="text-dark">مدیریت دسته
                    های ورزشی</h6></a>
            <a class="btn btn-block btn-warning" href="{{route('Admin-Posts')}}"><h6 class="text-dark">مدیریت رشته های
                    های ورزشی</h6></a>
            <a class="btn btn-block btn-warning" href="{{route('Admin-Products')}}"><h6 class="text-dark">مدیریت
                    محصولات</h6></a>
            <a class="btn btn-block btn-warning" href="{{route('Admin-Tags')}}"><h6 class="text-dark">مدیریت
                    برچسب ها</h6></a>
            <a class="btn btn-block btn-warning" href="{{route('Admin-Trainer')}}"><h6 class="text-dark">مدیریت
                    تمرین دهنده ها</h6></a>


        </div>
        <div class="main col-8 col-sm-8 col-md-10">
            @yield('Admin.Content')
            @include('Admin.Partials._errorMessages')

        </div>
    </div>
@endsection
