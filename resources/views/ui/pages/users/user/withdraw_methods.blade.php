@extends('ui.layout.app')

@section('head-script')
    <link href="{{asset('css/new/withdraw-methods.css')}}" rel="stylesheet">
@endsection

@section('content')


 <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Withdraw Methods</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <i class="fa fa-home fa-2x home-icon" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Withdraw Methods</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section>


    <section class="withdraw-methods py-5">
        <div class="container">
            <!-- heading -->
            <div class="withdraw-methods_heading mx-auto text-center w-50">
                <h4>Withdraw Methods</h4>
                <p style="color: #7a7a7a; font-weight: 600; font-size: 18px;">
                    Lorem ipsum dolor sit
                    amet, consectetur
                    adipisicing elit.
                    Officiis sint a
                    atque neque, deserunt error
                    at architecto</p>
            </div>
            <!-- cards -->
            <div class="pt-5"></div>
            <div class="row">
              @foreach($payment_methods as $payment_method)
                <div class="col-12 mb-3 pl-5 col-md-4">
                    <div class="card  border-0 h-100 mw-50">
                        <div class="card-body" style="display: grid;  place-items: center;">
                            <img class="img-fluid" src="{{asset('../../siteImages/paymentGateways/'.$payment_method->PaymentGateways->gateway_photo)}}" alt="card">
                            <!-- updated : withdraw-btn -->
                            <button
                                style="background-color: #f8800b; padding: 5px 20px; color: #fff; font-weight: 500;margin-bottom: 2rem; "
                                class="btn withdraw-btn" type="button" data-toggle="modal"
                                data-target="#exampleModal">Withdraw
                                Now</button>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-12 mb-3 pl-5 col-md-4">
                    <div class="card  border-0 h-100 mw-50">
                        <div class="card-body" style="display: grid;  place-items: center;">
                            <img class="img-fluid" src="/images/Images/stripe-logo.svg" alt="card">
                            <!-- updated : withdraw-btn -->
                            <button
                                style="background-color: #f8800b; padding: 5px 20px; color: #fff; font-weight: 500;margin-bottom: 2rem; "
                                class="btn withdraw-btn" type="button" data-toggle="modal"
                                data-target="#exampleModal">Withdraw
                                Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3 pl-5 col-md-4">
                    <div class="card  border-0 h-100 mw-50">
                        <div class="card-body" style="display: grid;  place-items: center;">
                            <img class="img-fluid" src="/images/Images/skrill-logo.svg" alt="card">
                            <!-- updated : withdraw-btn -->
                            <button
                                style="background-color: #f8800b; padding: 5px 20px; color: #fff; font-weight: 500;margin-bottom: 2rem; "
                                class="btn withdraw-btn" type="button" data-toggle="modal"
                                data-target="#exampleModal">Withdraw
                                Now</button>
                        </div>
                    </div>
                </div> --}}
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Withdraw Balance</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body p-0">
                                <div class="container-fluid">
                                    <div class="row">
                                        <!-- firtsrow -->
                                        <div class="col-12 mb-3 ">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div
                                                        class="col-xs-12 col-3 d-flex justify-content-center align-items-center flex-column  p-0">
                                                        <img height="100px" width="100%"
                                                            src="/images/Images/paypal-logo.svg" alt="card" />
                                                        <h6 class="m-0 py-1 ">Current Balance</h6>
                                                        <h2 class="m-0 font-weight-bold "><i
                                                                class="fas fa-dollar-sign"></i>15.00</h2>
                                                    </div>
                                                    <div
                                                        class="col-xs-12 col-1 d-flex justify-content-center align-items-center p-0  ">
                                                        <div class="mx-auto " style="height: 100px; width: 3px; 
                                                            background-color: #e6e6e6;"></div>
                                                    </div>
                                                    <div class="col-xs-12 col-8 pt-3">
                                                        <img class="img-fluid"
                                                            src="/images/Images/paypalcardplaceholder.svg" alt="card">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- firtsrowend -->
                                        <div class="col-12 p-0 mb-3">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="card h-100 w-100 border-0 text-center"
                                                            style="background-color: #f8f8f8;">
                                                            <div class="card-body d-flex flex-column justify-content-center
                                                            align-items-center py-2 px-0">
                                                                <h6 style="color: #d7d7d7 ">Charge</h6>
                                                                <h3 class="font-weight-bold "><i
                                                                        class="fas fa-dollar-sign"></i>5.00</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="card h-100 w-100 border-0 text-center"
                                                            style="background-color: #f8f8f8;">
                                                            <div class="card-body d-flex flex-column justify-content-center
                                                            align-items-center py-2 px-0">
                                                                <h6 style="color: #d7d7d7 ">Percentage Charge</h6>
                                                                <h3 class="font-weight-bold ">2%</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="card h-100 w-100 border-0 text-center"
                                                            style="background-color: #f8f8f8;">
                                                            <div class="card-body d-flex flex-column justify-content-center
                                                            align-items-center py-2 px-0">
                                                                <h6 style="color: #d7d7d7 ">Processing Days <br> ( At
                                                                    Least )
                                                                </h6>
                                                                <h3 class="font-weight-bold ">3 days
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            style="color: #a2a2a2;"
                                                            class="fas fa-dollar-sign"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    placeholder="Amount You Want To Withdraw" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button
                                        style="background-color: #f8800b; padding: 5px 20px; color: #fff; font-weight: 500; "
                                        class="btn" type="button" data-toggle="modal" data-target="#exampleModal">Send
                                        Withdraw
                                        Request</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


















{{--   
<div class="container" style="margin-top: 115px">
   <div class="row">
   	   <div class="col-12 col-md-12">
   	   	  <h3 style="text-align: center;">Withdraw Methods</h3>
   	   	  <p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
   	   	  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
   	   	  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
   	   	  consequat. Duis aute irure dolor .</p>
   	   </div>

   	   <div class="col-12 col-md-12">
   	   	  <div class="row">
                   	@foreach($payment_methods as $payment_method)
                   	  <div class="col-12 col-md-3 border p-4 m-2">
                   	  	  <div class="getwayIcon">
                   	  	  	 {{$payment_method->PaymentGateways->gateway_name}}
                   	  	  </div>
                   	  	  <div class="loginGateway">
                             <button class="btn btn-primary">Withdraw Now</button>
                   	  	  </div>
                   	  </div>
                   	  @endforeach
                   	  <div class="col-12 col-md-3 border p-4 m-2">	  
                   	  	  <div class="getwayIcon">
                   	  	  	Add More Withdraw Methods
                   	  	  </div>
                   	  	  <div class="loginGateway">
                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".withdraw_methods">+</button>
                   	  	  </div>
                   	  </div>
                   </div>
   	   </div>
  </div>
</div>


<div class="modal fade withdraw_methods" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<form action="{{url('selectUserPayment')}}" method="post" class="user_payment_method">
    		@csrf
    	<div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add Withdraw Methods</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
    	<div class="modal-body">
    		
    			<input type="hidden" name="" value="{{session('user_session')}}">

	    		@foreach($payment_gateways as $payment_gateway)
             
	            <input type="checkbox" name="payment_method_id[]" value="{{$payment_gateway->id}}">{{$payment_gateway->gateway_name}}
              
	        @endforeach
    		     
    		    
	   </div>
	   <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Selected Methods</button>
      </div>
      </form>
    </div>
  </div>
</div>

--}}
@endsection