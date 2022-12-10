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
                            <h2 class="float-left mb-0 content-header-title">Dashboard</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">

                        <!-- Total commisioned Card starts -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card">
                                <div class="pb-0 mb-2 card-header flex-column align-items-start">
                                    <div class="m-0 avatar bg-light-primary p-50">
                                        <div class="avatar-content">
                                            <i data-feather="archive" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="mt-1 font-weight-bolder">{{number_format(count($orders))}}</h2>
                                    <p class="card-text">Total Orders</p>
                                </div>

                            </div>
                        </div>
                        <!-- Total commisioned Card ends -->


                        <!-- Totalwithdrawals Card starts -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card">
                                <div class="pb-0 mb-2 card-header flex-column align-items-start">
                                    <div class="m-0 avatar bg-light-warning p-50">
                                        <div class="avatar-content">
                                            <i data-feather="alert-circle" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="mt-1 font-weight-bolder">{{number_format(count($pendingorders))}}</h2>
                                    <p class="card-text">Pending Orders</p>
                                </div>

                            </div>
                        </div>

                        <!-- Totalfunds Card starts -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card">
                                <div class="pb-0 mb-2 card-header flex-column align-items-start">
                                    <div class="m-0 avatar bg-light-success p-50">
                                        <div class="avatar-content">
                                            <i data-feather="compass" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="mt-1 font-weight-bolder">{{number_format(count($products))}}</h2>
                                    <p class="card-text">Total Products</p>
                                </div>

                            </div>
                        </div>
                        <!-- Totalfunds Card ends -->
                        <!-- Totalwithdrawals Card ends -->

                        <!-- weekly Points Card starts -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card">
                                <div class="pb-0 mb-2 card-header flex-column align-items-start">
                                    <div class="m-0 avatar bg-light-danger p-50">
                                        <div class="avatar-content">
                                            <i data-feather="users" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="mt-1 font-weight-bolder">{{number_format(count($categories))}}</h2>
                                    <p class="card-text">Total Categories</p>
                                </div>

                            </div>
                        </div>
                        <!-- Weekly Points Card ends -->
                        <!-- weekly Points Card starts -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card">
                                <div class="pb-0 mb-2 card-header flex-column align-items-start">
                                    <div class="m-0 avatar bg-light-danger p-50">
                                        <div class="avatar-content">
                                            <i data-feather="users" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="mt-1 font-weight-bolder">{{number_format(count($brands))}}</h2>
                                    <p class="card-text">Total Brands</p>
                                </div>

                            </div>
                        </div>
                        <!-- Weekly Points Card ends -->

                        <!-- Total Points Card starts -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card">
                                <div class="pb-0 mb-2 card-header flex-column align-items-start">
                                    <div class="m-0 avatar bg-light-info p-50">
                                        <div class="avatar-content">
                                            <i data-feather="users" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="mt-1 font-weight-bolder">{{number_format(count($users))}}</h2>
                                    <p class="card-text">Total Users</p>
                                </div>

                            </div>
                        </div>
                        <!-- Total Points Card ends -->
                        

                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

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