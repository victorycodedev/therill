@extends('layouts.auth')
@section('title', 'verify email')
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
                    <h2 class="ml-1 brand-text text-primary">Drop it</h2>
                </a>
                <p class="mb-2 card-text">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
                @if (session('status') == 'verification-link-sent')
                <p class="mb-2 card-text text-success">A new verification link has been sent to the email address you provided during registration.</p>
                @endif
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div class="mt-3">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button class="btn btn-primary btn-block" type="submit">Resend Verification Email</button>
                    </form>
        
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-primary btn-block" type="submit">logout</button>
                    </form>
                </div>
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