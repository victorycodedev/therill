@extends('layouts.main')
@section('title', 'My Account') 
@section('styles')
@parent
    <link rel="stylesheet" href="{{asset('app/css/style.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('app/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/af-2.3.5/b-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/r-2.2.5/datatables.min.css"/>
    
@endsection
@section('content')
<div class="page-header">
    <div class="container d-flex flex-column align-items-center">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        My Account
                    </li>
                </ol>
            </div>
        </nav>

        <h1>My Account</h1>
    </div>
</div>

<div class="container account-container custom-account-container">
    <x-success-message/>
    <div class="row">
        
        <div class="mb-3 sidebar widget widget-dashboard mb-lg-0 col-lg-3 order-0">
            <h2 class="text-uppercase">My Account</h2>
            <ul class="mb-0 nav nav-tabs list flex-column" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard"
                        role="tab" aria-controls="dashboard" aria-selected="true">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="order-tab" data-toggle="tab" href="#order" role="tab"
                        aria-controls="order" aria-selected="true">Orders</a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link" id="download-tab" data-toggle="tab" href="#download" role="tab"
                        aria-controls="download" aria-selected="false">Downloads</a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab"
                        aria-controls="address" aria-selected="false">Addresses</a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab"
                        aria-controls="edit" aria-selected="false">Account
                        details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="shop-address-tab" data-toggle="tab" href="#shipping" role="tab"
                        aria-controls="edit" aria-selected="false">Shipping Addres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.wishlist')}}">Wishlist</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                        this.closest('form').submit();" >Logout</a>
                    </form>
                </li>
            </ul>
        </div>
        <div class="order-1 col-lg-9 order-lg-last tab-content">
            <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
                <div class="dashboard-content">
                    <p>
                        Hello <strong class="text-dark">{{Auth::user()->firstname . ' '. Auth::user()->lastname}}</strong> (not
                        <strong class="text-dark">{{Auth::user()->firstname . ' '. Auth::user()->lastname}}</strong>?)
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="btn btn-link" onclick="event.preventDefault();
                            this.closest('form').submit();" >Log out</a>
                        </form>
                    </p>

                    <p>
                        From your account dashboard you can view your
                        <a class="btn btn-link link-to-tab" href="#order">recent orders</a>,
                        manage your
                        <a class="btn btn-link link-to-tab" href="#address">shipping and billing
                            addresses</a>, and
                        <a class="btn btn-link link-to-tab" href="#edit">edit your password and account
                            details.</a>
                    </p>

                    <div class="mb-4"></div>

                    <div class="row row-lg">
                        <div class="col-6">
                            <div class="pb-4 text-center feature-box">
                                <a href="#order" class="link-to-tab"><i
                                        class="sicon-social-dropbox"></i></a>
                                <div class="feature-box-content">
                                    <h3>ORDERS</h3>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-6 col-md-4">
                            <div class="pb-4 text-center feature-box">
                                <a href="#download" class="link-to-tab"><i
                                        class="sicon-cloud-download"></i></a>
                                <div class=" feature-box-content">
                                    <h3>DOWNLOADS</h3>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="col-6">
                            <div class="pb-4 text-center feature-box">
                                <a href="#address" class="link-to-tab"><i
                                        class="sicon-location-pin"></i></a>
                                <div class="feature-box-content">
                                    <h3>ADDRESSES</h3>
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-6">
                            <div class="pb-4 text-center feature-box">
                                <a href="#edit" class="link-to-tab"><i class="icon-user-2"></i></a>
                                <div class="p-0 feature-box-content">
                                    <h3>ACCOUNT DETAILS</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="pb-4 text-center feature-box">
                                <a href="{{route('user.wishlist')}}"><i class="sicon-heart"></i></a>
                                <div class="feature-box-content">
                                    <h3>WISHLIST</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="pb-4 text-center feature-box">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();" ><i class="sicon-logout"></i></a>
                                    <div class="feature-box-content">
                                        <h3>LOGOUT</h3>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End .row -->
                </div>
            </div><!-- End .tab-pane -->

            <div class="tab-pane fade" id="order" role="tabpanel">
                <div class="order-content">
                    <h3 class="account-sub-title d-none d-md-block"><i
                            class="mr-3 align-middle sicon-social-dropbox"></i>Orders</h3>
                    <div class="text-center order-table-container">
                        <table id="usertbl" class="table text-left table-order">
                            <thead>
                                <tr>
                                    <th class="order-id">ORDER</th>
                                    <th class="order-id">QUANTITY</th>
                                    <th class="order-date">DATE</th>
                                    <th class="order-status">STATUS</th>
                                    <th class="order-price">TOTAL</th>
                                    <th class="order-action">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                  <tr>
                                    <td>
                                        {{$order->product->name}}
                                    </td>
                                    <td>
                                        {{$order->quantity}}
                                    </td>
                                    <td>
                                        {{$order->created_at}}
                                    </td>
                                    <td>
                                        {{$order->deliveryStatus}}
                                    </td>
                                    <td>
                                       {{$settings->currency}}{{number_format($order->amount)}}
                                    </td>
                                    <td>
                                        @if ($order->deliveryStatus == 'Pending')
                                            <button onclick="deleteorder(this.id)" class="btn btn-danger btn-sm" id="{{$order->id}}">Cancel</button>
                                        @else
                                            
                                        @endif
                                        
                                    </td>
                                </tr>  
                                @empty
                                <tr>
                                    <td class="p-0 text-center" colspan="5">
                                        <p class="mt-5 mb-5">
                                            No Order has been made yet.
                                        </p>
                                    </td>
                                </tr>
                                @endforelse
                                
                            </tbody>
                        </table>
                        <hr class="pb-2 mt-0 mb-3" />
                        @if (count($orders) < 1)
                          <a href="{{route('products', ['cat'=>'all', 'brand' => 'all', 'st' => 'desc', 'pg' => 10, 'search'=> 'query'])}}" class="btn btn-dark">Go Shop</a>  
                        @endif
                        
                    </div>
                </div>
            </div><!-- End .tab-pane -->


            <div class="tab-pane fade" id="edit" role="tabpanel">
                <h3 class="pt-1 mt-0 ml-1 account-sub-title d-none d-md-block"><i
                        class="pr-1 mr-3 align-middle icon-user-2"></i>Account Details</h3>
                <div class="account-content">
                    <form action="javascript:void(0)" method="POST" id="profileform">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="acc-name">First name <span class="required">*</span></label>
                                    <input type="text" class="form-control" placeholder="Editor"
                                        id="acc-name" name="firstname" value="{{Auth::user()->firstname}}" required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="acc-lastname">Last name <span
                                            class="required">*</span></label>
                                    <input type="text" value="{{Auth::user()->lastname}}" class="form-control" id="acc-lastname"
                                        name="lastname" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="acc-email">Email address <span class="required">*</span></label>
                                    <input type="email" class="form-control" id="acc-email" name="email"
                                        placeholder="editor@gmail.com" value="{{Auth::user()->email}}" readonly />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="number" class="form-control" name="phone" value="{{Auth::user()->phone}}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="mr-0 btn btn-dark">
                                        Save changes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    <form action="javascript:void(0)" method="POST" id="passowrdform">
                        @csrf
                        @method('PUT')
                        <div class="change-password">
                            <h3 class="mb-2 text-uppercase">Password Change</h3>

                            <div class="form-group">
                                <label for="acc-password">Current Password</label>
                                <input type="password" class="form-control" id="acc-password"
                                    name="current_password" required/>
                            </div>

                            <div class="form-group">
                                <label for="acc-password">New Password (leave blank to leave
                                    unchanged)</label>
                                <input type="password" class="form-control" id="acc-new-password"
                                    name="password" required/>
                            </div>

                            <div class="form-group">
                                <label for="acc-password">Confirm New Password</label>
                                <input type="password" class="form-control" id="acc-confirm-password"
                                    name="password_confirmation" />
                            </div>
                        </div>

                        <div class="mt-3 mb-0 form-footer">
                            <button type="submit" class="mr-0 btn btn-dark">
                                Save Password
                            </button>
                        </div>
                    </form>
                </div>
            </div><!-- End .tab-pane -->

            
            <div class="tab-pane fade" id="shipping" role="tabpanel">
                <div class="pt-2 mt-0 address account-content">
                    <h4 class="mb-3 title">Shipping Address</h4>

                    <form class="mb-2" action="#" method="POST" id="shipaddress">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First name <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="firstname" value="{{$shipping_address->firstname}}" required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last name <span class="required">*</span></label>
                                    <input type="text" name="lastname" value="{{$shipping_address->lastname}}" class="form-control" required />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Company </label>
                            <input type="text" name="company" value="{{$shipping_address->company}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Street address <span class="required">*</span></label>
                            <input type="text" class="form-control" name="street"
                                placeholder="House number and street name" value="{{$shipping_address->street}}" required />
                        </div>

                        <div class="form-group">
                            <label>Town / City <span class="required">*</span></label>
                            <input type="text" name="city" value="{{$shipping_address->city}}" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label>State<span class="required">*</span></label>
                            <input type="text" name="state" class="form-control" value="{{$shipping_address->state}}" required />
                        </div>

                        <div class="form-group">
                            <label>Postcode / ZIP <span class="required">*</span></label>
                            <input type="text" name="postcode" class="form-control" value="{{$shipping_address->Postcode}}" />
                        </div>

                        <div class="mb-0 form-footer">
                            <div class="form-footer-right">
                                <button type="submit" class="py-4 btn btn-dark">
                                    Save Address
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .row -->
</div><!-- End .container -->

<div class="mb-5"></div><!-- margin -->
@endsection
@section('scripts')
@parent
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/af-2.3.5/b-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/r-2.2.5/datatables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#usertbl').DataTable({
            order: [ [0, 'desc'] ],
        });
    } );
</script>
<script>
   $('#profileform').on('submit', function(e) {
       e.preventDefault();
		//alert('love');
		$.ajax({
			url: "{{route('user.updateprofile')}}",
			type: 'POST',
			data: $('#profileform').serialize(),
			success: function(response) {
				Swal.fire({
                    title: response,
                    icon: 'success',
                })
			},
			error: function(error) {
				console.log(error);
			},
	
		});
	});

    $('#passowrdform').on('submit', function(e) {
       e.preventDefault();
		//alert('love');
		$.ajax({
			url: "{{route('user.updatepassword')}}",
			type: 'POST',
			data: $('#passowrdform').serialize(),
			success: function(response) {
                if(response.status === 201){
                    Swal.fire({
                        title: response.message,
                        icon: 'error',
                    });
                }

                if(response.status === 200){
                    Swal.fire({
                        title: response.message,
                        icon: 'success',
                    });
                    setTimeout(() => { location.reload(); }, 3000);
                }
				
			},
			error: function(error) {
				console.log(error);
			},
	
		});
	});


    $('#shipaddress').on('submit', function(e) {
       e.preventDefault();
		//alert('love');
		$.ajax({
			url: "{{route('user.updateaddress')}}",
			type: 'POST',
			data: $('#shipaddress').serialize(),
			success: function(response) {
                Swal.fire({
                    title: response,
                    icon: 'success',
                });
			},
			error: function(error) {
				console.log(error);
			},
	
		});
	});

    function deleteorder(id){
        let url = "{{url('/account/deleteorder/')}}" + '/' + id;

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