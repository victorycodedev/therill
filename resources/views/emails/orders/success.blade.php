@component('mail::message')
# Hello {{ $order->customer->firstname . ' '.  $order->customer->lastname}},

Thank you for shopping on {{config('app.name')}}, <br>

Your Order was successful, details is given below. Please if this order is not correct, kinldy contact our support team right away. <br>

<img src="{{ asset('storage/app/public/images/' . $order->product->featured_image) }}" class="img-fluid product-img w-25" alt="product image" />
 <strong>Product:</strong>  {{ $order->product->name }} <br>
 <strong>Order Amount +  Shipping: </strong> {{number_format($order->amount)}} <br>
 <strong>Quantity:</strong> {{$order->quantity}} Pcs <br>
<br>
Please login to view your order status, we will also alert you if order have been shipped and delivered. <br/><br/>

Warm Regards, <br>
{{ config('app.name') }}
@endcomponent
