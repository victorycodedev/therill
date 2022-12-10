@extends('layouts.main')
@section('title', 'Browse our Products')
@section('styles')
    @parent
    <link rel="stylesheet" href="{{ asset('app/css/style.min.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-9">
                <div class="boxed-slider owl-carousel owl-carousel-lazy owl-theme owl-theme-light">
                    @foreach ($offers as $offer)
                        <div class="boxed-slide boxed-slide-1">
                            <figure>
                                <img class="slide-bg owl-lazy" data-src="{{ asset('storage/' . $offer->image) }}"
                                    src="{{ asset('storage/' . $offer->image) }}" alt="banner" width="870"
                                    height="300">
                            </figure>
                            <div class="slide-content">
                                <h4>{{ $offer->title }}</h4>
                                <a href="{{ route('offers', str_replace(' ', '-', $offer->title)) }}"
                                    class="btn btn-sm btn-primary">Learn More</a>
                            </div>
                        </div>
                    @endforeach


                </div>

                <nav class="mt-2 toolbox sticky-header" data-sticky-options="{'mobile': true}">
                    <div class="toolbox-left">
                        <a href="#" class="sidebar-toggle"><svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32"
                                xmlns="http://www.w3.org/2000/svg">
                                <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                <path d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                    class="cls-2"></path>
                                <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                <path d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                    class="cls-2"></path>
                            </svg>
                            <span>Filter</span>
                        </a>

                        {{-- <div class="toolbox-item toolbox-sort">
                        <label>Sort By:</label>

                        <div class="select-custom">
                            <select name="orderby" id="orderby" class="form-control" onchange="getorder(this.value)">
                                <option selected disabled>Default Sorting</option>
                                <option value="desc">Sort by Descending</option>
                                <option value="asc">Sort by Ascending</option>
                            </select>
                        </div>
                        <!-- End .select-custom -->
                    </div> --}}

                        <!-- End .toolbox-item -->
                    </div>

                </nav>
                <div id="pdata">
                    @include('home.productdata')
                </div>
            </div>
            <!-- End .col-lg-9 -->

            <div class="sidebar-overlay"></div>
            <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                <div class="sidebar-wrapper">
                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true"
                                aria-controls="widget-body-2">Categories</a>
                        </h3>

                        <div class="collapse show" id="widget-body-2">
                            <div class="widget-body">
                                <ul class="cat-list">
                                    @foreach ($categories as $cat)
                                        <li><a
                                                href="{{ route('products', ['cat' => $cat->category_name, 'brand' => 'all', 'st' => 'desc', 'pg' => 10, 'search' => 'query']) }}">{{ $cat->category_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- End .widget-body -->
                        </div>
                        <!-- End .collapse -->
                    </div>
                    <!-- End .widget -->

                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true"
                                aria-controls="widget-body-3">Brand</a>
                        </h3>

                        <div class="collapse show" id="widget-body-3">
                            <div class="pb-0 widget-body">
                                <ul class="cat-list">
                                    @foreach ($brands as $brand)
                                        <li><a
                                                href="{{ route('products', ['cat' => 'all', 'brand' => $brand->brand_name, 'st' => 'desc', 'pg' => 10, 'search' => 'query']) }}">{{ $brand->brand_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- End .widget-body -->
                        </div>
                        <!-- End .collapse -->
                    </div>
                    <!-- End .widget -->


                    <div class="widget widget-featured">
                        <h3 class="widget-title">Featured</h3>

                        <div class="widget-body">
                            <div class="owl-carousel widget-featured-products">
                                <div class="featured-col">
                                    @foreach ($featured as $feat)
                                        <div class="product-default left-details product-widget">
                                            <figure>
                                                <a
                                                    href="{{ route('productsingle', str_replace(' ', '-', $feat->name)) }}">
                                                    <img src="{{ asset('storage/' . $feat->featured_image) }}"
                                                        width="75" height="75" alt="product" />
                                                    <img src="{{ asset('storage/' . $feat->featured_image) }}"
                                                        width="75" height="75" alt="product" />
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-title"> <a
                                                        href="{{ route('productsingle', str_replace(' ', '-', $feat->name)) }}">{{ $feat->name }}</a>
                                                </h3>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span
                                                        class="product-price">{{ $settings->currency }}{{ number_format($feat->current_price) }}</span>
                                                </div>
                                                <!-- End .price-box -->
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    @endforeach
                                </div>
                                <!-- End .featured-col -->
                                <!-- End .featured-col -->
                            </div>
                            <!-- End .widget-featured-slider -->
                        </div>
                        <!-- End .widget-body -->
                    </div>
                    <!-- End .widget -->
                    <!-- End .widget -->
                </div>
                <!-- End .sidebar-wrapper -->
            </aside>
            <!-- End .col-lg-3 -->
        </div>
        <!-- End .row -->
    </div>
    <!-- End .container -->

    <div class="mb-4"></div>
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
