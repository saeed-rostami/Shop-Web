<a id="navbarDropdown" class="d-inline-block nav-link dropdown-toggle p-0" href="#" role="button"
   data-toggle="dropdown"
   aria-haspopup="true" aria-expanded="false">
    <img src="{{asset('images/test-account.png')}}" alt="" style="width: 48px; height: 48px">
    <span class="d-none d-md-inline">{{auth()->user()->fullName}}</span>
</a>

<div class="dropdown-menu user-dropdown" aria-labelledby="navbarDropdown">

    @if(auth()->user()->email == env('ADMIN_EMAIL'))
    <a class="dropdown-item mb-2" href="{{route('Admin-Panel')}}">
        <img src="{{asset('images/test-account.png')}}" alt="" style="width: 28px;height: 28px">
        پنل مدیریت
    </a>
    @endif

    <a class="dropdown-item mb-2" href="{{route('Profile')}}">
        <img src="{{asset('images/test-account.png')}}" alt="" style="width: 28px;height: 28px">
        پروفایل
    </a>

    <a class="dropdown-item" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        <img src="{{asset('images/logout-rounded.png')}}" alt="" style="width: 28px;height: 28px">

        خروج
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>


</div>

