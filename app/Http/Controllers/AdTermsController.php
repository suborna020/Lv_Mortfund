<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator,Redirect,Response,File;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Terms;

class AdTermsController extends Controller
{
    //--------------------------------------------------------------------------------//
    public function AllData(){

    }
    public function EditableData($id){

    }
    public function AddSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'text' => 'required',
        ]);
        if ($validator->passes()) {
            $title = $request->title;
            $text = $request->text;
            $data = [
                'title'=>$title,
                'text'=>$text,
            ];
            Terms::create($data);
            return response()->json($data);
        }
        
    }
    public function EditSubmit(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'text' => 'required',
        ]);
        if ($validator->passes()) {
            $title = $request->title;
            $text = $request->text;
            $data = [
                'title'=>$title,
                'text'=>$text,
            ];
            Terms::findOrFail($id)->update($data);
            return response()->json($data);
        }
   
    }
    public function Delete( Request $request ,$id){
    }
}