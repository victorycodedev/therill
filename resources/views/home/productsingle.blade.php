@extends('layouts.main')
@section('title', 'Product Single') 
@section('styles')
@parent
<link rel="stylesheet" href="{{asset('app/css/style.min.css')}}">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('content')
<div class="container">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{route('products', ['cat'=>'all', 'brand' => 'all', 'st' => 'desc', 'pg' => 10, 'search'=> 'query'])}}">Products</a></li>
            <li class="breadcrumb-item"><a href="#">{{$product->name}}</a></li>
        </ol>
    </nav>

    <div class="product-single-container product-single-default">
        <x-success-message/>
        <x-error-message/>
        <div class="row">
            <div class="col-lg-5 col-md-6 product-single-gallery">
                <div class="product-slider-container">
                     @if(!empty($product->tag))
                        <div class="product-label label-hot">
                            
                            {{$product->tag}}
                            
                        </div>
                        @endif
                   

                    @if (count($images)> 0)
                        <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                            @foreach ($images as $image)
                                <div class="product-item">
                                    <img class="product-single-image" src="{{asset('storage/app/public/images/'. $image->img_file)}}" data-zoom-image="{{asset('storage/images/'. $image->img_file)}}" width="468" height="468" alt="product" />
                                </div> 
                            @endforeach
                        </div> 
                    @else
                    <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                        <div class="product-item">
                            <img class="product-single-image" src="{{asset('storage/app/public/images/'. $product->featured_image)}}" data-zoom-image="{{asset('storage/images/'. $product->featured_image)}}" width="468" height="468" alt="product" />
                        </div> 
                    </div> 
                    @endif
                    
                    <!-- End .product-single-carousel -->
                    <span class="prod-full-screen">
                        <i class="icon-plus"></i>
                    </span>
                </div>
                @if (count($images)> 0)
                <div class="prod-thumbnail owl-dots">
                    @foreach ($images as $image)
                    
                        <div class="owl-dot">
                            <img src="{{asset('storage/app/public/images/'. $image->img_file)}}" width="110" height="110" alt="product-thumbnail" />
                        </div>
                    
                    @endforeach
                </div>
                @endif
                
            </div>
            <!-- End .product-single-gallery -->

            <div class="col-lg-7 col-md-6 product-single-details">
                <h1 class="product-title">{{$product->name}}</h1>
                <hr class="short-divider">
                <div class="price-box">
                    <span class="old-price">{{$settings->currency}}{{number_format($product->previous_price)}}</span>
                    <span class="new-price">{{$settings->currency}}{{number_format($product->current_price)}}</span>
                </div>
                <!-- End .price-box -->

                {{-- <div class="product-desc">
                    <p>
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris
                        placerat eleifend leo.
                    </p>
                </div> --}}
                <!-- End .product-desc -->

                <ul class="single-info-list">

                    <li>
                        SKU: <strong>{{$product->sku}}</strong>
                    </li>

                    <li>
                        CATEGORY: <strong><a href="#" class="product-category">{{$product->category}}</a></strong>
                    </li>
                </ul>

                <div class="product-action">
                    @if ($product->instock < 1)
                            <a class="p-3 mr-2 text-white btn-icon btn-danger"><span>SOLD OUT</span></a> 
                    @else
                    <form action="{{route('user.buyproduct')}}" method="post">
                        @csrf
                        <div class="product-single-qty">
                            
                            <input class="horizontal-quantity form-control" type="text" name="quantity"> 
                            <input class="" type="hidden" name="amount" value="{{$product->current_price}}"> 
                            <input class="" type="hidden" name="product_id" value="{{$product->id}}"> 
                        </div>
                        <!-- End .product-single-qty -->

                        <button type="submit" class="mr-2 btn btn-dark" title="Buy Product">Buy Now</button>
                    </form>
                    @endif
                    
                    {{-- <a href="cart.html" class="btn btn-gray view-cart d-none">View cart</a> --}}
                </div>
                <!-- End .product-action -->

                <hr class="mt-0 mb-0 divider">

                <div class="mb-3 product-single-share">
                    <label class="sr-only">Share:</label>

                    {{-- <div class="mr-2 social-icons">
                        <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                        <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                        <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>
                        <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank" title="Google +"></a>
                        <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
                    </div>
                    <!-- End .social-icons --> --}}
                    @auth
                        <a href="javascript:void(0)" class="btn btn-praimry btn-sm add-wishlist" onclick="addtowish(this.id)" id="{{$product->id}}" ><i
                            class="icon-wishlist-2"></i><span>Add to
                            Wishlist</span></a>
                    @endauth
                    
                </div>
                <!-- End .product single-share -->
            </div>
            <!-- End .product-single-details -->
        </div>
        <!-- End .row -->
    </div>
    <!-- End .product-single-container -->

    <div class="product-single-tabs">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                <div class="product-desc-content">
                    <p> {!!$product->description!!}</p>
                </div>
                <!-- End .product-desc-content -->
            </div>
            <!-- End .tab-pane -->

        </div>
        <!-- End .tab-content -->
    </div>
    <!-- End .product-single-tabs -->

    <div class="pt-0 products-section">
        <h2 class="section-title">Related Products</h2>
        
        <div class="products-slider owl-carousel owl-theme dots-top dots-small">
            @foreach ($related as $feat)
            <div class="product-default">
                <figure>
                    <a href="{{ route('productsingle',str_replace(' ', '-', $feat->name) ) }}">
                        <img src="{{asset('storage/app/public/images/'. $feat->featured_image)}}" width="280" height="280" alt="product">
                        <img src="{{asset('storage/app/public/images/'. $feat->featured_image)}}" width="280" height="280" alt="product">
                    </a>
                    <div class="label-group">
                        <div class="product-label label-hot">HOT</div>
                    </div>
                </figure>
                <div class="product-details">
                    <div class="category-list">
                        <a class="product-category">{{$feat->category}}</a>
                    </div>
                    <h3 class="product-title">
                        <a href="{{ route('productsingle',str_replace(' ', '-', $feat->name) ) }}">{{$feat->name}}</a>
                    </h3>
                    
                    <!-- End .product-container -->
                    <div class="price-box">
                        <del class="old-price">{{$settings->currency}}{{number_format($feat->previous_price)}}</del>
                        <span class="product-price">{{$settings->currency}}{{number_format($feat->current_price)}}</span>
                    </div>
                    <!-- End .price-box -->
                    <div class="product-action">
                        <a href="{{ route('productsingle',str_replace(' ', '-', $feat->name) ) }}" class="btn-icon btn-add-cart"><i
                                class="fa fa-arrow-right"></i><span>BUY NOW</span></a>
                    </div>
                </div>
                <!-- End .product-details -->
            </div>
@endforeach
        </div>
        <!-- End .products-slider -->
        
        
    </div>
    <!-- End .products-section -->
</div>
<!-- End .container -->
@endsection
@section('scripts')
@parent
<script>
    function addtowish(id){
        
		let url = "{{url('/account/addtowish/')}}" + '/' + id;
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