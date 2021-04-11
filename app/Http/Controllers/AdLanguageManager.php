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
    public function adLanguageDelete( Request $request ,$id){
        $data=Language::findOrFail($id)->delete(); 
        return response()->json($data);
    }


}
