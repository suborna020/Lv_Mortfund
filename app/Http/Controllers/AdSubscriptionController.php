<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator,Redirect,Response,File;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subscribe;


class AdSubscriptionController extends Controller
{
    //--------------------------------------------------------------------------------//
    public function AllData(){

    }
    public function EditableData($id){

    }
    public function AddSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'sub_title' => 'required',
            // 'input_placeholder' => 'required',
            // 'submit_button_text' => 'required',
        ]);
        if ($validator->passes()) {
            $title = $request->title;
            $sub_title = $request->sub_title;
            $data = [
                'title'=>$title,
                'sub_title'=>$sub_title,
            ];
            Subscribe::create($data);
            return response()->json($data);
        }
        
    }
    public function EditSubmit(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'sub_title' => 'required',
            // 'input_placeholder' => 'required',
            // 'submit_button_text' => 'required',
        ]);
        if ($validator->passes()) {
            $title = $request->title;
            $sub_title = $request->sub_title;
            $data = [
                'title'=>$title,
                'sub_title'=>$sub_title,
               
            ];
            Subscribe::findOrFail($id)->update($data);
            return response()->json($data);
        }
    }
    public function Delete( Request $request ,$id){
    }
}