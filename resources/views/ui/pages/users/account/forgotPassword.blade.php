@extends('ui.layout.app')

@section('content')

<div class="container"><br><br><br><br><br><br>
    <h3>Forgot your password? Reset it now..</h3>
    @if (session('error_messege'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error_messege') }}
        </div>
    @endif
    <form action="{{url('forgot-password')}}" method="post">
    	@csrf
    	<div class="form-group"><br>
{{--    		<label>Enter Your Email Address : </label>--}}
    		<input type="email" name="email" placeholder="Type Your Email Here" class="form-control">
    	</div>
        <button type="submit" class="btn btn-dark">Get Password Reset Token</button>
    </form>
    <br>
</div>

@endsection
