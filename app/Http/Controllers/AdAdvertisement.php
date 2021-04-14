<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Validator,Redirect,Response,File;
use App\Models\Advertisement;
use DB;

class AdAdvertisement extends Controller
{
    public function adAdvertisement(){
        return view('admin.pages.Advertisement.adAdvertisement');
    }
    public function adAdvertisementData(){
        $data = Advertisement::all();
        return response()->json($data); 
    }
    public function getEditableAdvertiseData($id){
        $data=Advertisement::findOrFail($id);
        return response()->json($data); 
    }
    public function AdvertiseSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'company_name' => 'required',
            'image_size' => 'required',
            'link' => 'required',
        ]);
        if ($validator->passes()) {
            $company_name = $request->company_name;
            $image_size = $request->image_size;
            $link = $request->link;
            $data = [
                'company_name'=>$company_name,
                'image_size'=>$image_size,
                'link'=>$link
            ]; 
            if(($request->file('image'))!=null){
                $imageFile = $request->file('image'); //name="video"
                $imageFileName =date('mdYHis').uniqid().$imageFile->getClientOriginalName();
                $path=$imageFile->move(public_path('uploads'), $imageFileName);
                $data['image']=$imageFileName;
            }
            Advertisement::create($data);
            return response()->json($data);
        }
    }
    public function AdvertiseEditSubmit(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'image_size' => 'required',
            'link' => 'required',
        ]);
        if ($validator->passes()) {
            $company_name = $request->company_name;
            $image_size = $request->image_size;
            $link = $request->link;
            $data = [
                'company_name'=>$company_name,
                'image_size'=>$image_size,
                'link'=>$link
            ]; 
            if(($request->file('image'))!=null){
                $imageFile = $request->file('image'); //name="video"
                $imageFileName =date('mdYHis').uniqid().$imageFile->getClientOriginalName();
                $path=$imageFile->move(public_path('uploads'), $imageFileName);
                $data['image']=$imageFileName;
            }
            Advertisement::findOrFail($id)->update($data);
            return response()->json($data);
        }
    }

    public function advertiseDelete( Request $request ,$id){
        $data=Advertisement::findOrFail($id)->delete(); 
        return response()->json($data);
    }


}
