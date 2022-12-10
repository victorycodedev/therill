<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Advert;

class AdvertController extends Controller
{
    //
    public function alladverts()
    {
        return view('admin.Advert.advert', [
            'adverts' => Advert::orderByDesc('id')->get(),
        ]);
    }

    public function addadvert()
    {
        return view('admin.Advert.addadvert', []);
    }
    public function editadvert($id)
    {
        return view('admin.Advert.edit-advert', [
            'advert' => Advert::where('id', $id)->first(),
        ]);
    }

    public function deleteadvert($id)
    {
        $advert = Advert::where('id', $id)->first();
        Storage::delete($advert->image);
        Advert::where('id', $id)->delete();

        return response()->json("Advert Deleted Successfully, refreshing page in 2 seconds");
    }

    public function saveadvert(Request $request)
    {
        $request->validate([
            'image' => 'image|max:1024|mimes:png,jpg,jepg',
        ]);

        if ($request->hasFile('image')) {
            $file = $request['image'];
            // save image to database
            $pixName = $file->store('images', 'public');
        }

        $advert  = new Advert();
        $advert->title = $request->title;
        $advert->image = $pixName;
        $advert->category = $request->category;
        $advert->whatsapp = $request->whatsapp;
        $advert->status = $request->status;
        $advert->description = $request->description;
        $advert->save();
        return redirect()->back()->with('success', 'Advert Added Successfully');
    }


    public function updateadvert(Request $request)
    {
        $request->validate([
            'image' => 'image|max:1024|mimes:png,jpg,jepg',
        ]);

        $advert = Advert::where('id', $request['id'])->first();

        if ($request->hasFile('image')) {
            $file = $request['image'];
            $pixName = $file->store('images', 'public');
        } else {
            $pixName = $advert->image;
        }

        Advert::where('id', $request->id)->update([
            'title' => $request->title,
            'image' => $pixName,
            'category' => $request->category,
            'whatsapp' => $request->whatsapp,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Advert Updated Successfully');
    }
}