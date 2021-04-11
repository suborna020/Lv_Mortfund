@extends('ui.layout.app')
@section('content')
    <div class="container"><br><br><br><br><br><br>
        <h3>Verify Token</h3>
        @if (session('error_messege'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error_messege') }}
            </div>
        @endif
        <form action="{{url('/verify-token')}}" method="post">
            @csrf
            <div class="form-group"><br>
                <input type="text" name="token" placeholder="Enter Token Here" class="form-control">
            </div>
            <input type="hidden" name="sent_token" value="{{$token}}">
            <input type="hidden" name="email" value="{{$email}}">
            <button type="submit" class="btn btn-dark">Verify</button>
        </form>
        <br>
    </div>
@endsection