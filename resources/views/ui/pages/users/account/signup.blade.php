@extends('ui.layout.app')

@section('content')

<div class="container" style="width: 30%">
        <div class="signUp_container">
            <div class="signUp_title">
                <h3 class="text-center">Portal login</h3>
                <hr>
            </div>
            <form action="{{ route('sign-up') }}" class="database_operation">
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
    </div>

@endsection