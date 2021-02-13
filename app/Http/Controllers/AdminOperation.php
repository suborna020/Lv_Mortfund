<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;

class AdminOperation extends Controller
{
    public function aDashboardM(){
        // echo $session_data = Session::get('user_session');
        $admin_sessionData=Session::get('admin_session');
        if (!Session::get('admin_session')) {
           return redirect(url('adminLogin'));
        }
         return view('admin.pages.aDashboard', ['admin_sessionData'=>$admin_sessionData]);

    }
    public function aLogoutM(Request $request)
    {
        $request->session()->forget('admin_session');
        return redirect('/adminLogin');
    }
}
