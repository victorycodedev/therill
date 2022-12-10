<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="keywords" content="{{$settings->keywords}}" />
    <meta name="description" content="{{$settings->site_desc}}">
    <!-- Favicon -->
    <title>{{$settings->site_name}} - @yield('title') </title>
    <link rel="apple-touch-icon" href="{{asset('app/images/logos.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app/images/logos.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    @section('styles')
        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css/bootstrap.min.css')}} ">
        <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css/bootstrap-extended.min.css')}} ">
      
        <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css/colors.min.css')}} ">
        <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css/components.min.css')}} ">
        <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css/themes/dark-layout.min.css')}} ">
        <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css/themes/bordered-layout.min.css')}} ">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css/pages/dashboard-ecommerce.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css/plugins/charts/chart-apex.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css/plugins/extensions/ext-component-toastr.min.css')}}">
        <!-- END: Page CSS-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/af-2.3.5/b-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/r-2.2.5/datatables.min.css"/>
        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('dash/assets/css/style.css')}}">
        <!-- END: Custom CSS-->
       <!-- Sweet Alert -->
       <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	    {{-- <script src="{{ asset('dash/app-assets/js/scripts/sweetalert/sweetalert.min.js')}} "></script> --}}
            
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
    @show
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="">
    @yield('content')

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; {{date('Y')}} {{$settings->site_name}}</span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->
    <script src="https://cdn.tiny.cloud/1/eal87pjfp16afwtve62y7zylrozqlsyti9ymr1srbg35aihj/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- END: Content-->
    @section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('dash/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->
    <!-- Vendor files -->
    <script src="{{asset('dash/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('dash/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/af-2.3.5/b-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/r-2.2.5/datatables.min.js"></script>
    <!-- BEGIN: Theme JS-->
    <script src="{{asset('dash/app-assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{asset('dash/app-assets/js/core/app.min.js')}}"></script>
    <script src="{{asset('dash/app-assets/js/scripts/customizer.min.js')}}"></script>
    <!-- END: Theme JS-->
     <!-- BEGIN: Page JS-->
     <script src="{{asset('dash/app-assets/js/scripts/pages/dashboard-ecommerce.min.js')}}"></script>
     <!-- END: Page JS-->
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
     <script>
		$(document).ready( function () {
			$('#datatable').DataTable({
				order: [ [0, 'desc'] ],
			});
		} );
	</script>
    
    @show
    
</body>
<!-- END: Body-->
</html>