@extends('Admin.Layouts.Parent')
@section('Content')
    @includeIf('Partials._messages')
    <div class="row">
        <div class="sidenav col-2">
            <a class="btn btn-block btn-warning" href="{{route('Admin-Categories')}}"><h6 class="text-dark">مدیریت دسته
                    های ورزشی</h6></a>
            <a class="btn btn-block btn-warning" href="{{route('Admin-Posts')}}"><h6 class="text-dark">مدیریت رشته های
                    های ورزشی</h6></a>
            <a class="btn btn-block btn-warning" href="{{route('Admin-Products')}}"><h6 class="text-dark">مدیریت
                    محصولات</h6></a>


        </div>
        <div class="main col-10">
            @yield('Admin.Content')
        </div>
    </div>
@endsection
