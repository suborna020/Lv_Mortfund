@extends('ui.layout.app')

@section('content')

<div class="container">
    <h3>Reset Password</h3>

    <form>
    	@csrf
    	<div class="form-group">
    		<label>Enter Your Email Address : </label>
    		<input type="text" name="" class="form-control">
    	</div>

    	<div class="form-group">
    		<input type="submit" name="" class="form-control">
    	</div>
    </form>
</div>

@endsection