@extends('layouts.main')
@section('title', 'Welcome to shop')
@section('styles')
    @parent
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('app/css/demo4.min.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('content')
    <div class="mb-2 home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big text-uppercase"
        data-owl-options="{
    'loop': true
}">
        @foreach ($adverts as $offer)
            <div class="home-slide home-slide1 banner">
                <img class="slide-bg" src="{{ asset('storage/' . $offer->image) }}" width="1903" height="499"
                    alt="slider image">
                <div class="container d-flex align-items-center">
                    <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                        <h4 class="text-transform-none m-b-3">{{ $offer->category }}</h4>
                        {{-- <h2 class="mb-0 text-transform-none"></h2> --}}
                        <h3 class="m-b-3" style="font-size: 65px">{{ $offer->title }}</h3>
                        <a href="{{ route('offers', str_replace(' ', '-', $offer->title)) }}"
                            class="btn btn-dark btn-lg">Learn More!</a>
                    </div>
                    <!-- End .banner-layer -->
                </div>
            </div>
            <!-- End .home-slide -->
        @endforeach
    </div>
    <!-- End .home-slider -->

    <div class="container">
        <div class="mb-2 info-boxes-slider owl-carousel owl-theme"
            data-owl-options="{
        'dots': false,
        'loop': false,
        'responsive': {
            '576': {
                'items': 2
            },
            '992': {
                'items': 3
            }
        }
    }">
            <div class="info-box info-box-icon-left">
                <i class="icon-shipping"></i>

                <div class="info-box-content">
                    <h4>SHIPPING &amp; RETURN</h4>
                    <p class="text-body">Free shipping Nationwide.</p>
                </div>
                <!-- End .info-box-content -->
            </div>
            <!-- End .info-box -->

            <div class="info-box info-box-icon-left">
                <i class="icon-money"></i>

                <div class="info-box-content">
                    <h4>MONEY BACK GUARANTEE</h4>
                    <p class="text-body">100% money back guarantee</p>
                </div>
                <!-- End .info-box-content -->
            </div>
            <!-- End .info-box -->

            <div class="info-box info-box-icon-left">
                <i class="icon-support"></i>

                <div class="info-box-content">
                    <h4>ONLINE SUPPORT 24/7</h4>
                    <p class="text-body">We are here 24/7 to answer all your questions</p>
                </div>
                <!-- End .info-box-content -->
            </div>
            <!-- End .info-box -->
        </div>
        <!-- End .info-boxes-slider -->


        <section class="featured-products-section">
            <div class="container">
                <h2 class="border-0 section-title heading-border ls-20">Featured Products</h2>

                <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center"
                    data-owl-options="{
            'dots': false,
            'nav': true
        }">
                    @foreach ($featured as $feat)
                        <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="{{ route('productsingle', str_replace(' ', '-', $feat->name)) }}">
                                    <img src="{{ asset('storage/' . $feat->featured_image) }}" width="280" height="280"
                                        alt="product">
                                    <img src="{{ asset('storage/' . $feat->featured_image) }}" width="280" height="280"
                                        alt="product">
                                </a>
                                <div class="label-group">
                                    @if (!empty($feat->tag))
                                        <div class="product-label label-hot">

                                            {{ $feat->tag }}

                                        </div>
                                    @endif
                                </div>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a
                                        href="{{ route('productsingle', str_replace(' ', '-', $feat->name)) }}">{{ $feat->name }}</a>
                                </h3>

                                <!-- End .product-container -->
                                <div class="price-box">
                                    <del
                                        class="old-price">{{ $settings->currency }}{{ number_format($feat->previous_price) }}</del>
                                    <span
                                        class="product-price">{{ $settings->currency }}{{ number_format($feat->current_price) }}</span>
                                </div>
                                <div>
                                    {{-- <p>
                                        {{ mb_strimwidth($feat->info, 0, 50, '...') }}
                                    </p> --}}
                                    <p>
                                        {{ $feat->info }}
                                    </p>
                                </div>
                                <!-- End .price-box -->
                                <div class="product-action">
                                    @auth
                                        <a href="javascript:void(0)" class="btn-icon-wish" onclick="addtowish(this.id)"
                                            id="{{ $feat->id }}" title="wishlist"><i class="icon-heart"></i></a>
                                    @endauth
                                    @if ($feat->instock < 1)
                                        <a class="p-3 text-white btn-icon btn-danger"><span>SOLD OUT</span></a>
                                    @else
                                        <a href="{{ route('productsingle', str_replace(' ', '-', $feat->name)) }}"
                                            class="p-3 text-white btn-icon btn-dark"><span>BUY NOW</span></a>
                                    @endif

                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                    @endforeach

                </div>
                <!-- End .featured-proucts -->
            </div>
        </section>

        <section class="new-products-section">
            <div class="container">
                <h2 class="border-0 section-title heading-border ls-20">New Arrivals</h2>

                <div class="mb-2 products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center"
                    data-owl-options="{
            'dots': false,
            'nav': true,
            'responsive': {
                '992': {
                    'items': 4
                },
                '1200': {
                    'items': 5
                }
            }
        }">
                    @foreach ($arrivals as $arrive)
                        <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="{{ route('productsingle', str_replace(' ', '-', $arrive->name)) }}">
                                    <img src="{{ asset('storage/' . $arrive->featured_image) }}" width="220"
                                        height="220" alt="product">
                                    <img src="{{ asset('storage/' . $arrive->featured_image) }}" width="220"
                                        height="220" alt="product">
                                </a>
                                <!--<div class="label-group">-->
                                <!--    <div class="product-label label-hot">HOT</div>-->
                                <!--</div>-->
                            </figure>
                            <div class="product-details">
                                <h5 class="{{ route('productsingle', str_replace(' ', '-', $arrive->name)) }}">
                                    <a
                                        href="{{ route('productsingle', str_replace(' ', '-', $arrive->name)) }}">{{ $arrive->name }}</a>
                                </h5>
                                <div>
                                    {{-- <p>
                                        {{ mb_strimwidth($arrive->info, 0, 50, '...') }}
                                    </p> --}}
                                    <p>
                                        {{ $arrive->info }}
                                    </p>
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <del
                                        class="old-price">{{ $settings->currency }}{{ number_format($arrive->previous_price) }}</del>
                                    <span
                                        class="product-price">{{ $settings->currency }}{{ number_format($arrive->current_price) }}</span>
                                </div>
                                <!-- End .price-box -->
                                <div class="product-action">
                                    @auth
                                        <a href="javascript:void(0)" onclick="addtowish(this.id)" id="{{ $arrive->id }}"
                                            class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                    @endauth
                                    @if ($arrive->instock < 1)
                                        <a class="p-3 text-white btn-icon btn-danger"><span>SOLD OUT</span></a>
                                    @else
                                        <a href="{{ route('productsingle', str_replace(' ', '-', $arrive->name)) }}"
                                            class="p-3 text-white btn-icon btn-dark"><span>BUY NOW</span></a>
                                    @endif


                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                    @endforeach
                </div>
                <!-- End .featured-proucts -->

                <div class="banner banner-big-sale appear-animate" data-animation-delay="200"
                    data-animation-name="fadeInUpShorter"
                    style="background: #2A95CB center/cover url('app/images/demoes/demo4/banners/banner-4.jpg');">
                    <div class="mx-0 banner-content row align-items-center">
                        <div class="col-md-9 col-sm-8">
                            <h2 class="px-4 text-center text-white text-uppercase text-sm-left ls-n-20 mb-md-0">
                                <b class="mb-1 mr-3 d-inline-block mb-md-0">Big Sale</b> All new products up for sale
                            </h2>
                        </div>
                        <div class="text-center col-md-3 col-sm-4 text-sm-right">
                            <a class="btn btn-light btn-white btn-lg"
                                href="{{ route('products', ['cat' => 'all', 'brand' => 'all', 'st' => 'desc', 'pg' => 10, 'search' => 'query']) }}">View
                                Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="feature-boxes-container">
            <div class="container appear-animate" data-animation-name="fadeInUpShorter">
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center feature-box px-sm-5 feature-box-simple">
                            <div class="feature-box-icon">
                                <i class="icon-earphones-alt"></i>
                            </div>

                            <div class="p-0 feature-box-content">
                                <h3>Customer Support</h3>
                                <h5>You Won't Be Alone</h5>

                                <p>We really care about you and your product as much as you do. Purchasing from us you get
                                    100% free support.</p>
                            </div>
                            <!-- End .feature-box-content -->
                        </div>
                        <!-- End .feature-box -->
                    </div>
                    <!-- End .col-md-4 -->

                    <div class="col-md-4">
                        <div class="text-center feature-box px-sm-5 feature-box-simple">
                            <div class="feature-box-icon">
                                <i class="icon-credit-card"></i>
                            </div>

                            <div class="p-0 feature-box-content">
                                <h3>Easy Payment</h3>
                                <h5>Different Options</h5>

                                <p>Pay conveniently and securely our our platform!</p>
                            </div>
                            <!-- End .feature-box-content -->
                        </div>
                        <!-- End .feature-box -->
                    </div>
                    <!-- End .col-md-4 -->

                    <div class="col-md-4">
                        <div class="text-center feature-box px-sm-5 feature-box-simple">
                            <div class="feature-box-icon">
                                <i class="icon-action-undo"></i>
                            </div>
                            <div class="p-0 feature-box-content">
                                <h3>Nationwide Shipping</h3>
                                <h5>Made To Help You</h5>

                                <p>You do not have to worry about distance, we can get your products to you right where you
                                    are.</p>
                            </div>
                            <!-- End .feature-box-content -->
                        </div>
                        <!-- End .feature-box -->
                    </div>
                    <!-- End .col-md-4 -->
                </div>
                <!-- End .row -->
            </div>
            <!-- End .container-->
        </section>
        <!-- End .feature-boxes-container -->

    @endsection
    @section('scripts')
        @parent
        <script>
            // let wish1btn = document.querySelector('#wishlist1');
            // let wish2btn = document.querySelector('#wishlist2');

            // wish1btn.addEventListener('click', addtowish);

            function addtowish(id) {

                let url = "{{ url('/account/addtowish/') }}" + '/' + id;
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        if (response.status === 201) {
                            Swal.fire({
                                title: response.message,
                                icon: 'error',
                            })
                        }

                        if (response.status === 200) {
                            Swal.fire({
                                title: response.message,
                                icon: 'success',
                            })
                        }

                    },
                    error: function(error) {
                        console.log(error);
                    },

                });
            }
        </script>
    @endsection
