<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    //

    public function index(){
        $set = Settings::where('id',1)->first();
        $options = $set->payment_mode;
        $optarray = json_decode($options);
        return view('admin.Settings.settings', [
            'options' =>$optarray,
        ]);
    }


    Public function savepayment(Request $request){

        $payoptions = $request->payopt;
        $optionsArray = array();
        foreach($payoptions as $option){
           $optionsArray[] = $option;
        }
        Settings::where('id', '1')->update([
            'payment_mode' => json_encode($optionsArray),
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
            'bank_name'  => $request->bank_name,
            'rate'=> $request->rate,
            'btc_address'=> $request->btc_address,
            'ship_type'=> $request->ship_type,
            'ship_fee'=> $request->ship_fee,
        ]);
        return redirect()->back()->with('success',"Settings Updated Successfully");
    }

    public function updateinfo(Request $request){
        Settings::where('id', 1)->update([
            'site_name' => $request->site_name,
            'site_desc' =>$request->site_desc,
            'keywords' => $request->keywords,
            'contact_email' => $request->contact_email,
            'contact_phone' => $request->contact_phone,
            'currency' => $request->currency,
        ]);
        return redirect()->back()->with('success',"Settings Updated Successfully");
    }
}
