<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;
use App\Models\Transection;
use App\Models\PaymentGateway;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
                
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback(Request $request)
    {   
            
        $paymentDetails = Paystack::getPaymentData();

        if ($request) {
          $result = json_decode($request, true);
        }   

            
            Transection::create([
            'method_id' => 5,
            'member_id' => session('user_session'),
            'transection_type' => 0,
            'name' => session('name'),
            'email' => $paymentDetails['data']['customer']['email'],
            'phone' => session('phone'),
            'address' => session('address'),
            'amount' => $paymentDetails['data']['amount'],
            'charge' => $paymentDetails['data']['fees'],
            'campaign_author' => session('fundraiser_id'),
            'campaign_id' => session('campaing_id'),
        ]);

            User::where('id', session('user_session'))->update([
            'current_balance' => session('current_balance') + session('amount'),
        ]);
  
         $id = session('campaing_id');
         // echo "success";

         return \Redirect::route('singleCampaign',[$id])->with('message', 'Payment done Successfully!!!');
        
        // dd($paymentDetails);

        

        // if (array_key_exists('data', $paymentDetails) && array_key_exists('status', $paymentDetails['data']) && ($paymentDetails['data']['status'] === 'success')) {
        //      echo "Transaction was successful";
        //      echo $paymentDetails['data']['customer']['email'];
        //          //    auth()->user()->update([
        //          //     'reference' => $paymentDetails['data']['reference']
        //          // ]);
        //     }else{
        //           echo "Transaction was unsuccessful";
        //     }
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    public function paystack()
    {
        // $paymentDetails = Paystack::getPaymentData();
        $charge = PaymentGateway::where('id',5)->first();
        return view('ui.pages.users.user.paystack',compact('charge'));
    }
}