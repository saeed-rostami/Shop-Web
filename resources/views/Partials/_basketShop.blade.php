<a class="d-lg-inline-block nav-link p-0 ml-1 pt-lg-2" href="{{route('CardIndex')}}" role="button">
    <img src="{{asset('images/shopping-basket.png')}}" alt="">

    @if(Cart::count() > 0)
        <span class="badge badge-info rounded mb-1">{{Cart::count()}}</span>
    @endif
</a>

