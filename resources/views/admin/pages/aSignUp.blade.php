@extends('admin.layout.app')

@section('auth')
<div class="leftDiv">

</div>
<div class="rightDiv login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="{{asset("adminAssets/img/logo.svg")}}" alt="LOGO" class=" loginLogo" id="" />
            {{-- <a href="../../index2.html"><b>Admin</b>LTE</a> --}}
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">SignUp To Admin Portal</p>

                <form action="{{ url('adminSignUpSub') }}" class="database_operation">
                  @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control input" name="admin_name" placeholder="Full Name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control input" name="admin_username" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control input" name="admin_email"  placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="admin_password" id="aLoginPass" placeholder="Password">
                        <div class="input-group-append" id="passwordShow">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-12 submitButton">
                            <button class="btn btn-warning text-white">Sign Up</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</div>
@endsection
