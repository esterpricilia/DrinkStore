<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\Product;
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

Route::get('/', function () {
    
    $data_product = Product::simplePaginate(6);
    return view('guestHome', compact('data_product'));
});

Route::get('/cari', function () {
    
    $data_product = Product::simplePaginate(6);
    return view('guestSearch', compact('data_product'));
});
Route::get('/detailGuest/{id}', function ($id) {

    $product = Product::all();
    return view('guestDetail', compact('product', 'id'));
})->name('detailGuest');


Route::get('/insert',[AdminController::class,'input'])->name('admin.insert');
Route::put('/redirects',[AdminController::class,'store'])->name('admin.store');

Route::get('/Product/Edit/{id}',[AdminController::class,'edit'])->name('admin.edit');
Route::put('/Product/Update/{id}',[AdminController::class,'update'])->name('admin.update');

Route::get('/ManageUser',[AdminController::class,'Manage'])->name('admin.manageUser');
Route::get('/ManageUser/Delete/{id}',[AdminController::class,'deleteUser'])->name('admin.deleteUser');

Route::get('/Product/Detail/{id}' ,[HomeController::class,'detailProduct'])->name('detail');
Route::get('/search', [HomeController::class, 'search']);

Route::get('/redirects', [HomeController::class,'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/User/Edit/{id}', [UserController::class, 'edit'])->name('user.editProfile');
Route::put('/User/Update/{id}',[UserController::class,'update'])->name('user.update');


Route::post('/addCart/{productid}/{userid}', [UserController::class, 'storeCart'])->name('user.storeCart');
Route::get('/cart/{id}', [UserController::class, 'cart'])->name('user.cart');
Route::get('/User/DeleteCart/{id}/{product_id}/{quantity}/{user_id}',[UserController::class,'deleteCart'])->name('user.deleteCart');

Route::get('/transaction/{userid}', [UserController::class, 'transaction'])->name('user.transaction');
Route::get('/transactionDisplay/{userid}', [UserController::class, 'displayTransaction'])->name('user.displayTransaction');
Route::get('/transactionDetail/{transactionid}', [UserController::class, 'detailTransaction'])->name('user.detailTransaction');


