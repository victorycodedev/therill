<div class="row">
    <div class="col-md-12">
        <form action="{{ route('admin.updatepayment') }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Bank Name</label>
                    <input type="text" name="bank_name" value="{{ $settings->bank_name }}"
                        class="shadow-sm form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Account Name</label>
                    <input type="text" name="account_name" value="{{ $settings->account_name }}" id="keywords"
                        class="shadow-sm form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Account Number</label>
                    <input type="number" name="account_number" value="{{ $settings->account_number }}"
                        class="shadow-sm form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="">BTC Address </label>
                    <input type="text" name="btc_address" value="{{ $settings->btc_address }}"
                        class="shadow-sm form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="">USD/NGN Rate</label>
                    <input type="text" name="rate" value="{{ $settings->rate }}" class="shadow-sm form-control"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Shipping Fee Type</label>
                    <select name="ship_type" class="shadow-sm form-control" required>
                        <option>{{ $settings->ship_type }}</option>
                        <option>Percentage</option>
                        <option>Fixed</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Shipping Fee Amount</label>
                    <input type="text" name="ship_fee" value="{{ $settings->ship_fee }}"
                        class="shadow-sm form-control" required>
                </div>
                <hr>
                <div class="form-group col-md-12">
                    <label for="">Payment Option for Users </label>
                </div>
                <div class="form-group col-6 col-md-3">
                    <div class="">
                        <input class="form-check-input" type="checkbox" name="payopt[]" id="payondelivery"
                            value="payondelivery">
                        <label class="form-check-label">
                            Pay on Delivery
                        </label>
                    </div>
                </div>
                <div class="form-group col-6 col-md-3">
                    <div class="">
                        <input class="form-check-input" type="checkbox" name="payopt[]" id="banktransfer"
                            value="banktransfer">
                        <label class="form-check-label">
                            Bank Transfer
                        </label>
                    </div>
                </div>
                {{-- <div class="form-group col-12 col-md-3">
                    <div class="">
                        <input class="form-check-input" type="checkbox" name="payopt[]" id="bitcoin" value="bitcoin">
                        <label class="form-check-label">
                            Bitcoin
                        </label>
                    </div>
                </div> --}}
                <div class="form-group col-12 col-md-3">
                    <div class="">
                        <input class="form-check-input" type="checkbox" name="payopt[]" id="paystack" value="paystack">
                        <label class="form-check-label">
                            Paystack
                        </label>
                    </div>
                </div>

                <div class="mt-2 form-group col-md-12">
                    <button type="submit" class="px-4 btn btn-primary">
                        Save Settings
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@if (in_array('payondelivery', $options))
    <script>
        document.getElementById("payondelivery").checked = true;
    </script>
@endif
@if (in_array('bitcoin', $options))
    <script>
        document.getElementById("bitcoin").checked = true;
    </script>
@endif
@if (in_array('banktransfer', $options))
    <script>
        document.getElementById("banktransfer").checked = true;
    </script>
@endif
@if (in_array('paystack', $options))
    <script>
        document.getElementById("paystack").checked = true;
    </script>
@endif
