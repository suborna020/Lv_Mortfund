<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
