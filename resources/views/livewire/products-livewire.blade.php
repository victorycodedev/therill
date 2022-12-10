<div>
    <div class="row">
        <div class="col-lg-9">
            <div class="boxed-slider owl-carousel owl-carousel-lazy owl-theme owl-theme-light">
                <div class="boxed-slide boxed-slide-1">
                    <figure>
                        <img class="slide-bg owl-lazy" data-src="app/images/banners/banner-fashion-1.jpg" src="app/images/banners/banner-fashion-1.jpg" alt="banner" width="870" height="300">
                    </figure>
                    <div class="slide-content">
                        <h4>Fashion</h4>
                        <h5>mega sale</h5>
                        <span>extra</span>
                        <b>60<i>%</i> OFF</b>
                        <a href="http://" class="btn btn-sm btn-primary">Learn More</a>
                    </div>
                </div>
    
                <div class="boxed-slide boxed-slide-2">
                    <figure>
                        <img class="slide-bg owl-lazy" data-src="app/images/banners/banner-fashion-2.jpg" src="app/images/banners/banner-fashion-2.jpg" alt="banner" width="870" height="300">
                    </figure>
                    <div class="slide-content">
                        <h5>Check out over <span>200</span><i>+</i></h5>
                        <h4>Men's jackets & coats</h4>
                        <a href="#" class="btn btn-sm btn-dark">SHOP NOW</a>
                    </div>
                </div>
            </div>
    
            <nav class="mt-2 toolbox sticky-header" data-sticky-options="{'mobile': true}">
                <div class="toolbox-left">
                    <a href="#" class="sidebar-toggle"><svg data-name="Layer 3" id="Layer_3"
                            viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                            <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                            <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                            <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                            <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                            <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                            <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                            <path
                                d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                class="cls-2"></path>
                            <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                            <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                            <path
                                d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                class="cls-2"></path>
                        </svg>
                        <span>Filter</span>
                    </a>
    
                    <div class="toolbox-item toolbox-sort">
                        <label>Sort By:</label>
    
                        <div class="select-custom">
                            <select name="orderby" class="form-control" wire:model='sort_type'>
                                <option selected disabled>Default Sorting</option>
                                <option value="desc">Sort by Descending</option>
                                <option value="asc">Sort by Ascending</option>
                            </select>
                        </div>
                        <!-- End .select-custom -->
                    </div>
                </div>
                <!-- End .toolbox-left -->
                <div class="float-right">
                    <div class="mt-0 text-right header-icon header-search header-search-inline header-search-category w-lg-max">
                        <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                        <form action="#" method="get">
                            <div class="header-search-wrapper">
                                <input type="search" wire:model='search' class="form-control" name="q" id="serach" placeholder="Search..." required>
                                <!-- End .select-custom -->
                                <button class="p-0 btn icon-magnifier" title="search" type="submit"></button>
                            </div>
                            <!-- End .header-search-wrapper -->
                        </form>
                    </div>
                    <!-- End .toolbox-item -->
                </div>
            </nav>
            <div class="row">
                @forelse ($allproducts as $feat)
                <div class="col-6 col-sm-4">
                    <div class="product-default">
                        <figure>
                            <a href="{{ route('productsingle',str_replace(' ', '-', $feat->name) ) }}">
                                <img src="{{asset('storage/images/'. $feat->featured_image)}}" width="280" height="280" alt="product" />
                                <img src="{{asset('storage/images/'. $feat->featured_image)}}" width="280" height="280" alt="product" />
                            </a>
            
                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>
                            </div>
                        </figure>
            
                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
                                    <a href="javascript:void(0)" class="product-category">{{$feat->category}}</a>
                                </div>
                            </div>
            
                            <h3 class="product-title"> <a href="{{ route('productsingle',str_replace(' ', '-', $feat->name) ) }}">{{$feat->name}}</a> </h3>
            
                            <div class="price-box">
                                <span class="old-price">{{$settings->currency}}{{number_format($feat->previous_price)}}</span>
                                <span class="product-price">{{$settings->currency}}{{number_format($feat->current_price)}}</span>
                            </div>
                            <!-- End .price-box -->
            
                            <div class="product-action">
                                @auth
                                <a href="javascript:void(0)" class="btn-icon-wish" onclick="addtowish(this.id)" id="{{$feat->id}}" title="wishlist"><i
                                        class="icon-heart"></i></a>  
                                @endauth
                                <a href="{{ route('productsingle',str_replace(' ', '-', $feat->name) ) }}" class="btn-icon btn-add-cart"><i
                                    class="fa fa-arrow-right"></i><span>BUY NOW</span></a>
                            </div>
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>  
                @empty
                <div class="col-6 col-sm-4">
                    <div class="product-default">
                        <h3 class="product-title">No product at the moment, please check back later</h3>
                    </div>
                </div>  
                @endforelse
            </div>
            <!-- End .row -->
            
            
            <nav class="toolbox toolbox-pagination">
                <div class="toolbox-item toolbox-show">
                    <label>Show:</label>
                    <div class="select-custom">
                        <select name="count" wire:model='paginate' class="form-control">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                        {{-- {{$paginate}} --}}
                    </div>
                    <!-- End .select-custom -->
                </div>
                <!-- End .toolbox-item -->
            
                {!! $allproducts->links() !!}
            </nav>
        </div>
        <!-- End .col-lg-9 -->
        <div class="sidebar-overlay"></div>
        <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
            <div class="sidebar-wrapper">
                <div class="widget">
                    <h3 class="widget-title">
                        <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">Categories</a>
                    </h3>

                    <div class="collapse show" id="widget-body-2">
                        <div class="widget-body">
                            <ul class="cat-list">
                                @foreach ($categories as $cat)
                                    <li><a href="#" wire:click.prevent="sortbycategory('{{$cat->category_name}}')">{{$cat->category_name}}</a></li>  
                                @endforeach
                                {{-- <input type="text" name="" value="{{$category}}" wire:model='category' id=""> --}}
                            </ul>
                        </div>
                        <!-- End .widget-body -->
                    </div>
                    <!-- End .collapse -->
                </div>
                <!-- End .widget -->

                <div class="widget">
                    <h3 class="widget-title">
                        <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true" aria-controls="widget-body-3">Brand</a>
                    </h3>

                    <div class="collapse show" id="widget-body-3">
                        <div class="pb-0 widget-body">
                            <ul class="cat-list">
                                @foreach ($brands as $brand)
                                    <li><a href="#" wire:click.prevent="sortbybrand('{{$brand->brand_name}}')">{{$brand->brand_name}}</a></li>  
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
                                        <a href="{{ route('productsingle',str_replace(' ', '-', $feat->name) ) }}">
                                            <img src="{{asset('storage/images/'. $feat->featured_image)}}" width="75" height="75" alt="product" />
                                            <img src="{{asset('storage/images/'. $feat->featured_image)}}" width="75" height="75" alt="product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h3 class="product-title"> <a href="{{ route('productsingle',str_replace(' ', '-', $feat->name) ) }}">{{$feat->name}}</a> </h3>
                                        <!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">{{$settings->currency}}{{number_format($feat->current_price)}}</span>
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
    
</div>
