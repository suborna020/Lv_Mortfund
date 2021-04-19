<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PaymentGateway;
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
}
