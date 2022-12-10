<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\BuyController;

Route::middleware(['auth','isuser'])->prefix('account')->name('user.')->group(function () {
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('wish-list', [HomeController::class, 'wishlist'])->name('wishlist');
    Route::get('checkout', [HomeController::class, 'checkout'])->name('checkout');

    // profile update
    Route::put('updateprofile', [AccountController::class, 'updateprofile'])->name('updateprofile');
    Route::put('updatepassword', [AccountController::class, 'updatepassword'])->name('updatepassword');
    Route::put('update-address', [AccountController::class, 'updateaddress'])->name('updateaddress');

    Route::get('addtowish/{id}', [AccountController::class, 'addtowish'])->name('addtowish');
    Route::get('removewish/{id}', [AccountController::class, 'removewish'])->name('removewish');
    Route::post('buyproduct', [BuyController::class, 'buyproduct'])->name('buyproduct');

    Route::post('submitorder', [BuyController::class, 'submitorder'])->name('submitorder');
    Route::get('deleteorder/{id}', [BuyController::class, 'deleteorder'])->name('deleteorder');

    Route::post('pay',[BuyController::class, 'redirectToGateway'])->name('pay.paystack');
	
});
Route::get('dashboard/paystackcallback',[BuyController::class, 'handleGatewayCallback'])->middleware('auth');