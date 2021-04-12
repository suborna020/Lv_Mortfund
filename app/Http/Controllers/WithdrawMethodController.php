<?php

namespace App\Http\Controllers;

use App\Models\WithdrawMethod;
use Illuminate\Http\Request;
use App\Models\UserPaymentMethod;
use App\Models\PaymentGateway;
use App\Models\User;
use App\Models\WithdrawRequest;
use App\Models\Transection;
use Session;

class WithdrawMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_methods = UserPaymentMethod::with('PaymentGateways')->where('user_id',session('user_session'))->where('transection_type',1)->get();
        $payment_gateways = PaymentGateway::where('status',1)->get();
        return view('ui.pages.users.user.withdraw_methods',compact('payment_methods','payment_gateways'));
    }

    public function withdrawHistory()
    {   
        $withdraw_history = Transection::with('Members','paymentmthods')->where('member_id',session('user_session'))->where('transection_type','1')->get();
        return view('ui.pages.users.user.withdraw_history',compact('withdraw_history'));
    }

    public function deleteWithdrawHistory(Request $r)
    {
        Transection::where('member_id',session('user_session'))->where('transection_type','1')->delete();

        return redirect('/withdrawHistory');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WithdrawMethod  $withdrawMethod
     * @return \Illuminate\Http\Response
     */
    public function show(WithdrawMethod $withdrawMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WithdrawMethod  $withdrawMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(WithdrawMethod $withdrawMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WithdrawMethod  $withdrawMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WithdrawMethod $withdrawMethod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WithdrawMethod  $withdrawMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(WithdrawMethod $withdrawMethod)
    {
        
    }
}
