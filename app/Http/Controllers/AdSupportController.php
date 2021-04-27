<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator,Redirect,Response,File;
use DB;
use App\Models\Support;


class AdSupportController extends Controller
{
    //--------------------------------------------------------------------------------//
    public function AllData(){
        $data=Support::orderBy('id','DESC')->get();
        return response()->json($data); 
    }
    public function EditableData($id){
        $data=Support::findOrFail($id);
        return response()->json($data); 
    }
    public function AddSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
        ]);
        if ($validator->passes()) {
            $question = $request->question;
            $answer = $request->answer;
    
            $data = [
                'question'=>$question,
                'answer'=>$answer,
    
            ];
            Support::create($data);
            return response()->json($data);
        }
    }
    public function EditSubmit(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
        ]);
        if ($validator->passes()) {
            $question = $request->question;
            $answer = $request->answer;
    
            $data = [
                'question'=>$question,
                'answer'=>$answer,
    
            ];
            Support::findOrFail($id)->update($data);
            return response()->json($data);
        }
    }
    public function Delete( Request $request ,$id){
        $data=Support::findOrFail($id)->delete(); 
        return response()->json($data);
    }
}
