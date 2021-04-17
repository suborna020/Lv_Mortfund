@extends('ui.layout.app')

@section('head-script')
    <link href="{{asset('css/new/forgot-password.css')}}" rel="stylesheet">
@endsection

@section('content')





<section class="forgot" style="margin-top: 115px">
        <div>
            <div class="forgot_right">
                <h4>Create New Pasword</h4>
                <p class="h3" style="max-width: 700px; margin-bottom: 2rem;">
                    Enter your password here, after successful password reset you will be redirected to the login page 
                </p>
                @if (session('error_messege'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error_messege') }}
                    </div>
                @endif
                <form class="forgot_form" style="width: 60%" action="{{url('/reset-password')}}" method="post">
                @csrf    
                    <div class="input-icons">
                        <i class="fas fa-key"></i>
                        <input class="input-field" type="password" name="new_password" placeholder="Enter the Password here" />
                    </div>
                    <div class="input-icons">
                        <i class="fas fa-key"></i>
                        <input class="input-field" type="password" name="confirm_password" placeholder="Re-enter the Password here" />
                    </div>
                    <input type="hidden" name="email" value="{{$email}}">
                    <div class="d-flex justify-content-between mb-4">
                        <button type="submit" class="btn forgot-btn">Submit</button>
                        <p class=" m-0 text-center font-weight-bold forgot-p">Do not have an <br>account? <a
                                style="color: #002c58 !important" href="#">Log In Here</a></p>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>

@endsection