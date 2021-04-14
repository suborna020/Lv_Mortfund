@extends('ui.layout.app')

@section('head-script')
    <link href="{{asset('css/new/login.css')}}" rel="stylesheet">
@endsection

@section('content')    

  <section class="login" style="margin-top: 115px">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md-8 p-0">
          <div class="login_right">
            <h4>Log In</h4>
            <p class="h3" style="max-width: 700px; margin-bottom: 2rem;">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed quo
              nesciunt quidem minima? Similique, amet! Maiores velit
            </p>
            <form action="{{ url('login') }}" class="login_form database_operation" style="width: 60%">
              <div class="input-icons">
                <i class="fa fa-user"> </i>
                <input class="input-field" type="text" name="username" placeholder="Username" />
              </div>
              <div class="input-icons">
                <i class="fas fa-lock"></i>
                <input class="input-field" type="password" name="password" placeholder="Password" />
              </div>
              <div class="d-flex justify-content-between mb-4 align-items-center">
                <span class="d-flex align-items-center font-weight-bold">
                  <input class="mr-2" type="checkbox" />Remember Me?</span>
                <a href="{{route('forgot-password')}}" class="font-weight-bold">Forgot Password?</a>
              </div>
              <div class="d-flex justify-content-between mb-4">
                <button type="submit" class="btn login-btn">Log In</button>
                <p class=" m-0 text-center font-weight-bold login-p">Do not have an <br>account? <a
                    style="color: #002c58 !important" href="{{ url('sign-up') }}">Sign Up Here</a></p>
              </div>
            </form>
          </div>
        </div>
        <div class="col-12 col-md-4 p-0">
          <div class="login_img">
            <!-- img is added in css -->
          </div>
        </div>
      </div>
    </div>
  </section>



@endsection    