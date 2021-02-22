<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdMemberSettings extends Controller
{
    public function adAllMembers(){
        return view('admin.pages.MemberSettings.adAllMembers');
    }
    public function adReportedMembers(){
        return view('admin.pages.MemberSettings.adReportedMembers');
    }
}
