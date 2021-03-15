@extends('ui.layout.app')
​
@section('content')
​ <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Dashboard</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <i class="fa fa-home fa-2x home-icon" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section>
<div>    
<div class="container">
	
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
                   
                {{($currency_by_location->symbol)?? '0' }}{{($user_balance->sum('amount'))*(($currency_by_location->value)?? '0')}}
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
</div>
@endsection