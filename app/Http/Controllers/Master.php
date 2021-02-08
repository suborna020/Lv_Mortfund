<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use Hash;
use App\Models\User;
use App\Models\General;
use App\Models\Navmenu;
// use App\Models\Currency;

class Master extends Controller
{
    public function index(){
        $general = General::where('id',1)->first();
        $navmenu = Navmenu::where('status',1)->get();
        // $currency = Currency::where('status',1)->get();
        return view('ui.pages.welcome.welcome',compact('general','navmenu'));
    }

    public function adminDashboard(){
    	return view('admin.pages.dashboard.dashboard');
    }

    public function userDashboard(){
    	return view('ui.pages.users.user.dashboard');
    }

    public function userSignup(){
    	//session a login thaka kalin user new login page a na giye alwayas dashboard stay korar condition
        //exist session/redicating on dashboard
        if (Session::get('user_session')) {
            return redirect(url('index'));
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
            return redirect(url('my-account'));
        }
        //session a login thaka kalin user new login page a na giye alwayas dashboard stay korar condition
        //exist session/redicating on dashboard
        return view('ui.pages.users.account.login');
    }


    public function userLogin_sub(Request $request){
        
        $user_info = User::where('username', $request->username)->where('password',$request->password)->get()->toArray();
        if ($user_info) {
            if ($user_info[0]['status'] == 1) {
                // $user_info return all data in 0 indexed array . so $user_info child field access a 0 index ullekh korte hobe 
                $request->session()->put('user_session', $user_info[0]['id']);
                 //user_session a id store kora
                 $arr = array('status' => 'true', 'message' => 'Login successful', 'reload' => url('my-account')); //after email passwrd match page will redirect into portal/dashboard
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
}
