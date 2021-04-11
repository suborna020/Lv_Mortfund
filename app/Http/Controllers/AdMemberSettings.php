<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Validator,Redirect,Response,File;
use App\Models\User;
use DB;


class AdMemberSettings extends Controller
{
    public function adAllMembers(){
        return view('admin.pages.MemberSettings.adAllMembers');
    }
    public function adReportedMembers(){
        return view('admin.pages.MemberSettings.adReportedMembers');
    }
    public function adAllMembersData(){
        $data = User::all()->where('status','1');
        return response()->json($data); 
    }
    
    public function adReportedMembersData(){
        $data = User::all()->where('status','0');
        return response()->json($data); 
    }
}
