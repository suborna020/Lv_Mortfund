<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator,Redirect,Response,File;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\SignupLoginView;

class AdLoginSignupController extends Controller
{
    //--------------------------------------------------------------------------------//
    public function AllData(){

    }
    public function EditableData($id){

    }
    public function AddSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'login_title' => 'required',
            'login_text' => 'required',
            'signup_title' => 'required',
            'signup_text' => 'required',
        ]);
        if ($validator->passes()) {
            $login_title = $request->login_title;
            $login_text = $request->login_text;
            $signup_title = $request->signup_title;
            $signup_text = $request->signup_text;
            $data = [
                'login_title'=>$login_title,
                'login_text'=>$login_text,
                'signup_title'=>$signup_title,
                'signup_text'=>$signup_text,
            ];
            SignupLoginView::create($data);
            return response()->json($data);
            
        }
        
    }
    public function EditSubmit(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'login_title' => 'required',
            'login_text' => 'required',
            'signup_title' => 'required',
            'signup_text' => 'required',
        ]);
        if ($validator->passes()) {
            $login_title = $request->login_title;
            $login_text = $request->login_text;
            $signup_title = $request->signup_title;
            $signup_text = $request->signup_text;
            $data = [
                'login_title'=>$login_title,
                'login_text'=>$login_text,
                'signup_title'=>$signup_title,
                'signup_text'=>$signup_text,
            ];
            SignupLoginView::findOrFail($id)->update($data);
            return response()->json($data);
        }
    }
    public function Delete( Request $request ,$id){
    }
}