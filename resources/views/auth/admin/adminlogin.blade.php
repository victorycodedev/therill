@extends('layouts.guest')
@section('title', 'Manager Account Signin')
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
        <!-- Login v1 -->
        <div class="mb-0 card">
            <div class="card-body">
                <a href="javascript:void(0);" class="brand-logo">
                    <h2 class="ml-1 brand-text text-primary">{{$settings->site_name}}</h2>
                </a>
                <h4 class="mb-1 card-title">Welcome Manager!👋</h4>
                <p class="mb-2 card-text">Please sign-in to your account and continue the adventure</p>
               
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form class="mt-2 auth-login-form" action="{{route('adminauth')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="login-email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="login-email" name="email" placeholder="john@example.com" aria-describedby="login-email" tabindex="1" autofocus />
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <label for="login-password">Password</label>
                            <a href="{{ route('createforgotpass') }}">
                                <small>Forgot Password?</small>
                            </a>
                        </div>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input type="password" class="form-control form-control-merge" id="login-password" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
                            <div class="input-group-append">
                                <span class="cursor-pointer input-group-text"><i
                                    data-feather="eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" tabindex="4">Sign in</button>
                </form>

                <!--<p class="mt-2 text-center">-->
                <!--    <span>New on our platform?</span>-->
                <!--    <a href="{{url('register')}}">-->
                <!--        <span>Create an account</span>-->
                <!--    </a>-->
                <!--</p>-->
            </div>
        </div>
        <!-- /Login v1 -->
    </div>
</div>
@endsection
@section('scripts')
    @parent
    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/js/scripts/pages/page-auth-login.js')}}"></script>
    <!-- END: Page JS-->
@endsection