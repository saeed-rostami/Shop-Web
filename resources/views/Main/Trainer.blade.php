@extends('Layouts.Parent')

@section('Title')
    آموزش های
    {{$trainer->name}}
@endsection

@section('Content')
    @includeIf('Partials._breadcrumb')
    <h2 class="product-count text-white-50 badge badge-pill">تعداد آموزش : {{count($trainer->products)}}  </h2>


    <div class="row shadow">
        <div class="my-3 col-12 col-sm-12 col-md-6  col-lg-8 col-xl-8 text-white">
            <h5>{{$trainer->info}}</h5>
        </div>

        <div class="col-12 col-sm-12 col-md-6  col-lg-4 col-xl-4">
            <img laoding="lazy"
                 src="{{asset("images/Trainers/".$trainer->image)}}"
                 class="img-fluid rounded-circle shadow"
                 alt="">
        </div>
    </div>

    <div class="d-flex justify-content-center my-3">
        <h4 class="text-white"> {{$trainer->name}}  دوره های  </h4>
    </div>


    <div class="row my-3 shadow">
        @foreach($trainer->products as $product)
           @include('Partials._product')

        @endforeach
    </div>
@endsection

