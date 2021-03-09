<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator,Redirect,Response,File;
use App\Models\Fundraiser;
use App\Models\Category;
use DB;


class AdFundraisers extends Controller
{
    public function adCategories(){
        return view('admin.pages.FundRaisers.adCategories');
    }
    public function adRecent(){
        return view('admin.pages.FundRaisers.adRecent');
    }
    public function adUrgent(){
        return view('admin.pages.FundRaisers.adUrgent');
    }
    public function adPending(){
        return view('admin.pages.FundRaisers.adPending');
    }
    
    public function adOnProgress(){
        return view('admin.pages.FundRaisers.adOnProgress');
    }
    //Fundraisers -> Categories // adCategories page 
    public function fundRaiseCategoriesData(){
        $fundRaiseCategories = Category::all();
        return response()->json($fundRaiseCategories); 
    }
    public function categoriesAddData(Request $request){
        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
            'icon' => 'required',
            'status' => 'required',
        ]);
        if ($validator->passes()) {
            $category_name = $request->category_name;
            $status = $request->status;
            // process of getting file name
            $file = $request->file('icon'); //name="name"
            $input['name'] =$file->getClientOriginalName();
            //move file to a folder
            $path=$file->move(public_path('adminAssets/img/categoryImages'), $input['name']);
            $data = ['category_name'=>$category_name,'icon'=>$input['name'],'status'=>$status];  
            // return $data;
            Category::create($data);
            return response()->json($data);
        }
    }
    
    public function categoriesEditData($id){
        // $id=get url variable value by $ 
        //just getting the row data of this id .
        $data=Category::findOrFail($id);
         //pass it to ajax response 
        return response()->json($data); 
    }
    public function categoriesEditedSubmit(Request $request,$id){
        // $id=get url variable value by $ 
        // just getting the row data of this id .
        // optional validation 
        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
            // 'icon' => 'required',
            'status' => 'required',
        ]);
        if ($validator->passes()) {
            //$dummyData=['category_name'=>'a','icon'=>'b','background_image'=>'c','slug'=>'a','status'=>'d'];
            
            if($request->file('icon')){
                $category_name = $request->category_name;
                $status = $request->status;
                // process of getting file name
                $file = $request->file('icon'); //name="name"
                $input['name'] =$file->getClientOriginalName();
                //move file to a folder
                $path=$file->move(public_path('adminAssets/img/categoryImages'), $input['name']);
                $data = ['category_name'=>$category_name,'icon'=>$input['name'],'status'=>$status];
                Category::findOrFail($id)->update($data);
            }else{
                $category_name = $request->category_name;
                $status = $request->status;
                $data = ['category_name'=>$category_name,'status'=>$status];
                Category::findOrFail($id)->update($data);
            }
            return response()->json($data);
        }
          
    }
    public function categoriesDestroyData( Request $request ,$id){
        // $id=get url variable value by $ 
        // just getting the row data of this id .
      $data=Category::findOrFail($id)->delete(); 
      return response()->json($data);
    }
    public function categoriesStatusUpdate($id){
      $categoryRowData=Category::where('id',$id)->get()->first(); 
        //   print_r($data);
        if($categoryRowData->status==1)
             $status=0;
        else $status=1;
        $data=Category::where('id',$id)->get()->first(); 
        $data->status=$status;
        $data->update();
      return response()->json($data); 
    }
    //Fundraisers -> Recent // adRecent page 
    public function fundRaiseRecentData(){
        $fundRaiseRecentData = Fundraiser::all();
        return response()->json($fundRaiseRecentData); 
    }
    public function fundRecentAddData(Request $request){
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'location' => 'required',
            'title' => 'required',
            'benificiary_name' => 'required',
            'needed_amount' => 'required',
            'deadline' => 'required',
            'story' => 'required',
            // 'icon' => 'required',
            // 'status' => 'required',
            'thumbnail' => 'required',
            'photo' => 'required',
            // 'video' => 'required',
            'proof_document' => 'required',
        ]);
        if ($validator->passes()) {
            $category_id = $request->category_id;
            $location = $request->location;
            $title = $request->title;
            $benificiary_name = $request->benificiary_name;
            $needed_amount = $request->needed_amount;
            $deadline = $request->deadline;
            $story = $request->story;
            // process of getting file name
            $thumbnailFile = $request->file('thumbnail'); //name="thumbnail"
            $thumbnailFileName =$thumbnailFile->getClientOriginalName();
            //move file to a folder
            $path=$thumbnailFile->move(public_path('adminAssets/img/addFundraisersThumbnail'), $thumbnailFileName);

            $photoFile = $request->file('photo'); //name="photo"
            $photoFileName =$photoFile->getClientOriginalName();
            $path=$photoFile->move(public_path('adminAssets/img/addFundraisersPhoto'), $photoFileName);

            $videoFile = $request->file('video'); //name="video"
            $videoFileName =$videoFile->getClientOriginalName();
            $path=$videoFile->move(public_path('adminAssets/img/addFundraisersVideo'), $videoFileName);

            $proofDocumentFile = $request->file('proof_document'); //name="proof_document"
            $proofDocumentFileName =$proofDocumentFile->getClientOriginalName();
            $path=$proofDocumentFile->move(public_path('adminAssets/img/addFundraisersProofDocument'), $proofDocumentFileName);

            $status= "1";

            $data = [
                'category_id'=>$category_id
                ,'location'=>$location
                ,'title'=>$title
                ,'benificiary_name'=>$benificiary_name
                ,'needed_amount'=>$needed_amount
                ,'deadline'=>$deadline
                ,'story'=>$story
                ,'thumbnail'=>$thumbnailFileName
                ,'photo'=>$photoFileName
                ,'video'=>$videoFileName
                ,'proof_document'=>$proofDocumentFileName
                ,'status'=>$status
            ];  
            // return $data;
            Fundraiser::create($data);
            return response()->json($data);
        }
    }
     public function fundRaiseEditData($id){
        // $id=get url variable value by $ 
        //just getting the row data of this id .
        $data=Fundraiser::findOrFail($id);
         //pass it to ajax response 
        return response()->json($data); 
    }
  


}
