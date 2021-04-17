<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use App\Models\Transection;
use DB;

class AdDonate extends Controller
{
    public function adPaymentGateways(){
        return view('admin.pages.Donate.adPaymentGateways');
    }
    public function adDonateHistory(){
     
        return view('admin.pages.Donate.adDonateHistory');
    }
    public function donateAllData(){
        // $data = Transection::all();
        $data = DB::table('transections')
            ->where('transection_type','0')
            ->join('users', 'transections.member_id', '=', 'users.id')
            ->join('payment_gateways', 'transections.method_id', '=', 'payment_gateways.id')
            ->select('transections.*', 'users.name', 'payment_gateways.gateway_name')
            ->get();
        // return $data;
        return response()->json($data); 
    }
}
