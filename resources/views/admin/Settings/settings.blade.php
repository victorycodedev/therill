@extends('layouts.app') 
@section('title', 'Admin Dashboard') 
@section('styles')
@parent
 <!-- BEGIN: Vendor CSS-->
 <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/vendors/css/vendors.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/vendors/css/charts/apexcharts.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/vendors/css/extensions/toastr.min.css')}}">
 <!-- END: Vendor CSS-->
    
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
                                    <li class="breadcrumb-item active">Settings
                                    </li>
                                    {{-- <li class="breadcrumb-item active">System Settings
                                    </li> --}}
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
                                <h3 class="d-inline">Update System Settings</h3>
                            </div>
                            {{-- <div class="d-inline">
                                <a href="{{route('admin.category')}}" class="float-right btn btn-danger btn-sm">go back</a>
                            </div>  --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-3 col-md-12">
                            <div class="">
								<ul class="nav nav-pills">
									<li class="nav-item">
										<a href="#info" class="nav-link active" data-toggle="tab">Website Information</a>
									</li>
									<li class="nav-item">
										<a href="#pref" class="nav-link" data-toggle="tab">Payment</a>
									</li>
									{{-- <li class="nav-item">
										<a href="#email" class="nav-link" data-toggle="tab">Email</a>
									</li> --}}
									{{-- <li class="nav-item">
										<a href="#social" class="nav-link" data-toggle="tab">Google Login</a>
									</li> --}}
								</ul>
                                <div class="tab-content">
									<div class="tab-pane fade show active" id="info">
										@include('admin.Settings.info')
									</div>
									<div class="tab-pane fade" id="pref">
										@include('admin.Settings.payment')
									</div>
									<div class="tab-pane fade" id="email">
										
									</div>
									<div class="tab-pane fade" id="social">
										
									</div>
								</div>
                            </div>
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
@endsection