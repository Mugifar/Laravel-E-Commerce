<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\PaymentController as AuthPaymentController;
use App\Http\Controllers\Auth\ProductController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\PaymentController;
use GuzzleHttp\Middleware;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\RedirectMiddleware;
use Illuminate\Support\Facades\Session;

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

//Route::get('/', function () {
    //return view('home.master');
//});
Route::view('/log','Auth.login')->middleware('guest')->name('login');
Route::post('/auth',[UserController::class,'login']);
Route::get('/register',function(){
    return view('auth.register');
});
Route::post('/register', [UserController::class,'register']);
Route::view('/sell','home.sell')->middleware('auth');
Route::post('/sell',[ProductController::class,'Sell']);
Route::get('/home',[ProductController::class,'home']);
Route::get('/logout',[ProductController::class,'logout']);

Route::get('/',[ProductController::class,'index']);
Route::get('/user',[UserController::class,'user'])->middleware('auth');
Route::post('/',[ProductController::class,'store'])->middleware('auth');
Route::get('detail/{id}',[ProductController::class,'detail']);
Route::post('add_to_cart',[ProductController::class,'AddToCart'])->middleware('auth');
Route::get('/cartlist',[ProductController::class,'cartList'])->middleware('auth');
Route::get('removecart/{id}',[ProductController::class,'RemoveCart']);
Route::get('/ordernow',[ProductController::class,'OrderNow']);
Route::get('/orderdetails',[ProductController::class,'OrderDetails']);

//admin page
Route::get('/admindashboard',[AdminController::class,'AdminDashboard']);
Route::get('/orders',function(){
    return view('admin.orders');
});
Route::get('/sellers',[AdminController::class,'Sellers']);



//payment
Route::get('/payment',[AuthPaymentController::class,'Payments']);
Route::post('/payment',[AuthPaymentController::class,'PaymentStore']);

//Search
Route::get('/search',[ProductController::class,'Search'])->name('products.search');






//forgot password
Route::get('forgot-password',[UserController::class,'showforgotpasswordform'])->name('forgot.password.get');
Route::post('forgot-password',[UserController::class,'submitforgotpasswordform'])->name('forgot.password.post');
Route::get('reset-password/{token}',[UserController::class,'showresetpasswordform'])->name('reset.password.get');
Route::post('reset-password',[UserController::class,'submitresetpasswordform'])->name('reset.password.post');

//Google login
Route::get('login/google',[UserController::class,'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback',[UserController::class,'handleGoogleCallback']);

//Facebook login

Route::get('login/facebook',[UserController::class,'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback',[UserController::class,'handleFacebookCallback']);
