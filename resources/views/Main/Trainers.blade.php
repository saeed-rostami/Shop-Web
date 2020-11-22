@extends('Layouts.Parent')

@section('Title')
   مربیان و مبارزان
@endsection

@section('Content')
    <div class="container">
        @includeIf('Partials._breadcrumb')
        <h2 class="product-count text-white-50 badge badge-pill">تعداد مربیان و مبارزان : {{count($trainers)}}  </h2>

        <div class="row">
            @foreach($trainers as $trainer)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 animate__animated
               animate__fadeIn trainer shadow">
                    <a href="{{route('Trainer-Show' , $trainer->name)}}">
                        <div class="img-container d-flex justify-content-center align-items-center">
                            <img

                                @if(! $trainer->image)
                                src="{{asset("images/Trainers/placeholder.jpg")}}"
                                @else
                                src="{{asset("Images/Trainers/".$trainer->image)}}"
                                @endif
                                alt="#"
                                 class="img-fluid rounded-circle">
                        </div>
                        <h6 class="blue text-center mt-1 trainer-name">{{$trainer->name}}</h6>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
