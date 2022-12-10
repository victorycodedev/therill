@extends('layouts.guest') 
@section('title', 'Create an Account') 
@section('styles') 
@parent
<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css/plugins/forms/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css/pages/page-auth.min.css')}}">
<!-- END: Page CSS-->
@endsection 
@section('content')
<div class="px-2 auth-wrapper auth-v1">
    <div class="py-2 auth-inner">
        <!-- Register v1 -->
        <div class="mb-0 card">
            <div class="card-body">
                <a href="javascript:void(0);" class="brand-logo">
                    <h2 class="ml-1 brand-text text-primary">Drop it</h2>
                </a>
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                
                <h4 class="mb-1 card-title">Your journey starts here 🚀</h4>

                <form class="mt-2 auth-register-form" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Firstname</label>
                        <input type="text" class="form-control" name="firstname" placeholder="johndoe" autofocus required />
                    </div>

                    <div class="form-group">
                        <label class="form-label">Lastname</label>
                        <input type="text" class="form-control" name="lastname" autofocus required />
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="john@example.com" required />
                    </div>

                    <div class="form-group">
                        <label class="form-label">Country</label>
                        <select name="country" id="" class="form-control" required>
                                <option selected disabled>Select Country</option>
                                <option>Nigeria</option>
                                <option >Ghana</option>
                            </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input type="password" class="form-control form-control-merge" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Confirm Password</label>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input type="password" class="form-control form-control-merge" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" required/>
                            <label class="custom-control-label" for="register-privacy-policy">
                                    I agree to <a href="javascript:void(0);">privacy policy & terms</a>
                                </label>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit" tabindex="5">Sign up</button>
                </form>

                <p class="mt-2 text-center">
                    <span>Already have an account?</span>
                    <a href="{{url('/login')}}">
                        <span>Sign in instead</span>
                    </a>
                </p>
            </div>
        </div>
        <!-- /Register v1 -->
    </div>
</div>

@endsection 
@section('scripts') 
@parent
<!-- BEGIN: Page JS-->
<script src="{{asset('dash/app-assets/js/scripts/pages/page-auth-register.min.js')}}"></script>
<!-- END: Page JS-->
@endsection