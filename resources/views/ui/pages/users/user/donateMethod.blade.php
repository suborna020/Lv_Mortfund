@extends('ui.layout.app')

@section('head-script')
    <link href="{{asset('css/new/payement-integration.css')}}" rel="stylesheet">
@endsection

@section('content')
 <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Payement Settings</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <i class="fa fa-home fa-2x home-icon" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Payment Settings</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section>
<div class="paymentSettings">
   



    <section class="payment-integration py-5">
        <div class="container">
            <div class="row">
                <!-- left -->
                <div class="col-12 col-md-4">
                    <div class="card" style=" box-shadow: 0 2px 4px 0 #e6e6e6, 0 2px 4px 0 #e6e6e6">
                        <div class="card-body">
                            <div style="text-align: center;">
                                <div style="overflow:hidden;border: 3px solid #f8800b; height: 110px; width: 110px; border-radius: 50%;
                                    display: flex; align-items: center; justify-content: center; margin: 0 auto">
                                    <!-- updated img -->
                                    <img class="img-fluid" src="{{asset('uploads/'.$user_info->user_photo)}}" alt="user" />
                                </div>
                                <h5 class="mt-3">{{$user_info->name}}</h4>
                            </div>
                            <hr class="my-4" style="width: 100px;">
                            <div class="profile_infowrapper">
                                <div><i class="fas fa-envelope mr-3"></i>
                                    <p>{{$user_info->email}}</p>
                                </div>
                                <div> <i class="fa fa-user mr-3"> </i>
                                    <p> {{$user_info->username}}</p>
                                </div>
                                <div> <i class="fas fa-phone-alt mr-3"></i>
                                    <p> {{$user_info->mobile_no}} </p>
                                </div>
                                <div><i class="fas fa-map-marker-alt mr-3"></i>
                                    <p>{{$user_info->address}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right -->
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            {{session('payment_method')}}
                            <h5 class="font-weight-bold">Payment Methods</h5>
                            <h6 class="mb-4 font-weight-bold">please fill up your credentials for atleast one of the gateways</h6>
                            <div class="container">
                                <div class="row">
                                  @foreach($payment_methods as $payment_method)
                                    <div class="col-12 col-md-4 pl-0 mb-3 ">
                                        <div class="card  h-100 w-100 ">
                                            <div
                                                class="card-body d-flex align-items-center flex-column justify-content-center ">
                                                <img height="100px" src="{{asset('../../siteImages/paymentGateways/'.$payment_method->PaymentGateways->gateway_photo)}}" alt="card" />
                                                <!-- {{$payment_method->PaymentGateways->gateway_name}} -->


                                                <!-- <button onclick="window.location.href='../{{$payment_method->PaymentGateways->link}}';"
                                                    style="overflow:hidden;background-color: #f8800b; padding: 3px 18px; color: #fff; font-weight: 500;"
                                                    class="btn btn-sm">Pay Now</button> -->
                                                <form action="{{url('setPaymentMethod')}}" method="POST">
                                                    @csrf
                                                    <input type="text" name="payment_method" value="{{$payment_method->PaymentGateways->id}}">

                                                    <button type="submit"
                                                    style="overflow:hidden;background-color: #f8800b; padding: 3px 18px; color: #fff; font-weight: 500;"
                                                    class="btn btn-sm">Pay Now</button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
