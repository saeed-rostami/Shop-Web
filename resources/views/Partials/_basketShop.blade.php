<a class="d-lg-inline-block nav-link p-0 ml-3 position-relative" href="{{route('CardIndex')}}" role="button">

    @if(Cart::count() > 0)
        <span class="badge badge-info rounded position-absolute blink">{{Cart::count()}}</span>
    @endif
        <img src="{{asset('images/shopping-basket.png')}}" alt="">
</a>



