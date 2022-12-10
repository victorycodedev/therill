@extends('layouts.main')
@section('title', 'Contact Us') 
@section('styles')
@parent
<link rel="stylesheet" href="{{asset('app/css/style.min.css')}}">
@endsection
@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('/')}}"><i class="icon-home"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Contact Us
            </li>
        </ol>
    </div>
</nav>

<div class="container contact-us-container">
    <div class="contact-info">
        <div class="row">
            <div class="mb-3 col-12">
                <h2 class="mb-2 ls-n-25 m-b-1">
                    We’d love to hear from you
                </h2>

                <p> 
                    Whatever your question, we’re here to help. contact us now, You’ll hear back from us within one business day
                </p>
            </div>

           
            <div class="col-sm-4">
                <div class="text-center feature-box">
                    <i class="fa fa-mobile-alt"></i>
                    <div class="feature-box-content">
                        <h3>Phone Number</h3>
                        <h5>{{$settings->contact_phone}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="text-center feature-box">
                    <i class="far fa-envelope"></i>
                    <div class="feature-box-content">
                        <h3>E-mail Address</h3>
                        <h5>{{$settings->contact_email}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="text-center feature-box">
                    <i class="far fa-calendar-alt"></i>
                    <div class="feature-box-content">
                        <h3>Working Days/Hours</h3>
                        <h5>Mon - Sun / 9:00AM - 8:00PM</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mb-8"></div>
@endsection
@section('scripts')
@parent
@endsection