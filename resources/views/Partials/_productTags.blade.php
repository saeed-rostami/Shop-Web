<!--{{--tags--}}-->
<div class="row my-3">
    <div class="black-bg rounded col-12 tags">

        <div class="d-md-flex justify-content-md-around text-muted">
            <div>
                <span>برچسب ها</span>
                <img src="{{asset('images/tag.png')}}" alt="">
            </div>


            <div class="d-flex justify-content-start align-self-center">
                @foreach($product->tags as $tag)
                    <a href="#" class="badge-light mr-1 rounded"><h5 class="p-1">{{$tag->name}}</h5></a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--{{--tags--}}-->
