<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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


Route::get('/','App\Http\Controllers\Master@index');

//----------------------- admin routes -----------------------
Route::get('/aLogin','App\Http\Controllers\AdminController@index')->name('aLogin');
Route::get('/aSignUp','App\Http\Controllers\AdminController@aSignUpM')->name('aSignUp');

Route::get('/admin','App\Http\Controllers\Master@adminDashboard')->name('admin');
//----------------------- user routes -----------------------

Route::get('/sign-up','App\Http\Controllers\Master@userSignup')->name('sign-up');

Route::post('/sign-up','App\Http\Controllers\Master@userSignupSub')->name('sign-up');

Route::get('/login','App\Http\Controllers\Master@userLogin')->name('login');

Route::post('/login','App\Http\Controllers\Master@userLogin_sub');

Route::get('/forgot-password','App\Http\Controllers\Master@forgotPassword')->name('forgot-password');

Route::post('/forgot-password','App\Http\Controllers\Master@emailVerification')->name('forgot-password');


Route::group(['middleware'=>'authentication'],function(){

    Route::get('/myAccount','App\Http\Controllers\Master@userDashboard');

    Route::get('/logout','App\Http\Controllers\Master@Logout')->name('logout');

});

