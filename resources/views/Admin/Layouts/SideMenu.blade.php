<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">پنل مدیریت</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                        class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                        data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" nav-item active"><a href="{{route('Admin-Panel')}}"><i class="feather icon-home"></i><span
                        class="menu-title"
                                                                                           data-i18n="Email">خانه</span></a>
            </li>

            <li class=" nav-item"><a href="{{route('Admin-Orders')}}"><i class="feather icon-truck"></i><span class="menu-title"
                                                                                     data-i18n="Email">سفارشات
                </span></a></li>
            <li class=" nav-item "><a href="{{route('Admin-Categories')}}"><i class="feather icon-file"></i><span class="menu-title"
                                                                                     data-i18n="Chat">دسته ورزشی</span></a>
            </li>
            <li class=" nav-item "><a href="{{route('Admin-Posts')}}"><i class="feather icon-file-minus"></i><span
                        class="menu-title"
                                                                                           data-i18n="Todo">رشته
                    ورزشی</span></a></li>
            <li class=" nav-item"><a href="{{route('Admin-Products')}}"><i class="feather icon-briefcase"></i><span
                        class="menu-title"
                                                                                         data-i18n="Calender">محصولات
                </span></a></li>
            <li class=" nav-item "><a href="{{route('Admin-Trainer')}}"><i class="feather icon-user-x"></i><span class="menu-title"
                                                                                       data-i18n="Calender">مبارزان و مربیان
                    </span></a></li>
            <li class=" nav-item"><a href="{{route('Admin-Tags')}}"><i class="feather icon-tag"></i><span class="menu-title"
                                                                                   data-i18n="Calender">برچسب ها
                </span></a></li>
            <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title"
                                                                                    data-i18n="Calender">کاربران</span></a>
            </li>

        </ul>
    </div>
</div>
