<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="flex-row nav navbar-nav">
            <li class="mr-auto nav-item"><a class="navbar-brand" href="index.html">
        <h2 class="brand-text">{{$settings->site_name}}</h2>
      </a></li>
            <li class="nav-item nav-toggle"><a class="pr-0 nav-link modern-nav-toggle" data-toggle="collapse"><i
          class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
          class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc"
          data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('admin.dashboard')}}"><i data-feather="home"></i><span
          class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span></a>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="ficon"
                data-feather="shopping-cart"></i><span class="menu-title text-truncate"
                data-i18n="eCommerce">Products</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="{{route('admin.addproduct')}}"><i
                            data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Add  Products<span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="{{route('admin.allproducts')}}"><i
                            data-feather="circle"></i><span class="menu-item" data-i18n="Shop">System Products<span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="{{route('admin.category')}}"><i
                        data-feather="circle"></i><span class="menu-item" data-i18n="Details">Categories</span></a>
                    </li>
                    {{-- <li>
                        <a class="d-flex align-items-center" href=""><i
                        data-feather="circle"></i><span class="menu-item" data-i18n="Details">Sub Categories</span></a>
                    </li> --}}
                    <li>
                        <a class="d-flex align-items-center" href="{{route('admin.brandslist')}}"><i
                        data-feather="circle"></i><span class="menu-item" data-i18n="Details">Brands</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('admin.fetchorders')}}"><i
                data-feather="package"></i><span class="menu-title text-truncate"
                data-i18n="Pages">Manage Orders</span></a>

            {{-- <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="ficon"
                data-feather="package"></i><span class="menu-title text-truncate"
                data-i18n="eCommerce"></span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href=""><i
                        data-feather="circle"></i><span class="menu-item" data-i18n="Details">All Orders</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href=""><i
                        data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Pending Orders<span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href=""><i
                        data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Orders in Progress<span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href=""><i
                        data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Canceled Orders<span></a>
                    </li>
                </ul>
            </li>
             --}}
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="ficon"
                data-feather="message-square"></i><span class="menu-title text-truncate"
                data-i18n="eCommerce">Adverts</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="{{route('admin.addadvert')}}"><i
                        data-feather="circle"></i><span class="menu-item" data-i18n="Details">Add Adverts</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="{{route('admin.alladverts')}}"><i
                        data-feather="circle"></i><span class="menu-item" data-i18n="Details">Manage Adverts</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a class="d-flex align-items-center" href=""><i
                        data-feather="circle"></i><span class="menu-item" data-i18n="Details">Category</span>
                        </a>
                    </li> --}}
                    
                </ul>
            </li>
            {{-- <li class=" nav-item"><a class="d-flex align-items-center" href="help.html"><i
                data-feather="activity"></i><span class="menu-title text-truncate"
                data-i18n="Pages">Transactions</span></a>
            </li> --}}
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('admin.allusers')}}"><i
                    data-feather="users"></i><span class="menu-title text-truncate"
                    data-i18n="Pages">Manage Users</span></a>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('admin.settings')}}"><i
                data-feather="settings"></i><span class="menu-title text-truncate"
                data-i18n="Pages">Settings</span></a>
            </li>
            {{-- <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('admin.settings')}}"><i data-feather="settings"></i><span
              class="menu-title text-truncate" data-i18n="User">Settings</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="connect-store.html"><i data-feather="circle"></i><span
                        class="menu-item" data-i18n="List">App Settings</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="connect-store.html"><i data-feather="circle"></i><span
                        class="menu-item" data-i18n="List">Payment Settings</span>
                        </a>
                    </li>
                </ul>
            </li> --}}

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
