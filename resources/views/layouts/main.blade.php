<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $settings->site_name }} - @yield('title')</title>
    <meta name="keywords" content="{{ $settings->keywords }}" />
    <meta name="description" content="{{ $settings->site_desc }}">
    <!-- Favicon -->
    <link rel="apple-touch-icon" href="{{ asset('app/images/logos.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app/images/logos.png') }}">
    <script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>
    @section('styles')
        <script>
            WebFontConfig = {
                google: {
                    families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700,800',
                        'Oswald:300,400,500,600,700,800'
                    ]
                }
            };
            (function(d) {
                var wf = d.createElement('script'),
                    s = d.scripts[0];
                wf.src = '{{ asset('app/js/webfont.js') }}';
                wf.async = true;
                s.parentNode.insertBefore(wf, s);
            })(document);
        </script>
        @livewireStyles
        <!-- Plugins CSS File -->
        <link rel="stylesheet" href="{{ asset('app/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app/vendor/fontawesome-free/css/all.min.css') }}">
    @show

</head>

<body>
    <div class="page-wrapper">
        {{-- <div class="text-white top-notice bg-primary">
            <div class="container text-center">
                <h5 class="d-inline-block">Get Up to <b>40% OFF</b> New-Season Styles</h5>
                <a href="category.html" class="category">MEN</a>
                <a href="category.html" class="ml-2 mr-3 category">WOMEN</a>
                <small>* Limited time only.</small>
                <button title="Close (Esc)" type="button" class="mfp-close">×</button>
            </div>
            <!-- End .container -->
        </div>
        <!-- End .top-notice --> --}}

        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left d-none d-sm-block">
                        {{-- <p class="top-message text-uppercase">FREE Returns. Standard Shipping Orders $99+</p> --}}
                    </div>
                    <!-- End .header-left -->

                    <div class="ml-0 header-right header-dropdowns ml-sm-auto w-sm-100">
                        <div class="header-dropdown dropdown-expanded d-none d-lg-block">
                            <a href="#">Links</a>
                            <div class="header-menu">
                                <ul>
                                    @auth
                                        <li><a href="{{ route('dashboard') }}">{{ Auth::user()->firstname }}</a></li>
                                    @endauth
                                    @guest
                                        <li><a href="{{ route('login') }}">Log In</a></li>
                                    @endguest
                                </ul>
                            </div>
                            <!-- End .header-menu -->
                        </div>
                        <!-- End .header-dropown -->

                        <span class="separator"></span>
                        <div class="social-icons">
                            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"></a>
                            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"></a>
                            <a href="#" class="social-icon social-instagram icon-instagram" target="_blank"></a>
                        </div>
                        <!-- End .social-icons -->
                    </div>
                    <!-- End .header-right -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-top -->

            <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
                <div class="container">
                    <div class="w-auto pl-0 header-left col-lg-2">
                        <button class="mr-2 mobile-menu-toggler text-primary" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <a href="{{ route('home') }}" class="logo">
                            <img src="{{ asset('app/images/logos.png') }}" width="120" height="44"
                                alt="{{ $settings->site_name }}}">
                        </a>
                    </div>
                    <!-- End .header-left -->

                    <div class="header-right w-lg-max">
                        <div
                            class="mt-0 text-right header-icon header-search header-search-inline header-search-category w-lg-max">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                            <form action="javascript:void(0)" method="GET" id="searchform" class="searchform">
                                @csrf
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" id="searchitem"
                                        placeholder="Search..." required>
                                    <!-- End .select-custom -->
                                    <button class="p-0 btn icon-magnifier" title="search" type="submit"></button>
                                </div>
                                <!-- End .header-search-wrapper -->
                            </form>
                        </div>
                        <!-- End .header-search -->

                        <div class="pl-4 pr-4 header-contact d-none d-lg-flex">
                            <img alt="phone" src="{{ asset('app/images/phone.png') }}" width="30" height="30"
                                class="pb-1">
                            <h6><span>Call us now</span><a href="tel:{{ $settings->contact_phone }}"
                                    class="text-dark font1">{{ $settings->contact_phone }}</a></h6>
                        </div>

                        <a href="{{ route('login') }}" class="header-icon" title="login"><i
                                class="icon-user-2"></i></a>

                        <a href="{{ route('user.wishlist') }}" class="header-icon" title="wishlist"><i
                                class="icon-wishlist-2"></i></a>

                    </div>
                    <!-- End .header-right -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-middle -->

            <div class="header-bottom sticky-header d-none d-lg-block" data-sticky-options="{'mobile': false}">
                <div class="container">
                    <nav class="main-nav w-100">
                        <ul class="menu">
                            <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="{{ request()->routeIs('products') ? 'active' : '' }}">
                                <a
                                    href="{{ route('products', ['cat' => 'all', 'brand' => 'all', 'st' => 'desc', 'pg' => 10, 'search' => 'query']) }}">Products</a>
                            </li>
                            <li class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="{{ request()->routeIs('aboutus') ? 'active' : '' }}">
                                <a href="{{ route('aboutus') }}">About Us</a>
                            </li>
                            <li class="{{ request()->routeIs('contactus') ? 'active' : '' }}">
                                <a href="{{ route('contactus') }}">Contact Us</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-bottom -->
        </header>
        <!-- End .header -->

        <main class="main ">
            @yield('content')
        </main>
        <!-- End .main -->

        <footer class="footer bg-dark">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="pb-2 col-sm-4 pb-sm-0">
                            <div class="widget">
                                <h4 class="widget-title">About Us</h4>
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('app/images/logo-footers.png') }}" alt="Logo"
                                        class="logo-footer">
                                </a>
                                <p class="m-b-4">The Rill is your one stop online shop for emerging products. We aim
                                    to make the online shopping experience easy, fast......</p>
                                <a href="{{ route('aboutus') }}" class="text-white read-more">read more...</a>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <div class="widget">
                                <h4 class="widget-title">Contact Info</h4>
                                <ul class="contact-info">

                                    <li>
                                        <span class="contact-info-label">Phone:</span><a
                                            href="tel:{{ $settings->contact_phone }}">{{ $settings->contact_phone }}</a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Email:</span> <a
                                            href="mailto:{{ $settings->contact_email }}">{{ $settings->contact_email }}</a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Working Days/Hours:</span> Mon - Sun / 9:00 AM
                                        - 8:00 PM
                                    </li>
                                </ul>
                                <div class="social-icons">
                                    <a href="#" class="social-icon social-facebook icon-facebook"
                                        target="_blank" title="Facebook"></a>
                                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"
                                        title="Twitter"></a>
                                    <a href="#" class="social-icon social-instagram icon-instagram"
                                        target="_blank" title="Instagram"></a>
                                </div>
                                <!-- End .social-icons -->
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->

                        <div class="col-lg-4 col-sm-4">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4>

                                <ul class="links">
                                    <li><a href="{{ route('contactus') }}">Help & Support</a></li>
                                    <li><a href="{{ route('dashboard') }}">My Account</a></li>
                                    <li><a href="{{ route('contactus') }}">Contact Us</a></li>
                                </ul>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->

                        <!-- End .col-lg-3 -->
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .footer-middle -->

            <div class="container">
                <div class="footer-bottom">
                    <div class="container d-sm-flex align-items-center">
                        <div class="footer-left">
                            <span class="footer-copyright">© {{ $settings->site_name }}. {{ date('Y') }}. All
                                Rights Reserved</span>
                        </div>

                    </div>
                </div>
                <!-- End .footer-bottom -->
            </div>
            <!-- End .container -->
        </footer>
        <!-- End .footer -->
    </div>
    <!-- End .page-wrapper -->

    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div class="mobile-menu-overlay"></div>
    <!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="{{ request()->routeIs('products') ? 'active' : '' }}">
                        <a
                            href="{{ route('products', ['cat' => 'all', 'brand' => 'all', 'st' => 'desc', 'pg' => 10, 'search' => 'query']) }}">Products</a>
                    </li>
                    <li class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="{{ request()->routeIs('aboutus') ? 'active' : '' }}">
                        <a href="{{ route('aboutus') }}">About Us</a>
                    </li>
                    <li>
                        <a href="{{ route('contactus') }}">Contact Us</a>
                    </li>
                </ul>

                <ul class="mobile-menu">
                    @auth
                        <li><a href="{{ route('dashboard') }}">{{ Auth::user()->firstname }}</a></li>
                    @endauth
                    <li><a href="{{ route('user.wishlist') }}">My Wishlist</a></li>
                    @guest
                        <li><a href="{{ route('login') }}">Log In</a></li>
                    @endguest
                </ul>
            </nav>
            <!-- End .mobile-nav -->

            <form class="mb-2 search-wrapper" action="javascript:void(0)" method="GET" id="mobilesearchform">
                @csrf
                <input type="text" class="mb-0 form-control" id="mobileitemsearch" placeholder="Search..."
                    required />
                <button class="p-0 text-white bg-transparent btn icon-search" type="submit"></button>
            </form>

            <div class="social-icons">
                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank">
                </a>
                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
                </a>
                <a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
                </a>
            </div>
        </div>
        <!-- End .mobile-menu-wrapper -->
    </div>
    <!-- End .mobile-menu-container -->

    <div class="sticky-navbar">
        <div class="sticky-info">
            <a href="{{ route('home') }}">
                <i class="icon-home"></i>Home
            </a>
        </div>
        <div class="sticky-info">
            <a href="{{ route('products', ['cat' => 'all', 'brand' => 'all', 'st' => 'desc', 'pg' => 10, 'search' => 'query']) }}"
                class="">
                <i class="icon-bars"></i>Products
            </a>
        </div>
        <div class="sticky-info">
            <a href="{{ route('user.wishlist') }}" class="">
                <i class="icon-wishlist-2"></i>Wishlist
            </a>
        </div>
        <div class="sticky-info">
            <a href="{{ route('dashboard') }}" class="">
                <i class="icon-user-2"></i>Account
            </a>
        </div>
        <div class="sticky-info">
            <a href="cart.html" class="">
                <i class="icon-shopping-cart position-relative">
                    <span class="cart-count badge-circle">3</span>
                </i>Cart
            </a>
        </div>
    </div>

    {{-- <div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-form" style="background: #f1f1f1 no-repeat center/cover url(app/images/newsletter_popup_bg.jpg)">
        <div class="newsletter-popup-content">
            <img src="app/images/logo.png" width="111" height="44" alt="Logo" class="logo-newsletter">
            <h2>Subscribe to newsletter</h2>

            <p>
                Subscribe to the Porto mailing list to receive updates on new arrivals, special offers and our promotions.
            </p>

            <form action="#">
                <div class="input-group">
                    <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Your email address" required />
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div>
            </form>
            <div class="newsletter-subscribe">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value="0" id="show-again" />
                    <label for="show-again" class="custom-control-label">
						Don't show this popup again
					</label>
                </div>
            </div>
        </div>
        <!-- End .newsletter-popup-content -->

        <button title="Close (Esc)" type="button" class="mfp-close">
			×
		</button>
    </div> --}}
    <!-- End .newsletter-popup -->

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    @section('scripts')
        @livewireScripts
        <!-- Plugins JS File -->
        <script src="{{ asset('app/js/jquery.min.js') }}"></script>
        <script src="{{ asset('app/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('app/js/optional/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('app/js/plugins.min.js') }}"></script>
        <script src="{{ asset('app/js/jquery.appear.min.js') }}"></script>
        <!-- Main JS File -->
        <script src="{{ asset('app/js/main.min.js') }}"></script>

        <script>
            let query = document.getElementById('searchitem');
            let searchitemvalue = document.getElementById('mobileitemsearch');


            //console.log(document.getElementById('searchform'));

            document.getElementById('searchform').addEventListener('submit', searchprod);
            document.getElementById('mobilesearchform').addEventListener('submit', mobilesearch);

            function searchprod(event) {
                event.preventDefault();

                let url = "{{ url('/products/category:/all/brand:/all/sort:/desc/paginate:/10/query:/') }}" + '/' + query
                    .value;
                window.location.href = url;
            }


            function mobilesearch(event) {
                event.preventDefault();

                let url = "{{ url('/products/category:/all/brand:/all/sort:/desc/paginate:/10/query:/') }}" + '/' +
                    searchitemvalue.value;
                window.location.href = url;
            }
        </script>
    @show

</body>

</html>
