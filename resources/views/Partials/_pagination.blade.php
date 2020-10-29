<div id="data-post" class="row justify-content-center">
    @foreach($posts as $post)
        <div class="col-10 col-md-6 col-lg-4 col-xl-4 feature-img my-1 animate__animated
               animate__fadeIn mb-3">
            <a href="{{route('Posts', [$post->category->title, $post->title])}}">
                <div class="img-container d-flex justify-content-center align-items-center">
                    <h1 class="text-dynamic position-absolute text-light">{{$post->title}}</h1>
                    <img laoding="lazy"
                         src="{{asset("images/Posts/".$post->image)}}"
                         class="img-fluid feature-photo"
                         alt="">
                </div>
            </a>
        </div>
    @endforeach
    <div>
        {{$posts->links()}}
    </div>
</div>


@push('Pagination.js')
    <script src="{{ asset('JS/Pagination/Pagination.js') }}"></script>
@endpush


