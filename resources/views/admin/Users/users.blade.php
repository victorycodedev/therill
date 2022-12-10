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
                                    <li class="breadcrumb-item active">Manage Users
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
                                <h3 class="d-inline">Users List</h3>
                            </div>
                            <div class="d-inline">
                                <a href="#" data-toggle="modal" data-target="#exampleModal" class="float-right btn btn-primary btn-sm">Send Email</a>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Send Email to all your users</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.sendmailtoall')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Enter Email Subject" name="subject" id="" class="shadow-sm form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="message" placeholder="Enter Email Message, Please do not enter emojis" class="shadow-sm form-control" rows="10"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Send Now</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th></th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    {{$user->firstname}} {{$user->lastname}}
                                                </td>
                                                <td>
                                                    {{$user->email}} 
                                                </td>
                                                <td>
                                                    {{$user->phone}} 
                                                </td>
                                                <td>
                                                    @if ($user->isadmin)
                                                    <span class="badge badge-success">Admin</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm" href="{{route('admin.viewuser', $user->id)}}">View</a>
                                                          
                                                    <a class="btn btn-danger btn-sm" id="{{$user->id}}" href="#" onclick="deleteuser(this.id)">Delete</a>
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
        function deleteuser(id){
          //alert('yay ist working' + id);
          let url = "{{url('/admin/delete-user/')}}" + '/' + id;

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