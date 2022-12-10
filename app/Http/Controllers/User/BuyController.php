<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orders;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\Products;
use App\Models\ShippingAddress;
use App\Mail\OrderSuccess;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Paystack;

class BuyController extends Controller
{
    public function buyproduct(Request $request){
        $produc = Products::where('id', $request->product_id)->first();
        
        if ($request->quantity > $produc->instock) {
            return redirect()->back()->with('message', "Item is remaining $produc->instock in stock");
        }
        $request->session()->put('quantity', $request->quantity);
        $request->session()->put('product', $request->product_id);
        return redirect()->route('user.checkout');
    }

    public function submitorder(Request $request){
        $settings = Settings::where('id', 1)->first();

        if($request->hasfile('proof'))
        {
            $this->validate($request, [
                'proof' => 'image|mimes:jpg,jpeg,png|max:500',
            ]);
            $file = $request->file('proof');
            $name = $file->getClientOriginalName();

            $proofname = 'proof' . time() . $name ;
            // save to storage/app/uploads as the new $filename
            $path = $file->storeAs('public/photos', $proofname);
        }else{
            $proofname = NULL;
        }
        
        $myadd = ShippingAddress::where('user_id',  Auth::user()->id)->first();
        
        if(empty($myadd->street) or empty($myadd->city) or empty($myadd->state)){
            return redirect()->back()->with('message', "Please Setup Your Shipping Address");
        }
        
        $order = new Orders();
        $order->user_id = Auth::user()->id;
        $order->product_id = $request->product_id;
        $order->order_status = $request->payment_method;
        $order->deliveryStatus = 'Pending';
        $order->quantity = $request->quantity;
        $order->amount = $request->amount;
        $order->proof = $proofname;
        $order->info = $request->info;
        $order->save();

        $produc = Products::where('id', $request->product_id)->first();

        Products::where('id', $request->product_id)->update([
            'instock' => $produc->instock - $request->quantity,
        ]);

        Mail::to(Auth::user()->email)->cc($settings->contact_email)->send(new OrderSuccess($order));

        $request->session()->forget(['quantity', 'product']);
        return redirect()->route('user.dashboard')->with('success', 'Order Placed Successfully');
    }

    public function deleteorder($id){
        Orders::where('id', $id)->delete();
        return response()->json('Order is successfully deleted, refreshing page');
    }

    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['message'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    public function handleGatewayCallback(Request $request)
    {
        $settings = Settings::where('id', 1)->first();
        $user = Auth::user();
        $paymentDetails = Paystack::getPaymentData();
        //dd($paymentDetails);
        $payamount = $paymentDetails['data']['amount'];
        $txn_ref = $paymentDetails['data']['reference'];
        $amount = $payamount/100;
        
        $order = new Orders();
        $order->user_id = $user->id;
        $order->product_id = $request->session()->get('product');
        $order->order_status = 'Paystack';
        $order->deliveryStatus = 'Pending';
        $order->quantity = $request->session()->get('quantity');
        $order->amount = $amount;
        $order->proof = NULL;
        $order->info = NULL;
        $order->save();

        Mail::to(Auth::user()->email)->cc($settings->contact_email)->send(new OrderSuccess($order));

        $request->session()->forget(['quantity', 'product']);
        return redirect()->route('user.dashboard')->with('success', 'Order Placed Successfully');
    }

}
