<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orders;
use App\Models\Settings;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Products;
use App\Models\Images;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard',[
            'orders' => Orders::all(),
            'pendingorders' => Orders::where('deliveryStatus', 'Pending')->get(),
            'products' =>Products::all(),
            'categories' =>Category::all(),
            'brands' =>Brand::all(),
            'users' =>User::all(),
        ]);
    }
}
