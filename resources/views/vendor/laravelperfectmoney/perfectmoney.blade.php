@extends('ui.layout.app')

@section('content')

	<div class="container">
                <div class="row">
                    <div class="col-md-6 offset-3 col-md-offset-6">
                        <div class="card card-default">
                            <div class="card-body ">
                            	<div class="card-header">
                                    <h2>Payment by Perfectmoney gateway</h2>
                                </div>
								    <br>
									<form action="https://perfectmoney.is/api/step1.asp" method="POST">
									 @csrf
								    <input type="hidden" name="PAYEE_ACCOUNT" value="{{ $PAYEE_ACCOUNT }}">
								    <input type="hidden" name="PAYEE_NAME" value="{{ $PAYEE_NAME }}">
								    Enter your amount:<br>
								    <input type="text" name="PAYMENT_AMOUNT" class="form-control" value="{{session('amount')}}" placeholder="Amount" required="">
								    <input type="hidden" name="PAYMENT_UNITS" value="{{ $PAYMENT_UNITS }}">
									<input type="hidden" name="PAYMENT_URL" value="{{ $PAYMENT_URL }}">
									<input type="hidden" name="NOPAYMENT_URL" value="{{ $NOPAYMENT_URL }}">
									@if($PAYMENT_ID)
										<input type="hidden" name="PAYMENT_ID" value="{{ $PAYMENT_ID }}">
									@endif
									@if($STATUS_URL)
										<input type="hidden" name="STATUS_URL" value="{{ $STATUS_URL }}">
									@endif
									@if($PAYMENT_URL_METHOD)
										<input type="hidden" name="PAYMENT_URL_METHOD" value="{{ $PAYMENT_URL_METHOD }}">
									@endif
									@if( $NOPAYMENT_URL_METHOD )
										<input type="hidden" name="NOPAYMENT_URL_METHOD" value="{{ $NOPAYMENT_URL_METHOD }}">
									@endif
									
									@if( $SUGGESTED_MEMO )
										<input type="hidden" name="SUGGESTED_MEMO" value="{{ $MEMO }}">
									@endif
									<br>
								    <input type="submit" class="btn btn-primary mt2" value="Pay Now">
								</form>

			</div>
		</div>
	</div>
	</div>
</div>

@endsection