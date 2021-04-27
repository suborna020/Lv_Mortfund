<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\PaytmController;


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

Route::get('/singleCampaign/{id}',['as' => 'singleCampaign', 'uses' => 'App\Http\Controllers\FundraiserController@index']);

Route::post('/singleCampaign/{id}','App\Http\Controllers\FundraiserController@viewCounter');

Route::get('/HowItWorks','App\Http\Controllers\Master@HowItWorks');

Route::get('/Categories/{slug}','App\Http\Controllers\Master@Categories');

Route::get('/getCategoryCampaigns/{slug}','App\Http\Controllers\Master@getCategoryCampaigns');

Route::get('explore/newCampaigns','App\Http\Controllers\Master@newCampaigns');

Route::get('/getNewCampaigns','App\Http\Controllers\Master@getNewCampaigns');

Route::get('explore/featuredCampaigns','App\Http\Controllers\Master@featuredCampaigns');

Route::get('getFeaturedCampaigns','App\Http\Controllers\Master@getFeaturedCampaigns');

Route::get('explore/popularCampaigns','App\Http\Controllers\Master@popularCampaigns');

Route::get('getPopularCampaigns','App\Http\Controllers\Master@getPopularCampaigns');

Route::get('explore/urgentFundraising','App\Http\Controllers\Master@urgentFundraising');

Route::get('getUrgentFundraising','App\Http\Controllers\Master@getUrgentFundraising');

Route::get('explore/project','App\Http\Controllers\Master@project');

Route::get('getProjectCampaigns','App\Http\Controllers\Master@getProjectCampaigns');

Route::post('DestroySession','App\Http\Controllers\Master@DestroySession');

Route::get('DestroySessions','App\Http\Controllers\Master@DestroySessions');

Route::get('terms','App\Http\Controllers\Master@terms');

Route::get('support','App\Http\Controllers\Master@support');

Route::get('aboutus','App\Http\Controllers\Master@about');

Route::get('privacy','App\Http\Controllers\Master@privacy');

Route::post('clientMessage','App\Http\Controllers\Master@clientMessage');

Route::get('search','App\Http\Controllers\Master@search');

//-------------------------------FORGET PASSWORD SECTION---------------------
    Route::get('/gettoken','App\Http\Controllers\FPController@tokenRequest');

    Route::get('/forgot-password','App\Http\Controllers\Master@forgotPassword')->name('forgot-password');
    Route::post('/forgot-password','App\Http\Controllers\FPController@getPasswordResetEmail');
    Route::post('/forgot-password',[\App\Http\Controllers\FPController::class,'tokenRequest']);
    Route::post('/verify-token',[\App\Http\Controllers\FPController::class,'tokenCheck']);
    Route::get('/reset-password',function (){
        $email = \Illuminate\Support\Facades\Session::get('email');
        return \view('ui.pages.users.account.resetPassword',compact('email'));
    })->name('reset-password');
    Route::post('/reset-password',[\App\Http\Controllers\FPController::class,'createNewPassword']);



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
Route::get('/adminChart','App\Http\Controllers\AdminOperation@adminChart');
Route::get('/aLogout','App\Http\Controllers\AdminOperation@aLogoutM')->name('aLogout');
Route::post('/mail-to-subscribe', 'App\Http\Controllers\FPController@subSendMail');

//Fundraisers 
Route::get('Fundraisers/adCategories','App\Http\Controllers\AdFundraisers@adCategories');
Route::get('Fundraisers/adAllFundRaise','App\Http\Controllers\AdFundraisers@adAllFundRaise');
Route::get('Fundraisers/adRecent','App\Http\Controllers\AdFundraisers@adRecent');
Route::get('Fundraisers/adUrgent','App\Http\Controllers\AdFundraisers@adUrgent');
Route::get('Fundraisers/adPending','App\Http\Controllers\AdFundraisers@adPending');
Route::get('Fundraisers/adOnProgress','App\Http\Controllers\AdFundraisers@adOnProgress');
Route::get('Fundraisers/adPrivate','App\Http\Controllers\AdFundraisers@adPrivate');



//Fundraisers -> Categories
Route::get('/fundRaiseCategoriesData', 'App\Http\Controllers\AdFundraisers@fundRaiseCategoriesData');
Route::post('categoriesAddData','App\Http\Controllers\AdFundraisers@categoriesAddData');
Route::get('categoriesEditData/{id}', 'App\Http\Controllers\AdFundraisers@categoriesEditData');
Route::post('categoriesEditedSubmit/{id}','App\Http\Controllers\AdFundraisers@categoriesEditedSubmit');
Route::get('/categoriesStatusUpdate/{id}', 'App\Http\Controllers\AdFundraisers@categoriesStatusUpdate');
Route::post('/categoriesDestroyData/{id}', 'App\Http\Controllers\AdFundraisers@categoriesDestroyData');
//Fundraisers -> AllFundRaise
Route::get('/AllFundRaiseData', 'App\Http\Controllers\AdFundraisers@AllFundRaiseData');
Route::get('AllFundRaiseEditData/{id}', 'App\Http\Controllers\AdFundraisers@AllFundRaiseEditData');
Route::get('fundRaiseEditData/{id}', 'App\Http\Controllers\AdFundraisers@fundRaiseEditData');
Route::post('fundRaiseEditedSubmit/{id}','App\Http\Controllers\AdFundraisers@fundRaiseEditedSubmit');
Route::get('/fundRaiseStatusUpdate/{id}', 'App\Http\Controllers\AdFundraisers@fundRaiseStatusUpdate');
Route::post('/fundRaiseDestroyData/{id}', 'App\Http\Controllers\AdFundraisers@fundRaiseDestroyData');
Route::get('/fundRaiseRecentListUpdate/{id}', 'App\Http\Controllers\AdFundraisers@fundRaiseRecentListUpdate');

//Fundraisers -> Recent
Route::get('/fundRaiseRecentData', 'App\Http\Controllers\AdFundraisers@fundRaiseRecentData');
Route::post('fundRecentAddData','App\Http\Controllers\AdFundraisers@fundRecentAddData');
//    other edit delete  are same --
//Fundraisers -> urgent
Route::get('/fundRaiseUrgentData', 'App\Http\Controllers\AdFundraisers@fundRaiseUrgentData');
Route::post('fundUrgentAddData','App\Http\Controllers\AdFundraisers@fundUrgentAddData');
//Fundraisers -> pending
Route::get('/fundRaisePendingData', 'App\Http\Controllers\AdFundraisers@fundRaisePendingData');
//Fundraisers -> OnProgress
Route::get('/fundOnProgressData', 'App\Http\Controllers\AdFundraisers@fundOnProgressData');
//Fundraisers -> Private
Route::get('/fundRaisePrivateData', 'App\Http\Controllers\AdFundraisers@fundRaisePrivateData');
Route::get('/fundRaisePrivateListUpdate/{id}', 'App\Http\Controllers\AdFundraisers@fundRaisePrivateListUpdate');
Route::post('fundPrivateAddData','App\Http\Controllers\AdFundraisers@fundPrivateAddData');
//Success Stories -> stories
Route::get('/stories', 'App\Http\Controllers\AdSuccessStories@stories');
Route::get('getEditableStory/{id}', 'App\Http\Controllers\AdSuccessStories@getEditableStory');
Route::post('addSuccessStoriesData','App\Http\Controllers\AdSuccessStories@addSuccessStoriesData');
Route::post('editSuccessStoriesData/{id}','App\Http\Controllers\AdSuccessStories@editSuccessStoriesData');
Route::post('/successStoriesDestroyData/{id}', 'App\Http\Controllers\AdSuccessStories@successStoriesDestroyData');

// Withdraw System
Route::get('WithdrawSystem/adWithdrawMethods','App\Http\Controllers\AdWithdrawSystem@adWithdrawMethods');
Route::get('WithdrawSystem/adWithdrawRequests','App\Http\Controllers\AdWithdrawSystem@adWithdrawRequests');
Route::get('WithdrawSystem/adWithdrawLog','App\Http\Controllers\AdWithdrawSystem@adWithdrawLog');
Route::get('WithdrawAllMethod','App\Http\Controllers\AdWithdrawSystem@WithdrawAllMethod');
Route::get('/WithdrawStatusUpdate/{id}', 'App\Http\Controllers\AdWithdrawSystem@WithdrawStatusUpdate');
Route::get('adWithdrawRequestsData','App\Http\Controllers\AdWithdrawSystem@adWithdrawRequestsData');
Route::get('/WithdrawRequestStatusUpdate/{id}', 'App\Http\Controllers\AdWithdrawSystem@WithdrawRequestStatusUpdate');
Route::post('/WithdrawDelete/{id}', 'App\Http\Controllers\AdWithdrawSystem@WithdrawDelete');
Route::get('WithdrawLogData','App\Http\Controllers\AdWithdrawSystem@WithdrawLogData');

//Donate
Route::get('Donate/adPaymentGateways','App\Http\Controllers\AdDonate@adPaymentGateways');
Route::get('Donate/adDonateHistory','App\Http\Controllers\AdDonate@adDonateHistory');
Route::get('donateAllData','App\Http\Controllers\AdDonate@donateAllData');

//SuccessStories
Route::get('SuccessStories/adSuccessCategory','App\Http\Controllers\AdSuccessStories@adSuccessCategory');
Route::get('adSuccessCategoryData','App\Http\Controllers\AdSuccessStories@adSuccessCategoryData');
Route::get('SuccessStories/adStories','App\Http\Controllers\AdSuccessStories@adStories');

//MemberSettings
Route::get('MemberSttings/adAllMembers','App\Http\Controllers\AdMemberSettings@adAllMembers');
Route::get('MemberSttings/adReportedMembers','App\Http\Controllers\AdMemberSettings@adReportedMembers');
Route::get('adAllMembersData','App\Http\Controllers\AdMemberSettings@adAllMembersData');
Route::get('adReportedMembersData','App\Http\Controllers\AdMemberSettings@adReportedMembersData');


// LanguageManager
Route::get('adLanguageManager','App\Http\Controllers\AdLanguageManager@adLanguageManager');
Route::get('adLanguageManagerData','App\Http\Controllers\AdLanguageManager@adLanguageManagerData');
Route::get('getEditableLngContent/{id}', 'App\Http\Controllers\AdLanguageManager@getEditableLngContent');
Route::get('/adLanguageStatusUpdate/{id}', 'App\Http\Controllers\AdLanguageManager@adLanguageStatusUpdate');
Route::post('/adLanguageDelete/{id}', 'App\Http\Controllers\AdLanguageManager@adLanguageDelete');
Route::post('languageAddSubmit','App\Http\Controllers\AdLanguageManager@languageAddSubmit');
Route::post('languageEditSubmit/{id}','App\Http\Controllers\AdLanguageManager@languageEditSubmit');
// Advertisement
Route::get('adAdvertisement','App\Http\Controllers\AdAdvertisement@adAdvertisement');
Route::get('adAdvertisementData','App\Http\Controllers\AdAdvertisement@adAdvertisementData');
Route::get('getEditableAdvertiseData/{id}', 'App\Http\Controllers\AdAdvertisement@getEditableAdvertiseData');
Route::post('AdvertiseSubmit','App\Http\Controllers\AdAdvertisement@AdvertiseSubmit');
Route::post('AdvertiseEditSubmit/{id}','App\Http\Controllers\AdAdvertisement@AdvertiseEditSubmit');
Route::post('advertiseDelete/{id}', 'App\Http\Controllers\AdAdvertisement@advertiseDelete');


// frontEndSettings---------------------------------
/////////////////////View works//////////////////////////////
Route::get('FrontEndSettings/adSlider','App\Http\Controllers\AdFrontEndSettings@adSlider');
Route::get('FrontEndSettings/adHowItW','App\Http\Controllers\AdFrontEndSettings@adHowItW');
Route::get('FrontEndSettings/adAbout','App\Http\Controllers\AdFrontEndSettings@adAbout');
Route::get('FrontEndSettings/adTeam','App\Http\Controllers\AdFrontEndSettings@adTeam');
Route::get('FrontEndSettings/adTestimonials','App\Http\Controllers\AdFrontEndSettings@adTestimonials');
Route::get('FrontEndSettings/adCounter','App\Http\Controllers\AdFrontEndSettings@adCounter');
Route::get('FrontEndSettings/adContact','App\Http\Controllers\AdFrontEndSettings@adContact');
Route::get('FrontEndSettings/adSocialSettings','App\Http\Controllers\AdFrontEndSettings@adSocialSettings');
Route::get('FrontEndSettings/adSupport','App\Http\Controllers\AdFrontEndSettings@adSupport');
Route::get('FrontEndSettings/adTermsOfUse','App\Http\Controllers\AdFrontEndSettings@adTermsOfUse');
Route::get('FrontEndSettings/adPrivacyPolicy','App\Http\Controllers\AdFrontEndSettings@adPrivacyPolicy');
Route::get('FrontEndSettings/adLoginSignup','App\Http\Controllers\AdFrontEndSettings@adLoginSignup');
Route::get('FrontEndSettings/adFooter','App\Http\Controllers\AdFrontEndSettings@adFooter');

// data works --------------

Route::get('FrontEndSettings/adLogoNav','App\Http\Controllers\AdFrontEndSettings@adLogoNav');
//--------------------Logo & Fabicon
Route::post('/update-logo-fabicon/{id}', 'App\Http\Controllers\FrontendController@updateLogoFabicon');


Route::post('LogoNavAddData','App\Http\Controllers\AdLogoNavController@AddSubmit');
Route::post('LogoNavSubmit/{id}','App\Http\Controllers\AdLogoNavController@EditSubmit');
//navManus-----------------------------------------------------------------------------
Route::get('navManusData','App\Http\Controllers\FrontendController@allData');
Route::get('navManusEditableData/{id}', 'App\Http\Controllers\FrontendController@editableData');
Route::post('navManusAdd','App\Http\Controllers\FrontendController@addSubmit');
Route::post('navManusEditSubmit/{id}','App\Http\Controllers\FrontendController@editSubmit');
Route::post('/navManusDelete/{id}', 'App\Http\Controllers\FrontendController@delete');

//slider----------------------------------------
Route::get('sliderData','App\Http\Controllers\FrontendController@SliderallData');
Route::get('sliderEditableData/{id}', 'App\Http\Controllers\FrontendController@SlidereditableData');
Route::post('sliderAdd','App\Http\Controllers\FrontendController@SlideraddSubmit');
Route::post('sliderEditSubmit/{id}','App\Http\Controllers\FrontendController@SlidereditSubmit');
Route::post('/sliderDelete/{id}', 'App\Http\Controllers\FrontendController@Sliderdelete');
//how it works -----------------------------
Route::get('HowItWorksData','App\Http\Controllers\FrontendController@HowItWorksallData');
Route::get('HowItWorksEditableData/{id}', 'App\Http\Controllers\FrontendController@HowItWorkseditableData');
Route::post('HowItWorksAdd','App\Http\Controllers\FrontendController@HowItWorksaddSubmit');
Route::post('HowItWorksEditSubmit/{id}','App\Http\Controllers\FrontendController@HowItWorkseditSubmit');
Route::post('/HowItWorksDelete/{id}', 'App\Http\Controllers\FrontendController@HowItWorksdelete');

// about ------------------------------------
Route::post('AboutAddData','App\Http\Controllers\AdAboutController@AddSubmit');
Route::post('AboutEditSubmit/{id}','App\Http\Controllers\AdAboutController@EditSubmit');

// about  secondary points AboutSecondary ------------------------
Route::get('AboutSecondaryData','App\Http\Controllers\FrontendController@AboutSecondaryallData');
Route::get('AboutSecondaryEditableData/{id}', 'App\Http\Controllers\FrontendController@AboutSecondaryeditableData');
Route::post('AboutSecondaryAdd','App\Http\Controllers\FrontendController@AboutSecondaryaddSubmit');
Route::post('AboutSecondaryEditSubmit/{id}','App\Http\Controllers\FrontendController@AboutSecondaryeditSubmit');
Route::post('/AboutSecondaryDelete/{id}', 'App\Http\Controllers\FrontendController@AboutSecondarydelete');
// Subscription 
Route::post('SubscriptionAddData','App\Http\Controllers\AdSubscriptionController@AddSubmit');
Route::post('SubscriptionEditSubmit/{id}','App\Http\Controllers\AdSubscriptionController@EditSubmit');

// Team ------------------------------
Route::get('TeamData','App\Http\Controllers\FrontendController@TeamallData');
Route::get('TeamEditableData/{id}', 'App\Http\Controllers\FrontendController@TeameditableData');
Route::post('TeamAdd','App\Http\Controllers\FrontendController@TeamaddSubmit');
Route::post('TeamEditSubmit/{id}','App\Http\Controllers\FrontendController@TeameditSubmit');
Route::post('/TeamDelete/{id}', 'App\Http\Controllers\FrontendController@Teamdelete');

// testimonials ------------------
Route::get('TestimonialsAllData','App\Http\Controllers\AdTestimonialsController@AllData');
Route::get('TestimonialsEditableData/{id}', 'App\Http\Controllers\AdTestimonialsController@EditableData');
Route::post('TestimonialsAddData','App\Http\Controllers\AdTestimonialsController@AddSubmit');
Route::post('TestimonialsEditSubmit/{id}','App\Http\Controllers\AdTestimonialsController@EditSubmit');
Route::post('/TestimonialsDelete/{id}', 'App\Http\Controllers\AdTestimonialsController@Delete');

// contact -----------------------------------
Route::post('contactAddData','App\Http\Controllers\AdContactController@AddSubmit');
Route::post('contactEditSubmit/{id}','App\Http\Controllers\AdContactController@EditSubmit');

// adTermsOfUse --------------------
Route::post('TermsOfUseAddData','App\Http\Controllers\AdTermsController@AddSubmit');
Route::post('TermsOfUseEditSubmit/{id}','App\Http\Controllers\AdTermsController@EditSubmit');
// Privacy Policy
Route::post('PrivacyPolicyAddData','App\Http\Controllers\AdPrivacyPolicyController@AddSubmit');
Route::post('PrivacyPolicyEditSubmit/{id}','App\Http\Controllers\AdPrivacyPolicyController@EditSubmit');

// Loginsignup 
Route::post('LoginSignupAddData','App\Http\Controllers\AdLoginSignupController@AddSubmit');
Route::post('LoginSignupEditSubmit/{id}','App\Http\Controllers\AdLoginSignupController@EditSubmit');
// Footer 
Route::post('FooterAddData','App\Http\Controllers\AdFooterController@AddSubmit');
Route::post('FooterEditSubmit/{id}','App\Http\Controllers\AdFooterController@EditSubmit');
// working flow //////////////////////
// SocialSettings 
Route::get('SocialSettingsAllData','App\Http\Controllers\AdSocialSettingsController@AllData');
Route::get('SocialSettingsEditableData/{id}', 'App\Http\Controllers\AdSocialSettingsController@EditableData');
Route::post('SocialSettingsAddData','App\Http\Controllers\AdSocialSettingsController@AddSubmit');
Route::post('SocialSettingsEditSubmit/{id}','App\Http\Controllers\AdSocialSettingsController@EditSubmit');
Route::post('/SocialSettingsDelete/{id}', 'App\Http\Controllers\AdSocialSettingsController@Delete');
// Support 
Route::get('SupportAllData','App\Http\Controllers\AdSupportController@AllData');
Route::get('SupportEditableData/{id}', 'App\Http\Controllers\AdSupportController@EditableData');
Route::post('SupportAddData','App\Http\Controllers\AdSupportController@AddSubmit');
Route::post('SupportEditSubmit/{id}','App\Http\Controllers\AdSupportController@EditSubmit');
Route::post('/SupportDelete/{id}', 'App\Http\Controllers\AdSupportController@Delete');
// FooterAbout
Route::get('FooterAboutAllData','App\Http\Controllers\FooterAboutController@AllData');
Route::get('FooterAboutEditableData/{id}', 'App\Http\Controllers\FooterAboutController@EditableData');
Route::post('FooterAboutAddData','App\Http\Controllers\FooterAboutController@AddSubmit');
Route::post('FooterAboutEditSubmit/{id}','App\Http\Controllers\FooterAboutController@EditSubmit');
Route::post('/FooterAboutDelete/{id}', 'App\Http\Controllers\FooterAboutController@Delete');
// FooterCategories
Route::get('FooterCategoriesAllData','App\Http\Controllers\FooterCategoriesController@AllData');
Route::get('FooterCategoriesEditableData/{id}', 'App\Http\Controllers\FooterCategoriesController@EditableData');
Route::post('FooterCategoriesAddData','App\Http\Controllers\FooterCategoriesController@AddSubmit');
Route::post('FooterCategoriesEditSubmit/{id}','App\Http\Controllers\FooterCategoriesController@EditSubmit');
Route::post('/FooterCategoriesDelete/{id}', 'App\Http\Controllers\FooterCategoriesController@Delete');
// FooterExplore
Route::get('FooterExploreAllData','App\Http\Controllers\FooterExploreController@AllData');
Route::get('FooterExploreEditableData/{id}', 'App\Http\Controllers\FooterExploreController@EditableData');
Route::post('FooterExploreAddData','App\Http\Controllers\FooterExploreController@AddSubmit');
Route::post('FooterExploreEditSubmit/{id}','App\Http\Controllers\FooterExploreController@EditSubmit');
Route::post('/FooterExploreDelete/{id}', 'App\Http\Controllers\FooterExploreController@Delete');
// frontend settings end ----------------------


// GeneralSettings
Route::get('GeneralSettings/adBasicSettings','App\Http\Controllers\AdGeneralSettings@adBasicSettings');
Route::get('GeneralSettings/adEmailSettings','App\Http\Controllers\AdGeneralSettings@adEmailSettings');
Route::get('GeneralSettings/adSmsSettings','App\Http\Controllers\AdGeneralSettings@adSmsSettings');
});
//----------------------- user routes -----------------------















Route::get('/sign-up','App\Http\Controllers\Master@userSignup')->name('sign-up');

Route::post('/signUp','App\Http\Controllers\Master@userSignupSub')->name('signupSub');

Route::get('/login','App\Http\Controllers\Master@userLogin')->name('login');

Route::post('/login','App\Http\Controllers\Master@userLogin_sub');

Route::get('/get-session','App\Http\Controllers\Master@getSession');

Route::group(['middleware'=>'authentication'],function(){


    Route::get('/myAccount','App\Http\Controllers\Master@userDashboard');

    Route::get('/logout','App\Http\Controllers\Master@Logout')->name('logout');

    Route::get('/paymentSettings','App\Http\Controllers\Master@paymentSettings');

    Route::post('/selectUserPayment','App\Http\Controllers\Master@selectUserPayment');

    Route::get('/deletePaymentMethod/{id}','App\Http\Controllers\Master@deletePaymentMethod');

    Route::get('/userFundraisers','App\Http\Controllers\Master@userFundraisers');

    Route::get('/withdrawMethod','App\Http\Controllers\WithdrawMethodController@index');

    Route::get('/withdrawHistory','App\Http\Controllers\WithdrawMethodController@withdrawHistory');

    Route::get('/deleteWithdrawHistory','App\Http\Controllers\WithdrawMethodController@deleteWithdrawHistory');

    Route::get('/currentFundraisers','App\Http\Controllers\Master@currentFundraisers');

    // Route::get('/deleteCampaignModal/{id}','App\Http\Controllers\Master@deleteCampaignModal');

    Route::get('fundraisers/{id}','App\Http\Controllers\Master@deleteFundraiser');

    Route::get('createCampaign','App\Http\Controllers\Master@createCampaign');

    Route::post('insertFundraiser','App\Http\Controllers\Master@insertCampaign');

    Route::get('editFundraiser/{id}','App\Http\Controllers\Master@editFundraiser');

    Route::post('updateFundraiser/{id}','App\Http\Controllers\Master@updateFundraiser');

    Route::get('profile','App\Http\Controllers\Master@profile');

    Route::post('updateProfile/{id}','App\Http\Controllers\Master@updateProfile');

    Route::get('changePassword/','App\Http\Controllers\Master@changePassword')->name('changePassword');

    Route::post('changeUserPassword/{id}','App\Http\Controllers\Master@changeUserPassword');

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

    Route::get('testVerification','App\Http\Controllers\VerificationController@testVerification');

    Route::post('testVerification','App\Http\Controllers\VerificationController@testVerificationPost');

    //---------------------Payment --------------------------------------------------------------------


    Route::get('myAccount/donateMethod/checkout','App\Http\Controllers\Master@checkout');

    Route::post('setPaymentMethod','App\Http\Controllers\Master@setSession');

    Route::get('myAccount/donateMethod','App\Http\Controllers\Master@donateMethod');

    Route::get('myAccount/donateMethod/methodDetails','App\Http\Controllers\Master@methodDetails')->name("myAccount.donateMethod.methodDetails");

    Route::post('setDonationDetails','App\Http\Controllers\Master@setDonationDetails');

    //Stripe payment form

    Route::get('checkout/stripe','App\Http\Controllers\PaymentGatewayController@checkout');

    Route::post('checkout','App\Http\Controllers\PaymentGatewayController@afterpayment')->name('checkout.credit-card');
    
    //Paypal payment form
    Route::get('/checkout/paypal', 'App\Http\Controllers\PaymentGatewayController@index');

    // route for processing payment
    Route::post('paypal', 'App\Http\Controllers\PaymentGatewayController@payWithpaypal');

    //PayStack payment form
    Route::post('/pay', 'App\Http\Controllers\PaymentController@redirectToGateway')->name('pay');

    Route::get('/payment/callback', 'App\Http\Controllers\PaymentController@handleGatewayCallback');

    Route::get('checkout/paystack', 'App\Http\Controllers\PaymentController@paystack');

    // route for check status of the payment
    Route::get('status', 'App\Http\Controllers\PaymentGatewayController@getPaymentStatus');


    // Flutter Wave 
    Route::get('/flutterwave', 'App\Http\Controllers\RaveController@flutterwave')->name('flutterwave'); 

    Route::post('/reve/pay', 'App\Http\Controllers\RaveController@initialize')->name('reve.pay');    

    Route::post('/rave/callback', 'App\Http\Controllers\RaveController@callback')->name('reve.callback');

    Route::get('flutterSuccess', 'App\Http\Controllers\RaveController@flutterSuccess')->name('flutterSuccess');

    //InterSwitch 

    Route::get('/interswitch', 'App\Http\Controllers\Master@interswitch')->name('interswitch');
    
    Route::get('/interswitchSuccess', 'App\Http\Controllers\Master@interswitchSuccess')->name('interswitchSuccess');

    Route::get('/payment-confirmation', 'App\Http\Controllers\Master@paymentConfirmation')->name('payment-confirmation');

    //Perfect Money

    
    Route::get('/checkout/perfectmoney','App\Http\Controllers\PerfectmoneyController@index');

    Route::post('/perfectmoney/success','App\Http\Controllers\PerfectmoneyController@success');

    Route::post('/perfectmoney/fail','App\Http\Controllers\PerfectmoneyController@fail');

    //Paytm Payment
    Route::get('/checkout/paytm',[PaytmController::Class, 'paytmPurchase']);

    Route::post('paytm-payment',[PaytmController::Class, 'paytmPayment'])->name('paytm.payment');

    Route::post('paytm-callback',[PaytmController::Class, 'paytmCallback'])->name('paytm.callback');


    //----------------------Withdraw -------------------------------------------

    Route::get('withdrawModal/{id}','App\Http\Controllers\Master@withdrawModal');

    Route::post('WithdrawRequest','App\Http\Controllers\Master@WithdrawRequest');


});
