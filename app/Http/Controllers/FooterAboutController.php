<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator,Redirect,Response,File;
use DB;
use App\Models\FooterLinkAbout;

class FooterAboutController extends Controller
{
    //--------------------------------------------------------------------------------//
    public function AllData(){
        $data=FooterLinkAbout::orderBy('id','DESC')->get();
        return response()->json($data); 
    }
    public function EditableData($id){
        $data=FooterLinkAbout::findOrFail($id);
        return response()->json($data); 
    }
    public function AddSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'footer_link_name' => 'required',
            'link' => 'required',
        ]);
        if ($validator->passes()) {
            $footer_link_name = $request->footer_link_name;
            $link = $request->link;
            $status = '1';
    
            $data = [
                'footer_link_name'=>$footer_link_name,
                'link'=>$link,
                'status'=>$status,
    
            ];
            FooterLinkAbout::create($data);
            return response()->json($data);
        }
    }
    public function EditSubmit(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'footer_link_name' => 'required',
            'link' => 'required',
        ]);
        if ($validator->passes()) {
            $footer_link_name = $request->footer_link_name;
            $link = $request->link;
            
    
            $data = [
                'footer_link_name'=>$footer_link_name,
                'link'=>$link,
    
            ];
            FooterLinkAbout::findOrFail($id)->update($data);
            return response()->json($data);
        }
    }
    public function Delete( Request $request ,$id){
        $data=FooterLinkAbout::findOrFail($id)->delete(); 
        return response()->json($data);
    }
}