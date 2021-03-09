<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Validator,Redirect,Response,File;
use Session;
use Hash;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::get('admin_session')) {
            return redirect(url('aDashboard'));
        }
        return view('admin.pages.aLogin');

    }
    // admin signup 
    public function aSignUpM()
    
    {
        if (Session::get('admin_session')) {
            return redirect(url('aDashboard'));
        }
        return view('admin.pages.aSignUp');

    }
    public function aSignUpSub(Request $request)
    {
        //  print_r($request->all());
        $validator = Validator($request->all(), [
            'admin_name' => 'required', 
            'admin_email' => 'required', 
            'admin_username' => 'required', 
            'admin_password' => 'required',
            ]);
        if ($validator->passes()) {
            // ($is_exists) condition : if given email already exist on our database
            //where('email', $request->email) =db email == given email
            // $is_exists=get() method for fetching existing email line from database
            $email_is_exists = Admin::where('admin_email', $request->admin_email)->get()->toArray();
            $username_is_exists = Admin::where('admin_username', $request->admin_username)->get()->toArray();

            if ($email_is_exists) {
                $arr = array('status' => 'false', 'message' => 'E-Mail Already Exists');
            }else if ($username_is_exists) {
                $arr = array('status' => 'false', 'message' => 'Username Already Exists');
            } else {
                $user_info = new Admin();
                $user_info->admin_name = strtolower($request->admin_name);
                $user_info->admin_email = $request->admin_email;
                $user_info->admin_username = $request->admin_username;
                $user_info->admin_password = $request->admin_password;
                $user_info->admin_status = 1;

                $user_info->save();
                $arr = array('status' => 'true', 'message' => 'Signup Successful', 'reload' => url('adminLogin'));
            }
        } else {
            $arr = array('status' => 'false', 'message' => $validator->errors()->all());
        }
        echo json_encode($arr);

    }
   
    public function adminLoginSub(Request $request){
        
        $user_info = Admin::where('admin_username', $request->admin_username)->where('admin_password',$request->admin_password)->get()->toArray();
        if ($user_info) {
            if ($user_info[0]['admin_status'] == 1) {
                // $user_info return all data in 0 indexed array . so $user_info child field access a 0 index ullekh korte hobe 
                $request->session()->put('admin_session', $user_info[0]['id']);
                 //user_session a id store kora
                 $arr = array('status' => 'true', 'message' => 'Login successful', 'reload' => url('aDashboard')); //after email passwrd match page will redirect into portal/dashboard
            } else {
                $arr = array('status' => 'false', 'message' => 'Your Account is Deactived');
            }
        } else {
            $arr = array('status' => 'false', 'message' => 'Email And Password Did Not Match');
        }
        echo json_encode($arr);
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
