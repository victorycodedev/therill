<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="{{$settings->site_desc}}">
    <meta name="keywords" content="{{$settings->keywords}}">
    <title>{{$settings->site_name}} - @yield('title') </title>
    <link rel="apple-touch-icon" href="{{asset('dash/app-assets/images/ico/apple-icon-120.html')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dash/app-assets/images/ico/apple-icon-120.html')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    @section('styles')
        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/vendors/css/vendors.min.css')}}">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css/bootstrap-extended.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css/colors.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css/components.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css/themes/dark-layout.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css/themes/bordered-layout.min.css')}}">
        
        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('dash/assets/css/style.css')}}">
        <!-- END: Custom CSS-->
    @show
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- END: Content-->
    @section('scripts')
    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('dash/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('dash/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('dash/app-assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{asset('dash/app-assets/js/core/app.min.js')}}"></script>
    <!-- END: Theme JS-->
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
    @show
    
</body>
<!-- END: Body-->
</html>