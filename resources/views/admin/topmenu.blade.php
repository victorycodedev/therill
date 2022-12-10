<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon"
                   data-feather="menu"></i></a></li>
            </ul>
        </div>
        <ul class="ml-auto nav navbar-nav align-items-center">

            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
                        data-feather="moon"></i></a>
            </li>
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{Auth::user()->firstname}}
                        {{Auth::user()->lastname}}</span><span class="user-status">Admin</span></div><span class="avatar"><img
                            class="round" src="{{asset('dash/app-assets/images/portrait/small/avatar-s-11.jpg')}}"
                            alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    {{-- <a class="dropdown-item" href="page-profile.html"><i class="mr-50" data-feather="user"></i>
                        Account
                    </a> --}}
                    {{-- <a class="dropdown-item" href="app-email.html"><i class="mr-50"
                            data-feather="mail"></i> Inbox</a> --}}
                    <div class="dropdown-divider"></div>

                    {{-- <a class="dropdown-item" href="page-account-settings.html"><i class="mr-50" data-feather="settings"></i>
                        Settings
                    </a> --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                        this.closest('form').submit();" ><i class="mr-50" data-feather="power"></i> Logout</a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<ul class="main-search-list-defaultlist d-none">

</ul>