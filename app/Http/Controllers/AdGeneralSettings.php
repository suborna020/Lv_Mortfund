<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdGeneralSettings extends Controller
{
    public function adBasicSettings(){
        return view('admin.pages.GeneralSettings.adBasicSettings');
    }
    public function adEmailSettings(){
        return view('admin.pages.GeneralSettings.adEmailSettings');
    }
    public function adSmsSettings(){
        return view('admin.pages.GeneralSettings.adSmsSettings');
    }
}
