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
    public function adAllFundRaise(){
        return view('admin.pages.FundRaisers.adAllFundRaise');
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
    public function adPrivate(){
        return view('admin.pages.FundRaisers.adPrivate');
    }
    //Fundraisers -> Categories // adCategories page --------------------------------------------------------------------
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
            $iconFileName=date('mdYHis').uniqid()."-".$file->getClientOriginalName();
            $path=$file->move(public_path('uploads'), $iconFileName);


            $data = [
                'category_name'=>$category_name
                ,'icon'=>$iconFileName
                ,'status'=>$status
            ];  
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
           
        ]);
        if ($validator->passes()) {
            //$dummyData=['category_name'=>'a','icon'=>'b','background_image'=>'c','slug'=>'a','status'=>'d'];
            $category_name = $request->category_name;
            $status = $request->status;
            $data = [
                'category_name'=>$category_name
                ,'status'=>$status
            ];  
            if(($request->file('icon'))!=null){
                $file = $request->file('icon'); //name="name"
                $iconFileName=date('mdYHis').uniqid()."-".$file->getClientOriginalName();
                $path=$file->move(public_path('uploads'), $iconFileName);
                $data['icon']=$iconFileName;
            } 
            Category::findOrFail($id)->update($data);
           
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
        else if($categoryRowData->status==1)
             $status=0;
        else $status=1;
        $data=Category::where('id',$id)->get()->first(); 
        $data->status=$status;
        $data->update();
      return response()->json($data); 
    }
     //Fundraisers -> Recent // adAllFundRaise page --------------------------------------------------------------------------------------
   
    public function AllFundRaiseData(){
        $AllFundRaiseData = Fundraiser::all()->where('status','1');
        return response()->json($AllFundRaiseData); 
    }
    public function AllFundRaiseEditData($id){
        $data=Fundraiser::findOrFail($id);
        return response()->json($data); 
    }
    //Fundraisers -> Recent // adRecent page -----------------------------------------------------------------------------------------------
    public function fundRaiseRecentData(){
        $AllFundRaiseData = Fundraiser::select("*")
        ->orderBy('id','DESC')
        ->where('status','1')
        ->take(50)
        ->get();

        return response()->json($AllFundRaiseData); 
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
            'thumbnail' => 'required',
            'photo' => 'required',
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
            $status= "1";
            // process of getting file name
            $thumbnailFile = $request->file('thumbnail'); //name="thumbnail"
            $thumbnailFileName =date('mdYHis').uniqid()."-".$thumbnailFile->getClientOriginalName();
            //move file to a folder
            $path=$thumbnailFile->move(public_path('uploads'), $thumbnailFileName);

            // end  
            $photoFile = $request->file('photo'); //name="photo"
            $photoFileName =date('mdYHis').uniqid()."-".$photoFile->getClientOriginalName();
            $path=$photoFile->move(public_path('uploads'), $photoFileName);

            $proofDocumentFile = $request->file('proof_document'); //name="proof_document"
            $proofDocumentFileName =date('mdYHis').uniqid()."-".$proofDocumentFile->getClientOriginalName();
            $path=$proofDocumentFile->move(public_path('uploads'), $proofDocumentFileName);

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
                ,'proof_document'=>$proofDocumentFileName
                ,'status'=>$status
            ];  
            if(($request->file('video'))!=null){
                $videoFile = $request->file('video'); //name="video"
                $videoFileName = date('mdYHis').uniqid()."-".$videoFile->getClientOriginalName();
                $path=$videoFile->move(public_path('uploads'), $videoFileName);
                $data['video']=$videoFileName;
            }
                //dd($data);
                // return $data;
            Fundraiser::create($data);
            return response()->json($data);
        }
    }
    public function fundRaiseEditData($id){
    $data=Fundraiser::findOrFail($id);
    return response()->json($data); 
    }
    
    public function fundRaiseEditedSubmit(Request $request,$id){
        $validator = Validator::make($request->all(), [
        ]);
        if ($validator->passes()) {
            $category_id = $request->category_id;
            $location = $request->location;
            $title = $request->title;
            $benificiary_name = $request->benificiary_name;
            $needed_amount = $request->needed_amount;
            $deadline = $request->deadline;
            $story = $request->story;

          
            
             $data = [
                 'category_id'=>$category_id
                 ,'location'=>$location
                 ,'title'=>$title
                 ,'benificiary_name'=>$benificiary_name
                 ,'needed_amount'=>$needed_amount
                 ,'deadline'=>$deadline
                 ,'story'=>$story
                ];
                if(($request->file('thumbnail'))!=null){
                    $thumbnailFile = $request->file('thumbnail'); //name="thumbnail"
                    $thumbnailFileName =date('mdYHis').uniqid().$thumbnailFile->getClientOriginalName();
                    $path=$thumbnailFile->move(public_path('uploads'), $thumbnailFileName);
                    $data['thumbnail']=$thumbnailFileName;
                } 
                if(($request->file('photo'))!=null){
                    $photoFile = $request->file('photo'); //name="photo"
                    $photoFileName =date('mdYHis').uniqid().$photoFile->getClientOriginalName();
                    $path=$photoFile->move(public_path('uploads'), $photoFileName);
                    $data['photo']=$photoFileName;
                } 
                
                if(($request->file('video'))!=null){
                    $videoFile = $request->file('video'); //name="video"
                    $videoFileName =date('mdYHis').uniqid().$videoFile->getClientOriginalName();
                    $path=$videoFile->move(public_path('uploads'), $videoFileName);
                    $data['video']=$videoFileName;
                }
                if(($request->file('proof_document'))!=null){
                    $proofDocumentFile = $request->file('proof_document'); //name="proof_document"
                    $proofDocumentFileName =date('mdYHis').uniqid().$proofDocumentFile->getClientOriginalName();
                    $path=$proofDocumentFile->move(public_path('uploads'), $proofDocumentFileName);
                    $data['proof_document']=$proofDocumentFileName;
                }
            Fundraiser::findOrFail($id)->update($data);
            return response()->json($data);
        }
          
    }
    public function fundRaiseStatusUpdate($id){
        $fundRaiseRowData=Fundraiser::where('id',$id)->get()->first(); 
          //   print_r($data);
          if($fundRaiseRowData->status==1)
               $status=0;
          else $status=1;
          $data=Fundraiser::where('id',$id)->get()->first(); 
          $data->status=$status;
          $data->update();
        return response()->json($data); 
    }
    public function fundRaiseDestroyData( Request $request ,$id){
        $data=Fundraiser::findOrFail($id)->delete(); 
        return response()->json($data);
    }
    public function fundRaiseRecentListUpdate($id){
        $fundRaiseRowData=Fundraiser::where('id',$id)->get()->first(); 
          //   print_r($data);
          if($fundRaiseRowData->urgent==1)
               $urgent=0;
          else $urgent=1;
          $data=Fundraiser::where('id',$id)->get()->first(); 
          $data->urgent=$urgent;
          $data->update();
        return response()->json($data); 
    }
    // adUrgent page ---------------------------------------------------------
    public function fundRaiseUrgentData(){
        $AllFundRaiseData = Fundraiser::select("*")
        ->orderBy('id','DESC')
        ->where('status','1')
        ->where('urgent',1)
        ->get();

        return response()->json($AllFundRaiseData); 
    }
    public function fundUrgentAddData(Request $request){
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'location' => 'required',
            'title' => 'required',
            'benificiary_name' => 'required',
            'needed_amount' => 'required',
            'deadline' => 'required',
            'story' => 'required',
            'thumbnail' => 'required',
            'photo' => 'required',
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
            $status= "1";
            $urgent= "1";

            // process of getting file name
            $thumbnailFile = $request->file('thumbnail'); //name="thumbnail"
            $thumbnailFileName =date('mdYHis').uniqid().$thumbnailFile->getClientOriginalName();
            //move file to a folder
            $path=$thumbnailFile->move(public_path('uploads'), $thumbnailFileName);
            // end  
            $photoFile = $request->file('photo'); //name="photo"
            $photoFileName =date('mdYHis').uniqid().$photoFile->getClientOriginalName();
            $path=$photoFile->move(public_path('uploads'), $photoFileName);

            $proofDocumentFile = $request->file('proof_document'); //name="proof_document"
            $proofDocumentFileName =date('mdYHis').uniqid().$proofDocumentFile->getClientOriginalName();
            $path=$proofDocumentFile->move(public_path('uploads'), $proofDocumentFileName);

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
                ,'proof_document'=>$proofDocumentFileName
                ,'urgent'=>$urgent
                ,'status'=>$status
                

            ];  
            if(($request->file('video'))!=null){
                $videoFile = $request->file('video'); //name="video"
                $videoFileName =date('mdYHis').uniqid().$videoFile->getClientOriginalName();
                $path=$videoFile->move(public_path('uploads'), $videoFileName);
                $data['video']=$videoFileName;
            }
                //dd($data);
                // return $data;
            Fundraiser::create($data);
            return response()->json($data);
        }
    }
 //Fundraisers -> Pending // adPending page 
 public function fundRaisePendingData(){
    $AllFundRaiseData = Fundraiser::select("*")
    ->orderBy('id','DESC')
    ->where('status','0')
    ->get();

    return response()->json($AllFundRaiseData); 
}
//  -----------------------------------------------------------------------------------------------

 //Fundraisers -> Recent // adOnProgress page -----------------------------------------------------------------------------------------------
 public function fundOnProgressData(){
    $AllFundRaiseData = Fundraiser::select("*")
    ->orderBy('id','DESC')
    ->where('status','1')
    ->where('needed_amount', '>', \DB::raw('raised'))
    ->get();
    return response()->json($AllFundRaiseData); 
}
 //Fundraisers -> Private // adPrivate page -----------------------------------------------------------------------------------------------
 public function fundRaisePrivateData(){
    $AllFundRaiseData = Fundraiser::select("*")
    ->orderBy('id','DESC')
    ->where('status','1')
    ->where('private',1)
    ->get();
    return response()->json($AllFundRaiseData); 
}
public function fundRaisePrivateListUpdate($id){
    $fundRaiseRowData=Fundraiser::where('id',$id)->get()->first(); 
      //   print_r($data);
      if($fundRaiseRowData->private==1)
           $private=0;
      else $private=1;
      $data=Fundraiser::where('id',$id)->get()->first(); 
      $data->private=$private;
      $data->update();
    return response()->json($data); 
}
public function fundPrivateAddData(Request $request){
    $validator = Validator::make($request->all(), [
        'category_id' => 'required',
        'location' => 'required',
        'title' => 'required',
        'benificiary_name' => 'required',
        'needed_amount' => 'required',
        'deadline' => 'required',
        'story' => 'required',
        'thumbnail' => 'required',
        'photo' => 'required',
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
        $status= "1";
        $private= "1";

        // process of getting file name
        $thumbnailFile = $request->file('thumbnail'); //name="thumbnail"
        $thumbnailFileName =date('mdYHis').uniqid().$thumbnailFile->getClientOriginalName();
        //move file to a folder
        $path=$thumbnailFile->move(public_path('uploads'), $thumbnailFileName);
        // end  
        $photoFile = $request->file('photo'); //name="photo"
        $photoFileName =date('mdYHis').uniqid().$photoFile->getClientOriginalName();
        $path=$photoFile->move(public_path('uploads'), $photoFileName);

        $proofDocumentFile = $request->file('proof_document'); //name="proof_document"
        $proofDocumentFileName =date('mdYHis').uniqid().$proofDocumentFile->getClientOriginalName();
        $path=$proofDocumentFile->move(public_path('uploads'), $proofDocumentFileName);

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
            ,'proof_document'=>$proofDocumentFileName
            ,'status'=>$status
            ,'private'=>$private

        ];  
        if(($request->file('video'))!=null){
            $videoFile = $request->file('video'); //name="video"
            $videoFileName =date('mdYHis').uniqid().$videoFile->getClientOriginalName();
            $path=$videoFile->move(public_path('uploads'), $videoFileName);
            $data['video']=$videoFileName;
        }
            //dd($data);
            // return $data;
        Fundraiser::create($data);
        return response()->json($data);
    }
}


}
