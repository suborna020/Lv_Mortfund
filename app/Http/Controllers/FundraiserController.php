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
use App\Models\Comment;
use App\Models\ReportComment;
use App\Models\Report;
use Stevebauman\Location\Facades\Location;

class FundraiserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $ip = '43.250.81.202';
        $arr_ip = geoip()->getLocation($ip);
        $user_location = $arr_ip->country; // get a country
        // $main_currency = Currency::where('status',1)->get();
        $currencies = Currency::where('status',1)->where('session_currency','!=',Session::get('currency_c'))->get();
        $user_currency = Currency::where('session_currency',Session::get('currency_c'))->first();
        $currency_by_location = Currency::where('status',1)->where('country_name',$user_location)->first(); 
        $fundraiser_details = Fundraiser::with('categories','members','comments')->find($id);

        $category_id= $fundraiser_details->category_id;
        $related_fundraisers = Fundraiser::where('category_id',$category_id)->where('id','!=',$id)->get();
        
        // return view('ui.pages.campaigns.campaign_page',compact('general','footer','categories','navmenu','socials','footer_about','footer_explore','footer_cat','languages','currencies','user_currency','currency_by_location'));

        return view('ui.pages.campaigns.campaign_page')->with('get_fundraiser',$fundraiser_details)->with('related_fundraisers',$related_fundraisers);
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
        $this->validate($request, [
            'comment' => 'required',
         ]);
 
         Comment::create([
            'campaing_id' => $request->campaing_id,
            'member_id' => session('user_session'),
            'comment' => $request->comment,
        ]);

        $id = $request->campaing_id;
        $comments_number = $request->comments_count+1;

        Fundraiser::where('id', $id)->update([
            'comments_count' => $comments_number,
        ]);


        $request->session()->flash('msg','success !');

        return redirect()->back();
    }

    public function reply(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required',
            'parent' => 'required',
         ]);
 
         Comment::create([
            'campaing_id' => $request->campaing_id,
            'member_id' => session('user_session'),
            'parent' => $request->parent,
            'comment' => $request->comment,
        ]);

        $id = $request->campaing_id;
        $comments_number = $request->comments_count+1;

         Fundraiser::where('id', $id)->update([
            'comments_count' => $comments_number,
             
        ]);


        $request->session()->flash('msg','success !');

        return redirect()->back();
    }

    public function reportComment(Request $request)
    {
        $this->validate($request, [
            'report_details' => 'required',
         ]);
 
         ReportComment::create([
            'report_details' => $request->report_details,
            'member_id' => session('user_session'),
            'comment_id' => $request->comment_id,
        ]);


        $request->session()->flash('msg','success !');

        return redirect()->back();
    }

    public function reportCampaign(Request $request)
    {
        $this->validate($request, [
            'report_details' => 'required',
         ]);
 
         Report::create([
            'report_details' => $request->report_details,
            'member_id' => session('user_session'),
            'fundraiser_id' => $request->fundraiser_id,
        ]);


        $request->session()->flash('msg','success !');

        return redirect()->back();
    }

    public function viewCounter(Request $request,$id)
    {    
        Fundraiser::where('id', $r->id)->update([
            'views_counter' => $request->views_counter,
        ]);

        return redirect()->back();
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
