<div class="sidebar-wrapper">
    <div class="sidebar sidebar-collapse" id="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
                <li>
                    <a href="{{ route('dashboard') }}" class="@if (Request::segment(2) == 'service') active @endif">
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                <li class="has-child">
                    <a href="#" class="">
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text">Dashboard</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li class="">
                            <a href="index.html">Demo 1</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title mt-2">
                    <span>Users</span>
                </li>
                <li class="">
                    <a href="sign-up.html">
                        <span class="nav-icon uil uil-sign-out-alt"></span>
                        <span class="menu-text">Sign Up</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
