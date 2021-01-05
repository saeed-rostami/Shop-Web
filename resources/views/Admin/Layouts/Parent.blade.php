<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{asset('Admin/fonts/feather/fonts/feather.woff')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/fonts/feather/fonts/feather.eot')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/fonts/feather/fonts/feather.ttf')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/fonts/feather/fonts/feather.svg')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/fonts/feather/iconfont.css')}}">


    <!-- BEGIN: Vendor CSS-->
{{--<link rel="stylesheet" type="text/css" href="{{asset('newAdmin/CSS/vendors-rtl.min.css')}}">--}}
<!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/CSS/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/CSS/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/CSS/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/CSS/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/CSS/Admin-Custom.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/CSS/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/CSS/core/colors/palette-gradient.css')}}">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/CSS/custom-rtl.css')}}">
    <!-- END: Custom CSS-->

    <link href="{{ asset('CSS/select2.min.css') }}" rel="stylesheet">



    <title>@yield('Admin-Panel')</title>
</head>

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">

{{--<div class="preloader d-flex justify-content-center align-items-center">--}}
    {{--<img src="{{asset('images/302.gif')}}" alt="preloader" style="background-color: var(--mainGrey)">--}}
{{--</div>--}}


<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>


@include('Admin.Partials._errorMessages')

<!-- BEGIN: Header-->
@include('Admin.Layouts.Header')


<!-- BEGIN: Main Menu-->
@include('Admin.Layouts.SideMenu')
<!-- BEGIN: Content-->

@yield('AdminContent')

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

@section('script')
    <!-- Scripts -->

    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('Admin/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('Admin/js/app-menu.js')}}"></script>
    <script src="{{asset('Admin/js/app.js')}}"></script>

    <script src="{{asset('JS/notiflix-aio-2.4.0.min.js')}}"></script>
    <script src="{{asset('JS/AdminCustom/Admin-Custom.js')}}"></script>
    <script src="{{asset('JS/select2.min.js')}}"></script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>

@show

</body>
</html>

