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

Route::post('/singleCampaign/{id}','App\Http\Controllers\FundraiserController@viewCounter');

Route::get('/HowItWorks','App\Http\Controllers\Master@HowItWorks');

Route::get('explore/newCampaigns','App\Http\Controllers\Master@newCampaigns');

Route::get('/getNewCampaigns','App\Http\Controllers\Master@getNewCampaigns');

Route::get('explore/featuredCampaigns','App\Http\Controllers\Master@featuredCampaigns');

Route::get('getFeaturedCampaigns','App\Http\Controllers\Master@getFeaturedCampaigns');

Route::get('explore/popularCampaigns','App\Http\Controllers\Master@popularCampaigns');

Route::get('explore/urgentFundraising','App\Http\Controllers\Master@urgentFundraising');

Route::get('getUrgentFundraising','App\Http\Controllers\Master@getUrgentFundraising');

Route::get('explore/project','App\Http\Controllers\Master@project');

Route::get('getProjectCampaigns','App\Http\Controllers\Master@getProjectCampaigns');



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
// all route clear  for laravel 8 
Route::get('/caches/',[\App\Http\Controllers\CachesController::class,'cachesM']);
Route::get('/clear/',[\App\Http\Controllers\CachesController::class,'clearCachesM']);

Route::group(['middleware'=>'adminAuthentication'],function(){
    Route::get('/aDashboard','App\Http\Controllers\AdminOperation@aDashboardM')->name('aDashboardM');
    Route::get('/aLogout','App\Http\Controllers\AdminOperation@aLogoutM')->name('aLogout');
    //Fundraisers
    Route::get('aDashboard/adCategories','App\Http\Controllers\AdFundraisers@adCategories');
    Route::get('aDashboard/adRecent','App\Http\Controllers\AdFundraisers@adRecent');
    Route::get('aDashboard/adUrgent','App\Http\Controllers\AdFundraisers@adUrgent');
    Route::get('aDashboard/adPending','App\Http\Controllers\AdFundraisers@adPending');
    Route::get('/fundRaiseCategoriesData', 'App\Http\Controllers\AdFundraisers@fundRaiseCategoriesData');
    Route::post('categoriesAddData','App\Http\Controllers\AdFundraisers@categoriesAddData');
    Route::get('categoriesEditData/{id}', 'App\Http\Controllers\AdFundraisers@categoriesEditData');
    Route::post('categoriesEditedSubmit/{id}','App\Http\Controllers\AdFundraisers@categoriesEditedSubmit');
    Route::post('/categoriesDestroyData/{id}', 'App\Http\Controllers\AdFundraisers@categoriesDestroyData');
    Route::get('/categoriesStatusUpdate/{id}', 'App\Http\Controllers\AdFundraisers@categoriesStatusUpdate');




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

Route::post('/signUp','App\Http\Controllers\Master@userSignupSub')->name('signupSub');

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

    //------------------------------Verification-------------------------------------------------------

    Route::get('verification','App\Http\Controllers\VerificationController@index');

    Route::get('verification/uploadDocuments','App\Http\Controllers\VerificationController@uploadDocuments');

    Route::get('verification/capturePhoto','App\Http\Controllers\VerificationController@capturePhoto');

    Route::post('getPassportNumber','App\Http\Controllers\VerificationController@getPassportNumber');

    Route::post('getUploadedDocuments','App\Http\Controllers\VerificationController@getUploadedDocuments');

    Route::post('verify','App\Http\Controllers\VerificationController@verify');

    //---------------------Payment --------------------------------------------------------------------

    Route::get('myAccount/donateMethod','App\Http\Controllers\Master@donateMethod');

    Route::get('myAccount/donateMethod/methodDetails','App\Http\Controllers\Master@methodDetails');

    Route::post('setDonationDetails','App\Http\Controllers\Master@setDonationDetails');

    //Stripe payment form

    Route::get('checkout/stripe','App\Http\Controllers\PaymentGatewayController@checkout');

    Route::post('checkout','App\Http\Controllers\PaymentGatewayController@afterpayment')->name('checkout.credit-card');
    
    //Paypal payment form
    Route::get('/checkout/paypal', 'App\Http\Controllers\PaymentGatewayController@index');

    // route for processing payment
    Route::post('paypal', 'App\Http\Controllers\PaymentGatewayController@payWithpaypal');

    //PayStack payment form
    Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
    Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

    // route for check status of the payment
    Route::get('status', 'App\Http\Controllers\PaymentGatewayController@getPaymentStatus');


});
