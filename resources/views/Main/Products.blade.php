@extends('Layouts.Parent')

@section('Title')
    آموزش های
    {{$products[0]['post']['title']}}
@endsection

@section('Content')
    @includeIf('Partials._messages')

    <div class="container">
        @includeIf('Partials._breadcrumb')
        <h2 class="product-count text-white-50 badge badge-pill">تعداد محصولات : {{$counts}}  </h2>

      @include('Partials._productsPagination')
    </div>
@endsection

@push('Products.css')
    <link rel="stylesheet" href="{{asset('CSS/Products/Products.css')}}">
@endpush


