@extends('Layouts.Parent')

@section('Title')
    آموزش های
    {{$products[0]['category']['title']}}
@endsection

@section('Content')
    @includeIf('Partials._messages')

    <div class="container">
        @includeIf('Partials._breadcrumb')
        <h2 class="product-count text-white-50 badge badge-pill">تعداد محصولات : {{count($products)}}  </h2>

      @include('Partials._productsPagination')
    </div>
@endsection

