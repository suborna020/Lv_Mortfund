<?php

namespace App\Http\Controllers;

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
use App\Models\Fundraiser;
use App\Models\Language;
use App\Models\Subscribe;
use App\Models\Counter;
use App\Models\Submenu;
use App\Models\Currency;
// use App\Models\Currency;

class Master extends Controller
{   

    public function __construct()
    {
        $general = General::where('id',1)->first();
    }
    public function index(Request $r){
        $general = General::where('id',1)->first();
        $footer = Footer::where('id',1)->first();
        $navmenu = Navmenu::with('submenus')->where('status',1)->get();
        $socials = Social::where('status',1)->get();
        $categories = Category::where('status',1)->get();
        $footer_about = FooterLinkAbout::where('status',1)->take(5)->get();
        $footer_explore = FooterLinkExplore::where('status',1)->take(5)->get();
        $footer_cat = Footer_link_category::where('status',1)->take(5)->get();
        $slider = Slider::where('status',1)->get();
        $fundraisers = Fundraiser::with('categories','members')->paginate(4,['*'],'all');
        $recents = Fundraiser::with('categories','members')->where('recent',1)->paginate(8,['*'],'recent');
        $project_supports = Fundraiser::with('categories','members')->where('project_support',1)->paginate(4,['*'],'project-support');
        $languages = Language::where('status',1)->get();
        $subscibe = Subscribe::where('id',1)->first();
        $counters = Counter::all();
        
        $currencies = Currency::where('status',1)->where('session_currency','!=',Session::get('currency_c'))->get();
        $user_currency = Currency::where('session_currency',Session::get('currency_c'))->first();
        
        // $currency = Currency::where('status',1)->get();
        return view('ui.pages.welcome.welcome',compact('general','navmenu','footer','socials','categories','footer_about','footer_explore','footer_cat','slider','fundraisers','languages','recents','project_supports','subscibe','counters','currencies','user_currency'));
    }

    public function fundraisers(Request $request){
        if($request->ajax()){
        $fundraisers = Fundraiser::with('categories','members')->paginate(4,['*'],'all');
        $user_currency = Currency::where('session_currency',Session::get('currency_c'))->first();
        
        return view('ui.pages.welcome.fundraisers',compact('fundraisers','user_currency'))->render();
     }
    }


    public function recent(Request $request){
        if($request->ajax()){
        $recents = Fundraiser::with('categories','members')->where('recent',1)->paginate(8,['*'],'recent'); 
        $user_currency = Currency::where('session_currency',Session::get('currency_c'))->first();
        
        return view('ui.pages.welcome.recent_fundraisers',compact('recents','user_currency'))->render();
     }
    }


    public function project_support(Request $request){
        if($request->ajax()){
        $project_supports = Fundraiser::with('categories','members')->where('project_support',1)->paginate(4,['*'],'project-support'); 
        $user_currency = Currency::where('session_currency',Session::get('currency_c'))->first();
        
        return view('ui.pages.welcome.project_support',compact('project_supports','user_currency'))->render();
     }
    }


    public function setUserCurrency(Request $r){
        $c_c = $r->currency_code;
        $r->session()->put('currency_c', $c_c);
        return redirect()->back();
    }

  

    public function userDashboard(){
    	return view('ui.pages.users.user.dashboard');
    }

    public function userSignup(){
        $general = General::where('id',1)->first();
        $navmenu = Navmenu::where('status',1)->get();
    	//session a login thaka kalin user new login page a na giye alwayas dashboard stay korar condition
        //exist session/redicating on dashboard
        if (Session::get('user_session')) {
            return redirect(url('index'));
        }
    	return view('ui.pages.users.account.signup',compact('general','navmenu'));
    }


    public function userSignupSub(Request $request){
        //  print_r($request->all());
        $validator = Validator($request->all(), [
            'name' => 'required', 
            'email' => 'required', 
            'mobile_no' => 'required', 
            'address' => 'required',
            'username' => 'required', 
            'password' => 'required',
            ]);
        if ($validator->passes()) {
            // ($is_exists) condition : if given email already exist on our database
            //where('email', $request->email) =db email == given email
            // $is_exists=get() method for fetching existing email line from database
            $email_is_exists = User::where('email', $request->email)->get()->toArray();
            $username_is_exists = User::where('username', $request->username)->get()->toArray();

            if ($email_is_exists) {
                $arr = array('status' => 'false', 'message' => 'E-Mail Already Exists');
            }else if ($username_is_exists) {
                $arr = array('status' => 'false', 'message' => 'Username Already Exists');
            } else {
                $user_info = new User();
                $user_info->name = $request->name;
                $user_info->email = $request->email;
                $user_info->mobile_no = $request->mobile_no;
                $user_info->address = $request->address;
                $user_info->username = $request->username;
                $user_info->password = $request->password;
                $user_info->status = 1;
                $user_info->save();
                $arr = array('status' => 'true', 'message' => 'Signup Successful', 'reload' => url('login'));
            }
        } else {
            $arr = array('status' => 'false', 'message' => $validator->errors()->all());
        }
        echo json_encode($arr);
    }

    public function userLogin()
    {

        $general = General::where('id',1)->first();
        $navmenu = Navmenu::where('status',1)->get();
        if (Session::get('user_session')) {
            return redirect(url('myAccount'));
        }
        //session a login thaka kalin user new login page a na giye alwayas dashboard stay korar condition
        //exist session/redicating on dashboard
        return view('ui.pages.users.account.login',compact('general','navmenu'));
    }


    public function userLogin_sub(Request $request){
        
        $user_info = User::where('username', $request->username)->where('password',$request->password)->get()->toArray();
        if ($user_info) {
            if ($user_info[0]['status'] == 1) {
                // $user_info return all data in 0 indexed array . so $user_info child field access a 0 index ullekh korte hobe 
                $request->session()->put('user_session', $user_info[0]['id']);
                 //user_session a id store kora
                 $arr = array('status' => 'true', 'message' => 'Login successful', 'reload' => url('myAccount')); //after email passwrd match page will redirect into portal/dashboard
            } else {
                $arr = array('status' => 'false', 'message' => 'Your Account is Deactived');
            }
        } else {
            $arr = array('status' => 'false', 'message' => 'Email And Password Did Not Match');
        }
        echo json_encode($arr);
    }

    public function Logout(Request $request){
        $request->session()->forget('user_session');
        return redirect('/login');
    }

    public function forgotPassword(){
        return view('ui.pages.users.account.forgotPassword');
    }

    public function emailVerification(){
        return view('ui.pages.users.account.forgotPassword');
    }

    public function getSession(Request $r){
        echo $r->session()->get('currency_code');
    }
}
