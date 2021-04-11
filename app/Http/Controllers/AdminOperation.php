<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use App\Models\Fundraiser;
use App\Models\Category;
use App\Models\SuccessStory;
use App\Models\WithdrawRequest;
use Carbon\Carbon;
use DB;
use App\Models\Transection;



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

    public function adminChart()
    {
        // return Carbon::now()->endOfWeek();
        $dbData =  Transection::where('transection_type', '=','donation')
                ->where('status', '=','1')
                ->whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::SUNDAY), Carbon::now()->endOfWeek(Carbon::SATURDAY)])
                  ->selectRaw('Date(created_at) sameDate,  sum(amount) sameDateSumData')
                ->groupBy('sameDate')
                ->orderBy('sameDate', 'desc')
                ->get();
                // echo($dbData) ; 
                $decodedArray = json_decode($dbData, TRUE);
                $sameDate = array_column($decodedArray, 'sameDate');
                $sameDateSumData = array_column($decodedArray, 'sameDateSumData');
                $totalData= [$sameDate, $sameDateSumData];
                return response()->json($totalData); 
    }

}
