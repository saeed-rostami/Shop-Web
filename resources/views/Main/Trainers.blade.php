@extends('Layouts.Parent')

@section('Content')
    <div class="container">
        <div class="row">
            @foreach($trainers as $trainer)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 animate__animated
               animate__fadeIn">
                    <a href="#">
                        <div class="img-container d-flex justify-content-center align-items-center">
                            <h6 class="position-absolute text-dark">{{$trainer->name}}</h6>
                            <img laoding="lazy"
                                 src="{{asset("images/Trainers/".$trainer->image)}}"
                                 class="img-fluid rounded-circle"
                                 alt="">
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
