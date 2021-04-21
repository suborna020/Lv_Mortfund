<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PaymentGateway;
use App\Models\Transection;

use DB;

class AdWithdrawSystem extends Controller
{
    public function adWithdrawMethods(){
        return view('admin.pages.WithdrawSystem.adWithdrawMethods');
    }
    public function adWithdrawRequests(){
        return view('admin.pages.WithdrawSystem.adWithdrawRequests');
    }
    public function adWithdrawLog(){
        return view('admin.pages.WithdrawSystem.adWithdrawLog');
    }
    public function WithdrawAllMethod(){
        $data = PaymentGateway::all();
        return response()->json($data); 
    }
    public function WithdrawStatusUpdate($id){
        $singleRowData=PaymentGateway::where('id',$id)->get()->first(); 
          if($singleRowData->status==1)
               $status=0;
          else if($singleRowData->status==1)
               $status=0;
          else $status=1;
          $data=PaymentGateway::where('id',$id)->get()->first(); 
          $data->status=$status;
          $data->update();
        return response()->json($data); 
    }
// withdraw request ------------------------------------------------
    public function adWithdrawRequestsData(){
        $data = DB::table('transections')
        ->where('transection_type','1')
        ->join('users', 'transections.member_id', '=', 'users.id')
        ->join('payment_gateways', 'transections.method_id', '=', 'payment_gateways.id')
        ->select('transections.*', 'users.name', 'payment_gateways.gateway_name', 'payment_gateways.charge'  ,'payment_gateways.processing_time' )
        ->orderBy('id','DESC')
        ->get();
    
        return response()->json($data); 
    }
    public function WithdrawRequestStatusUpdate($id){
        $singleRowData=Transection::where('id',$id)->get()->first(); 
          if($singleRowData->transection_type==1)
               $transection_type=2;
          else if($singleRowData->transection_type==1)
               $transection_type=2;
          else $transection_type=1;
          $data=Transection::where('id',$id)->get()->first(); 
          $data->transection_type=$transection_type;
          $data->update();
        return response()->json($data); 
    }

    public function WithdrawDelete( Request $request ,$id){
        $data=Transection::findOrFail($id)->delete(); 
        return response()->json($data);
    }
// withdraw log ------------------------------------------------------
public function WithdrawLogData(){
    $data = DB::table('transections')
    ->where('transection_type','2')
    ->join('users', 'transections.member_id', '=', 'users.id')
    ->join('payment_gateways', 'transections.method_id', '=', 'payment_gateways.id')
    ->select('transections.*', 'users.name', 'payment_gateways.gateway_name'  ,'payment_gateways.processing_time' )
    ->orderBy('id','DESC')
    ->get();

    return response()->json($data); 
}


}
