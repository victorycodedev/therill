<div class="row">
    @forelse ($products as $feat)
    <div class="col-6 col-sm-4">
        <div class="product-default">
            <figure>
                <a href="{{ route('productsingle',str_replace(' ', '-', $feat->name) ) }}">
                    <img src="{{asset('storage/app/public/images/'. $feat->featured_image)}}" width="280" height="280" alt="product" />
                    <img src="{{asset('storage/app/public/images/'. $feat->featured_image)}}" width="280" height="280" alt="product" />
                </a>

                <div class="label-group">
                    @if(!empty($feat->tag))
                    <div class="product-label label-hot">{{$feat->tag}}</div>
                    @endif
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
                    @if ($feat->instock < 1)
                            <a class="p-3 text-white btn-icon btn-danger"><span>SOLD OUT</span></a> 
                    @else
                        <a href="{{ route('productsingle',str_replace(' ', '-', $feat->name) ) }}" class="p-3 text-white btn-icon btn-dark"><span>BUY NOW</span></a>
                    @endif
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
    {{-- <div class="toolbox-item toolbox-show">
        <label>Show:</label>
        <div class="select-custom">
            <select name="count" class="form-control">
                <option value="12">12</option>
                <option value="24">24</option>
                <option value="36">36</option>
            </select>
        </div>
        <!-- End .select-custom -->
    </div> --}}
    <!-- End .toolbox-item -->

    <ul class="pagination toolbox-item">
        <li class="page-item">{{$products->links()}}</li>
    </ul>
</nav>
