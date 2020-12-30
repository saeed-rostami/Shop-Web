@extends('Layouts.Parent')

@section('Title')
    آموزش ها
    
@endsection

@section('Content')
<div class="container">
    @includeIf('Partials._breadcrumb')
    <h2 class="product-count text-white-50 badge badge-pill">تعداد رشته های ورزشی موجود : {{count($products)}}
    </h2>

    <div class=row>
        @foreach($products as $product)

            @include('Partials._product')

@endforeach
    </div>
</div>
   
@endsection
