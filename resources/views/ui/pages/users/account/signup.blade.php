@extends('ui.layout.app')

@section('head-script')
    <link href="{{asset('css/new/register.css')}}" rel="stylesheet">
@endsection

@section('content')


    <section class="register" style="margin-top: 115px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-xl-3 p-0 register-leftImg">
                    <!-- img is added in css -->
                </div>
                <div class="col-xs-12 col-md-12 col-xl-9 p-0">
                    <div class="container">
                        <div class="row register_contentwrapper">
                            <div class="col-xl-4  col-md-4 col-xs-12 p-0">
                                <div class="register_left">
                                    <h4>Welcome</h4>
                                    <p class="h3">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed quo
                                        nesciunt quidem minima? Similique Lorem ipsum
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-1 col-md-1 d-flex align-items-center mb-5 p-0">
                                <div class="register_line"></div>
                            </div>
                            <div class="col-xl-7 col-md-7 col-xs-12 p-0">
                                <div class="register_right">
                                    <form class="register_form database_operation" action="{{ route('signupSub') }}">
                                        <div class="input-icons">
                                            <i class="fas fa-id-badge"></i>
                                            <input class="input-field" name="name" type="text" placeholder="Full Name" />
                                        </div>
                                        <div class="d-lg-flex">
                                            <div class="input-icons mr-3">
                                                <i class="fas fa-envelope"></i>
                                                <input class="input-field" name="email" type="text" placeholder="Email Adress" />
                                            </div>
                                            <div class="input-icons">
                                                <i class="fas fa-phone-alt"></i>
                                                <input class="input-field" name="mobile_no" type="text" placeholder="Phone Number" />
                                            </div>
                                        </div>
                                        <div class="input-icons">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <input class="input-field" name="address" type="text" placeholder="Address" />
                                        </div>
                                        <div class="d-flex">

                                            <div class="input-icons  mr-3">
                                                <i class="fa fa-user"> </i>
                                                <input class="input-field" name="username" type="text" placeholder="Username" />
                                            </div>
                                            <div class="input-icons">
                                                <i class="fas fa-lock"></i>
                                                <input class="input-field" name="password" type="password" placeholder="Password" />
                                            </div>
                                        </div>
                                        <div class="d-flex mb-4 align-items-center">
                                            <span class="d-flex align-items-center font-weight-bold">
                                                <input class="mr-2" type="checkbox" />Agree To Terms And Policy
                                                Services</span>
                                        </div>
                                        <div class="d-flex justify-content-between flex-wrap">
                                            <button type="submit" class="btn register-btn">Register Account</button>
                                            <p style="color: #fff !important"
                                                class=" m-0 text-center font-weight-bold register-p">
                                                Do you
                                                already
                                                have an <br>account? <a style="color: #002c58 !important" href="{{ url('login') }}">Log
                                                    In
                                                    Here</a>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>






{{--   


<div class="container" style="width: 30%">
        <div class="signUp_container">
            <div class="signUp_title">
                <h3 class="text-center">Portal login</h3>
                <hr>
            </div>
            <form action="{{ route('signupSub') }}" class="database_operation">
                @csrf
                <div class="signUp_form">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Enter Name</label>
                                
                                <input type="text" name="name" placeholder="Enter Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Enter E-Mail</label>
                                <input type="text" name="email" placeholder="Enter E-Mail" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Enter Mobile No</label>
                                <input type="text" name="mobile_no" placeholder="Enter Mobile No" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" placeholder="Enter address" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Enter Username</label>
                                <input type="text" name="username" placeholder="Enter username" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Enter Password</label>
                                <input type="password" name="password" placeholder="Enter Password" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-info btn-block">Sign Up</button>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label id="hidden_msg"></label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group text-center">

                                OR
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <h5 class="text-right"><a class="btn btn-primary btn-block" href="{{ url('login') }}">Login</a></h5>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> --}}

@endsection