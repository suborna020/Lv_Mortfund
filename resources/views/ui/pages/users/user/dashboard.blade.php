@extends('ui.layout.app')

@section('content')

<div class="container" style="margin-top: 115px">
   <div class="row">
   	  <div class="col-12 col-md-12">
	       
	       <div class="row d-flex justify-content-center">
	       	<div class="col-12 col-md-4 m-4 border">
	       	   <div class="col-12 col-md-12 p-4">
	       	   	  <h3>Icon Goes here</h3>
	       	   	  <h4>Current Balance</h4>
	       	   	  <p style="font-size: 40px;font-weight: 20px;">
                    
                    @if(session::has('currency_c'))
                    @if($user_currency->session_currency == session('currency_c'))
                        {{$user_currency->symbol}}{{($user_balance->sum('amount'))*($user_currency->value)}}
                    @endif
                @else
                   
                {{$currency_by_location->symbol}}{{($user_balance->sum('amount'))*($currency_by_location->value)}}
                
                @endif
	       	   	  </p>
	       	   </div>	
	       </div>
	       <div class="col-12 col-md-4 m-4 border">
	       	   <div class="col-12 col-md-12 p-4">
	       	   	  <h3>Icon Goes here</h3>
	       	   	  <h4>Current Fundraisers</h4>
	       	   	  <p style="font-size: 40px;font-weight: 20px;">{{$number_of_current_fundraisers}}</p>
	       	   </div>
	       </div>
	       <div class="col-12 col-md-4 m-4 border">
	       	   <div class="col-12 col-md-12 p-4">
	       	   	  <h3>Icon Goes here</h3>
	       	   	  <h4>Pending Fundraisers</h4>
	       	   	  <p style="font-size: 40px;font-weight: 20px;">{{$number_of_pending_fundraisers}}</p>
	       	   </div>
	       </div>
	       <div class="col-12 col-md-4 m-4 border">
	       	   <div class="col-12 col-md-12 p-4">
	       	   	  <h3>Icon Goes here</h3>
	       	   	  <h4>Completed Fundraisers</h4>
	       	   	  <p style="font-size: 40px;font-weight: 20px;">{{$number_of_completed_fundraisers}}</p>
	       	   </div>
	       </div>
      </div>
    </div>
  </div>
</div>
@endsection