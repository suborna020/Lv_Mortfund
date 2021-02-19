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


Route::get('','App\Http\Controllers\Master@index');

Route::get('/fundraisers','App\Http\Controllers\Master@fundraisers');

Route::get('/recent','App\Http\Controllers\Master@recent');

Route::get('/project_support','App\Http\Controllers\Master@project_support');

Route::post('/set-currency-code','App\Http\Controllers\Master@setUserCurrency')->name('set-currency-code');

Route::get('/subscribe','App\Http\Controllers\SubscriberController@store')->name('subscribe');

Route::post('/subscribe','App\Http\Controllers\SubscriberController@store')->name('subscribe');

Route::get('details', function (Request $request) {
  // $ip = request()->ip();
    // $ip = '50.90.0.1';
    // $data = \Location::get($ip);
    // dd($data);
    // $ip = request()->ip();
    $ip = '43.250.81.202';
    $arr_ip = geoip()->getLocation($ip);
	print_r($arr_ip);
	echo $arr_ip->country; // get a country
	echo $arr_ip->currency; // get a currency
   
});
//----------------------- admin routes -----------------------
Route::get('/adminLogin','App\Http\Controllers\AdminController@index')->name('aLogin');
Route::post('/adminLoginSub','App\Http\Controllers\AdminController@adminLoginSub');
Route::get('/adminSignUp','App\Http\Controllers\AdminController@aSignUpM')->name('aSignUp');
Route::post('/adminSignUpSub','App\Http\Controllers\AdminController@aSignUpSub');

Route::group(['middleware'=>'adminAuthentication'],function(){

    Route::get('/aDashboard','App\Http\Controllers\AdminOperation@aDashboardM')->name('aDashboardM');
    Route::get('/aLogout','App\Http\Controllers\AdminOperation@aLogoutM')->name('aLogout');

});

//----------------------- user routes -----------------------

Route::get('/sign-up','App\Http\Controllers\Master@userSignup')->name('sign-up');

Route::post('/sign-up','App\Http\Controllers\Master@userSignupSub')->name('sign-up');

Route::get('/login','App\Http\Controllers\Master@userLogin')->name('login');

Route::post('/login','App\Http\Controllers\Master@userLogin_sub');

Route::get('/forgot-password','App\Http\Controllers\Master@forgotPassword')->name('forgot-password');

Route::post('/forgot-password','App\Http\Controllers\Master@emailVerification')->name('forgot-password');

Route::get('/get-session','App\Http\Controllers\Master@getSession');

Route::group(['middleware'=>'authentication'],function(){

    Route::get('/myAccount','App\Http\Controllers\Master@userDashboard');

    Route::get('/logout','App\Http\Controllers\Master@Logout')->name('logout');

});

