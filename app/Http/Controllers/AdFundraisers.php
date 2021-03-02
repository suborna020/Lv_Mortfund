<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
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
    public function fundRaiseCategoriesData(){
        $fundRaiseCategories = Category::all();
        return response()->json($fundRaiseCategories); 
    }
   
}
