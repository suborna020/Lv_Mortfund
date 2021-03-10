@extends('ui.layout.app')

@section('content')    

<div class="container" style="width: 30%;margin-top:115px">
    <div class="signUp_container">
        <div class="signUp_title">
            <h3 class="text-center">login</h3>
            <hr>
        </div>

        <div class="signUp_form">
            <div class="row">
                <form action="{{ url('login') }}" class="database_operation">
                    @csrf
                    <table>
                        <tr>
                            <td>
                                 <label>Username</label>
                            </td>
                            <td>
                                 <input type="text" name="username" placeholder="Enter username" class="form-control">
                            </td>
                        </tr>
                        <tr>    
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input type="password" name="password" placeholder="Enter Password" class="form-control">
                            </td>
                        </tr>
                        <tr>    
                            <td colspan="2">
                                <button class="btn btn-info btn-block">Login</button>
                            </td>
                        </tr>
                        <tr>    
                            <td colspan="2">
                                <div class="form-group text-center">
                                    OR
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name=""> Remember Password</td>
                            <td><a href="{{route('forgot-password')}}">Forgot Password</a> </td>
                        </tr>
                        <tr>    
                            <td colspan="2">
                                <h5 class="text-right"><a class="btn btn-primary btn-block"
                                        href="{{ url('sign-up') }}">Sign Up</a>
                                </h5>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="container" style="margin-top:115px">
    <div class="row">
        <div class="col-12 col-md-8" style="background-image: url('{{asset('images/back2.png')}}');">
            <div class="row">
                <form action="{{ url('login') }}" class="database_operation">
                    @csrf
                    <table>
                        <tr>
                            <td>
                                 <label>Username</label>
                            </td>
                            <td>
                                 <input type="text" name="username" placeholder="Enter username" class="form-control">
                            </td>
                        </tr>
                        <tr>    
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input type="password" name="password" placeholder="Enter Password" class="form-control">
                            </td>
                        </tr>
                        <tr>    
                            <td colspan="2">
                                <button class="btn btn-info btn-block">Login</button>
                            </td>
                        </tr>
                        <tr>    
                            <td colspan="2">
                                <div class="form-group text-center">
                                    OR
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name=""> Remember Password</td>
                            <td><a href="{{route('forgot-password')}}">Forgot Password</a> </td>
                        </tr>
                        <tr>    
                            <td colspan="2">
                                <h5 class="text-right"><a class="btn btn-primary btn-block"
                                        href="{{ url('sign-up') }}">Sign Up</a>
                                </h5>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-4" style="background-image: url('{{asset('images/login.png')}}');">
        </div>
    </div>

</div>

@endsection    