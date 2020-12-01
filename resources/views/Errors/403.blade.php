@extends('Layouts.Parent')

@section('Content')

    <div class="d-flex flex-column justify-content-center align-items-center">
        <div>
            <h1 class="text-dynamic text-muted">{{$exception->getMessage() ?: 'Forbidden'}}</h1>
        </div>

        <div>
            <img src="{{asset('images/icons8-empty-box-96.png')}}" alt="" class="emptyBasket">
        </div>
    </div>
@endsection


