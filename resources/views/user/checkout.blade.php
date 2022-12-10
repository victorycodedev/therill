@extends('layouts.main')
@section('title', 'Checkout')
@section('styles')
    @parent
    <link rel="stylesheet" href="{{ asset('app/css/style.min.css') }}">
@endsection
@section('content')
    <div class="container checkout-container">
        <ul class="flex-wrap checkout-progress-bar d-flex justify-content-center">
            <li>
                <a href="#">{{ $product->name }}</a>
            </li>
            <li class="active">
                <a href="#">Payment</a>
            </li>
        </ul>
        <x-error-message />
        <div class="row">
            <div class="order-12 order-lg-0 col-lg-7">
                <ul class="checkout-steps">
                    <li>
                        <h2 class="step-title"> Shipping details </h2>

                        <form action="{{ route('user.submitorder') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h6>We use the shipping address in your account as your default shipping address</h6>

                            <div class="form-group">
                                <label class="order-comments">Order notes (optional)</label>
                                <textarea class="form-control" name="info" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                            <div class="form-group d-none" id="general">
                                <label for="">Proof of Payment</label>
                                <input type="file" name="proof" id="proof" class="form-control" x-ref="fileupload">
                            </div>
                            <input type="hidden" name="payment_method" id="pmethod" value="Pay on Delivery">
                            <input type="hidden" name="amount" value="{{ $total }}">
                            <input type="hidden" name="quantity" value="{{ $quantity }}">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="form-group">
                                <button type="submit" class="btn btn-dark btn-block">
                                    Place order
                                </button>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- End .col-lg-8 -->

            <div class="order-1 order-lg-0 col-lg-5 order">
                <div class="order-summary">
                    <h3>YOUR ORDER</h3>

                    <table class="table table-mini-cart">
                        <thead>
                            <tr>
                                <th colspan="2">Product</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="product-col">
                                    <h3 class="product-title">
                                        {{ $product->name }} ×
                                        <span class="product-qty">{{ number_format($quantity) }}</span>
                                    </h3>
                                </td>

                                <td class="price-col">
                                    <span>{{ $settings->currency }}{{ number_format($amount) }}</span>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="cart-subtotal">
                                <td>
                                    <h4>Shipping</h4>
                                </td>

                                <td class="price-col">
                                    <span>{{ $settings->currency }}{{ number_format($shipping) }}</span>
                                </td>
                            </tr>


                            <tr class="order-total">
                                <td>
                                    <h4>Total</h4>
                                </td>
                                <td>
                                    <b
                                        class="total-price"><span>{{ $settings->currency }}{{ number_format($total) }}</span></b>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="payment-methods" x-data="{ tab: '1' }">
                        <h4 class="">Payment methods</h4>

                        <div class="p-0 d-flex">
                            @if (in_array('payondelivery', $options))
                                <button class="mr-1 btn btn-sm" id="payondelivery"
                                    :class="tab === '1' ? 'btn-primary' : 'btn-default'" @click="tab = '1'">
                                    Pay on Delivery
                                </button>
                            @endif

                            @if (in_array('bitcoin', $options))
                                <button class="mr-1 btn btn-sm " id="bitcoin"
                                    :class="tab === '2' ? 'btn-primary' : 'btn-default'" @click="tab = '2'">
                                    Crypto
                                </button>
                            @endif
                            @if (in_array('banktransfer', $options))
                                <button class="mr-1 btn btn-sm" id="banktransfer"
                                    :class="tab === '3' ? 'btn-primary' : 'btn-default'" @click="tab = '3'">
                                    Bank Transfer
                                </button>
                            @endif
                            @if (in_array('paystack', $options))
                                <button class="mr-1 btn btn-sm" id="inputpaystack"
                                    :class="tab === '4' ? 'btn-primary' : 'btn-default'" @click="tab = '4'">
                                    Card
                                </button>
                            @endif
                        </div>
                        <div class="mt-2">
                            <div class="d-none" id="bank">
                                <h6 style="font-size: 10px">Please send the correct amount to the bank account details below
                                </h6>
                                <div class="form-group ">
                                    <label for="">Bank Name</label>
                                    <input type="text" name="bankname" id="" class="form-control"
                                        value="{{ $settings->bank_name }}" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="">Account Name</label>
                                    <input type="text" name="account_name" id="" class="form-control"
                                        value="{{ $settings->account_name }}" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="">Account Number</label>
                                    <input type="text" name="account_number" id="" class="form-control"
                                        value="{{ $settings->account_number }}" readonly>
                                </div>
                            </div>

                            <div class="form-group d-none" id="btclist">
                                <label for=""></label>
                                <h6 style="font-size: 10px">Please send {{ $btcamt }} BTC to the Bitcoin Address
                                    below
                                    and upload the screenshot
                                </h6>

                                <input type="text" name="btc_address" id="" class="form-control"
                                    value="{{ $settings->btc_address }}" readonly>
                            </div>

                            <div class="form-group d-none" id="paystack">
                                <?php $payamount = $total * 100; ?>
                                <form method="POST" action="{{ route('user.pay.paystack') }}" accept-charset="UTF-8"
                                    class="form-horizontal" role="form">
                                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                    <input type="hidden" name="amount" value="{{ $payamount }}">
                                    <input type="hidden" name="currency" value="NGN">
                                    <input type="hidden" name="metadata"
                                        value="{{ json_encode($array = ['key_name' => 'value']) }}">
                                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <button class="py-2 btn btn-primary btn-sm" type="submit" value="Pay Now!">
                                        <i class="fa fa-credit-card" style="font-size:10px"></i> Pay with debit card
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End .cart-summary -->
            </div>
            <!-- End .col-lg-4 -->
        </div>
        <!-- End .row -->
    </div>
    <!-- End .container -->
@endsection

@section('scripts')
    @parent

    <script>
        let payondel = document.querySelector('#payondelivery');
        let bitcoin = document.querySelector('#bitcoin');
        let banktransfer = document.querySelector('#banktransfer');
        let paystack = document.querySelector('#paystack');

        let btc = document.querySelector('#btclist');
        let inputpaystack = document.querySelector('#inputpaystack');
        let general = document.querySelector('#general');
        let bank = document.querySelector('#bank');
        let pmethod = document.querySelector('#pmethod');

        payondel.addEventListener('click', function() {
            btc.classList.add('d-none');
            general.classList.add('d-none');
            paystack.classList.add('d-none');
            bank.classList.add('d-none');
            pmethod.value = "Pay on Delivery";
            document.querySelector('#proof').removeAttribute('required');
        });
        bitcoin.addEventListener('click', function() {
            btc.classList.remove('d-none');
            general.classList.remove('d-none');
            bank.classList.add('d-none');
            paystack.classList.add('d-none');
            pmethod.value = "Bitcoin";
            document.querySelector('#proof').setAttribute('required', '');
        });
        banktransfer.addEventListener('click', function() {
            btc.classList.add('d-none');
            general.classList.remove('d-none');
            bank.classList.remove('d-none');
            paystack.classList.add('d-none');
            pmethod.value = "Bank Transfer";
            document.querySelector('#proof').setAttribute('required', '');
        });
        inputpaystack.addEventListener('click', function() {
            btc.classList.add('d-none');
            paystack.classList.remove('d-none');
            general.classList.add('d-none');
            bank.classList.add('d-none');
            pmethod.value = "Paystack";
            document.querySelector('#proof').removeAttribute('required');
        });
    </script>
@endsection
