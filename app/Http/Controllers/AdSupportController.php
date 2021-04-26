<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator,Redirect,Response,File;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\About;


class AdSupportController extends Controller
{
    //--------------------------------------------------------------------------------//
    public function AllData(){

    }
    public function EditableData($id){

    }
    public function AddSubmit(Request $request){
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
            About::create($data);
            return response()->json($data);
        }
        
    }
    public function EditSubmit(Request $request, $id){
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
            return response()->json($data);
        }
    }
    public function Delete( Request $request ,$id){
    }
}