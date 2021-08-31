<div id="data-post" class="row justify-content-center">
    @foreach($posts as $post)
        <div class="col-10 col-md-6 col-lg-4 col-xl-4 feature-img my-1 animate__animated
               animate__fadeIn mb-3">
            <a href="{{route('Posts' , [$post->parent->title, $post->id])}}"
               data-toggle="tooltip"
               data-placement="top"
               title="{{$post->title}}">
                <div class="grid">
                    <figure class="effect-roxy">
                        <img loading="lazy" src="{{asset("images/Categories/placeholder.png")}}"
                             data-src="{{asset
                                ("Images/Categories/".$post->image)}}" alt="#"
                             class="
                                img-fluid">
                        <figcaption>
                            <h2 class="text-dynamic">{{$post->title}}</h2>
                        </figcaption>
                    </figure>
                </div>
            </a>
        </div>
    @endforeach

    <div class="my-3 col-12 d-flex justify-content-center">
        {{$posts->links()}}
    </div>


</div>



@push('postsPagination.js')
    <script src="{{ asset('JS/Pagination/postsPagination.js') }}"></script>
@endpush


