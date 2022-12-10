@extends('layouts.app') 
@section('title', 'Add new Advert') 
@section('styles')
@parent
 <!-- BEGIN: Vendor CSS-->
 <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/vendors/css/vendors.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/vendors/css/charts/apexcharts.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/vendors/css/extensions/toastr.min.css')}}">

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
                                    <li class="breadcrumb-item active">Advert
                                    </li>
                                    <li class="breadcrumb-item active">Add new Advert
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
                                <h3 class="d-inline">Add Advert</h3>
                            </div>
                            <div class="d-inline">
                                <a href="{{route('admin.alladverts')}}" class="float-right btn btn-primary btn-sm">View Adverts</a>
                            </div> 
                        </div>
                    </div>
                    <div class="mt-4 row">
                        <div class="col-md-12">
                          <form action="{{route('admin.saveadvert')}}" method="post" enctype="multipart/form-data">
                            @csrf
                              <div class="form-row">
                                  <div class="form-group col-md-6">
                                      <h5>Featured Image</h5>
                                      <div class="file-upload">
                                          <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                                          <div class="image-upload-wrap">
                                            <input class="file-upload-input" name="image" type='file' onchange="readURL(this);" accept="image/*" required/>
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
                                        <small>Size should be : width="1903" height="499" px</small>
                                  </div>
                                  <div class="mt-2 form-group col-md-12">
                                      <label for="">Advert Title<span class="text-danger">*</span></label>
                                      <input type="text" name="title" class="shadow-sm form-control" required>
                                  </div>
                                  <div class="mt-2 form-group col-md-6">
                                      <label for="">Advert Category<span class="text-danger">*</span></label>
                                      <select name="category" id="" class="shadow-sm form-control" required>
                                          <option value="Crypto">Crypto</option>
                                          <option value="ECommerce">ECommerce</option>
                                      </select>
                                  </div>
                                  
                                  <div class="mt-2 form-group col-md-6">
                                      <label for="">WhatsApp Contact<span class="text-danger">*</span></label>
                                      <input type="text" name="whatsapp" class="shadow-sm form-control" required>
                                  </div>
                                  
                                  <div class="mt-2 form-group col-md-6">
                                    <label for="">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="" class="shadow-sm form-control" required>
                                        <option value="Publish">Publish</option>
                                        <option value="Unpublish">Unpublish</option>
                                    </select>
                                </div>

                                  <div class="mt-2 form-group col-md-12">
                                      <label for="">Description</label>
                                      <textarea name="description" id="mytextarea" rows="5" class="shadow-sm form-control" required></textarea>
                                  </div>
                                  <div class="form-group col-md-12">
                                      <button type="submit" class="shadow-sm btn btn-primary form-control">Save Advert</button>
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