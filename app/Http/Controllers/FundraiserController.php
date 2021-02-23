<?php

namespace App\Http\Controllers;

use App\Models\Fundraiser;
use Illuminate\Http\Request;
use Validator;
use Session;
use Hash;
use App\Models\User;
use App\Models\General;
use App\Models\Navmenu;
use App\Models\Footer;
use App\Models\Social;
use App\Models\Category;
use App\Models\FooterLinkAbout;
use App\Models\FooterLinkExplore;
use App\Models\Footer_link_category;
use App\Models\Slider;
use App\Models\Language;
use App\Models\Subscribe;
use App\Models\Counter;
use App\Models\Submenu;
use App\Models\Currency;
use Stevebauman\Location\Facades\Location;

class FundraiserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $general = General::where('id',1)->first();
        $footer = Footer::where('id',1)->first();
        $navmenu = Navmenu::with('submenus')->where('status',1)->get();
        $socials = Social::where('status',1)->get();
        $categories = Category::where('status',1)->get();
        $footer_about = FooterLinkAbout::where('status',1)->take(5)->get();
        $footer_explore = FooterLinkExplore::where('status',1)->take(5)->get();
        $footer_cat = Footer_link_category::where('status',1)->take(5)->get();
        $languages = Language::where('status',1)->get();

        $ip = '43.250.81.202';
        $arr_ip = geoip()->getLocation($ip);
        $user_location = $arr_ip->country; // get a country
        // $main_currency = Currency::where('status',1)->get();
        $currencies = Currency::where('status',1)->where('session_currency','!=',Session::get('currency_c'))->get();
        $user_currency = Currency::where('session_currency',Session::get('currency_c'))->first();
        
        $currency_by_location = Currency::where('status',1)->where('country_name',$user_location)->first(); 

        return view('ui.pages.campaigns.campaign_page',compact('general','footer','categories','navmenu','socials','footer_about','footer_explore','footer_cat','languages','currencies','user_currency','currency_by_location'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fundraiser  $fundraiser
     * @return \Illuminate\Http\Response
     */
    public function show(Fundraiser $fundraiser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fundraiser  $fundraiser
     * @return \Illuminate\Http\Response
     */
    public function edit(Fundraiser $fundraiser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fundraiser  $fundraiser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fundraiser $fundraiser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fundraiser  $fundraiser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fundraiser $fundraiser)
    {
        //
    }
}
