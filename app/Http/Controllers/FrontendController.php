<?php

namespace App\Http\Controllers;
use Session;
use Validator,Redirect,Response,File;
use DB;

use App\Models\ContactView;
use App\Models\Footer;
use App\Models\Footer_link_category;
use App\Models\FooterLinkAbout;
use App\Models\FooterLinkExplore;
use App\Models\General;
use App\Models\HowItWorks;
use App\Models\Privacy;
use App\Models\SecondaryPoint;
use App\Models\SignupLoginView;
use App\Models\Slider;
use App\Models\Social;
use App\Models\Support;
use App\Models\Team;
use App\Models\Terms;
use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
 //---------------------------LOGO & FABICON SETTINGS------------------------------//
    //--------------------------------------------------------------------------------//

    public function updateLogoFabicon(Request $request,$id){
            // $status = $request->status;
            $validator = Validator::make($request->all(), [
                'website_logo' => 'required',
            ]);
            if ($validator->passes()) {
                if(($request->file('website_logo'))!=null){
                    $websiteLogoFile = $request->file('website_logo'); //name="video"
                    $websiteLogoFileName =date('mdYHis').uniqid().$websiteLogoFile->getClientOriginalName();
                    $path=$websiteLogoFile->move(public_path('images'), $websiteLogoFileName);
                    $data['website_logo']='images/'.$websiteLogoFileName;
                }
                if(($request->file('website_favicon'))!=null){
                    $faviconFile = $request->file('website_favicon'); //name="video"
                    $faviconFileName =date('mdYHis').uniqid().$faviconFile->getClientOriginalName();
                    $path=$faviconFile->move(public_path('images'), $faviconFileName);
                    $data['website_favicon']='images/'.$faviconFileName;
                }
                General::findOrFail($id)->update($data);
                return redirect()->back()->with('success_status','Website info updated');
            }
            else{
                return redirect()->back();
            }
    }

     //---------------------------SLIDER SETTINGS--------------------------------------//
    //--------------------------------------------------------------------------------//
    public function addSlider(Request $request){
        $slider = new Slider();
        $slider->slider_title = $request->slider_title;
        $slider->slide_sub_title = $request->slide_sub_title;
        $slider->button_name = $request->button_name;
        $slider->button_link = $request->button_link;
        $slider->status = $request->status;
        if ($request->hasFile('slider_photo')){
            $file = $request->file('slider_photo');
            $sliderName = date('mdYHis').uniqid()."-".$file->getClientOriginalName();
            $file->move(public_path('uploads/'), $sliderName);
            $slider->slider_photo = $sliderName;
        }
        $slider->save();
        return redirect()->back()->with('success_status','Slider Created');
    }
    public function getSlider($slider_id){
        $slider = Slider::where('id',$slider_id)->first();
        return $slider;
    }
    public function editSlider(Request $request,$slider_id){
        $slider = Slider::where('id',$slider_id)->first();
        $slider->slider_title = $request->slider_title;
        $slider->slide_sub_title = $request->slide_sub_title;
        $slider->button_name = $request->button_name;
        $slider->button_link = $request->button_link;
        $slider->status = $request->status;
        if ($request->hasFile('slider_photo')){
            unlink(public_path('uploads/'.$slider->slider_photo));
            $file = $request->file('slider_photo');
            $sliderName = date('mdYHis').uniqid()."-".$file->getClientOriginalName();
            $file->move(public_path('uploads/'), $sliderName);
            $slider->slider_photo = $sliderName;
        }
        $slider->save();
        return redirect()->back()->with('success_status','Slider Updated');
    }
    public function removeSlider($slider_id){
        Slider::where('id',$slider_id)->delete();
        return redirect()->back()->with('success_status','Slider Removed');
    }
    
     //-------------------------------How It Works-------------------------------------//
    //--------------------------------------------------------------------------------//
    public function addHIW(Request $request){
        $data = new HowItWorks();
        $data->title = $request->title;
        $data->icon = $request->icon;
        $data->short_description = $request->short_description;
        $data->status = $request->status;
        $data->save();
        return redirect()->back()->with('success_status','Website info updated');
    }
    public function editHIW(Request $request,$hiw_id){
        $data = HowItWorks::where('id',$hiw_id)->first();
        $data->title = $request->title;
        $data->icon = $request->icon;
        $data->short_description = $request->short_description;
        $data->status = $request->status;
        $data->save();
        return redirect()->back()->with('success_status','Website info updated');
    }
    public function getHIW($hiw_id){
        $data = HowItWorks::where('id',$hiw_id)->first();
        return $data;
    }
    public function deleteHIW($hiw_id){
        HowItWorks::where('id',$hiw_id)->delete();
        return redirect()->back()->with('success_status','Website info updated');
    }
     //--------------------------------------ABOUT-------------------------------------//
    //--------------------------------------------------------------------------------//
    public function updateAbout(Request $request){
        if ($data = General::where('id',1)->first()){
            $data->website_title = $request->website_title;
            $data->website_email = $request->website_email;
            $data->website_phone = $request->website_phone;
            $data->base_currency_text = $request->base_currency_text;
//            $data->base_currency_symbol = $request->base_currency_symbol;
            $data->short_note_1 = $request->short_note_1;
            $data->short_note_2 = $request->short_note_2;
            $data->save();
        }
        else{
            $data = new General();
            $data->website_title = $request->website_title;
            $data->website_email = $request->website_email;
            $data->website_phone = $request->website_phone;
            $data->base_currency_text = $request->base_currency_text;
//            $data->base_currency_symbol = $request->base_currency_symbol;
            $data->short_note_1 = $request->short_note_1;
            $data->short_note_2 = $request->short_note_2;
            $data->save();
        }
        return redirect()->back()->with('success_status','Website info updated');
    }
     //----------------------------------SECONDARY POINTS------------------------------//
    //--------------------------------------------------------------------------------//
    public function addSP(Request $request){
        $data = new SecondaryPoint();
        $data->secondary_point = $request->secondary_point;
        $data->column = $request->column;
        $data->save();
        return redirect()->back()->with('success_status','Website info added');
    }
    public function editSP(Request $request,$sp_id){
        $data = SecondaryPoint::where('id',$sp_id)->first();
        $data->secondary_point = $request->secondary_point;
        $data->column = $request->column;
        $data->save();
        return redirect()->back()->with('success_status','Website info updated');
    }
    public function getSP($sp_id){
        $data = SecondaryPoint::where('id',$sp_id)->first();
        return $data;
    }
    public function deleteSP($sp_id){
        SecondaryPoint::where('id',$sp_id)->delete();
        return redirect()->back()->with('success_status','Website info updated');
    }
     //---------------------------------------TEAM-------------------------------------//
    //--------------------------------------------------------------------------------//
    public function addTeam(Request $request){
        $team = new Team();
        if ($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photoName = date('mdYHis').uniqid()."-".$photo->getClientOriginalName();
            $photo->move(public_path('uploads/'),$photoName);
            $team->photo = $photoName;
        }
        $team->member_name = $request->member_name;
        $team->member_designation = $request->member_designation;
        $team->facebook_link = $request->facebook_link;
        $team->twitter_link = $request->twitter_link;
        $team->linkedin_link = $request->linkedin_link;
        $team->instagram_link = $request->instagram_link;
        $team->save();
        return redirect()->back()->with('success_status','Website info updated');
    }
    public function getTeam($team_id){
        $teams = Team::find($team_id);
        return $teams;
    }
    public function updateTeam(Request $request,$team_id){
        $team = Team::where('id',$team_id)->first();
        if ($request->hasFile('photo')){
            unlink(public_path('uploads/'.$team->photo));
            $photo = $request->file('photo');
            $photoName = date('mdYHis').uniqid()."-".$photo->getClientOriginalName();
            $photo->move(public_path('uploads/'),$photoName);
            $team->photo = $photoName;
        }
        $team->member_name = $request->member_name;
        $team->member_designation = $request->member_designation;
        $team->facebook_link = $request->facebook_link;
        $team->twitter_link = $request->twitter_link;
        $team->linkedin_link = $request->linkedin_link;
        $team->instagram_link = $request->instagram_link;
        $team->save();
        return redirect()->back()->with('success_status','Website info updated');
    }
    public function deleteTeam($team_id){
        Team::where('id',$team_id)->delete();
        return redirect()->back()->with('success_status','Website info updated');
    }
     //----------------------------------TRSTIMONIAL-----------------------------------//
    //--------------------------------------------------------------------------------//
    public function addTestimonial(Request $request){
        $data = new Testimonial();
        $data->author_name = $request->author_name;
        $data->designation = $request->designation;
        $data->company_name = $request->company_name;
        $data->authors_text = $request->authors_text;
        if ($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photoName = date('mdYHis').uniqid()."-".$photo->getClientOriginalName();
            $photo->move(public_path('uploads/'),$photoName);
            $data->photo = $photoName;
        }
        $data->save();
        return redirect()->back()->with('success_status','Website info updated');
    }
    public function getTestimonial($tm_id){
        $data = Testimonial::where('id',$tm_id)->first();
        return $data;
    }
    public function editTestimonial(Request $request,$tm_id){
        $data = Testimonial::where('id',$tm_id)->first();
        $data->author_name = $request->author_name;
        $data->designation = $request->designation;
        $data->company_name = $request->company_name;
        $data->authors_text = $request->authors_text;
        if ($request->hasFile('photo')){
            unlink(public_path('uploads/'.$data->photo));
            $photo = $request->file('photo');
            $photoName = date('mdYHis').uniqid()."-".$photo->getClientOriginalName();
            $photo->move(public_path('uploads/'),$photoName);
            $data->photo = $photoName;
        }
        $data->save();
        return redirect()->back()->with('success_status','Website info updated');
    }
    public function deleteTestimonial($tm_id){
        Testimonial::where('id',$tm_id)->delete();
        return redirect()->back()->with('success_status','Website info deleted');
    }
     //----------------------------------CONTACT VIEW----------------------------------//
    //--------------------------------------------------------------------------------//
    public function updateContact(Request $request){
        if ($data = ContactView::where('id',1)->first()){
            $data->contact_title = $request->contact_title;
            $data->contact_text = $request->contact_text;
            $data->contact_email = $request->contact_email;
            $data->contact_number = $request->contact_number;
            $data->contact_hours = $request->contact_hours;
            $data->contact_location = $request->contact_location;
            $data->save();
        }
        else{
            $data = new ContactView();
            $data->contact_title = $request->contact_title;
            $data->contact_text = $request->contact_text;
            $data->contact_email = $request->contact_email;
            $data->contact_number = $request->contact_number;
            $data->contact_hours = $request->contact_hours;
            $data->contact_location = $request->contact_location;
            $data->save();
        }
        return redirect()->back()->with('success_status','Website info deleted');
    }
     //--------------------------------------SOCIAL------------------------------------//
    //--------------------------------------------------------------------------------//
    public function getSocial($sid){
        $data = Social::where('id',$sid)->first();
        return $data;
    }
    public function addSocial(Request $request){
        $data = new Social();
        $data->social_name = $request->social_name;
        $data->link = $request->link;
        $data->status = $request->status;
        $data->social_photo = $request->social_photo;
        if ($request->hasFile('social_photo')){
            $photo = $request->file('social_photo');
            $photoName = date('mdYHis').uniqid()."-".$photo->getClientOriginalName();
            $photo->move(public_path('uploads/'),$photoName);
            $data->social_photo = $photoName;
        }
        $data->save();
        return redirect()->back()->with('success_status','Website info deleted');
    }
    public function editSocial(Request $request,$sid){
        $data = Social::where('id',$sid)->first();
        $data->social_name = $request->social_name;
        $data->link = $request->link;
        $data->status = $request->status;
        $data->social_photo = $request->social_photo;
        if ($request->hasFile('social_photo')){
            unlink(public_path('uploads/'.$data->social_photo));
            $photo = $request->file('social_photo');
            $photoName = date('mdYHis').uniqid()."-".$photo->getClientOriginalName();
            $photo->move(public_path('uploads/'),$photoName);
            $data->social_photo = $photoName;
        }
        $data->save();
        return redirect()->back()->with('success_status','Website info deleted');
    }
    public function deleteSocial($sid){
        Social::where('id',$sid)->delete();
        return redirect()->back()->with('success_status','Website info deleted');
    }
     //--------------------------------------TERMS-------------------------------------//
    //--------------------------------------------------------------------------------//
    public function updateTerms(Request $request){
        if ($data = Terms::where('id',1)->first()){
            $data->title = $request->title;
            $data->text = $request->text;
            $data->save();
        }
        else{
            $data = new Terms();
            $data->title = $request->title;
            $data->text = $request->text;
            $data->save();
        }
        return redirect()->back()->with('success_status','Website info deleted');
    }
     //---------------------------SIGNUP LOGIN VIEWS-----------------------------------//
    //--------------------------------------------------------------------------------//
    public function updateSLV(Request $request){
        if ($data = SignupLoginView::where('id',1)->first()){
            $data->login_title = $request->login_title;
            $data->login_text = $request->login_text;
            $data->signup_title = $request->signup_title;
            $data->signup_text = $request->signup_text;
            $data->save();
        }
        else{
            $data = new SignupLoginView();
            $data->login_title = $request->login_title;
            $data->login_text = $request->login_text;
            $data->signup_title = $request->signup_title;
            $data->signup_text = $request->signup_text;
            $data->save();
        }
        return redirect()->back()->with('success_status','Website info deleted');
    }
     //--------------------------------------SUPPORT-----------------------------------//
    //--------------------------------------------------------------------------------//
    public function addSupport(Request $request){
        $data = new Support();
        $data->question = $request->question;
        $data->answer = $request->answer;
        $data->save();
        return redirect()->back()->with('success_status','Website info Added');
    }
    public function editSupport(Request $request,$support_id){
        $data = Support::where('id',$support_id)->first();
        $data->question = $request->question;
        $data->answer = $request->answer;
        $data->save();
        return redirect()->back()->with('success_status','Website info Added');
    }
    public function getSupport($support_id){
        $data = Support::where('id',$support_id)->first();
        return $data;
    }
    public function deleteSupport($support_id){
        Support::where('id',$support_id)->delete();
        return redirect()->back()->with('success_status','Website info deleted');
    }
     //-------------------------------FOOTER CONTENT-----------------------------------//
    //--------------------------------------------------------------------------------//
    public function updateFooter(Request $request){
        if ($data = Footer::where('id',1)->first()){
            if ($request->hasFile('footer_logo_content_primary')){
               $logoFile = $request->file('footer_logo_content_primary');
               $logoName = date('mdYHis').uniqid()."-".$logoFile->getClientOriginalName();
               $logoFile->move(public_path('uploads/'),$logoName);
               $data->footer_logo_content_primary = $logoName;
            }
            if ($request->hasFile('footer_logo_content_secondary')){
                $logoFileSec = $request->file('footer_logo_content_secondary');
                $logoNameSec = date('mdYHis').uniqid()."-".$logoFileSec->getClientOriginalName();
                $logoFileSec->move(public_path('uploads/'),$logoNameSec);
                $data->footer_logo_content_primary = $logoNameSec;
            }
            $data->copyright_text = $request->copyright_text;
            $data->follow_text = $request->follow_text;
            $data->save();
        }
        else{
            $data = new Footer();
            if ($request->hasFile('footer_logo_content_primary')){
                $logoFile = $request->file('footer_logo_content_primary');
                $logoName = date('mdYHis').uniqid()."-".$logoFile->getClientOriginalName();
                $logoFile->move(public_path('uploads/'),$logoName);
                $data->footer_logo_content_primary = $logoName;
            }
            if ($request->hasFile('footer_logo_content_secondary')){
                $logoFileSec = $request->file('footer_logo_content_secondary');
                $logoNameSec = date('mdYHis').uniqid()."-".$logoFileSec->getClientOriginalName();
                $logoFileSec->move(public_path('uploads/'),$logoNameSec);
                $data->footer_logo_content_primary = $logoNameSec;
            }
            $data->copyright_text = $request->copyright_text;
            $data->follow_text = $request->follow_text;
            $data->save();
        }
        return redirect()->back()->with('success_status','Website info updated');
    }
     //------------------------------FOOTER LINK ABOUT---------------------------------//
    //--------------------------------------------------------------------------------//
    public function addFLA(Request $request){
        $data = new FooterLinkAbout();
        $data->footer_link_name = $request->footer_link_name;
        $data->link = $request->link;
        $data->status = $request->status;
        $data->save();
        return redirect()->back()->with('success_status','Website info updated');
    }
    public function editFLA(Request $request,$fla_id){
        $data = FooterLinkAbout::where('id',$fla_id)->first();
        $data->footer_link_name = $request->footer_link_name;
        $data->link = $request->link;
        $data->status = $request->status;
        $data->save();
        return redirect()->back()->with('success_status','Website info updated');
    }
    public function getFLA($fla_id){
        $data = FooterLinkAbout::where('id',$fla_id)->first();
        return $data;
    }
    public function deleteFLA($fla_id){
        FooterLinkAbout::where('id',$fla_id)->delete();
        return redirect()->back()->with('success_status','Website info updated');
    }
     //------------------------------FOOTER LINK CATEGORY------------------------------//
    //--------------------------------------------------------------------------------//
    public function addFLC(Request $request){
        $data = new Footer_link_category();
        $data->footer_link_name = $request->footer_link_name;
        $data->link = $request->link;
        $data->status = $request->status;
        $data->save();
        return redirect()->back()->with('success_status','Website info updated');
    }
    public function editFLC(Request $request,$flc_id){
        $data = Footer_link_category::where('id',$flc_id)->first();
        $data->footer_link_name = $request->footer_link_name;
        $data->link = $request->link;
        $data->status = $request->status;
        $data->save();
        return redirect()->back()->with('success_status','Website info updated');
    }
    public function getFLC($flc_id){
        $data = Footer_link_category::where('id',$flc_id)->first();
        return $data;
    }
    public function deleteFLC($flc_id){
        Footer_link_category::where('id',$flc_id)->delete();
        return redirect()->back()->with('success_status','Website info updated');
    }
     //------------------------------FOOTER LINK EXPLORE-------------------------------//
    //--------------------------------------------------------------------------------//
    public function addFLE(Request $request){
        $data = new FooterLinkExplore();
        $data->footer_link_name = $request->footer_link_name;
        $data->link = $request->link;
        $data->status = $request->status;
        $data->save();
        return redirect()->back()->with('success_status','Website info updated');
    }
    public function editFLE(Request $request,$fle_id){
        $data = FooterLinkExplore::where('id',$fle_id)->first();
        $data->footer_link_name = $request->footer_link_name;
        $data->link = $request->link;
        $data->status = $request->status;
        $data->save();
        return redirect()->back()->with('success_status','Website info updated');
    }
    public function getFLE($fle_id){
        $data = FooterLinkExplore::where('id',$fle_id)->first();
        return $data;
    }
    public function deleteFLE($fle_id){
        FooterLinkExplore::where('id',$fle_id)->delete();
        return redirect()->back()->with('success_status','Website info updated');
    }
     //------------------------------------PRIVACY-------------------------------------//
    //--------------------------------------------------------------------------------//
    public function updatePrivacy(Request $request){
        if ($data = Privacy::where('id',1)->first()){
            $data->title = $request->title;
            $data->text = $request->text;
            $data->save();
        }
        else{
            $data = new Privacy();
            $data->title = $request->title;
            $data->text = $request->text;
            $data->save();
        }
        return redirect()->back()->with('success_status','Website info updated');
    }
     //-----------------------------------NAV MENU-------------------------------------//
    //--------------------------------------------------------------------------------//
    
}
