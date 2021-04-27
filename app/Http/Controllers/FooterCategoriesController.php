<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator,Redirect,Response,File;
use DB;
use App\Models\Footer_link_category;


class FooterCategoriesController extends Controller
{
    //--------------------------------------------------------------------------------//
    public function AllData(){
        $data=Footer_link_category::orderBy('id','DESC')->get();
        return response()->json($data); 
    }
    public function EditableData($id){
        $data=Footer_link_category::findOrFail($id);
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
            Footer_link_category::create($data);
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
            Footer_link_category::findOrFail($id)->update($data);
            return response()->json($data);
        }
    }
    public function Delete( Request $request ,$id){
        $data=Footer_link_category::findOrFail($id)->delete(); 
        return response()->json($data);
    }
}
