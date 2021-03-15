@extends('ui.layout.app')

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
   

   <div class="container mb-4">
   	  <div class="row">

   	  	   <div class="col-12 col-md-4">
   	  	   	  <div class="col-12 col-md-12 border p-4">
                  <div class="user_photo">
                  	<div class="im" style="width: 100px">
                      <img src="/uploads/{{$user_info->user_photo}}" style="width: 100%;">
                    </div>
                  </div>
                  <div class="user_info">
                  	  <h4> {{$user_info->name}}</h4>

                  	  <p>Email {{$user_info->email}}</p>
                  	  <p>User Name {{$user_info->name}}</p>
                  	  <p>Phone {{$user_info->mobile_no}}</p>
                  	  <p>Address {{$user_info->address}}</p>
                  </div>
   	  	      </div>
   	  	   </div>

   	  	   <div class="col-12 col-md-8">
               <div class="col-12 col-md-12 border p-4">
                   <h4>Payment Methods</h4>

                   <p>Please Fill up your credentials for at least one of the Gateways</p>

                   <div class="row">
                   	@foreach($payment_methods as $payment_method)
                   	  <div class="col-12 col-md-3 border p-4 m-2">
                   	  	  <div class="getwayIcon">
                   	  	  	 {{$payment_method->PaymentGateways->gateway_name}}
                   	  	  </div>
                   	  	  <div class="loginGateway">
                             <button class="btn btn-primary">Log in</button>
                   	  	  </div>
                   	  </div>
                   	  @endforeach
                   	  <div class="col-12 col-md-3 border p-4 m-2">	  
                   	  	  <div class="getwayIcon">
                   	  	  	Add More Payment Gateway
                   	  	  </div>
                   	  	  <div class="loginGateway">
                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">+</button>
                   	  	  </div>
                   	  </div>
                   </div>
   	  	      </div>
   	  	   </div>
   	  </div>
   </div>
</div>



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<form action="{{url('selectUserPayment')}}" method="post" class="user_payment_method">
    		@csrf
    	<div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add Payment Methods</h5>
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
 

@endsection