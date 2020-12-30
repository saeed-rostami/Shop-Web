<a id="navbarDropdown" class="d-inline-block nav-link dropdown-toggle p-0" href="#" role="button"
   data-toggle="dropdown"
   aria-haspopup="true" aria-expanded="false">
    @includeIf('Partials._emailActivationBadge')

    <img src="{{asset('images/test-account.png')}}" alt="" style="width: 48px; height: 48px">
    <span class="d-none d-md-inline userFullname">{{auth()->user()->fullName}}</span>

</a>

<div class="dropdown-menu user-dropdown" aria-labelledby="navbarDropdown">

    @if(auth()->user()->email == env('ADMIN_EMAIL'))
        <a class="dropdown-item mb-2" href="{{route('Admin-Panel')}}">
            <img src="{{asset('images/gear.png')}}" alt="" style="width: 28px;height: 28px">
            پنل مدیریت
        </a>
    @endif

    <a class="dropdown-item mb-2" href="{{route('Receipt')}}">
      @includeIf('Partials._emailActivationBadge')
        <img src="{{asset('images/receipt.png')}}" alt="" style="width: 32px;height: 32px">
        فاکتورها و خرید ها
    </a>

        <a class="dropdown-item mb-2" href="{{route('Profile')}}">
      @includeIf('Partials._emailActivationBadge')
        <img src="{{asset('images/test-account.png')}}" alt="" style="width: 32px;height: 32px">
        مشاهدده حساب کاربری
    </a>

    <a class="dropdown-item mb-2" href="{{route('Edit-Profile')}}">
        <img src="{{asset('images/edit.png')}}" alt="" style="width: 28px;height: 28px">
        ویرایش حساب کاربری
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

