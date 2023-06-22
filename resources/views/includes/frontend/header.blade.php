<header class="header-top">
    <nav class="navbar navbar-light">
        <div class="navbar-left">
            <div class="logo-area">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img class="dark" src="{{ asset('backend/img/logo-dark.png') }}" alt="logo">
                    <img class="light" src="{{ asset('backend/img/logo-white.png') }}" alt="logo">
                </a>
                <a href="#" class="sidebar-toggle">
                    <img class="svg" src="{{ asset('backend/img/svg/align-center-alt.svg') }}" alt="img">
                </a>
            </div>
        </div>
        <!-- ends: navbar-left -->
        <div class="top-menu">
            <div class="hexadash-top-menu position-relative">
                <ul class="d-flex align-items-center flex-wrap">
                    <li>
                        <a href="{{ route('home') }}" class="">Beranda</a>
                    </li>
                    <li>
                        <a href="{{ route('universities') }}" class="">Universitas</a>
                    </li>
                    <li>
                        <a href="{{ route('blog') }}" class="">Blog</a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="navbar-right">
            <ul class="navbar-right__menu">
                <li class="nav-author">
                    @php
                        if (Auth::check()) {
                            echo '
        <div class="dropdown-custom">
            <a href="javascript:;" class="nav-item-toggle">
                <img src="' .
                                asset('backend/img/author-nav.jpg') .
                                '" alt="" class="rounded-circle">
                <span class="nav-item__title">' .
                                Auth::user()->name .
                                '<i class="las la-angle-down nav-item__arrow"></i></span>
            </a>
            <div class="dropdown-parent-wrapper">
                <div class="dropdown-wrapper">
                    <div class="nav-author__info">
                        <div class="author-img">
                            <img src="' .
                                asset('backend/img/author-nav.jpg') .
                                '" alt="" class="rounded-circle">
                        </div>
                        <div>
                            <h6>' .
                                Auth::user()->name .
                                '</h6>
                        </div>
                    </div>
                    <div class="nav-author__options">
                        <ul>
                            <li>
                                <a href="' .
                                route('user') .
                                '">
                                    <i class="uil uil-user"></i>Profile</a>
                            </li>
                        </ul>
                        <form method="POST" action="' .
                                route('logout') .
                                '">
                            ' .
                                csrf_field() .
                                ' <!-- Menambahkan token CSRF -->
                            <button type="submit" class="nav-author__signout btn btn-md btn-block">Sign Out</button>
                        </form>
                    </div>
                </div>
                <!-- ends: .dropdown-wrapper -->
            </div>
        </div>
        ';
                        } else {
                            echo '<a href="' . route('login') . '" class="nav-item">Sign In</a>';
                        }
                    @endphp




                </li>
                <!-- ends: .nav-author -->
            </ul>
            <!-- ends: .navbar-right__menu -->
            <div class="navbar-right__mobileAction d-md-none">
                <a href="" class="btn-author-action">
                    <img class="svg" src="{{ asset('backend/img/svg/more-vertical.svg') }}" alt="more-vertical">
                </a>
            </div>
        </div>
        <!-- ends: .navbar-right -->
    </nav>
</header>
