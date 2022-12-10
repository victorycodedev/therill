<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\ShippingAddress;
use App\Mail\OrderStatus;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    //

    public function fetchorders()
    {
        return view('admin.Orders.order', [
            'orders' => Orders::with(['product', 'customer'])->orderByDesc('id')->get(),
        ]);
    }

    public function address($id, $order)
    {
        $user = User::find($id);
        return view('admin.Orders.shippingaddress', [
            'user' => $user,
            'order' => Orders::where('id', $order)->first(['info']),
            'addres' => ShippingAddress::where('user_id', $id)->first(),
        ]);
    }

    public function proof($id)
    {
        return view('admin.Orders.proof', [
            'proof' => Orders::where('id', $id)->first(['proof']),
        ]);
    }

    public function deleteorder($id)
    {
        $order = Orders::where('id', $id)->first();

        if (!empty($order->proof)) {
            Storage::delete($order->proof);
        }
        Orders::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Order Deleted Succesfully');
    }



    public function changedelivery($id, $status)
    {

        $order = Orders::where('id', $id)->first();
        $user = User::where('id', $order->user_id)->first();

        $order->deliveryStatus = $status;
        $order->save();

        Mail::to($user->email)->send(new OrderStatus($order));

        return response()->json("Delivery Status changed to $status");
    }
}