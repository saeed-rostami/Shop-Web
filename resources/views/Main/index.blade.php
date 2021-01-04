@extends('Layouts.Parent')
@section('Title')
    فیلم های آموزش ورزش های رزمی و بدنسازی
@endsection

@section('Content')

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
                        <a href="{{route('Category' , $category->title)}}"
                           data-toggle="tooltip"
                           data-placement="top"
                           title="{{$category->title}}">
                            <div class="grid">
                                <figure class="effect-roxy">
                                    <img loading="lazy" src="{{asset("images/Categories/placeholder.png")}}"
                                         data-src="{{asset
                                ("Images/Categories/".$category->image)}}" alt="#"
                                         class="
                                img-fluid">
                                    <figcaption>
                                        <h2 class="text-dynamic">{{$category->title}}</h2>
                                    </figcaption>
                                </figure>
                            </div>
                        </a>
                    </div>
                @endforeach



                {{----}}


            </div>

        </div>
    </section>

    @include('Main.Slider')

@endsection



