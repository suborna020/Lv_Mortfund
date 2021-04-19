<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PerfectMoney;

class PerfectmoneyController extends Controller
{
    public function index(){
    	
    	$value = \Config::get('perfectmoney');

    	$PAYEE_ACCOUNT=$value['marchant_id'];
    	$PAYEE_NAME=$value['marchant_name'];
   
    	$PAYMENT_UNITS=$value['units'];
    	$PAYMENT_URL=$value['payment_url'];
    	$NOPAYMENT_URL=$value['nopayment_url'];
    	$PAYMENT_ID="1212";
    	$STATUS_URL=$value['status_url'];
    	$PAYMENT_URL_METHOD=$value['payment_url_method'];
    	$NOPAYMENT_URL_METHOD=$value['nopayment_url'];
    	$SUGGESTED_MEMO=$value['suggested_memo'];

    	return view('ui.pages.users.user.payment_check',compact('PAYEE_ACCOUNT','PAYEE_NAME','PAYMENT_UNITS','PAYMENT_URL','NOPAYMENT_URL','PAYMENT_ID','STATUS_URL','PAYMENT_URL_METHOD','NOPAYMENT_URL_METHOD','SUGGESTED_MEMO'));
    }

    public function success(){

    	return view('vendor.laravelperfectmoney.success');

    }

    public function fail(){

    	return view('vendor.laravelperfectmoney.fail');
    	
    }

    public function check(){

    	// Required Fields
				$amount = 19.00;
				$sendTo = 'U27873181';

				// Optional Fields
				$description = 'Optional Description for send money';
				$payment_id = 'Optional_payment_id';

				$pm = new PerfectMoney;

				// Send Funds with all fields
				$sendMoney = $pm->getBalance($amount, $sendTo, $description, $payment_id);
				if($sendMoney['status'] == 'success')
				{
					// Some code here
					return 'success';
				}

				// Send Funds with required fields
				$sendMoney = $pm->getBalance($amount, $sendTo);
				if($sendMoney['status'] == 'error')
				{
					// Payment Failed
					return $sendMoney['message'];
				}



	}

     
}
