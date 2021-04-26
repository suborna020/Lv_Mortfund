<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator,Redirect,Response,File;
use DB;
use App\Models\Social;

class AdSocialSettingsController extends Controller
{
    //--------------------------------------------------------------------------------//
    public function AllData(){
        $data=Social::orderBy('id','DESC')->get();
        return response()->json($data); 
    }
    public function EditableData($id){
        $data=Social::findOrFail($id);
        return response()->json($data); 
    }
    public function AddSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'social_name' => 'required',
            'link' => 'required',
            'social_photo' => 'required',
        ]);
        if ($validator->passes()) {
            $social_name = $request->social_name;
            $link = $request->link;
            $social_photo = $request->social_photo;
            $status = '1';
    
            $data = [
                'social_name'=>$social_name,
                'link'=>$link,
                'social_photo'=>$social_photo,
                'status'=>$status,
    
            ];
            Social::create($data);
            return response()->json($data);
        }
    }
    public function EditSubmit(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'social_name' => 'required',
            'link' => 'required',
            'social_photo' => 'required',
        ]);
        if ($validator->passes()) {
            $social_name = $request->social_name;
            $link = $request->link;
            $social_photo = $request->social_photo;
          
    
            $data = [
                'social_name'=>$social_name,
                'link'=>$link,
                'social_photo'=>$social_photo,
    
            ];
            Social::findOrFail($id)->update($data);
            return response()->json($data);
        }
    }
    public function Delete( Request $request ,$id){
        $data=Social::findOrFail($id)->delete(); 
        return response()->json($data);
    }
}
