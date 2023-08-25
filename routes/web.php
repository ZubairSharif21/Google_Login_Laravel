<?php

use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Route::get('auth/google',[GoogleController::class,'loginwithgoogle'])->name('login');
Route::get('auth/facebook',[GoogleController::class,'loginwithfacebook'])->name('facebook');

Route::any('auth/google/callback',[GoogleController::class,'callbackfromgoogle'])->name('callback');
Route::any('auth/facebook/callback',[GoogleController::class,'callbackfromfacebook'])->name('callback-facebook');

Route::view('home','home')->name('home');
