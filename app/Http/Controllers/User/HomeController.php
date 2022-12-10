<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Support\Facades\Http;
use App\Models\Settings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;

class HomeController extends Controller
{
    //

    public function dashboard()
    {
        $shipping_address = ShippingAddress::where('id', Auth::user()->id)->first();

        if (!$shipping_address) {
            $adship = new ShippingAddress();
            $adship->user_id = Auth::user()->id;
            $adship->save();
            $shipping_address = ShippingAddress::where('id', Auth::user()->id)->first();
        }

        $order = Orders::where('user_id', Auth::user()->id)->get();

        return view('user.dashboard', [
            'shipping_address' => $shipping_address,
            'orders' => $order,
        ]);
    }

    public function wishlist()
    {
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();

        return view('user.wishlist', [
            'wishlist' => $wishlist,
        ]);
    }

    public function checkout(Request $request)
    {
        if (!$request->session()->exists('quantity')) {
            return redirect()->back();
        }
        $settings = Settings::find(1);

        $product = Products::where('id', $request->session()->get('product'))->first();
        $quantity = $request->session()->get('quantity');
        $amount = $product->current_price * $quantity;

        if ($settings->ship_type == "Percentage") {
            $shipping = $amount * $settings->ship_fee / 100;
        } else {
            $shipping = $settings->ship_fee;
        }

        $total = $amount + $shipping;
        //$btcusdprice = Http::get('https://api.cryptonator.com/api/ticker/btc-usd')['ticker']['price'];

        // $exchnage = $total / $settings->rate;
        // $mainbal = $exchnage / $btcusdprice;
        // $btcamt = round($mainbal,6);


        $set = Settings::where('id', 1)->first();
        $options = $set->payment_mode;
        $optarray = json_decode($options);

        return view('user.checkout', [
            'amount' => $amount,
            'quantity' => $quantity,
            'product' => $product,
            'total' => $total,
            'btcamt' => NULL,
            'shipping' => $shipping,
            'options' => $optarray,
        ]);
    }
}