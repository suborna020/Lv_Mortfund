<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator,Redirect,Response,File;
use DB;
use App\Models\Testimonial;

class AdTestimonialsController extends Controller
{
    //--------------------------------------------------------------------------------//
    public function AllData(){
        $data=Testimonial::orderBy('id','DESC')->get();
        return response()->json($data); 
    }
    public function EditableData($id){
        $data=Testimonial::findOrFail($id);
        return response()->json($data); 
    }
    public function AddSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'author_name' => 'required',
            'designation' => 'required',
            'company_name' => 'required',
            'authors_text' => 'required',
        ]);
        if ($validator->passes()) {
            $author_name = $request->author_name;
            $designation = $request->designation;
            $company_name = $request->company_name;
            $authors_text = $request->authors_text;
            $status = '1';
    
            $data = [
                'author_name'=>$author_name,
                'designation'=>$designation,
                'company_name'=>$company_name,
                'authors_text'=>$authors_text,
                'status'=>$status,
    
            ];
            if(($request->file('photo'))!=null){
                $File = $request->file('photo'); //name="video"
                $FileName =date('mdYHis').uniqid().$File->getClientOriginalName();
                $path=$File->move(public_path('images'), $FileName);
                $data['photo']='images/'.$FileName;
            }
            Testimonial::create($data);
            return response()->json($data);
        }
    }
    public function EditSubmit(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'author_name' => 'required',
            'designation' => 'required',
            'company_name' => 'required',
            'authors_text' => 'required',
        ]);
        if ($validator->passes()) {
            $author_name = $request->author_name;
            $designation = $request->designation;
            $company_name = $request->company_name;
            $authors_text = $request->authors_text;
    
            $data = [
                'author_name'=>$author_name,
                'designation'=>$designation,
                'company_name'=>$company_name,
                'authors_text'=>$authors_text,
    
            ];
            if(($request->file('photo'))!=null){
                $File = $request->file('photo'); //name="video"
                $FileName =date('mdYHis').uniqid().$File->getClientOriginalName();
                $path=$File->move(public_path('images'), $FileName);
                $data['photo']='images/'.$FileName;
            }
            Testimonial::findOrFail($id)->update($data);
            return response()->json($data);
        }
    }
    public function Delete( Request $request ,$id){
        $data=Testimonial::findOrFail($id)->delete(); 
        return response()->json($data);
    }
}
