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
            // for admin views 
            if(Session::get('admin_session')){
                $user_id=Session::get('admin_session');
                $userInfoBox=Admin::findOrFail($user_id);
    
                $view->with('userInfoBox',$userInfoBox)
                // ->with( [ 'userInfoBox' => $userInfoBox ] )
                ;
            }
            
        });

        View::composer('*', function ($users){
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
            
            $users->with('user_info',$user_info)->with('number_of_current_fundraisers',$number_of_current_fundraisers)->with('number_of_pending_fundraisers',$number_of_pending_fundraisers)->with('number_of_completed_fundraisers',$number_of_completed_fundraisers)->with('current_user_fundraisers',$current_user_fundraisers)->with('user_balance',$user_balance);
          }
            
        });

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

            $view->with('general',$general)->with('footer',$footer)->with('navmenu',$navmenu)->with('socials',$socials)->with('categories',$categories)->with('footer_about',$footer_about)->with('footer_explore',$footer_explore)->with('footer_cat',$footer_cat)->with('languages',$languages)->with('currencies',$currencies)->with('user_currency',$user_currency)->with('currency_by_location',$currency_by_location)->with('fund_raised',$fund_raised);
        });
    }
}
