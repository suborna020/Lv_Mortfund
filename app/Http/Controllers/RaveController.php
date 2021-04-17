<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Transection;


//use the Rave Facade
use Rave;

class RaveController extends Controller
{ 
  public function flutterwave(){
    return view('ui.pages.users.user.reve');
  }

  public function initialize() {
    //This initializes payment and redirects to the payment gateway
    //The initialize method takes the parameter of the redirect URL
    Rave::initialize(route('reve.callback'));  
  }
  
  public function callback() {
    // This verifies the transaction and takes the parameter of the transaction reference
    $data = Rave::verifyTransaction(request()->txref);


    $chargeResponsecode = $data->data->chargecode;
    $chargeAmount = $data->data->amount;
    $chargeCurrency = $data->data->currency;

    
    $amount = 4500;
    $currency = "NGN";

    if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
    // transaction was successful...
    // please check other things like whether you already gave value for this ref
    // if the email matches the customer who owns the product etc
    //Give Value and return to Success page
        
    
        return view('success');
    
    } else {
        //Dont Give Value and return to Failure page
    
        return view('failed');
    }

    // dd($data->data);
  }

  public function flutterSuccess(){
    Transection::create([
            'method_id' => 6,
            'member_id' => session('user_session'),
            'transection_type' => 0,
            'name' => session('name'),
            'email' => session('email'),
            'phone' => session('phone'),
            'address' => session('address'),
            'amount' => session('amount'),
            'charge' => session('charge'),
            'campaign_author' => session('fundraiser_id'),
            'campaign_id' => session('campaing_id'),
        ]);

        User::where('id', session('user_session'))->update([
            'current_balance' => session('current_balance') + session('amount'),
        ]);
  
         $id = session('campaing_id');
         // echo "success";

         return \Redirect::route('singleCampaign',[$id])->with('message', 'Payment done Successfully!!!');
  }
}