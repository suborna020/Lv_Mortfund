@extends('ui.layout.app')

@section('content')

<div style="margin-top: 115px;">
	<div id="verificationProcess">
		
		<div class="passportVerification">
			 <form action="/getUploadedDocuments" method="POST" enctype="multipart/form-data">
			 	@csrf
			 	<input type="file" name="upload_documents" class="form-control">
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