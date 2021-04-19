<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Validator,Redirect,Response,File;
use App\Models\Language;
use DB;


class AdLanguageManager extends Controller
{
    public function adLanguageManager(){
        return view('admin.pages.LanguageManager.adLanguageManager');
    }
    public function adLanguageManagerData(){
        $data = Language::all();
        return response()->json($data); 
    }
    public function adLanguageStatusUpdate($id){
        $singleRowData=Language::where('id',$id)->get()->first(); 
          if($singleRowData->status==1)
               $status=0;
          else if($singleRowData->status==1)
               $status=0;
          else $status=1;
          $data=Language::where('id',$id)->get()->first(); 
          $data->status=$status;
          $data->update();
        return response()->json($data); 
    }
      public function getEditableLngContent($id){
        $data=Language::findOrFail($id);
        return response()->json($data); 
    }
    public function languageAddSubmit(Request $request){
        
        $validator = Validator::make($request->all(), [
            'flag_photo' => 'required',
            'language_name' => 'required',
            'status' => 'required',
        ]);
        if ($validator->passes()) {
            $language_name = $request->language_name;
            $status = $request->status;
            $data = [
                'language_name'=>$language_name,
                'status'=>$status
            ]; 
            if(($request->file('flag_photo'))!=null){
                $flagPhotoFile = $request->file('flag_photo'); //name="video"
                $flagPhotoFileName =date('mdYHis').uniqid().$flagPhotoFile->getClientOriginalName();
                $path=$flagPhotoFile->move(public_path('uploads'), $flagPhotoFileName);
                $data['flag_photo']=$flagPhotoFileName;
            }
            Language::create($data);
            return response()->json($data);
        }
    }
    public function languageEditSubmit(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'language_name' => 'required',
            'status' => 'required',
        ]);
        if ($validator->passes()) {
            $language_name = $request->language_name;
            $status = $request->status;
            $data = [
                'language_name'=>$language_name,
                'status'=>$status
            ]; 
            if(($request->file('flag_photo'))!=null){
                $flagPhotoFile = $request->file('flag_photo'); //name="video"
                $flagPhotoFileName =date('mdYHis').uniqid().$flagPhotoFile->getClientOriginalName();
                $path=$flagPhotoFile->move(public_path('uploads'), $flagPhotoFileName);
                $data['flag_photo']=$flagPhotoFileName;
            }
            Language::findOrFail($id)->update($data);
            return response()->json($data);
        }
    }
    public function adLanguageDelete( Request $request ,$id){
        $data=Language::findOrFail($id)->delete(); 
        return response()->json($data);
    }
   


}
