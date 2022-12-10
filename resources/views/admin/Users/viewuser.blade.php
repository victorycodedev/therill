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
                                    <li class="breadcrumb-item active">Users
                                    </li>
                                    <li class="breadcrumb-item active">{{$user->firstname . ' ' . $user->lastname}}
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
                                <h3 class="d-inline">View/Update User Data</h3>
                            </div>
                            <div class="d-inline">
                                <a href="{{route('admin.allusers')}}" class="float-right btn btn-danger btn-sm">go back</a>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('admin.updateuser')}}" method="post">
                                @csrf
                                @method('PUT')
                                  <div class="form-row">
                                      <div class="mt-2 form-group col-md-12">
                                        <label for="">Firstname</label> 
                                          <input type="text" value="{{$user->firstname}}" name="firstname" class="shadow-sm form-control" required>
                                      </div>
                                      <div class="mt-2 form-group col-md-12">
                                        <label for="">Lastname</label> 
                                          <input type="text" value="{{$user->lastname}}" name="lastname" class="shadow-sm form-control" required>
                                      </div>
                                      <div class="mt-2 form-group col-md-12">
                                        <label for="">Phone Number</label>
                                          <input type="text" value="{{$user->phone}}" name="phone" class="shadow-sm form-control" required>
                                      </div>
                                      <div class="mt-2 form-group col-md-12">z
                                        <label for="">Email Address</label>
                                          <input type="text" value="{{$user->email}}" name="email" class="shadow-sm form-control" required>
                                      </div>
                                      <div class="mt-2 form-group col-md-12">
                                        <label for="">Country</label>
                                          <input type="text" value="{{$user->country}}" name="country" class="shadow-sm form-control" readonly>
                                      </div>
                                      <div class="mt-2 form-group col-md-12">
                                        <label for="">Address</label>
                                          <textarea name="address" class="shadow-sm form-control" id="" rows="5" readonly>
                                              {{$user->address}}
                                          </textarea>
                                      </div>
                                      <div class="mt-2 form-group col-md-12">
                                        <label for="">Password</label>
                                          <input type="password" name="password" class="shadow-sm form-control">
                                      </div>
                                      <input type="hidden" name="id" value="{{$user->id}}">
                                      <div class="form-group col-md-12">
                                          <button type="submit" class="shadow-sm btn btn-primary form-control">Save</button>
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
@endsection