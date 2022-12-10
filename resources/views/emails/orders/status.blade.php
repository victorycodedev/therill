@component('mail::message')
    # Hello {{ $order->customer->firstname . ' ' . $order->customer->lastname }},

    Your Order {{ $order->product->name }} is: {{ $order->deliveryStatus }} <br>

    <img src="{{ asset('storage/' . $order->product->featured_image) }}" class="img-fluid product-img w-25"
        alt="product image" />
    <strong>Product:</strong> {{ $order->product->name }} <br>
    <strong>Order Amount + Shipping: </strong> {{ number_format($order->amount) }} <br>
    <strong>Quantity:</strong> {{ $order->quantity }} Pcs <br>
    <br>

    Please login to confirm your order status and see more details about your order <br />

    Warm Regards, <br>
    {{ config('app.name') }}
@endcomponent
