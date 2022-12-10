<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\AdvertController;
use App\Http\Controllers\Admin\ManageUserscontroller;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\OrdersController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'isadmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('system-products', [ProductsController::class, 'allproducts'])->name('allproducts');
    Route::get('add-product', [ProductsController::class, 'addproduct'])->name('addproduct');
    Route::post('save-product', [ProductsController::class, 'saveproduct'])->name('saveproduct');
    Route::get('edit-product/{id}', [ProductsController::class, 'editproduct'])->name('editproduct');
    Route::put('updateproduct', [ProductsController::class, 'updateproduct'])->name('updateproduct');

    Route::get('deleteproduct/{id}', [ProductsController::class, 'deleteproduct'])->name('deleteproduct');

    Route::get('products-categories', [ProductsController::class, 'managecategory'])->name('category');
    Route::get('category/create', [ProductsController::class, 'createcategory'])->name('createcategory');
    Route::post('category/create', [ProductsController::class, 'addcategory'])->name('addcategory');
    Route::get('category/edit-category/{id}', [ProductsController::class, 'editcategory'])->name('editcategory');
    Route::get('category/delete-category/{id}', [ProductsController::class, 'deletecategory'])->name('deletecategory');
    Route::put('category/update-category', [ProductsController::class, 'updatecategory'])->name('updatecategory');

    // Brands
    Route::get('products-brands', [ProductsController::class, 'brands'])->name('brandslist');
    Route::get('brand/create', [ProductsController::class, 'createbrand'])->name('createbrand');
    Route::post('brand/create', [ProductsController::class, 'addbrand'])->name('addbrand');

    Route::get('brand/edit-brand/{id}', [ProductsController::class, 'brandedit'])->name('brandedit');
    Route::get('brand/delete-brand/{id}', [ProductsController::class, 'deletebrand'])->name('deletebrand');
    Route::put('brand/update-brand', [ProductsController::class, 'updatebrand'])->name('updatebrand');

    // Advert routes
    Route::get('all-adverts', [AdvertController::class, 'alladverts'])->name('alladverts');
    Route::get('add-adverts', [AdvertController::class, 'addadvert'])->name('addadvert');
    Route::post('save-adverts', [AdvertController::class, 'saveadvert'])->name('saveadvert');
    Route::get('edit-adverts/{id}', [AdvertController::class, 'editadvert'])->name('editadvert');
    Route::get('delete-adverts/{id}', [AdvertController::class, 'deleteadvert'])->name('deleteadvert');
    Route::put('update-adverts', [AdvertController::class, 'updateadvert'])->name('updateadvert');

    // Manage Users 
    Route::get('system-users', [ManageUserscontroller::class, 'allusers'])->name('allusers');
    Route::get('viewuser/{id}', [ManageUserscontroller::class, 'viewuser'])->name('viewuser');
    Route::put('updateuser', [ManageUserscontroller::class, 'updateuser'])->name('updateuser');
    Route::get('delete-user/{id}', [ManageUserscontroller::class, 'deleteuser'])->name('deleteuser');

    // Settings
    Route::get('settings', [SettingsController::class, 'index'])->name('settings');
    Route::put('updateinfo', [SettingsController::class, 'updateinfo'])->name('updateinfo');
    Route::put('updatepayment', [SettingsController::class, 'savepayment'])->name('updatepayment');

    // Orders
    Route::get('get-orders', [OrdersController::class, 'fetchorders'])->name('fetchorders');
    Route::get('get-orders/shipping-address/{id}/{order}', [OrdersController::class, 'address'])->name('address');
    Route::get('get-orders/proof/{id}', [OrdersController::class, 'proof'])->name('order.proof');
    Route::get('delete-order/{id}', [OrdersController::class, 'deleteorder'])->name('deleteorder');

    Route::get('changestatus/{id}/{status}', [OrdersController::class, 'changedelivery'])->name('changedelivery');

    Route::post('sendmailtoall', [ManageUserscontroller::class, 'sendmailtoall'])->name('sendmailtoall');
});