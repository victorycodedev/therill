<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Products;
use App\Models\Images;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function allproducts(){
        return view('admin.products.products', [
            'products'=> Products::orderByDesc('id')->get(),
        ]);
    }

    public function managecategory(){
        $cat = Category::orderByDesc('id')->get();

        return view('admin.category.category', [
            'categories'=> $cat,
        ]);
    }

    public function editcategory($id){
        $cat = Category::where('id', $id)->first();
        return view('admin.category.editcategory', [
            'category' => $cat,
        ]);
    }

    public function createcategory(){
        
        return view('admin.category.addcategory', [

        ]);
    }


    // Add category
    public function addcategory(Request $request){
        $cat = Category::where('category_name', $request->category_name)->first();
        if($cat){
            return redirect()->back()->with('message', 'Category Already Exist');
        }
        $newcategory  = new Category();
        $newcategory->category_name = $request->category_name;
        $newcategory->status = $request->status;
        $newcategory->save();
        return redirect()->back()->with('success', 'Category Added');
    }

    // update category
    public function updatecategory(Request $request){
        // $cat = Category::where('category_name', $request->category_name)->first();
        // if($cat){
        //     return redirect()->back()->with('message', 'Category Already Exist');
        // }
        Category::where('id', $request->id)->update([
            'category_name'=> $request->category_name,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Category Updated');
    }


    // update category
    public function deletecategory($id){
        Category::where('id', $id)->delete();
        return redirect()->route('admin.category')->with('success', 'Category Succesfully Deleted');
    }


    // Brands
    /*
    Everything about brands starts here
    */ 

    public function brands(){
        $brand = Brand::orderByDesc('id')->get();
        return view('admin.brand.brand', [
            'brands'=> $brand,
        ]);
    }

    public function createbrand(){
        
        return view('admin.brand.addbrand', [

        ]);
    }


    // Add category
    public function addbrand(Request $request){
        $cat = Brand::where('brand_name', $request->brand_name)->first();
        if($cat){
            return redirect()->back()->with('message', 'Brand Name Already Exist');
        }
        $newcategory  = new Brand();
        $newcategory->brand_name = $request->brand_name;
        $newcategory->status = $request->status;
        $newcategory->save();
        return redirect()->back()->with('success', 'Brand Added Successfully');
    }

    public function brandedit($id){
        $brand = Brand::where('id', $id)->first();
        return view('admin.brand.editbrand', [
            'brand' => $brand,
        ]);
    }

    public function updatebrand(Request $request){
       
        Brand::where('id', $request->id)->update([
            'brand_name'=> $request->brand_name,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Brand Updated');
    }

    public function deletebrand($id){
        Brand::where('id', $id)->delete();
        return redirect()->route('admin.brandslist')->with('success', 'Brand Succesfully Deleted');
    }


    // Products
    public function addproduct(){
        $brand = Brand::orderByDesc('id')->get();
        $cat = Category::orderByDesc('id')->get();
        return view('admin.products.add_product',[
            'brands' => $brand,
            'categories'=> $cat,
        ]);
    }

    // Products
    public function editproduct($id){
        $brand = Brand::orderByDesc('id')->get();
        $cat = Category::orderByDesc('id')->get();
        return view('admin.products.edit-product',[
            'brands' => $brand,
            'categories'=> $cat,
            'product'=>Products::where('id', $id)->first(),
        ]);
    }
    

    public function saveproduct(Request $request){

        $validatedData = $request->validate([
            'photos.*' => 'image|max:1024|mimes:png,jpg,jpeg', // 1MB Max
            'featured_image' => 'image|max:1024|mimes:png,jpg,jepg',
            'sku' => 'unique:products,sku',
        ]);


        if($request->hasFile('featured_image')) {
            $file = $request['featured_image'];
            $pixName = time().'-'.$file->getClientOriginalName();
        }

        $product = new Products();
        $product->name= $request->name;
        $product->featured_image= $pixName;
        $product->category= $request['category'];
        $product->tag= $request['tag'];
        $product->brand= $request['brand'];
        $product->type= $request->type;
        $product->current_price = $request['current_price'];
        $product->previous_price = $request->previous_price;
        $product->sku = $request->sku;
        $product->status=$request->status;
        $product->instock = $request['instock'];
        $product->videolink = $request['videolink'];
        $product->description = $request['description'];
        $product->save();

        $id = $product->id;

        // Upload file to public path in images directory
        $file->storeAs('/public/images', $pixName);

        if($request->hasFile('photos')) {
            $imageNameArr = [];
            foreach ($request->photos as $file) {
                // you can also use the original name
                $imageName = time().'-'.$file->getClientOriginalName();
                $imageNameArr[] = $imageName;
                // Upload file to public path in images directory
                $file->storeAs('/public/images', $imageName);

                $file= new Images();
                $file->product_id=$id;
                $file->img_file = $imageName;
                $file->save();
            }
        }

        return redirect()->back()->with('success', 'Product Added Sucessfully!');

    }

    public function updateproduct(Request $request){
        $validatedData = $request->validate([
            'photos.*' => 'image|max:1024|mimes:png,jpg,jpeg', // 1MB Max
            'featured_image' => 'image|max:1024|mimes:png,jpg,jepg',
        ]);

        $product = Products::where('id', $request['id'])->first();

        if($request->hasFile('featured_image')) {
            $file = $request['featured_image'];
            $pixName = time().'-'.$file->getClientOriginalName();
            // Upload file to public path in images directory
            $file->storeAs('/public/images', $pixName);
        }else {
            $pixName = $product->featured_image;
        }

        // update product in database
        Products::where('id', $request['id'])
        ->update([
            'name'=> $request->name,
            'featured_image'=> $pixName,
            'category'=> $request['category'],
            'brand'=> $request['brand'],
            'type'=> $request->type,
            'tag'=> $request->tag,
            'current_price' => $request['current_price'],
            'previous_price' => $request->previous_price,
            'sku' => $request->sku,
            'status'=>$request->status,
            'instock' => $request['instock'],
            'videolink' => $request['videolink'],
            'description' => $request['description'],
        ]);

        if($request->hasFile('photos')) {
            $imageNameArr = [];
            if ($request->imagestat == "delete") {
                $prodID = $request->id;
                $unitimg = Images::where('product_id', '=', $prodID)->get();
                $path = "/public/images/";
                foreach ($unitimg as $img) {
                    Storage::delete($path.$img->img_file);
                    $img->delete();
                }
            }
            foreach ($request->photos as $file) {
                // you can also use the original name
                $imageName = time().'-'.$file->getClientOriginalName();
                $imageNameArr[] = $imageName;

                
                // Upload file to public path in images directory
                $file->storeAs('/public/images', $imageName);

                $file= new Images();
                $file->product_id=$request->id;
                $file->img_file = $imageName;
                $file->save();
            }
        }

        return redirect()->back()->with('success', 'Product Updated Sucessfully!');

    }

    public function deleteproduct($id){
         // update product status in database
        $checkimage = Images::where('product_id', $id)->get();
        $path = "/public/images/";
        
        if (DB::table('images')->where('product_id', $id)->exists()) {
           
            foreach ($checkimage as $img) {
                Storage::delete($path.$img->img_file);
                $img->delete();
            }
        }
        
        $product = Products::where('id', $id)->first();
        Storage::delete($path.$product->featured_image);
        Products::where('id', $id)->delete();

        return response()->json("Product Successfuly Deleted, refreshing page in 2 seconds");
    }


}
