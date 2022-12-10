<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ShippingAddress;
use App\Models\Wishlist;

class AccountController extends Controller
{

    public function updateprofile(Request $request)
    {

        User::where('id',  Auth::user()->id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
        ]);

        return response()->json('Profile Updated Succesfully');
    }

    public function updatepassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = User::find(Auth::user()->id);

        if (!Hash::check($request->current_password, $user->password)) {
            //return back()->with('message', 'Current password does not match!');
            return response()->json(['message' => 'Current password does not match!', 'status' => 201]);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['message' => 'Password changed successfully, refreshing', 'status' => 200]);
    }

    public function updateaddress(Request $request)
    {

        ShippingAddress::where('user_id',  Auth::user()->id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'company' => $request->company,
            'street' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'Postcode' => $request->postcode,
        ]);
        return response()->json('Shipping Address Updated Succesfully');
    }

    public function addtowish($id)
    {
        $wish = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $id)->first();

        if ($wish) {
            return response()->json(['message' => 'Product Already in your Wishlist', 'status' => 201]);
        }
        $newwish = new Wishlist();
        $newwish->user_id = Auth::user()->id;
        $newwish->product_id = $id;
        $newwish->save();
        return response()->json(['message' => 'Product Added to your Wishlist', 'status' => 200]);
    }

    public function removewish($id)
    {
        Wishlist::where('user_id', Auth::user()->id)->where('id', $id)->delete();
        return response()->json('Product removed from your Wishlist, refreshing page');
    }
}