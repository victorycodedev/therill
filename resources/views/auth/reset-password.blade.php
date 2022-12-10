@extends('layouts.guest')
@section('title', 'Reset password')
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
                <p class="mb-2 card-text">Create new password</p>
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form class="mt-2 auth-login-form" action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="form-group">
                        <label for="login-email" class="form-label">Email</label>
                        <input type="text" class="form-control"  name="email" placeholder="john@example.com" tabindex="1" autofocus required/>
                    </div>
                    <div class="form-group">
                        <label class="form-label">New Password</label>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input type="password" class="form-control form-control-merge" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required/>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Confirm Password</label>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input type="password" class="form-control form-control-merge" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" tabindex="3" required />
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit" tabindex="4">Reset Password</button>
                </form>
            </div>
        </div>
        <!-- /Login v1 -->
    </div>
</div>
@endsection
@section('scripts')
    @parent
    <!-- BEGIN: Page JS-->
    <script src="{{asset('dash/app-assets/js/scripts/pages/page-auth-login.js')}}"></script>
    <!-- END: Page JS-->

@endsection