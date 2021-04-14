<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Validator,Redirect,Response,File;
use App\Models\User;
use App\Models\Report;

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
        
        $ReportedMemberId = DB::table('reports')
        ->select('member_id')
        ->groupBy('member_id')
        ->get();
        $ReportedMemberId = json_decode($ReportedMemberId, TRUE);
        $arrayValues = array_column($ReportedMemberId, 'member_id');

        $data = DB::table('users')
        ->whereIn('id', $arrayValues)->get();  

        return response()->json($data); 
    }
}
