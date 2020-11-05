<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->

    <!-- Styles -->

        <link href="{{ asset('CSS/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    <link href="{{ asset('CSS/Navbar/Navbar.css') }}" rel="stylesheet">
    @stack('Products.css')
    @stack('Breadcrumb.css')
    @stack('Pagination.css')

    <title>@yield('Title')</title>
</head>
<body>
<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
@include('Layouts.testHeader')
<div class="main">

    <!--preloader-->
    <div class="preloader d-flex justify-content-center align-items-center">
        <img src="{{asset('images/302.gif')}}" alt="preloader" style="background-color: var(--mainGrey)">
    </div>
    <!--end-preloader-->



    <div class="container py-3">
        @yield("Content")
    </div>
</div>
@include('Layouts.Footer')

@section('script')
    <!-- Scripts -->
    <script src="{{ asset('JS/app.js') }}"></script>

    <script src="{{asset('JS/notiflix-aio-2.4.0.min.js')}}"></script>
    <script src="{{asset('JS/jquery.blockUI.js')}}"></script>
    @stack('postsPagination.js')
    @stack('productsPagination.js')

@show

</body>
</html>
