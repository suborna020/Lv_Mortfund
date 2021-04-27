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
use App\Models\UserPaymentMethod;
use App\Models\PaymentGateway;
use App\Models\DonateHistory;
use App\Models\Transection;
use App\Models\Testimonial;
use App\Models\HowItWorks;
use App\Models\SuccessStory;
use App\Models\ContactView;
use App\Models\About;
use App\Models\support;
use App\Models\Terms;
use App\Models\Team;
use App\Models\Privacy;
use App\Models\SecondaryPoint;
use App\Models\clientmessage;
use Image;
use Illuminate\Support\Facades\View;
// use App\Models\Currency;
class Master extends Controller
{   

    public function test(){
        return view('test.test');
    }

    public function index(Request $r){
        
        $slider = Slider::where('status',1)->get();
        $fundraisers = Fundraiser::with('categories','members','transections')->where('status',1)->paginate(4,['*'],'all');
        $recents = Fundraiser::with('categories','members')->where('recent',1)->where('status',1)->paginate(8,['*'],'recent');
        $project_supports = Fundraiser::with('categories','members')->where('project_support',1)->where('status',1)->paginate(4,['*'],'project-support');
        
        $subscibe = Subscribe::where('id',1)->first();
        $counters = Counter::all();

        
        return view('ui.pages.welcome.welcome',compact('slider','fundraisers','recents','project_supports','subscibe','counters'));
    }


    public function fundraisers(Request $request){
        if($request->ajax()){
        $fundraisers = Fundraiser::with('categories','members','transections')->where('status',1)->paginate(4,['*'],'all');
        $user_currency = Currency::where('session_currency',Session::get('currency_c'))->first();

        // $ip = request()->ip();
        $ip = request()->ip();
        $arr_ip = geoip()->getLocation($ip);
        
        // get a country

        $user_location = $arr_ip->country; 
        $currency_by_location = Currency::where('status',1)->where('country_name',$user_location)->first(); 
        // echo $arr_ip->currency;

        return view('ui.pages.welcome.fundraisers',compact('fundraisers','user_currency','user_location','currency_by_location'))->render();
     }
    }


    public function recent(Request $request){
        if($request->ajax()){
        $recents = Fundraiser::with('categories','members','transections')->where('recent', 1)->Where('status',1)->paginate(8,['*'],'recent'); 
        $user_currency = Currency::where('session_currency',Session::get('currency_c'))->first();
        
        // $ip = request()->ip();
        $ip = request()->ip();
        $arr_ip = geoip()->getLocation($ip);
        $user_location = $arr_ip->country; // get a country
        $currency_by_location = Currency::where('status',1)->where('country_name',$user_location)->first(); 
        // echo $arr_ip->currency;

        return view('ui.pages.welcome.recent_fundraisers',compact('recents','user_currency','user_location','currency_by_location'))->render();
     }
    }


    public function project_support(Request $request){
        if($request->ajax()){
        $project_supports = Fundraiser::with('categories','members','transections')->where('status',1)->where('project_support',1)->paginate(4,['*'],'project_support'); 
        $user_currency = Currency::where('session_currency',Session::get('currency_c'))->first();
        
        // $ip = request()->ip();
        $ip = request()->ip();
        $arr_ip = geoip()->getLocation($ip);
        $user_location = $arr_ip->country; // get a country
        $currency_by_location = Currency::where('status',1)->where('country_name',$user_location)->first(); 
        // echo $arr_ip->currency;

        return view('ui.pages.welcome.project_support',compact('project_supports','user_currency','user_location','currency_by_location'))->render();
     }
    }

    public function HowItWorks(){
        $testimonials = Testimonial::where('status',1)->get();
        $how_it_works = HowItWorks::where('status',1)->get();
        // $success_stories1 = SuccessStory::where('status',1)->orderBy('id','DESC')->get();
        // $success_stories2 = SuccessStory::where('status',1)->orderBy('id','ASC')->get();
        return view('ui.pages.HowItWorks.howitworks',compact('testimonials','how_it_works'));
    }


    public function newCampaigns(){
        $new_medicals = Fundraiser::where('status',1)->where('category_id',2)->orderBy('id', 'DESC')->get();
        $new_educations = Fundraiser::where('status',1)->where('category_id',1)->orderBy('id', 'DESC')->get();
        $new_emergencies = Fundraiser::where('status',1)->where('category_id',3)->orderBy('id', 'DESC')->get();
        $get_new_campaigns = Fundraiser::with('categories','members','transections')->where('status',1)->orderBy('id','DESC')->paginate(8,['*'],'allnc');
        return view('ui.pages.explore.newCampaigns',compact('new_medicals','new_educations','new_emergencies','get_new_campaigns'));
    }

    public function getNewCampaigns(Request $request){
        if($request->ajax()){
        $get_new_campaigns = Fundraiser::with('categories','members','transections')->where('status',1)->orderBy('id','DESC')->paginate(8,['*'],'allnc');
        $user_currency = Currency::where('session_currency',Session::get('currency_c'))->first();

        // $ip = request()->ip();
        $ip = request()->ip();
        $arr_ip = geoip()->getLocation($ip);
        $user_location = $arr_ip->country; // get a country
        $currency_by_location = Currency::where('status',1)->where('country_name',$user_location)->first(); 
        // echo $arr_ip->currency;

        return view('ui.pages.explore.getNewCampaigns',compact('get_new_campaigns','user_currency','user_location','currency_by_location'))->render();
     }
    }


    public function featuredCampaigns(){
        $featured_medicals = Fundraiser::where('status',1)->where('category_id',2)->where('featured',1)->orderBy('id', 'DESC')->get();
        $featured_educations = Fundraiser::where('status',1)->where('category_id',1)->where('featured',1)->orderBy('id', 'DESC')->get();
        $featured_emergencies = Fundraiser::where('status',1)->where('category_id',3)->where('featured',1)->orderBy('id', 'DESC')->get();
        $get_featured_campaigns = Fundraiser::with('categories','members','transections')->where('status',1)->where('featured',1)->orderBy('id','DESC')->paginate(8,['*'],'allfc');
        return view('ui.pages.explore.featuredCampaigns',compact('featured_medicals','featured_educations','featured_emergencies','get_featured_campaigns'));
        
    }

    public function getFeaturedCampaigns(Request $request){
        if($request->ajax()){
        $get_featured_campaigns = Fundraiser::with('categories','members','transections')->where('status',1)->where('featured',1)->orderBy('id','DESC')->paginate(8,['*'],'allfc');
        $user_currency = Currency::where('session_currency',Session::get('currency_c'))->first();

        // $ip = request()->ip();
        $ip = request()->ip();
        $arr_ip = geoip()->getLocation($ip);
        $user_location = $arr_ip->country; // get a country
        $currency_by_location = Currency::where('status',1)->where('country_name',$user_location)->first(); 
        // echo $arr_ip->currency;

        return view('ui.pages.explore.getFeaturedCampaigns',compact('get_featured_campaigns','user_currency','user_location','currency_by_location'))->render();
     }
    }

     
    public function popularCampaigns(){
        $popular_medicals = Fundraiser::where('status',1)->where('category_id',2)->orderBy('raised', 'DESC')->orderBy('comments_count','DESC')->get();
        $popular_educations = Fundraiser::where('status',1)->where('category_id',1)->orderBy('raised', 'DESC')->orderBy('comments_count','DESC')->get();
        $popular_emergencies = Fundraiser::where('status',1)->where('category_id',3)->orderBy('raised', 'DESC')->orderBy('comments_count','DESC')->get();
        $get_popular_campaigns = Fundraiser::with('categories','members','transections')->where('status',1)->orderBy('raised','DESC')->orderBy('comments_count','DESC')->paginate(8,['*'],'allppc');
        return view('ui.pages.explore.popularCampaigns',compact('popular_medicals','popular_educations','popular_emergencies','get_popular_campaigns'));
         
    }

    public function getPopularCampaigns(Request $request){
        if($request->ajax()){
        $get_popular_campaigns = Fundraiser::with('categories','members','transections')->where('status',1)->orderBy('raised', 'DESC')->orderBy('comments_count','DESC')->paginate(8,['*'],'allppc');
        $user_currency = Currency::where('session_currency',Session::get('currency_c'))->first();

        // $ip = request()->ip();
        $ip = request()->ip();
        $arr_ip = geoip()->getLocation($ip);
        $user_location = $arr_ip->country; // get a country
        $currency_by_location = Currency::where('status',1)->where('country_name',$user_location)->first(); 
        // echo $arr_ip->currency;

        return view('ui.pages.explore.getPopularCampaigns',compact('get_popular_campaigns','user_currency','user_location','currency_by_location'))->render();
     }
    }

    public function urgentFundraising(){
        $medical_urgents = Fundraiser::where('status',1)->where('category_id',2)->where('urgent',1)->orderBy('id', 'DESC')->get();
        $education_urgents = Fundraiser::where('status',1)->where('category_id',1)->where('urgent',1)->orderBy('id', 'DESC')->get();
        $emergency_urgents = Fundraiser::where('status',1)->where('category_id',3)->where('urgent',1)->orderBy('id', 'DESC')->get();
        $get_urgent_fundraisings = Fundraiser::with('categories','members','transections')->where('status',1)->where('urgent',1)->orderBy('id','DESC')->paginate(8,['*'],'alluc');
        return view('ui.pages.explore.urgentFundraising',compact('medical_urgents','education_urgents','emergency_urgents','get_urgent_fundraisings'));
        
    }

    public function getUrgentFundraising(Request $request){
        if($request->ajax()){
        $get_urgent_fundraisings = Fundraiser::with('categories','members','transections')->where('status',1)->where('urgent',1)->orderBy('id','DESC')->paginate(8,['*'],'alluc');
        $user_currency = Currency::where('session_currency',Session::get('currency_c'))->first();

        // $ip = request()->ip();
        $ip = request()->ip();
        $arr_ip = geoip()->getLocation($ip);
        $user_location = $arr_ip->country; // get a country
        $currency_by_location = Currency::where('status',1)->where('country_name',$user_location)->first(); 
        // echo $arr_ip->currency;

        return view('ui.pages.explore.getUrgentFundraising',compact('get_urgent_fundraisings','user_currency','user_location','currency_by_location'))->render();
     }
    }


    public function project(){
        $medical_projects = Fundraiser::where('status',1)->where('category_id',2)->where('project_support',1)->orderBy('id', 'DESC')->get();
        $education_projects = Fundraiser::where('status',1)->where('category_id',1)->where('project_support',1)->orderBy('id', 'DESC')->get();
        $emergency_projects = Fundraiser::where('status',1)->where('category_id',3)->where('project_support',1)->orderBy('id', 'DESC')->get();
        $get_project_campaigns = Fundraiser::with('categories','members','transections')->where('status',1)->where('project_support',1)->orderBy('id','DESC')->paginate(8,['*'],'allpc');
        return view('ui.pages.explore.project',compact('medical_projects','education_projects','emergency_projects','get_project_campaigns'));
         
    }

    public function getProjectCampaigns(Request $request){
        if($request->ajax()){
        $get_project_campaigns = Fundraiser::with('categories','members','transections')->where('status',1)->where('project_support',1)->orderBy('id','DESC')->paginate(8,['*'],'allpc');
        $user_currency = Currency::where('session_currency',Session::get('currency_c'))->first();

        // $ip = request()->ip();
        $ip = request()->ip();
        $arr_ip = geoip()->getLocation($ip);
        $user_location = $arr_ip->country; // get a country
        $currency_by_location = Currency::where('status',1)->where('country_name',$user_location)->first(); 
        // echo $arr_ip->currency;

        return view('ui.pages.explore.getProjectCampaigns',compact('get_project_campaigns','user_currency','user_location','currency_by_location'))->render();
     }
    }

    public function Categories($slug){
        $categoryName = Category::where('id',$slug)->first();
        $categoryCampaigns = Fundraiser::with('categories','members','transections')->where('status',1)->where('category_id',$slug)->orderBy('id', 'DESC')->paginate(6,['*'],'cc');
        
        return view('ui.pages.categories.categories',compact('categoryCampaigns','categoryName'));
    }

    public function getCategoryCampaigns(Request $request,$slug){
        if($request->ajax()){
        $categoryCampaigns = Fundraiser::with('categories','members','transections')->where('status',1)->where('category_id',$slug)->orderBy('id', 'DESC')->paginate(6,['*'],'cc');
        $user_currency = Currency::where('session_currency',Session::get('currency_c'))->first();

        // $ip = request()->ip();
        $ip = request()->ip();
        $arr_ip = geoip()->getLocation($ip);
        $user_location = $arr_ip->country; // get a country
        $currency_by_location = Currency::where('status',1)->where('country_name',$user_location)->first(); 
        // echo $arr_ip->currency;

        return view('ui.pages.categories.category_campaigns',compact('categoryCampaigns','user_currency','user_location','currency_by_location'))->render();
     }
    }

    public function terms(){
        $terms = Terms::where('id',1)->first();
        return view('ui.pages.terms.terms',compact('terms'));
    }

    public function support(){
        $supports = support::where('status',0)->get();
        return view('ui.pages.faq.faq',compact('supports'));
    }

    public function about(){
        $contactBody = ContactView::where('id',1)->first();
        $aboutus = About::where('id',1)->first();
        $secondary_points_left = SecondaryPoint::where('column',0)->get();
        $secondary_points_right = SecondaryPoint::where('column',1)->get();
        $team = Team::all();

        return view('ui.pages.aboutUs.aboutus',compact('contactBody','aboutus','secondary_points_left','secondary_points_right','team'));
    }

    public function clientMessage(Request $r){
         
         
        clientmessage::create([
            'name' => $r->name,
            'email' => $r->email,
            'message' => $r->message,
        ]);


        
        return redirect('aboutus')->with('msg','
            <div class="alert alert-success" role="alert">
              message sent !
            </div>
            ');
    }

    public function privacy(){
         
        $privacy = Privacy::where('id',1)->first();
        return view('ui.pages.privacy.privacy',compact('privacy'));
    }


    public function search(){
         
        $all_campaigns = Fundraiser::paginate(30);
        return view('ui.pages.search.search',compact('all_campaigns'));
    }



    /*USERS*/

    public function currentFundraisers(Request $request){
        if($request->ajax()){
        $current_user_fundraisers = Fundraiser::with('categories','members','transections')->where('status',1)->where('member_id',session('user_session'))->paginate(4,['*'],'current');
        $user_currency = Currency::where('session_currency',Session::get('currency_c'))->first();

        // $ip = request()->ip();
        $ip = request()->ip();
        $arr_ip = geoip()->getLocation($ip);
        $user_location = $arr_ip->country; // get a country
        $currency_by_location = Currency::where('status',1)->where('country_name',$user_location)->first(); 
        // echo $arr_ip->currency;

        return view('ui.pages.users.user.current_fundraisers',compact('current_user_fundraisers','user_currency','user_location','currency_by_location'))->render();
     }
    }

    public function deleteCampaignModal(Request $r,$id){
        $data=Fundraiser::findOrFail($id);
        return response()->json($data); 
    }

    public function deleteFundraiser(Request $r,$id){
        Fundraiser::destroy(array('id',$id));

        $r->session()->flash('msg','deleted !');

        return redirect('/userFundraisers');
    }

    public function createCampaign(){
        return view('ui.pages.users.user.create_campign');
    }

    public function insertCampaign(Request $r){

         $this->validate($r, [
            'thumbnail' => 'mimes:jpeg,jpg,png',
            'photo' => 'mimes:jpeg,jpg,png',
            'video' => 'mimes:mp4|max:10240',
            'proof_document' => 'mimes:jpeg,jpg,png',
         ]);

         $thumbnail='';
         $photo='';
         $video='';
         $proof_document='';
         $image_name = '';

         if ($r->thumbnail!='') {
            $image = $r->file('thumbnail');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/thumbnails');
            $resize_image = Image::make($image->getRealPath());
            $resize_image->resize(350, 280, function($constraint){
            $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $image_name);



            // $thumbnail = rand().'-'.time().'.'.$r->thumbnail->extension();
            // $r->thumbnail->move(public_path('uploads'), $thumbnail);
         }

         if ($r->photo!='') {

            $photo = rand().'-'.time().'.'.$r->photo->extension();
            $r->photo->move(public_path('uploads'), $photo);
         }

         if ($r->video!='') {
            $video = rand().'-'.time().'.'.$r->video->extension();
            $r->video->move(public_path('uploads'), $video);
         }

         if ($r->proof_document!='') {
            $proof_document = rand().'-'.time().'.'.$r->proof_document->extension();
            $r->proof_document->move(public_path('uploads'), $proof_document);
         }

         Fundraiser::create([
            'category_id' => $r->category_id,
            'member_id' => session('user_session'),
            'title' => $r->title,
            'benificiary_name' => $r->benificiary_name,
            'needed_amount' => $r->needed_amount,
            'deadline' => $r->deadline,
            'story' => $r->story,
            'thumbnail' => $image_name,
            'photo' => $photo,
            'video' => $video,
            'proof_document' => $proof_document,
            'status' => 0,
        ]);


        $msg = 'success !';

        echo json_encode($msg);

        
    }

    public function editFundraiser($id){
        return view('ui.pages.users.user.edit_campaign')->with('get_fundraiser',Fundraiser::with('categories')->find($id));
    }

    public function updateFundraiser(Request $r){

        $this->validate($r, [
            'thumbnail' => 'mimes:jpeg,jpg,png',
            'photo' => 'mimes:jpeg,jpg,png',
            'video' => 'mimes:mp4|max:10240',
            'proof_document' => 'mimes:jpeg,jpg,png',
         ]);
         if ($r->thumbnail!='') {
            $thumbnail = rand().'-'.time().'.'.$r->thumbnail->extension();
             
            $r->thumbnail->move(public_path('uploads'), $thumbnail);
             
         }else{
            $thumbnail = $r->default_thumbnail;
           
         }
         if ($r->photo!='') {
            $photo = rand().'-'.time().'.'.$r->photo->extension();
            $r->photo->move(public_path('uploads'), $photo);
         }else{
            $photo = $r->default_photo;
         }
         if ($r->video!='') {
            $video = rand().'-'.time().'.'.$r->video->extension();
            $r->video->move(public_path('uploads'), $video);
         }else{
            $video = $r->default_video;
         }
         if ($r->proof_document!='') {
            $proof_document = rand().'-'.time().'.'.$r->proof_document->extension();
            $r->proof_document->move(public_path('uploads'), $proof_document);
         }else{
            $proof_document = $r->default_proof_document;
         }

        Fundraiser::where('id', $r->id)->update([
            'category_id' => $r->category_id,
            'member_id' => session('user_session'),
            'title' => $r->title,
            'benificiary_name' => $r->benificiary_name,
            'needed_amount' => $r->needed_amount,
            'deadline' => $r->deadline,
            'story' => $r->story,
            'thumbnail' => $thumbnail,
            'photo' => $photo,
            'video' => $video,
            'proof_document' => $proof_document,
        ]);

        $r->session()->flash('msg','Updated !');

        return redirect('/userFundraisers');
     }

    public function setUserCurrency(Request $r){
        $c_c = $r->currency_code;
        $r->session()->put('currency_c', $c_c);
        $arr = array('status' => 'true', 'message' => 'Currency Changed');
        echo json_encode($arr);
        // return redirect()->back();
    }


    public function userFundraisers(){
        $current_user_fundraisers = Fundraiser::with('categories','members','transections')->where('member_id',session('user_session'))->paginate(4,['*'],'current');

        return view('ui.pages.users.user.my_fund_raisers',compact('current_user_fundraisers'));
    } 


    public function userDashboard(){
    	return view('ui.pages.users.user.dashboard');
    }

    public function userSignup(){
        
    	//session a login thaka kalin user new login page a na giye alwayas dashboard stay korar condition
        //exist session/redicating on dashboard
        if (Session::get('user_session')) {
            return redirect(url('/'));
        }
    	return view('ui.pages.users.account.signup');
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
                // $user_info->password = Hash::make($request->password);
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

        if (Session::get('user_session')) {
            return redirect(url('myAccount'));
        }
        //session a login thaka kalin user new login page a na giye alwayas dashboard stay korar condition
        //exist session/redicating on dashboard
        return view('ui.pages.users.account.login');
    }


    public function userLogin_sub(Request $request){

        // Hash::check('password', $request->password);
        
        // $user_info = User::where('username', $request->username)->where(Hash::check('password', $request->password))->get()->toArray();
        $user_info = User::where('username', $request->username)->where('password', $request->password)->get()->toArray();
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

    public function DestroySession(Request $request){
        $request->session()->forget('user_session');
        $request->session()->forget('amount');
        $request->session()->forget('fundraiser_id');
        $request->session()->forget('user_session');
        $request->session()->forget('campaing_id');
        $request->session()->forget('success');
        $request->session()->forget('error');
        $request->session()->forget('msg');
        $request->session()->forget('passport_number');
        $request->session()->forget('upload_documents');
        return redirect('/login');
    }

    public function DestroySessions(Request $request){
         return view('destroySession.destroy_session');
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

    public function profile(Request $r){
        $profile = User::where('id',session('user_session'))->first();
        return view('ui.pages.users.user.profile',compact('profile'));
    }

    public function updateProfile(Request $r,$id){

        $this->validate($r, [
            'user_photo' => 'mimes:jpeg,jpg,png',
             
         ]);
         if ($r->user_photo!='') {

            $user_photo = $r->file('user_photo');
            $user_photo_name = time() . '.' . $user_photo->getClientOriginalExtension();
            $destinationPath = public_path('/thumbnails');
            $resize_image = Image::make($user_photo->getRealPath());
            $resize_image->resize(350, 280, function($constraint){
            $constraint->aspectRatio();
            })->save($destinationPath . '/' . $user_photo_name);
            $destinationPath = public_path('/uploads');
            $user_photo->move($destinationPath, $user_photo_name);

            // $user_photo = rand().'-'.time().'.'.$r->user_photo->extension();
             
            // $r->user_photo->move(public_path('uploads'), $user_photo);
             
         }else{
            $user_photo_name = $r->default_user_photo;
           
         }
          
        User::where('id', session('user_session'))->update([
            'name' => $r->name,
            'user_photo' => $user_photo_name,
            'mobile_no' => $r->mobile_no,
            'address' => $r->address,
        ]);

        $msg = 'success !';

        echo json_encode($msg);
     }

     public function changePassword(){
        $profile = User::where('id',session('user_session'))->first();
        return view('ui.pages.users.user.change_password',compact('profile'));
     }

     public function changeUserPassword(Request $r,$id){

        $current_password = User::where('id', session('user_session'))->first();
        
        $c_pass = $r->current_password;
        $n_pass = $r->new_password;
        $confirm_pass = $r->confirm_password;

        if ($c_pass == $current_password->password && $n_pass == $confirm_pass) {

             User::where('id', session('user_session'))->update([
                 
                'password' => $confirm_pass,
                 
             ]);

             return \Redirect::route('changePassword')->with('message', '

                <div class="alert alert-success" role="alert">
                  Password Changed Successfully!!!
                </div>
  
                ');
             
        }else{
            return \Redirect::route('changePassword')->with('message', '
                <div class="alert alert-danger" role="alert">
                  Something Went wrong
                </div>
            ');
       
        }
        
     }

    public function paymentSettings(Request $r){
        $payment_methods = UserPaymentMethod::with('PaymentGateways')->where('transection_type',0)->where('user_id',session('user_session'))->get();
        $payment_gateways = PaymentGateway::where('status',1)->get();
        return view('ui.pages.users.user.payment_settings',compact('payment_methods','payment_gateways'));
    }

    public function selectUserPayment(Request $r){
      $user_payment_method = UserPaymentMethod::where('user_id',session('user_session'))->where('payment_method_id', '=', $r->payment_method_id)->where('transection_type',0)->first();
      if ($user_payment_method===null) {
            foreach($r->payment_method_id as $item=>$v){
                    $data2=array(
                        'user_id'=>session('user_session'),
                         'payment_method_id'=>$r->payment_method_id[$item],
                         'transection_type'=>0
                        
                    );
                UserPaymentMethod::insert($data2);
                $method_message = array('status' => 'true', 'message' => 'Method successfully Added', 'reload' => url('paymentSettings'));
              }
        }else{
            $method_message = array('status' => 'false', 'message' => 'You have selected an Existed method,Please exclude the existed one');
        }  

      echo json_encode($method_message);
        
    }


    public function deletePaymentMethod(Request $r, $id){
        
        UserPaymentMethod::destroy(array('id',$id));
        
        return redirect()->back()->with('message','
            <div class="alert alert-success" role="alert">
               Method Deleted successfully
            </div>
            ');
    }


    //-------------------------- Payment Gateway --------------------------------------

    public function checkout(){

        \Stripe\Stripe::setApiKey('sk_test_51IQArsEXyED6aSlyyAiPCQo8XR2Gwt3W5K6o8ngmQgOsbvmZykUbS5VHeNoUXjSDh4vHQrmmtvGUOuICVVo9UdD900rlZhrVoX');
                
        $amount = session('amount');
        $amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'USD',
            'description' => 'Payment From Mortfund',
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;
        $charge = PaymentGateway::where('id',4)->first();

        return view('ui.pages.users.user.payment_check',compact('intent','charge'));
    }

    public function setSession(Request $request){
        $payment_method = $request->payment_method;
        $request->session()->put('payment_method', $payment_method);

        return redirect('myAccount/donateMethod/checkout');
    }

    public function donateMethod(Request $r){
        $payment_methods = UserPaymentMethod::with('PaymentGateways')->where('user_id',session('user_session'))->where('transection_type',0)->get();
        $payment_gateways = PaymentGateway::where('status',1)->get();
        return view('ui.pages.users.user.donateMethod',compact('payment_methods','payment_gateways'));
    }

    public function methodDetails(){
        return view('ui.pages.users.user.methodDetails');
    }

    public function setDonationDetails(Request $r){
        $campaing_id = $r->campaing_id;
        $fundraiser_id = $r->fundraiser_id;
        $donor_id = $r->donor_id;
        $amount = $r->donation_amount;
        $name = $r->name;
        $email = $r->email;
        $mobile = $r->mobile;
        $address = $r->address;
        $current_balance = $r->current_balance;
        $charge = $r->charge;
        
        $r->session()->put('campaing_id', $campaing_id);
        $r->session()->put('fundraiser_id', $fundraiser_id);
        $r->session()->put('donor_id', $donor_id);
        $r->session()->put('amount', $amount);
        $r->session()->put('name', $name);
        $r->session()->put('email', $email);
        $r->session()->put('mobile', $mobile);
        $r->session()->put('address', $address);
        $r->session()->put('current_balance', $current_balance);
        $r->session()->put('charge', $charge);
        // $arr = array('status' => 'true', 'message' => 'Currency Changed');
        // echo json_encode($arr);
        return redirect('myAccount/donateMethod');
    }

    public function interswitch(){
        return view('ui.pages.users.user.interswitch');
    }

    public function interswitchSuccess(){
    Transection::create([
            'method_id' => 7,
            'member_id' => session('user_session'),
            'transection_type' => 0,
            'name' => session('name'),
            'email' => session('email'),
            'phone' => session('phone'),
            'address' => session('address'),
            'amount' => session('amount'),
            'charge' => session('charge'),
            'campaign_author' => session('fundraiser_id'),
            'campaign_id' => session('campaing_id'),
            
        ]);

        User::where('id', session('user_session'))->update([
            'current_balance' => session('current_balance') + session('amount'),
        ]);
  
         $id = session('campaing_id');
         // echo "success";

         return \Redirect::route('singleCampaign',[$id])->with('message', 'Payment done Successfully!!!');
  }

    public function paymentConfirmation(){
        return view('ui.pages.users.user.payment-confirmation');
    }

    public function withdrawModal($id){
        $paymentGatewayInfo=PaymentGateway::findOrFail($id);
        return response()->json($paymentGatewayInfo); 
    }

    public function withdrawRequest(Request $request){
      Transection::create([
            'method_id' => $request->gateway_id,
            'member_id' => session('user_session'),
            'transection_type' => 1,
            'amount' => $request->withdraw_amount,
            'charge' => $request->charge,
        ]);

      $c_balance = $request->current_balance;
      $w_amount = $request->withdraw_amount;

      $curr_balance = $c_balance - $w_amount; 

      User::where('id', session('user_session'))->update([
            'current_balance' => $curr_balance,
        ]);

      $msg = 'success !';

      echo json_encode($msg);
    }
 
}
