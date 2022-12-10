<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orders;
use Illuminate\Support\Facades\Hash;
use App\Mail\Notification;
use Illuminate\Support\Facades\Mail;

class ManageUserscontroller extends Controller
{
    //

    public function allusers(){
       return view('admin.Users.users',[
            'users' => User::orderByDesc('id')->get(),
        ]); 
    }

    public function viewuser($id){
        return view('admin.Users.viewuser',[
             'user' => User::where('id',$id)->first(),
         ]); 
     }

     public function updateuser(Request $request){
        $user = User::where('id', $request->id)->first();

        if (!empty($request->password)) {
            $pass = Hash::make($request->password);
        }else {
            $pass = $user->password;
        }
        User::where('id', $request->id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $pass,
        ]);
        return redirect()->back()->with('success', 'User Data Sucessfully Updated!');
     }

     public function deleteuser($id){
       $userorders=  Orders::where('user_id', $id)->get();

        if (count($userorders) > 0) {
            foreach ($userorders as $orders) {
                Orders::where('id', $orders->id)->delete();
            }
        }
        User::where('id', $id)->delete();
        return response()->json("User Successfuly Deleted, refreshing page in 2 seconds");
     }


     public function sendmailtoall(Request $request){
        //send email notification
        $objDemo = new \stdClass();
        $objDemo->message = $request['message'];
        $objDemo->date = \Carbon\Carbon::Now();
        $objDemo->subject = $request->subject;
            
        Mail::to(User::all())->send(new Notification($objDemo));
        return redirect()->back()->with('success','Your message was sent successfully!');
     }
}
