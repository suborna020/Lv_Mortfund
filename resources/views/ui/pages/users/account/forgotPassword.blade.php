@extends('ui.layout.app')

@section('head-script')
    <link href="{{asset('css/new/forgot-password.css')}}" rel="stylesheet">
@endsection

@section('content')



<section class="forgot" style="margin-top: 115px">
        <div>
            <div class="forgot_right">
                <h4>Forgot Password?</h4>
                <p class="h3" style="max-width: 700px; margin-bottom: 2rem;">
                    Enter your mail here and check you mail after submitting. If you dont get any mail submit again
                </p>
                @if (session('error_messege'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error_messege') }}
                    </div>
                @endif
                <form class="forgot_form" style="width: 60%" action="{{url('forgot-password')}}" method="post">
                @csrf    
                    <div class="input-icons">
                        <i class="fas fa-envelope"></i>
                        <input class="input-field" type="email" name="email" placeholder="Email" />
                    </div>
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
