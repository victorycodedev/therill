@extends('layouts.main')
@section('title', 'continue to reset your password') 
@section('styles')
@parent
<link rel="stylesheet" href="{{asset('app/css/style.min.css')}}">
@endsection
@section('content')
<div class="page-header">
    <div class="container d-flex flex-column align-items-center">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="demo4.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Forgot Password
                    </li>
                </ol>
            </div>
        </nav>
        <h1>My Account</h1>
    </div>
</div>

<div class="container reset-password-container">
    <div class="row">
        <div class="col-md-12">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        </div>
        <div class="col-lg-6 offset-lg-3">
            <div class="feature-box border-top-primary">
                <div class="feature-box-content">
                    <form class="mb-0" action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <p>
                            Lost your password? Please enter your
                            email address. You will receive
                            a link to create a new password via email.
                        </p>
                        <div class="mb-0 form-group">
                            <label for="reset-email" class="font-weight-normal">Email</label>
                            <input type="email" class="form-control" id="reset-email" name="email"
                                required />
                        </div>

                        <div class="mb-0 form-footer">
                            <a href="{{route('login')}}">Click here to login</a>

                            <button type="submit"
                                class="mr-0 btn btn-md btn-primary form-footer-right font-weight-normal text-transform-none">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
@endsection