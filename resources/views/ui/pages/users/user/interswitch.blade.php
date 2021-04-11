@extends('ui.layout.app')

@section('content')

<div class="container" style="margin-top:115px"> 
  <div class="row">   
    <p>Making Donation for <b>{{$selected_fundraiser->title}}</b></p>
  </div>
  <form method="post" action="{{route('InterswitchPay')}}">
    @csrf 
  <input type="text" name="customer_name" value="John Doe" required />
  <input type="text" name="customer_id" value="1" required/>
  <input type="email" name="customer_email" required value="" placeholder="a valid email" />
  <input type="number" min="0" name="amount" required value="{{session('amount')}}"/>
  <button type="Submit">Pay</button>
</form>

    <!-- place below the html form -->
  </div>
</div>

    
@endsection