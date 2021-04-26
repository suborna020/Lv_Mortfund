<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator,Redirect,Response,File;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\ContactView;



class AdContactController extends Controller
{
    //--------------------------------------------------------------------------------//
    public function AllData(){

    }
    public function EditableData($id){

    }
    public function AddSubmit(Request $request){
        $request->validate([
            'contact_title'=>'required',
            'contact_text'=>'required',
            'contact_email'=>'required',
            'contact_number'=>'required',
            'contact_hours'=>'required',
            'contact_location'=>'required',
            
        ]);
        $data=ContactView::insert([
            'contact_title'=>$request->contact_title,
            'contact_text'=>$request->contact_text,
            'contact_email'=>$request->contact_email,
            'contact_number'=>$request->contact_number,
            'contact_hours'=>$request->contact_hours,
            'contact_location'=>$request->contact_location,
        ]); 
        return response()->json($data);
    }
    public function EditSubmit(Request $request, $id){
        $request->validate([
            'contact_title'=>'required',
            'contact_text'=>'required',
            'contact_email'=>'required',
            'contact_number'=>'required',
            'contact_hours'=>'required',
            'contact_location'=>'required',
            
        ]);
        $data = ContactView::findOrFail($id)->update([
            'contact_title'=>$request->contact_title,
            'contact_text'=>$request->contact_text,
            'contact_email'=>$request->contact_email,
            'contact_number'=>$request->contact_number,
            'contact_hours'=>$request->contact_hours,
            'contact_location'=>$request->contact_location,
            
        ]); 
        return response()->json($data);
    }
    public function Delete( Request $request ,$id){
    }
}