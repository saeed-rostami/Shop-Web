@extends('Layouts.Parent')

@section('Content')
    @includeIf('Partials._messages')
    <section class="gallery py-3 mb-4" id="galley">
        <div class="container">

            <div class="row mb-2">
                <div class="choose-field col d-flex flex-wrap text-uppercase justify-content-center shadow">
                    <h3 class="font-weight-bold align-self-center mx-1 text-light text-dynamic">
                        دسته ورزشی خود را انتخاب کنید </h3>
                </div>
            </div>

            <div class="row">

                @foreach($categories as $category)
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6 my-1 animate__animated animate__fadeIn">
                        <a href="{{route('Category' , $category->title)}}">
                            <div class="gallery-item d-flex justify-content-center align-items-center">
                                <h1 class="text-dynamic position-absolute text-light text-justify ">{{$category->title}}</h1>
                                <img loading="lazy" src="{{asset("images/Categories/placeholder.png")}}"
                                     data-src="{{asset
                                ("Images/Categories/".$category->image)}}" alt="#"
                                     class="gallery-img
                                img-fluid">
                            </div>
                        </a>
                    </div>
                @endforeach


            </div>

        </div>
    </section>

    @include('Main.Slider')

@endsection

