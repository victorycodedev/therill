@extends('layouts.main')
@section('title', 'Read Our Blog') 
@section('styles')
@parent
<link rel="stylesheet" href="{{asset('app/css/style.min.css')}}">
@endsection
@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Offer</li>
        </ol>
    </div><!-- End .container -->
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <article class="post single">
                <div class="post-media">
                    <img src="{{asset('storage/app/public/images/'. $offer->image)}}" alt="Post">
                </div><!-- End .post-media -->

                <div class="post-body">
                    <div class="post-date">
                        <span class="day">{{\Carbon\Carbon::parse($offer->created_at)->format('d')}}</span>
                        <span class="month">{{\Carbon\Carbon::parse($offer->created_at)->format('M');}}</span>
                    </div><!-- End .post-date -->

                    <h2 class="post-title">{{$offer->title}}</h2>
                    <div class="post-meta">
                        {{-- <a href="#" class="hash-scroll">0 Comments</a> --}}
                    </div>

                    <div class="post-content">
                        <h3>{{$offer->description}}
                        </h3>
                    </div><!-- End .post-content -->
                    <div>
                        <!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "{{$offer->whatsapp}}", // WhatsApp number
            call_to_action: "Message us now", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->
                    </div>
            </div><!-- End .related-posts -->
        </div><!-- End .col-lg-9 -->
    </div>
</div>
@endsection
@section('scripts')
@parent
@endsection

