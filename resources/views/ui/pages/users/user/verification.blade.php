@extends('ui.layout.app')

@section('content')

<div style="margin-top: 115px;">
	<div id="verificationProcess">
		
		<div class="passportVerification">
			 <form action="/getPassportNumber" method="POST">
			 	@csrf
			 	<input type="text" name="passport_number" class="form-control" placeholder="Passport Number">
			 	<button type="submit">Next</button>
			 </form>
		</div>

		
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
	    $("#bt").click(function(){
	        $("#verificationProcess").load("profile");
	    });
	});
</script>
@endsection