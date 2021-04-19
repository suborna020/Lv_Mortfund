<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PaytmWallet;

class PaytmController extends Controller
{
   /**
     * Paytm Payment Page
     *
     * @return Object
     */
    public function paytmPurchase()
    {
        return view('paytm.payment-page');
    } 


    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function paytmPayment(Request $request)
    {
        $payment = PaytmWallet::with('receive');
        $payment->prepare([
          'order' => rand(),
          'user' => rand(10,1000),
          'mobile_number' => '123456789',
          'email' => $request->email,
          'amount' => $request->amount,
          'callback_url' => route('paytm.callback'),
        ]);
        
        return $payment->receive();
    }


    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paytmCallback()
    {
        $transaction = PaytmWallet::with('receive');
        
        $response = $transaction->response(); // To get raw response as array
        //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm
        
        if($transaction->isSuccessful()){
          //Transaction Successful

             Transection::create([
            'method_id' => 9,
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
          // return view('paytm.paytm-success-page');
        }else if($transaction->isFailed()){
          //Transaction Failed
          return view('paytm.paytm-fail');
        }else if($transaction->isOpen()){
          //Transaction Open/Processing
          return view('paytm.paytm-fail');
        }
        $transaction->getResponseMessage(); //Get Response Message If Available
        //get important parameters via public methods
        $transaction->getOrderId(); // Get order id
        $transaction->getTransactionId(); // Get transaction id
    }

   
}