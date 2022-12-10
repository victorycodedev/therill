@extends('layouts.app') 
@section('title', 'Edit Product') 
@section('styles')
@parent
 <!-- BEGIN: Vendor CSS-->
 <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/vendors/css/vendors.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/vendors/css/charts/apexcharts.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/vendors/css/extensions/toastr.min.css')}}">
    
<style>
    
.file-upload {
  width: 100%;
  margin: 0 auto;
  padding: 20px;
}

.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: #665cec;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #665cec;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #665cec;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 20px;
  border: 4px dashed #665cec;
  position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color: #bdbcd3;
  color: white;
  border: 4px dashed #ffffff;
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: #665cec;
  padding: 60px 0;
}

.file-upload-image {
  max-height: 200px;
  max-width: 200px;
  margin: auto;
  padding: 20px;
}

.remove-image {
  width: 200px;
  margin: 0;
  color: #fff;
  background: #cd4535;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #b02818;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.remove-image:hover {
  background: #c13b2a;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.remove-image:active {
  border: 0;
  transition: all .2s ease;
}
</style>
@endsection
@include('admin.topmenu')
@include('admin.sidebar')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="mb-2 content-header-left col-md-9 col-12">
                    <div class="row breadcrumbs-top">
                        <div class="col-md-12">
                            <h4 class="float-left mb-0 content-header-title">Dashboard</h4>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Product
                                    </li>
                                    <li class="breadcrumb-item active">Add new product
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <x-success-message/>
                <x-error-message/>
                <div class="p-2 p-md-4 card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-inline">
                                <h3 class="d-inline">Add Product</h3>
                            </div>
                            <div class="d-inline">
                                <a href="{{route('admin.allproducts')}}" class="float-right btn btn-danger btn-sm">Go Back</a>
                            </div> 
                        </div>
                    </div>
                    <div class="mt-4 row">
                        <div class="col-md-12">
                          <form action="{{route('admin.updateproduct')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$product->id}}">
                              <div class="form-row">
                                  <div class="form-group col-md-6">
                                      <h5>Featured Image</h5>
                                      <div class="file-upload">
                                          <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                                          <div class="image-upload-wrap">
                                            <input class="file-upload-input" name="featured_image" type='file' onchange="readURL(this);" accept="image/*"/>
                                            <div class="drag-text">
                                              <h3>Drag and drop a file or select add Image</h3>
                                            </div>
                                          </div>
                                          <div class="file-upload-content">
                                            <img class="file-upload-image" src="#" alt="your image" />
                                            <div class="image-title-wrap">
                                              <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                            </div>
                                          </div>
                                        </div>
                                  </div>
                                  <div class="col-md-6">
                                      <img src="{{asset('storage/app/public/images/'. $product->featured_image)}}" alt="" class="w-50">
                                  </div>
                                  <div class="mt-2 form-group col-md-12">
                                      <label for="">Product Name<span class="text-danger">*</span></label>
                                      <input type="text" value="{{$product->name}}" name="name" class="shadow-sm form-control" required>
                                  </div>
                                  <div class="mt-2 form-group col-md-6">
                                      <label for="">Product Category<span class="text-danger">*</span></label>
                                      <select name="category" id="" class="shadow-sm form-control" required>
                                          <option value="{{$product->category}}">{{$product->category}} </option>
                                          @foreach ($categories as $cat)
                                            <option value="{{$cat->category_name}}">{{$cat->category_name}}</option>  
                                          @endforeach
                                      </select>
                                  </div>
                                  <div class="mt-2 form-group col-md-6">
                                      <label for="">Product Brand <span class="text-danger">*</span></label>
                                      <select name="brand" id="" class="shadow-sm form-control" required>
                                          <option value="{{$product->brand}}">{{$product->brand}}</option>
                                          @foreach ($brands as $brand)
                                            <option value="{{$brand->brand_name}}">{{$brand->brand_name}}</option>  
                                          @endforeach
                                      </select>
                                  </div>
                                  <div class="mt-2 form-group col-md-6">
                                      <label for="">Product Sales Type <span class="text-danger">*</span></label>
                                      <select name="type" id="" class="shadow-sm form-control" required>
                                          <option value="{{$product->type}}">{{$product->type}}</option>
                                          <option value="Featured Products">Featured Products</option>
                                          <option value="Best Selling">Best Selling</option>
                                          <option value="Latest Product">Latest Product</option>
                                          <option value="New Arrivals">New Arrivals</option>
                                      </select>
                                  </div>

                                  <div class="mt-2 form-group col-md-6">
                                      <label>Current Price<span class="text-danger">*</span></label>
                                      <div class="mb-2 input-group mr-sm-2">
                                          <div class="input-group-prepend">
                                              <div class="input-group-text">{{$settings->currency}}</div>
                                          </div>
                                          <input type="number" value="{{$product->current_price}}" name="current_price" class="form-control" placeholder="Current Price of item" required>
                                      </div>
                                  </div>
                                  <div class="mt-2 form-group col-md-6">
                                      <label>Previous Price</label>
                                      <div class="mb-2 input-group mr-sm-2">
                                          <div class="input-group-prepend">
                                              <div class="input-group-text">{{$settings->currency}}</div>
                                          </div>
                                          <input type="number" name="previous_price" class="form-control" value="{{$product->previous_price}}" placeholder="Current Price of item">
                                      </div>
                                  </div>
                                  <div class="mt-2 form-group col-md-6">
                                      <label for="">SKU<span class="text-danger">*</span></label>
                                      <input type="text" name="sku" value="{{$product->sku}}" class="shadow-sm form-control" required>
                                  </div>
                                  <div class="mt-2 form-group col-md-6">
                                      <label for="">Total in stock<span class="text-danger">*</span></label>
                                      <input type="text" value="{{$product->instock}}" name="instock" class="shadow-sm form-control" required>
                                  </div>
                                  <div class="mt-2 form-group col-md-6">
                                    <label for="">Product Tag</label>
                                    <select name="tag" id="" class="shadow-sm form-control" required>
                                        <option value="{{$product->tag}}">{{$product->tag}}</option>
                                        <option value="HOT">HOT</option>
                                        <option value="NEW">NEW</option>
                                        <option value="DISCOUNTED">DISCOUNTED</option>
                                    </select>
                                  </div>
                                  <div class="mt-2 form-group col-md-6">
                                      <label for="">More Photos</label>
                                      <input type="file" name="photos[]" class="shadow-sm form-control" multiple>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="imagestat" value="add" checked>
                                        <label class="form-check-label">
                                          Add to the images
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="imagestat" value="delete">
                                        <label class="form-check-label" for="exampleRadios2">
                                          Delete all previous and add this new ones
                                        </label>
                                      </div>
                                  </div>
                                  <div class="mt-2 form-group col-md-6">
                                    <label for="">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="" class="shadow-sm form-control" required>
                                        <option value="{{$product->status}}">{{$product->status}}</option>
                                        <option value="Publish">Publish</option>
                                        <option value="Unpublish">Unpublish</option>
                                    </select>
                                </div>

                                  <div class="mt-2 form-group col-md-12">
                                      <label for="">Description</label>
                                      <textarea name="description" id="mytextarea" rows="5" class="ckeditor shadow-sm form-control">{{$product->description}}</textarea>
                                  </div>
                                  <div class="form-group col-md-12">
                                      <button type="submit" class="shadow-sm btn btn-primary form-control">Save Product Changes</button>
                                  </div>
                              </div>       
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
@endsection
@section('scripts')
    @parent
     <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.ckeditor').ckeditor();
            });
        </script>
      <!-- BEGIN: Page JS-->
      <script src="{{asset('dash/app-assets/js/scripts/pages/dashboard-ecommerce.min.js')}}"></script>
      <!-- END: Page JS-->
      <script>
          function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
  });
  $('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});
    </script>
      
@endsection