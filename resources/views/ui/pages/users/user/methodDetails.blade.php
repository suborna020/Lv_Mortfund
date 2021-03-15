@extends('ui.layout.app')
​
@section('content')
​
<div class="w3-container" style="margin-top: 115px">
        @if ($message = Session::get('success'))
        <div class="w3-panel w3-green w3-display-container">
            <span onclick="this.parentElement.style.display='none'"
    				class="w3-button w3-green w3-large w3-display-topright">&times;</span>
            <p>{!! $message !!}</p>
        </div>
        <?php Session::forget('success');?>
        @endif

        @if ($message = Session::get('error'))
        <div class="w3-panel w3-red w3-display-container">
            <span onclick="this.parentElement.style.display='none'"
    				class="w3-button w3-red w3-large w3-display-topright">&times;</span>
            <p>{!! $message !!}</p>
        </div>
        <?php Session::forget('error');?>
        @endif

    	<form class="w3-container w3-display-middle w3-card-4 w3-padding-16" method="POST" id="payment-form"
          action="{!! URL::to('paypal') !!}">
    	  <div class="w3-container w3-teal w3-padding-16">Pay with Paypal Payment</div>
    	  @csrf
    	  <h2 class="w3-text-blue">Payment Form</h2>
    	  <p>Demo PayPal form</p>
          <label><b>Email</b></label>
          <input type="text" class="form-control" name="email" value="">
    	  <label><b>Enter Amount</b></label>
    	  <input class="form-control" id="amount" type="text" name="amount" required="" value="{{session('amount')}}"></p>
          <!-- <label><b>Charge</b></label>
          <input type="text" class="form-control" name="charge" value=""> -->
          <input type="hidden" name="method_id" value="1" class="form-control">
    	  <button class="w3-btn w3-blue">Pay with PayPal</button>
    	</form>
    </div>

@endsection