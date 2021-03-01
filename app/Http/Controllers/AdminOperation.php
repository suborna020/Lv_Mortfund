<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use App\Models\Fundraiser;
use App\Models\Category;
use App\Models\SuccessStory;
use App\Models\WithdrawRequest;




use DB;
class AdminOperation extends Controller
{
    public function aDashboardM(){
        // echo $session_data = Session::get('user_session');
        $admin_sessionData=Session::get('admin_session');
        if (!Session::get('admin_session')) {
           return redirect(url('adminLogin'));
        }
        $completedFundraiser=Fundraiser::where('needed_amount', '<=', DB::raw('raised'))->get();
         return view('admin.pages.aDashboard', ['admin_sessionData'=>$admin_sessionData],['completedFundraiser'=>$completedFundraiser]);
    }
    public function aLogoutM(Request $request)
    {
        $request->session()->forget('admin_session');
        return redirect('/adminLogin');
    }
    // all common data in one place 
    public function GlobalDataBox($view){
        $FundraisersBox = Fundraiser::all();
        $CategoriesBox = Category::all();
        $successStoriesBox = SuccessStory::all();
        $WithdrawRequestsBox=WithdrawRequest::all();

        $view->with('FundraisersBox',$FundraisersBox)
        ->with('CategoriesBox',$CategoriesBox)
        ->with('successStoriesBox',$successStoriesBox)
        ->with('WithdrawRequestsBox',$WithdrawRequestsBox)
        ;
    }
}
