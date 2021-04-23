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
use App\Models\Navmenu;
use App\Models\Terms;
use App\Models\About;
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
                // 'website_logo' => 'required',

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

  
     //-----------------------------------NAV MENU-------------------------------------//
    //--------------------------------------------------------------------------------//
    public function allData(){
        $data = Navmenu::all()->where('status','1');
        return response()->json($data); 
    }
    public function editableData($id){
        $data=Navmenu::findOrFail($id);
        return response()->json($data); 
    }
    public function addSubmit(Request $request){
        
        $validator = Validator::make($request->all(), [
            'menu_item' => 'required',
            'link' => 'required',
        ]);
        if ($validator->passes()) {
            $menu_item = $request->menu_item;
            $link = $request->link;
            $status = '1';

            $data = [
                'menu_item'=>$menu_item,
                'link'=>$link,
                'status'=>$status
            ];
            Navmenu::create($data);
            return response()->json($data);
        }
    }
    public function editSubmit(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'menu_item' => 'required',
            'link' => 'required',
        ]);
        if ($validator->passes()) {
            $menu_item = $request->menu_item;
            $link = $request->link;

            $data = [
                'menu_item'=>$menu_item,
                'link'=>$link,
            ];
            Navmenu::findOrFail($id)->update($data);
            return response()->json($data);
        }
    }
    public function delete( Request $request ,$id){
        $data=Navmenu::findOrFail($id)->delete(); 
        return response()->json($data);
    }
    // crud end 
    // slider ---------------------------------------
    // --------------------------------------------------
    public function SliderallData(){
        $data = Slider::all()->where('status','1');
        return response()->json($data); 
    }
    public function SlidereditableData($id){
        $data=Slider::findOrFail($id);
        return response()->json($data); 
    }
    public function SlideraddSubmit(Request $request){
        
        $validator = Validator::make($request->all(), [
            'slider_title' => 'required',
            'slide_sub_title' => 'required',
            'slider_photo' => 'required',
        ]);
        if ($validator->passes()) {
            $slider_title = $request->slider_title;
            $slide_sub_title = $request->slide_sub_title;
            $status = '1';

            $data = [
                'slider_title'=>$slider_title,
                'slide_sub_title'=>$slide_sub_title,
                'status'=>$status
            ];
            if(($request->file('slider_photo'))!=null){
                $File = $request->file('slider_photo'); //name="video"
                $FileName =date('mdYHis').uniqid().$File->getClientOriginalName();
                $path=$File->move(public_path('images'), $FileName);
                $data['slider_photo']='images/'.$FileName;
            }
            Slider::create($data);
            return response()->json($data);
        }
    }
    public function SlidereditSubmit(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'slider_title' => 'required',
            'slide_sub_title' => 'required',
        ]);
        if ($validator->passes()) {
            $slider_title = $request->slider_title;
            $slide_sub_title = $request->slide_sub_title;
            $data = [
                'slider_title'=>$slider_title,
                'slide_sub_title'=>$slide_sub_title,
               
            ];
            if(($request->file('slider_photo'))!=null){
                $File = $request->file('slider_photo'); //name="video"
                $FileName =date('mdYHis').uniqid().$File->getClientOriginalName();
                $path=$File->move(public_path('images'), $FileName);
                $data['slider_photo']='images/'.$FileName;
            }
            Slider::findOrFail($id)->update($data);
            return response()->json($data);
        }
    }
    public function Sliderdelete( Request $request ,$id){
        $data=Slider::findOrFail($id)->delete(); 
        return response()->json($data);
    }
    // how It works ----------------------------------------------------------
    public function HowItWorksallData(){
        $data = HowItWorks::all()->where('status','1');
        return response()->json($data); 
    }
    public function HowItWorkseditableData($id){
        $data=HowItWorks::findOrFail($id);
        return response()->json($data); 
    }
    public function HowItWorksaddSubmit(Request $request){
        
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'icon' => 'required',
            'short_description' => 'required',

        ]);
        if ($validator->passes()) {
            $title = $request->title;
            $icon = $request->icon;
            $short_description = $request->short_description;
            $status = '1';

            $data = [
                'title'=>$title,
                'icon'=>$icon,
                'short_description'=>$short_description,
                'status'=>$status,
            ];
            HowItWorks::create($data);
            return response()->json($data);
        }
    }
    public function HowItWorkseditSubmit(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'icon' => 'required',
            'short_description' => 'required',

        ]);
        if ($validator->passes()) {
            $title = $request->title;
            $icon = $request->icon;
            $short_description = $request->short_description;
            $data = [
                'title'=>$title,
                'icon'=>$icon,
                'short_description'=>$short_description,
            ];
            HowItWorks::findOrFail($id)->update($data);
            return response()->json($data);
        }
    }
    public function HowItWorksdelete( Request $request ,$id){
        $data=HowItWorks::findOrFail($id)->delete(); 
        return response()->json($data);
    }

    //about--------------------------------------------------------
    //about--------------------------------------------------------

    public function updateAbout(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'about_primary_title' => 'required',
            'about_primary_text' => 'required',
            'about_secondary_title' => 'required',
            'secondary_text' => 'required',
        ]);
        if ($validator->passes()) {
            $about_primary_title = $request->about_primary_title;
            $about_primary_text = $request->about_primary_text;
            $about_secondary_title = $request->about_secondary_title;
            $secondary_text = $request->secondary_text;
            $data = [
                'about_primary_title'=>$about_primary_title,
                'about_primary_text'=>$about_primary_text,
                'about_secondary_title'=>$about_secondary_title,
                'secondary_text'=>$secondary_text,
               
            ];
            if(($request->file('image_video'))!=null){
                $File = $request->file('image_video'); //name="video"
                $FileName =date('mdYHis').uniqid().$File->getClientOriginalName();
                $path=$File->move(public_path('images'), $FileName);
                $data['image_video']='images/'.$FileName;
            }
            About::findOrFail($id)->update($data);
            return redirect()->back()->with('success_status','Website info updated');
        }
        else{
            return redirect()->back();
        }
    }

    public function AboutSecondaryallData(){
        $data = SecondaryPoint::all();
        return response()->json($data); 
    }
    public function AboutSecondaryeditableData($id){
        $data=SecondaryPoint::findOrFail($id);
        return response()->json($data); 
    }
    public function AboutSecondaryaddSubmit(Request $request){
        
        $validator = Validator::make($request->all(), [
            'secondary_point' => 'required',
            'column' => 'required',
        ]);
        if ($validator->passes()) {
            $secondary_point = $request->secondary_point;
            $column = $request->column;

            $data = [
                'secondary_point'=>$secondary_point,
                'column'=>$column,
            ];
            SecondaryPoint::create($data);
            return response()->json($data);
        }
    }
    public function AboutSecondaryeditSubmit(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'secondary_point' => 'required',
            'column' => 'required',
        ]);
        if ($validator->passes()) {
            $secondary_point = $request->secondary_point;
            $column = $request->column;

            $data = [
                'secondary_point'=>$secondary_point,
                'column'=>$column,
            ];
            SecondaryPoint::findOrFail($id)->update($data);
            return response()->json($data);
        }
    }
    public function AboutSecondarydelete( Request $request ,$id){
        $data=SecondaryPoint::findOrFail($id)->delete(); 
        return response()->json($data);
    }

// Team-------------------------------
public function TeamallData(){
    $data = Team::all();
    return response()->json($data); 
}
public function TeameditableData($id){
    $data=Team::findOrFail($id);
    return response()->json($data); 
}
public function TeamaddSubmit(Request $request){
    
    $validator = Validator::make($request->all(), [
        'photo' => 'required',
        'member_name' => 'required',
        'member_designation' => 'required',
        'facebook_link' => 'required',
        'twitter_link' => 'required',
        'linkedin_link' => 'required',
        'instagram_link' => 'required',
    ]);
    if ($validator->passes()) {
        $member_name = $request->member_name;
        $member_designation = $request->member_designation;
        $facebook_link = $request->facebook_link;
        $twitter_link = $request->twitter_link;
        $linkedin_link = $request->linkedin_link;
        $instagram_link = $request->instagram_link;

        $data = [
            'member_name'=>$member_name,
            'member_designation'=>$member_designation,
            'facebook_link'=>$facebook_link,
            'twitter_link'=>$twitter_link,
            'linkedin_link'=>$linkedin_link,
            'instagram_link'=>$instagram_link,

        ];
        if(($request->file('photo'))!=null){
            $File = $request->file('photo'); //name="video"
            $FileName =date('mdYHis').uniqid().$File->getClientOriginalName();
            $path=$File->move(public_path('uploads'), $FileName);
            $data['photo']=$FileName;
        }
        Team::create($data);
        return response()->json($data);
    }
}
public function TeameditSubmit(Request $request,$id){
    $validator = Validator::make($request->all(), [
      
    ]);
    if ($validator->passes()) {
        $member_name = $request->member_name;
        $member_designation = $request->member_designation;
        $facebook_link = $request->facebook_link;
        $twitter_link = $request->twitter_link;
        $linkedin_link = $request->linkedin_link;
        $instagram_link = $request->instagram_link;

        $data = [
            'member_name'=>$member_name,
            'member_designation'=>$member_designation,
            'facebook_link'=>$facebook_link,
            'twitter_link'=>$twitter_link,
            'linkedin_link'=>$linkedin_link,
            'instagram_link'=>$instagram_link,

        ];
        if(($request->file('photo'))!=null){
            $File = $request->file('photo'); //name="video"
            $FileName =date('mdYHis').uniqid().$File->getClientOriginalName();
            $path=$File->move(public_path('uploads'), $FileName);
            $data['photo']=$FileName;
        }
        Team::findOrFail($id)->update($data);
        return response()->json($data);
    }
}
public function Teamdelete( Request $request ,$id){
    $data=Team::findOrFail($id)->delete(); 
    return response()->json($data);
}

    // end ---------------------------------------------
}
