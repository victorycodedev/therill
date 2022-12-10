@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('styles')
    @parent
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/app-assets/vendors/css/extensions/toastr.min.css') }}">
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
                                    <li class="breadcrumb-item active">Orders
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <x-success-message />
                <x-error-message />
                <div class="p-2 p-md-4 card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-inline">
                                <h3 class="d-inline">Clients Orders</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-danger">Users will get an email concerning the status of their order when you
                                change the delivery status</h5>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Customer</th>
                                            <th>Product Name</th>
                                            <th>Product Amount</th>
                                            <th>Amount + Shipping</th>
                                            <th>Payment Type</th>
                                            <th>Delivery Status</th>
                                            <th>Quantity</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>
                                                    {{ $order->created_at->toDayDateTimeString() }}
                                                </td>
                                                <td>
                                                    {{ $order->customer->firstname . ' ' . $order->customer->lastname }}
                                                </td>
                                                <td>
                                                    {{ $order->product->name }}
                                                </td>
                                                <td>
                                                    {{ $settings->currency }}{{ number_format($order->product->current_price) }}
                                                    {{-- {{$order->product->current_price}} --}}
                                                </td>
                                                <td>
                                                    {{ $settings->currency }}{{ number_format($order->amount) }}
                                                </td>
                                                <td>
                                                    {{ $order->order_status }}
                                                </td>
                                                <td>
                                                    <select id="{{ $order->id }}" class="shadow form-control"
                                                        onchange="changestatus(this.id, this.value)">
                                                        <option>{{ $order->deliveryStatus }}</option>
                                                        <option>Processed</option>
                                                        <option>Shipped</option>
                                                        <option>In Transit</option>
                                                        <option>Delivered</option>
                                                        <option>Completed</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    {{ $order->quantity }}
                                                </td>

                                                <td>
                                                    @if ($order->order_status != 'Pay on Delivery')
                                                        <a class="btn btn-success btn-sm"
                                                            href=" {{ route('admin.order.proof', $order->id) }}"> <i
                                                                class="fa fa-eye"></i> Proof</a> &nbsp;
                                                    @endif
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('admin.address', ['id' => $order->customer->id, 'order' => $order->id]) }}">Shipping
                                                        Address</a>

                                                    <a class="btn btn-danger btn-sm"
                                                        href="{{ route('admin.deleteorder', ['id' => $order->id]) }}">Delete</a>
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
    <script src="{{ asset('dash/app-assets/js/scripts/pages/dashboard-ecommerce.min.js') }}"></script>
    <!-- END: Page JS-->
    <!-- END: Page JS-->
    <script>
        function changestatus(id, order) {
            //alert(id);
            let url = "{{ url('/admin/changestatus/') }}" + '/' + id + '/' + order;
            fetch(url)
                .then(function(res) {
                    return res.json();
                })
                .then(function(response) {
                    Swal.fire(response, '', 'success');
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                })
                .catch(function(err) {
                    console.log(err);
                });
        }
    </script>
@endsection
