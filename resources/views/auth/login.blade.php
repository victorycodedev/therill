@extends('layouts.main')
@section('title', 'Login to your account') 
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

<div class="container login-container">
    <div class="row">
        <div class="mx-auto col-lg-10">
            <div class="row">
                <div class="col-12">
                     <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                </div>
                <div class="col-md-6">
                    <div class="mb-1 heading">
                        <h2 class="title">Login</h2>
                    </div>

                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <label for="login-email">
                            Email address
                            <span class="required">*</span>
                        </label>
                        <input type="email" class="form-input form-wide" name="email" id="login-email" required />

                        <label for="login-password">
                            Password
                            <span class="required">*</span>
                        </label>
                        <input type="password" class="form-input form-wide" name="password" id="login-password" required />

                        <div class="form-footer">
                            <div class="mb-0 custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" id="lost-password" />
                                <label class="mb-0 custom-control-label" for="lost-password">Remember
                                    me</label>
                            </div>

                            <a href="{{ route('password.request') }}"
                                class="forget-password text-dark form-footer-right">Forgot
                                Password?</a>
                        </div>
                        <button type="submit" class="btn btn-dark btn-md w-100">
                            LOGIN
                        </button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="mb-1 heading">
                        <h2 class="title">Register</h2>
                    </div>

                    <form method="POST" action="{{route('register')}}">
                        @csrf
                        <label for="register-email">
                            Email address
                            <span class="required">*</span>
                        </label>
                        <input type="email" class="form-input form-wide" name="email" id="register-email" required />
                        <label>
                            FirstName
                            <span class="required">*</span>
                        </label>
                        <input type="text" class="form-input form-wide" name="firstname" id="register-email" required />

                        <label for="register-email">
                            Lastname
                            <span class="required">*</span>
                        </label>
                        <input type="text" class="form-input form-wide" name="lastname" id="register-email" required />
                        

                        <label for="register-password">
                            Password
                            <span class="required">*</span>
                        </label>
                        <input type="password" name="password" class="form-input form-wide" id="register-password"
                            required />

                            <label for="register-password">
                                Confirm Password
                                <span class="required">*</span>
                            </label>
                            <input type="password" class="form-input form-wide" name="password_confirmation" id="register-password"
                                required />

                        <div class="mb-2 form-footer">
                            <button type="submit" class="mr-0 btn btn-dark btn-md w-100">
                                Register
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