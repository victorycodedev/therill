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
                                    <li class="breadcrumb-item active">Add new Category
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
                                <h3 class="d-inline">Update Category</h3>
                            </div>
                            <div class="d-inline">
                                <a href="{{route('admin.category')}}" class="float-right btn btn-danger btn-sm">go back</a>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-5 col-md-8 offset-md-2">
                            <form action="{{route('admin.updatecategory')}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Category Name</label>
                                    <input type="text" name="category_name" value="{{$category->category_name}}"  id="category_name" class="shadow-sm form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Category Status</label>
                                    <select name="status" id="status" class="shadow-sm form-control" required>
                                        <option value="{{$category->status}} ">{{$category->status}} </option>
                                        <option value="enabled">Enabled</option>
                                        <option value="disabled">Disabled</option>
                                    </select>
                                </div>
                                <input type="hidden" name="id" value="{{$category->id}}">
                                <div class="form-group">
                                    <button type="submit" class="px-4 btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
{{-- <script>
    let url = "{{route('admin.addcategory')}}";
    document.querySelector('#addcategoryform').addEventListener('submit', savecatgory);
    function savecatgory() {
        fetch(url, {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    },
                method: 'post',
                credentials: "same-origin",
                body: JSON.stringify({
                    category_name: document.getElementById('category_name').value,
                    status: document.getElementById('status').value
                })
            })
            .then((response) => {
                swal({
                    title: "Success!",
                    text: response.message,
                    icon: "success",
                });
            })
            .catch(function(error) {
                console.log(error);
            });
    }

</script> --}}
    <!-- END: Content-->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
@endsection
@section('scripts')
    @parent
      <!-- BEGIN: Page JS-->
      <script src="{{asset('dash/app-assets/js/scripts/pages/dashboard-ecommerce.min.js')}}"></script>
      <!-- END: Page JS-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
