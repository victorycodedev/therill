<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [Controller::class, 'home'])->name('home');
Route::get('/offers/{title}', [Controller::class, 'offers'])->name('offers');
Route::get('/about-us', [Controller::class, 'aboutus'])->name('aboutus');

Route::get('/products/category:/{cat}/brand:/{brand}/sort:/{st}/paginate:/{pg}/query:/{search}', [Controller::class, 'products'])->name('products');
Route::get('/products/{id}', [Controller::class, 'productsingle'])->name('productsingle');

Route::get('/contact-us', [Controller::class, 'contact'])->name('contactus');
Route::get('/dashboard', [Controller::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/adminroute.php';
require __DIR__.'/userroute.php';
