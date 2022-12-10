<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\Images;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Advert;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        if (Auth::user()->isadmin) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }

    public function home()
    {
        $featured = DB::table('products')
            ->where('type', 'Featured Products')
            ->where('status', 'Publish')
            ->where('category', '!=', 'Adult and More')
            ->offset(0)
            ->limit(10)
            ->get();

        $arrivals = DB::table('products')
            ->where('type', 'New Arrivals')
            ->where('status', 'Publish')
            ->where('category', '!=', 'Adult and More')
            ->offset(0)
            ->limit(10)
            ->get();

        $best = DB::table('products')
            ->where('type', 'Best Selling')
            ->where('status', 'Publish')
            ->offset(0)
            ->limit(10)
            ->get();

        $latest = DB::table('products')
            ->where('type', 'Latest Product')
            ->where('status', 'Publish')
            ->offset(0)
            ->limit(10)
            ->get();
        $adrvert = DB::table('adverts')
            ->where('status', 'Publish')
            ->offset(0)
            ->limit(2)
            ->get();

        return view('home.welcome', [
            'featured' => $featured,
            'arrivals' => $arrivals,
            'best' => $best,
            'latest' => $latest,
            'adverts' => $adrvert,
        ]);
    }

    public function products($cat, $brand, $sort, $page, $query)
    {

        $adrvert = DB::table('adverts')
            ->where('status', 'Publish')
            ->offset(0)
            ->orderByDesc('id')
            ->limit(1)
            ->get();
        $brands = Brand::orderByDesc('id')->where('status', 'enabled')->get();
        $categories = Category::orderByDesc('id')->where('status', 'enabled')->get();

        $featured = DB::table('products')
            ->where('type', 'Featured Products')
            ->where('status', 'Publish')
            ->offset(0)
            ->limit(3)
            ->get();

        if ($cat == 'all' and $brand == 'all' and $query == 'query') {
            $products = DB::table('products')
                ->orderBy('id', $sort)
                ->where('status', 'Publish')
                ->where('category', '!=', 'Adult and More')
                // ->where('category', $cat)
                // ->where('brand', $brand)
                // ->where('name', 'like', '%'.$query.'%')
                // ->orWhere('description', 'like', '%'.$query.'%')
                ->paginate($page);
        } elseif ($cat != 'all') {
            $products = DB::table('products')
                ->orderBy('id', $sort)
                ->where('status', 'Publish')
                ->where('category', $cat)
                // ->where('brand', $brand)
                // ->where('name', 'like', '%'.$query.'%')
                // ->orWhere('description', 'like', '%'.$query.'%')
                ->paginate($page);
        } elseif ($brand != 'all') {
            $products = DB::table('products')
                ->orderBy('id', $sort)
                ->where('status', 'Publish')
                //->where('category', $cat)
                ->where('brand', $brand)
                // ->where('name', 'like', '%'.$query.'%')
                // ->orWhere('description', 'like', '%'.$query.'%')
                ->paginate($page);
        } elseif ($query != 'query') {
            $products = DB::table('products')
                ->orderBy('id', $sort)
                ->where('status', 'Publish')
                //->where('category', $cat)
                // ->where('brand', $brand)
                ->where('name', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%')
                ->paginate($page);
        }



        return view('home.products', [
            'brands' => $brands,
            'categories' => $categories,
            'featured' => $featured,
            'products' => $products,
            'offers' => $adrvert,
        ]);
    }


    public function offers($title)
    {
        $slugs = explode("-", str_replace('-', ' ', $title));
        $advert = Advert::where('title', $slugs)->first();
        return view('home.offers', [
            'offer' => $advert,
        ]);
    }

    public function aboutus()
    {

        return view('home.aboutus', []);
    }




































    public function fetch_data(Request $request)
    {
        $sort_by = $request->get('sortby');
        $sort_type = $request->get('sorttype');
        $query = $request->get('query');
        $category = $request->get('category');
        $brand = $request->get('brand');


        $query = str_replace(" ", "%", $query);
        $products = DB::table('products')
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->orWhere('category', $category)
            ->orWhere('brand', $brand)
            ->orderBy('id', $sort_type)
            ->paginate(10);
        return view('home.productdata', [
            'products' => $products,
        ])->render();
    }

    public function productsingle($id)
    {
        $slugs = explode("-", str_replace('-', ' ', $id));
        $product = Products::where('name', $slugs)->first();
        $images = $product->productImage;

        $related = DB::table('products')
            ->where('category', $product->category)
            ->where('status', 'Publish')
            ->where('id', '!=', $product->id)
            ->offset(0)
            ->limit(8)
            ->get();
        return view('home.productsingle', [
            'product' => $product,
            'images' => $images,
            'related' => $related,
        ]);
    }

    public function contact()
    {
        return view('home.contactus', []);
    }
}