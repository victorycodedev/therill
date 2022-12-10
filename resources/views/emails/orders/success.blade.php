{{-- blade-formatter-disable --}}
@component('mail::message')
# Hello {{ !$admin ?  $order->customer->firstname . ' ' . $order->customer->lastname : 'Admin' }},

@if ($admin)
You have a new order from {{  $order->customer->firstname . ' ' . $order->customer->lastname }}
<img src="{{ asset('storage/' . $order->product->featured_image) }}" class="img-fluid product-img w-25"
    alt="product image" />
<strong>Product:</strong> {{ $order->product->name }} <br>
<strong>Order Amount + Shipping: </strong> {{ number_format($order->amount) }} <br>
<strong>Quantity:</strong> {{ $order->quantity }} Pcs <br>
<strong>Payment Method:</strong> {{ $order->ordr_status }} <br>
<br>
Please login to view/process this order.
@else
Thank you for shopping on {{ config('app.name') }}, <br>

Your Order was successful, details is given below. Please if this order is not correct, kinldy contact our support team
right away. <br>

<img src="{{ asset('storage/' . $order->product->featured_image) }}" class="img-fluid product-img w-25"
    alt="product image" />
<strong>Product:</strong> {{ $order->product->name }} <br>
<strong>Order Amount + Shipping: </strong> {{ number_format($order->amount) }} <br>
<strong>Quantity:</strong> {{ $order->quantity }} Pcs <br>
<br>
Please login to view your order status, we will also alert you if order have been shipped and delivered. <br /><br />
 
@endif

Warm Regards, <br>
{{ config('app.name') }}
@endcomponent
{{-- blade-formatter-disable --}}
