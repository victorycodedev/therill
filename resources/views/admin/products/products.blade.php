@extends('layouts.app') 
@section('title', 'All System products') 
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
                                    <li class="breadcrumb-item active">All Products
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
                                <h3 class="d-inline">All System Products </h3>
                            </div>
                            <div class="d-inline">
                                <a href="{{route('admin.addproduct')}}" class="float-right btn btn-primary btn-sm">Add New</a>
                            </div> 
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Featured Image</th>
                                            <th>Product Name</th>
                                            <th>Catgory</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Total in Stock</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    <img src="{{asset('storage/app/public/images/'. $product->featured_image)}}" alt="" class="w-25">
                                                </td>
                                                <td>
                                                    {{$product->name}}
                                                </td>
                                                <td>
                                                    {{$product->category}} 
                                                </td>
                                                <td>
                                                    {{$settings->currency}}{{number_format($product->current_price)}}
                                                </td>
                                                <td>
                                                    @if ($product->status == "Publish")
                                                    <span class="badge badge-success"> {{$product->status}}</span>
                                                    @else
                                                    <span class="badge badge-danger"> {{$product->status}}</span>
                                                    @endif
                                                    
                                                </td>
                                                <td>
                                                    {{$product->instock}}
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                          <a class="dropdown-item" href="{{route('admin.editproduct', $product->id)}}">Edit</a>
                                                          <a class="dropdown-item" target="_blank" href="{{ route('productsingle',str_replace(' ', '-', $product->name) ) }}">View in website</a>
                                                          <a class="dropdown-item" id="{{$product->id}}" href="#" onclick="deleteprod(this.id)">Delete</a>
                                                        </div>
                                                      </div>
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
      <script>
          function deleteprod(id){
            //alert('yay ist working' + id);
            let url = "{{url('/admin/deleteproduct/')}}" + '/' + id;

            Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, i am sure',
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    fetch(url)
                    .then(function(res){
                    	return res.json();
                    })
                    .then(function (response){
                    	Swal.fire(response, '', 'success');
                        setTimeout(() => { location.reload(); }, 2000);
                    })
                    .catch(function(err){
                    	console.log(err);
                    });
                    
                }
            })
          }
      </script>
@endsection