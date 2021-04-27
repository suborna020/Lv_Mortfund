<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator,Redirect,Response,File;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Footer;

class AdFooterController extends Controller
{
    //--------------------------------------------------------------------------------//
    public function AllData(){

    }
    public function EditableData($id){

    }
    public function AddSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'footer_logo_content_primary' => 'required',
            'footer_logo_content_secondary' => 'required',
            'copyright_text' => 'required',
            'follow_text' => 'required',
        ]);
        if ($validator->passes()) {
            $footer_logo_content_primary = $request->footer_logo_content_primary;
            $footer_logo_content_secondary = $request->footer_logo_content_secondary;
            $copyright_text = $request->copyright_text;
            $follow_text = $request->follow_text;
            $data = [
                'footer_logo_content_primary'=>$footer_logo_content_primary,
                'footer_logo_content_secondary'=>$footer_logo_content_secondary,
                'copyright_text'=>$copyright_text,
                'follow_text'=>$follow_text,
            ];
            Footer::create($data);
            return response()->json($data);
            
        }
        
    }
    public function EditSubmit(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'footer_logo_content_primary' => 'required',
            'footer_logo_content_secondary' => 'required',
            'copyright_text' => 'required',
            'follow_text' => 'required',
        ]);
        if ($validator->passes()) {
            $footer_logo_content_primary = $request->footer_logo_content_primary;
            $footer_logo_content_secondary = $request->footer_logo_content_secondary;
            $copyright_text = $request->copyright_text;
            $follow_text = $request->follow_text;
            $data = [
                'footer_logo_content_primary'=>$footer_logo_content_primary,
                'footer_logo_content_secondary'=>$footer_logo_content_secondary,
                'copyright_text'=>$copyright_text,
                'follow_text'=>$follow_text,
            ];
           Footer::findOrFail($id)->update($data);
            return response()->json($data);
        }
    }
    public function Delete( Request $request ,$id){
    }
}