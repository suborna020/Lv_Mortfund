<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Session;
use Validator,Redirect,Response,File;
use App\Models\SuccessStory;
use DB;

class AdSuccessStories extends Controller
{
    public function adCategory(){
        return view('admin.pages.SuccessStories.adCategory');
    }
    public function adStories(){
        return view('admin.pages.SuccessStories.adStories');
    }
     // adStories page ---------------------------------------------------------
    public function stories(){
        $data = SuccessStory::select("*")
        ->orderBy('id','DESC')
        ->get();

        return response()->json($data); 
    }
    public function getEditableStory($id){
        $data=SuccessStory::findOrFail($id);
        return response()->json($data); 
    }
    public function addSuccessStoriesData(Request $request){
        $validator = Validator::make($request->all(), [
           
        ]);
        if ($validator->passes()) {
            $title = $request->title;
            $author_name = $request->author_name;
            $story = $request->story;
            $status= "1"; 
            $data = [
                'title'=>$title
                ,'author_name'=>$author_name
                ,'story'=>$story
                ,'status'=>$status
            ]; 
            if(($request->file('author_photo'))!=null){
                // process of getting file name
                 $authorPhotoFile = $request->file('author_photo'); //name="thumbnail"
                 $authorPhotoName =$authorPhotoFile->getClientOriginalName();
                 //move file to a folder
                 $path=$authorPhotoFile->move(public_path('images/authorPhoto'), $authorPhotoName);
                 //getting file path
                 $author_photo = 'images/authorPhoto/'.$authorPhotoName;
                 $data['author_photo']=$author_photo;
            }
 
            if(($request->file('photo'))!=null){
                  $successPhotoFile = $request->file('photo'); //name="thumbnail"
                  $successPhotoFileName =$successPhotoFile->getClientOriginalName();
                  $path=$successPhotoFile->move(public_path('images/successStoriesPhoto'), $successPhotoFileName);
                  $photo = 'images/successStoriesPhoto/'.$successPhotoFileName;
                  $data['photo']=$photo;
            }
                //dd($data);
                // return $data;
                SuccessStory::create($data);
            return response()->json($data);
        }
    }
    public function editSuccessStoriesData(Request $request,$id){
        $validator = Validator::make($request->all(), [
        ]);
        if ($validator->passes()) {
            $title = $request->title;
            $author_name = $request->author_name;
            $story = $request->story;
            $status= "1"; 
            $data = [
                'title'=>$title
                ,'author_name'=>$author_name
                ,'story'=>$story
                ,'status'=>$status
            ]; 
            if(($request->file('author_photo'))!=null){
                // process of getting file name
                 $authorPhotoFile = $request->file('author_photo'); //name="thumbnail"
                 $authorPhotoName =$authorPhotoFile->getClientOriginalName();
                 //move file to a folder
                 $path=$authorPhotoFile->move(public_path('images/authorPhoto'), $authorPhotoName);
                 //getting file path
                 $author_photo = 'images/authorPhoto/'.$authorPhotoName;
                 $data['author_photo']=$author_photo;
            }
 
            if(($request->file('photo'))!=null){
                  $successPhotoFile = $request->file('photo'); //name="thumbnail"
                  $successPhotoFileName =$successPhotoFile->getClientOriginalName();
                  $path=$successPhotoFile->move(public_path('images/successStoriesPhoto'), $successPhotoFileName);
                  $photo = 'images/successStoriesPhoto/'.$successPhotoFileName;
                  $data['photo']=$photo;
            }
            SuccessStory::findOrFail($id)->update($data);
            return response()->json($data);
        }
          
    }
    public function successStoriesDestroyData( Request $request ,$id){
        $data=SuccessStory::findOrFail($id)->delete(); 
        return response()->json($data);
    }



}
