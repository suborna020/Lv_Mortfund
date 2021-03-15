@extends('ui.layout.app')

@section('content')

<div class="paymentSettings" style="margin-top: 115px">
   

   <div class="container mb-4">
   	  <div class="row">
   	  	   <div class="col-12 col-md-12"> 
              <p>Payement Settings</p>
              {{-- session('user_msg') --}}
   	  	   </div>

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
                   <p>{{session('campaing_id')}}</p>
                   <div class="row">
                   	@foreach($payment_methods as $payment_method)
                   	  <div class="col-12 col-md-3 border p-4 m-2" id="paymentGateway">
                   	  	  <div class="getwayIcon">
                   	  	  	 {{$payment_method->PaymentGateways->gateway_name}}
                   	  	  </div>
                   	  	  <div class="loginGateway">
                             <a href="../{{$payment_method->PaymentGateways->link}}">Deposite</a>

                             <button id="paymentGateway">Deposite</button>
                             <button type="button" class="btn btn-success" id="paymentGateway" data-item-id="1">edit</button>
                   	  	  </div>
                   	  </div>
                   	  @endforeach
                   </div>
   	  	      </div>
   	  	   </div>
   	  </div>
   </div>
</div>


<div class="modal fade bd-example-modal-lg" id="paymentGatewayModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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

	    		
             
	            <input type="checkbox" name="payment_method_id" value="">
              Payment Gateway Name
	       
    		     
    		    
	   </div>
	   <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Selected Methods</button>
      </div>
      </form>
    </div>
  </div>
</div> 
 



<script type="text/javascript">
   $(document).on('click', "#paymentGateway", function() {
    $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

    var options = {
      'backdrop': 'static'
    };
    $('#paymentGatewayModal').modal(options)
  })

  // on modal show
  $('#paymentGatewayModal').on('show.bs.modal', function() {
    var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
    var row = el.closest(".data-row");

    // get the data
    var id = el.data('item-id');
    var name = row.children(".name").text();
    var description = row.children(".description").text();

    // fill the data in the input fields
    $("#modal-input-id").val(id);
    $("#modal-input-name").val(name);
    $("#modal-input-description").val(description);

  })

  // on modal hide
  $('#paymentGatewayModal').on('hide.bs.modal', function() {
    $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
    $("#edit-form").trigger("reset");
  })

</script>
@endsection