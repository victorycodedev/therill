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
                                    <li class="breadcrumb-item active">Categories
                                    </li>
                                    {{-- <li class="breadcrumb-item active">Add new Category
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
                                <h3 class="d-inline">Categories</h3>
                            </div>
                            <div class="d-inline">
                                <a href="{{route('admin.createcategory')}}" class="float-right btn btn-primary btn-sm">Add New</a>
                            </div> 
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Category Status</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $cate)
                                            <tr>
                                                <td>
                                                    <span class="font-weight-bold">{{$cate->category_name}}</span>
                                                </td>
                                                <td>
                                                    @if ($cate->status == "enabled")
                                                       <span class="badge badge-success">{{$cate->status}}</span> 
                                                    @else
                                                    <span class="badge badge-danger">{{$cate->status}}</span>  
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.deletecategory', $cate->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                                    <a href="{{route('admin.editcategory', $cate->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                                </td>
                                            </tr> 
                                        @endforeach
                                        
                                    </tbody>
                                </table>
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