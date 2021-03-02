<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


use App\Models\Admin;
use App\Models\Fundraiser;
use App\Models\Category;
use App\Models\SuccessStory;
use App\Models\WithdrawRequest;


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

Route::post('/subscribe','App\Http\Controllers\SubscriberController@store')->name('subscribe');

Route::get('/singleCampaign/{id}','App\Http\Controllers\FundraiserController@index');

Route::get('/test','App\Http\Controllers\Master@test');

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
Route::get('/adminSignup','App\Http\Controllers\AdminController@aSignUpM')->name('aSignUp');
Route::post('/adminSignUpSub','App\Http\Controllers\AdminController@aSignUpSub');

Route::group(['middleware'=>'adminAuthentication'],function(){
    // View::composer('*', function ($view) {
    //     if(Session::get('admin_session')){
    //         $user_id=Session::get('admin_session');
    //         $userInfoBox=Admin::findOrFail($user_id);

    //         $view->with('userInfoBox',$userInfoBox)
    //         ;
    //     }
      
    // });
    // View::composer('*', 'App\Http\Controllers\AdminOperation@GlobalDataBox');

    Route::get('/aDashboard','App\Http\Controllers\AdminOperation@aDashboardM')->name('aDashboardM');
    Route::get('/aLogout','App\Http\Controllers\AdminOperation@aLogoutM')->name('aLogout');
    //Fundraisers
    Route::get('aDashboard/adCategories','App\Http\Controllers\AdFundraisers@adCategories');
    Route::get('aDashboard/adRecent','App\Http\Controllers\AdFundraisers@adRecent');
    Route::get('aDashboard/adUrgent','App\Http\Controllers\AdFundraisers@adUrgent');
    Route::get('aDashboard/adPending','App\Http\Controllers\AdFundraisers@adPending');
    // Route::get('/fundRaiseCategoriesData',[\App\Http\Controllers\AdFundraisers::class,'fundRaiseCategoriesData']);
    // Route::get('fundRaiseCategoriesData', 'AdFundraisers@fundRaiseCategoriesData');
    // Route::get('fundRaiseCategoriesData','App\Http\Controllers\AdFundraisers@fundRaiseCategoriesData');
    Route::get('/fundRaiseCategoriesData', 'App\Http\Controllers\AdFundraisers@fundRaiseCategoriesData');

    
    // Withdraw System
    Route::get('adWithdrawMethods','App\Http\Controllers\AdWithdrawSystem@adWithdrawMethods');
    Route::get('adWithdrawRequests','App\Http\Controllers\AdWithdrawSystem@adWithdrawRequests');
    Route::get('adWithdrawLog','App\Http\Controllers\AdWithdrawSystem@adWithdrawLog');
    //Donate
    Route::get('adPaymentGateways','App\Http\Controllers\AdDonate@adPaymentGateways');
    Route::get('adDonateHistory','App\Http\Controllers\AdDonate@adDonateHistory');
    //SuccessStories
    Route::get('adCategory','App\Http\Controllers\AdSuccessStories@adCategory');
    Route::get('adStories','App\Http\Controllers\AdSuccessStories@adStories');
    //MemberSettings
    Route::get('adAllMembers','App\Http\Controllers\AdMemberSettings@adAllMembers');
    Route::get('adReportedMembers','App\Http\Controllers\AdMemberSettings@adReportedMembers');
    // LanguageManager
    Route::get('adLanguageManager','App\Http\Controllers\AdLanguageManager@adLanguageManager');
    // Advertisement
    Route::get('adAdvertisement','App\Http\Controllers\AdAdvertisement@adAdvertisement');
    // GeneralSettings
    Route::get('adBasicSettings','App\Http\Controllers\AdGeneralSettings@adBasicSettings');
    Route::get('adEmailSettings','App\Http\Controllers\AdGeneralSettings@adEmailSettings');
    Route::get('adSmsSettings','App\Http\Controllers\AdGeneralSettings@adSmsSettings');

});
//----------------------- user routes -----------------------

Route::get('/sign-up','App\Http\Controllers\Master@userSignup')->name('sign-up');

Route::post('/sign-up','App\Http\Controllers\Master@userSignupSub')->name('signupSub');

Route::get('/login','App\Http\Controllers\Master@userLogin')->name('login');

Route::post('/login','App\Http\Controllers\Master@userLogin_sub');

Route::get('/forgot-password','App\Http\Controllers\Master@forgotPassword')->name('forgot-password');

Route::post('/forgot-password','App\Http\Controllers\Master@emailVerification')->name('forgotPassword');

Route::get('/get-session','App\Http\Controllers\Master@getSession');

Route::group(['middleware'=>'authentication'],function(){


    Route::get('/myAccount','App\Http\Controllers\Master@userDashboard');

    Route::get('/logout','App\Http\Controllers\Master@Logout')->name('logout');

    Route::get('/paymentSettings','App\Http\Controllers\Master@paymentSettings');

    Route::post('/selectUserPayment','App\Http\Controllers\Master@selectUserPayment');

    Route::get('/userFundraisers','App\Http\Controllers\Master@userFundraisers');

    Route::get('/withdrawMethod','App\Http\Controllers\WithdrawMethodController@index');

    Route::get('/withdrawHistory','App\Http\Controllers\WithdrawMethodController@withdrawHistory');

    Route::get('/deleteWithdrawHistory','App\Http\Controllers\WithdrawMethodController@deleteWithdrawHistory');

    Route::get('/currentFundraisers','App\Http\Controllers\Master@currentFundraisers');

    Route::get('fundraisers/{id}','App\Http\Controllers\Master@deleteFundraiser');

    Route::get('createCampaign','App\Http\Controllers\Master@createCampaign');

    Route::post('insertFundraiser','App\Http\Controllers\Master@insertCampaign');

    Route::get('editFundraiser/{id}','App\Http\Controllers\Master@editFundraiser');

    Route::post('updateFundraiser/{id}','App\Http\Controllers\Master@updateFundraiser');

    Route::get('profile','App\Http\Controllers\Master@profile');

    Route::post('updateProfile','App\Http\Controllers\Master@updateProfile');

    Route::post('comment','App\Http\Controllers\FundraiserController@store');

    Route::post('reply','App\Http\Controllers\FundraiserController@reply');

    Route::post('reportComment','App\Http\Controllers\FundraiserController@reportComment');
    
    Route::post('reportCampaign','App\Http\Controllers\FundraiserController@reportCampaign');


});
