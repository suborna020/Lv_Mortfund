<?php

namespace App\Http\Controllers;

use App\Models\PaymentGateway;
use App\Models\Fundraiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use App\Models\User;

/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use App\Models\Transection;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;


class PaymentGatewayController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

    }
    public function index()
    {   
        $charges = PaymentGateway::where('id',1)->first();
        return view('ui.pages.users.user.methodDetails',compact('charges'));
    }
    public function payWithpaypal(Request $request)
    {

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName('Item 1') /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
            ->setCancelUrl(URL::to('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {

            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PPConnectionException $ex) {

            if (\Config::get('app.debug')) {

                \Session::put('error', 'Connection timeout');
                return Redirect::to('/checkout/paypal');

            } else {

                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/checkout/paypal');

            }

        }

        foreach ($payment->getLinks() as $link) {

            if ($link->getRel() == 'approval_url') {

                $redirect_url = $link->getHref();
                break;

            }

        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {

            /** redirect to paypal **/
            return Redirect::away($redirect_url);

        }

        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('/');

    }

    public function getPaymentStatus(Request $r)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {

            \Session::put('error', 'Payment failed');
            return Redirect::to('/checkout/paypal');

        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            Transection::create([
            'method_id' => 1,
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

        // Fundraiser::where('id', session('campaing_id'))->update([
        // 'raised' => $r->raised,
        // ]);

            \Session::put('success', 'Payment success');

            $id = session('campaing_id');
         // echo "success";

         return \Redirect::route('singleCampaign',[$id])->with('message', 'Payment done Successfully!!!');


            // return Redirect::to('/checkout/paypal');

        }

        \Session::put('error', 'Payment failed');
        // return Redirect::to('/checkout/paypal');

        $id = session('campaing_id');
        
        return \Redirect::route('singleCampaign',[$id])->with('message', 'Payment done Successfully!!!');

    }

    public function checkout()
    {   

        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51IQArsEXyED6aSlyyAiPCQo8XR2Gwt3W5K6o8ngmQgOsbvmZykUbS5VHeNoUXjSDh4vHQrmmtvGUOuICVVo9UdD900rlZhrVoX');
                
        $amount = session('amount');
        $amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'USD',
            'description' => 'Payment From Mortfund',
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;
        $charge = PaymentGateway::where('id',4)->first();

        // return view('ui.pages.users.user.credit-card',compact('intent','charge'));
        return redirect('myAccount/donateMethod/checkout',compact('intent','charge'));

    }

    public function afterPayment(Request $r)
    {   

        Transection::create([
            'method_id' => 4,
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

        

        // Fundraiser::where('id', session('campaing_id'))->update([
        // 'raised' => 1000,
        // ]);

        User::where('id', session('user_session'))->update([
            'current_balance' => session('current_balance') + session('amount'),
        ]);

        $id = session('campaing_id');
        // $r->session()->flash('msg','Payment Has been Recieved !');
        // return redirect('/checkout/stripe');
        return \Redirect::route('singleCampaign',[$id])->with('message', 'Payment done Successfully!!!');
    }

   

}
