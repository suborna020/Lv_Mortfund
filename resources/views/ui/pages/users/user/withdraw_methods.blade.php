@extends('ui.layout.app')

@section('content')

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
@endsection