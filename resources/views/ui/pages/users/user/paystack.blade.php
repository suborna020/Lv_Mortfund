@extends('ui.layout.app')

@section('content')

<div class="container" style="margin-top:115px"> 
  <div class="row">   
    <p>Making Donation for <b>{{$selected_fundraiser->title}}</b></p>
  </div>
  <div class="row">
    <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
    <div class="row" style="margin-bottom:40px;">
        <div class="col-md-8 col-md-offset-2">
            <p>
                <div>
                    Amount to be Donated {{session('amount')}}
                </div>
            </p>
            <input type="text" name="email" value="{{session('email')}}"> {{-- required --}}
            <input type="hidden" name="orderID" value="345">
            <input type="text" name="amount" value="{{session('amount')}}"> {{-- required in kobo --}}
            <input type="hidden" name="quantity" value="3">
            <input type="hidden" name="currency" value="NGN">
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
            {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}
​
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}
​
            <p>
                <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                    <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                </button>
            </p>
        </div>
    </div>
</form>
     {{-- <form>
        <script src="https://js.paystack.co/v1/inline.js"></script>
        <label>Amount</label>
        <input type="text" name="" class="form-control" id="amount" value="{{session('amount')}}">
        <label>Email</label>
        <input type="text" name="" class="form-control" id="email">
        <button type="button" class="btn btn-primary" onclick="payWithPaystack()"> Make Deposite </button> 
    </form> --}}

    <!-- place below the html form -->
  </div>
</div>
<script>
  // function payWithPaystack(){
  //   var amount = $("#amount").val();
  //   var email = $("#email").val();

    // var handler = PaystackPop.setup({
    //   key: 'pk_test_a486c9ef0192db8d4dfdd5d5ea72fb63a9a415f8',
    //   email: email,
    //   amount: amount,
    //   ref: ''+Math.floor((Math.random() * 1000000000) + 1),
      
  //      // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
  //     metadata: {
  //        custom_fields: [
  //           {
  //               display_name: "Mobile Number",
  //               variable_name: "mobile_number",
  //               value: "+8801688496756"
  //           }
  //        ]
  //     },


  //     callback: function(response){
  //         alert('success. transaction ref is ' + response.reference);
  //     },
  //     onClose: function(){
  //         alert('window closed');
  //     }
  //   });
  //   handler.openIframe();
  // }
</script>
    
@endsection