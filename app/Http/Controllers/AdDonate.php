<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdDonate extends Controller
{
    public function adPaymentGateways(){
        return view('admin.pages.Donate.adPaymentGateways');
    }
    public function adDonateHistory(){
        return view('admin.pages.Donate.adDonateHistory');
    }
}
