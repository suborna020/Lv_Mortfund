@extends('ui.layout.app')

@section('head-script')
    <link href="{{asset('css/new/profile.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/kyc.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
@endsection

@section('content')

<div style="margin-top: 115px;">
	<div id="verificationProcess">
		
          @if($user_id==true)

          @include('ui.pages.users.user.verificationPending');
          
          @else
  
          @include('ui.pages.users.user.testVerification');
          
          @endif
		
	</div>
</div>


@endsection