<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdFrontEndSettings extends Controller
{
    public function adLogoNav(){
        return view('admin.pages.FrontEndSettings.adLogoNav');
    }
    


    public function adSlider(){
        return view('admin.pages.FrontEndSettings.adSlider');
    } 
    public function adHowItW(){
        return view('admin.pages.FrontEndSettings.adHowItW');
    } 
    public function adAbout(){
        return view('admin.pages.FrontEndSettings.adAbout');
    } 
    public function adTeam(){
        return view('admin.pages.FrontEndSettings.adTeam');
    } 
    public function adTestimonials(){
        return view('admin.pages.FrontEndSettings.adTestimonials');
    } 
    public function adCounter(){
        return view('admin.pages.FrontEndSettings.adCounter');
    } 
    public function adContact(){
        return view('admin.pages.FrontEndSettings.adContact');
    }
     public function adSocialSettings(){
        return view('admin.pages.FrontEndSettings.adSocialSettings');
    } 
    public function adSupport(){
        return view('admin.pages.FrontEndSettings.adSupport');
    }
    public function adTermsOfUse(){
        return view('admin.pages.FrontEndSettings.adTermsOfUse');
    } 
    public function adPrivacyPolicy(){
        return view('admin.pages.FrontEndSettings.adPrivacyPolicy');
    } 
    public function adLoginSignup(){
        return view('admin.pages.FrontEndSettings.adLoginSignup');
    } 
    public function adFooter(){
        return view('admin.pages.FrontEndSettings.adFooter');
    }



}
