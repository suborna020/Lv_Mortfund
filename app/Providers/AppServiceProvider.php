<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Carbon;
use App\Models\Admin;
use Illuminate\Http\Request;
use Session;
use Validator;
use Illuminate\Support\Facades\View;

use App\Models\User;
use App\Models\General;
use App\Models\Navmenu;
use App\Models\Footer;
use App\Models\Social;
use App\Models\Category;
use App\Models\FooterLinkAbout;
use App\Models\FooterLinkExplore;
use App\Models\Footer_link_category;
use App\Models\Fundraiser;
use App\Models\Language;
use App\Models\Submenu;
use App\Models\Currency;
use App\Models\Transection;
use App\Models\SuccessStory;
use App\Models\WithdrawRequest;
use App\Models\NewsletterMail;
use App\Models\PaymentGateway;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        View::composer('*', function ($view){
            $general = General::where('id',1)->first();
            $footer = Footer::where('id',1)->first();
            $navmenu = Navmenu::with('submenus')->where('status',1)->get();
            $socials = Social::where('status',1)->get();
            $categories = Category::where('status',1)->get();
            $footer_about = FooterLinkAbout::where('status',1)->take(5)->get();
            $footer_explore = FooterLinkExplore::where('status',1)->take(5)->get();
            $footer_cat = Footer_link_category::where('status',1)->take(5)->get();
            $fund_raised = Transection::all();
            $languages = Language::where('status',1)->get();
            $ip = '43.250.81.202';
            $arr_ip = geoip()->getLocation($ip);
            $user_location = $arr_ip->country; // get a country
            // $main_currency = Currency::where('status',1)->get();
            $currencies = Currency::where('status',1)->where('session_currency','!=',Session::get('currency_c'))->get();
            $user_currency = Currency::where('session_currency',Session::get('currency_c'))->first();
            $currency_by_location = Currency::where('status',1)->where('country_name',$user_location)->first();
            $success_stories1 = SuccessStory::where('status',1)->orderBy('id','DESC')->get();
            $success_stories2 = SuccessStory::where('status',1)->orderBy('id','ASC')->get();
            $selected_fundraiser = Fundraiser::where('id',session('campaing_id'))->where('status',1)->first();
            $selected_method = PaymentGateway::where('id',session('payment_method'))->where('status',1)->first();

            $view->with('general',$general)->with('footer',$footer)->with('navmenu',$navmenu)->with('socials',$socials)->with('categories',$categories)->with('footer_about',$footer_about)->with('footer_explore',$footer_explore)->with('footer_cat',$footer_cat)->with('languages',$languages)->with('currencies',$currencies)->with('user_currency',$user_currency)->with('currency_by_location',$currency_by_location)->with('fund_raised',$fund_raised)->with('success_stories1',$success_stories1)->with('success_stories2',$success_stories1)->with('selected_fundraiser',$selected_fundraiser)->with('selected_method',$selected_method);


            //User 

            if(Session::get('user_session')){
            $user_info = User::where('id',session('user_session'))->first();
            $current_user_fundraisers = Fundraiser::with('categories','members','transections')->where('member_id',session('user_session'))->paginate(4,['*'],'current');
            $user_balance = Transection::where('campaign_author',session('user_session'))->get();
            $current_fundraisers = Fundraiser::where('member_id',session('user_session'))->where('status',1)->get();
            $pending_fundraisers = Fundraiser::where('status',0)->where('member_id',session('user_session'))->get();
            $completed_fundraisers = Fundraiser::where('member_id',session('user_session'))->where('status',2)->get();
            $number_of_current_fundraisers = $current_fundraisers->count();
            $number_of_pending_fundraisers = $pending_fundraisers->count();
            $number_of_completed_fundraisers = $completed_fundraisers->count();
            
            $view->with('user_info',$user_info)->with('number_of_current_fundraisers',$number_of_current_fundraisers)->with('number_of_pending_fundraisers',$number_of_pending_fundraisers)->with('number_of_completed_fundraisers',$number_of_completed_fundraisers)->with('current_user_fundraisers',$current_user_fundraisers)->with('user_balance',$user_balance);
          }

          //ADMIN----------------------------------------------------------------------------------------------

          if(Session::get('admin_session')){
                $user_id=Session::get('admin_session');
                $userInfoBox=Admin::findOrFail($user_id);
                $FundraisersBox = Fundraiser::all();
                $CategoriesBox = Category::all();
                $successStoriesBox = SuccessStory::all();
                $WithdrawRequestsBox=WithdrawRequest::all();
                $FundOnProgressBox = Fundraiser::select("*")
                ->where('needed_amount', '>', \DB::raw('raised'))
                ->get();
                $newsletterMail=NewsletterMail::all();
                $paymentGatewaysBox=PaymentGateway::all();


    
             $view->with('userInfoBox',$userInfoBox)
                ->with('FundraisersBox',$FundraisersBox)
                ->with('CategoriesBox',$CategoriesBox)
                ->with('successStoriesBox',$successStoriesBox)
                ->with('WithdrawRequestsBox',$WithdrawRequestsBox)
                ->with('FundOnProgressBox',$FundOnProgressBox)
                ->with('newsletterMail',$newsletterMail )
                ->with('paymentGatewaysBox',$paymentGatewaysBox )

                ;
               
            }
            // ---------------------------------------------------------------------------------------

        });   
        
    }
}
