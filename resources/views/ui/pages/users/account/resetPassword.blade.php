@extends('ui.layout.app')
@section('content')
    <div class="container"><br><br><br><br><br><br>
        <h3>Create New Pasword</h3>
        @if (session('error_messege'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error_messege') }}
            </div>
        @endif
        <form action="{{url('/reset-password')}}" method="post">
            @csrf
            <div class="form-group"><br>
                            <label>Enter New Password: </label>
                <input type="password" name="new_password" class="form-control">
            </div>
            <div class="form-group">
                <label>Re-enter New Password: </label>
                <input type="password" name="confirm_password" class="form-control">
                <input type="hidden" name="email" value="{{$email}}">
            </div>
            <button type="submit" class="btn btn-dark">Set Password</button>
        </form>
        <br>
    </div>
@endsection