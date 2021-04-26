<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator,Redirect,Response,File;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\General;
class AdLogoNavController extends Controller
{
    //--------------------------------------------------------------------------------//
    public function AllData(){

    }
    public function EditableData($id){

    }
    public function AddSubmit(Request $request){
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
            General::create($data);
            return response()->json($data);
        }
        
    }
    public function EditSubmit(Request $request, $id){
        $validator = Validator::make($request->all(), [
        
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
            return response()->json($data);
        }
    }
    public function Delete( Request $request ,$id){
    }
}