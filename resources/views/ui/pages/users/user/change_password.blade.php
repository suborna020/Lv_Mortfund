@extends('ui.layout.app')

@section('head-script')
    <link href="{{asset('css/new/change-password.css')}}" rel="stylesheet">
@endsection

@section('content')


 <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Change Password</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <i class="fa fa-home fa-2x home-icon" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section>



    <section class="profile py-5">
        <div class="container">
            <div class="row">
                <!-- left -->
                <div class="col-12 col-md-4">
                    <div class="card" style=" box-shadow: 0 2px 4px 0 #e6e6e6, 0 2px 4px 0 #e6e6e6">
                        <div class="card-body">
                            <div style="text-align: center;">
                                <div style="overflow:hidden;border: 3px solid #f8800b; height: 110px; width: 110px; border-radius: 50%;
                                    display: flex; align-items: center; justify-content: center; margin: 0 auto">
                                    <!-- updated img -->
                                    <img class="img-fluid" src="{{asset('uploads/'.$profile->user_photo)}}" alt="user" />
                                </div>
                                <h5 class="mt-3">{{$profile->name}}</h4>
                            </div>
                            <hr class="my-4" style="width: 100px;">
                            <div class="profile_infowrapper">
                                <div><i class="fas fa-envelope mr-3"></i>
                                    <p>{{$profile->email}}</p>
                                </div>
                                <div> <i class="fa fa-user mr-3"> </i>
                                    <p> {{$profile->username}}</p>
                                </div>
                                <div> <i class="fas fa-phone-alt mr-3"></i>
                                    <p> {{$profile->mobile_no}} </p>
                                </div>
                                <div><i class="fas fa-map-marker-alt mr-3"></i>
                                    <p>{{$profile->address}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- right -->
                <div class="col-12 col-md-8">
                    <div class="card" style=" box-shadow: 0 2px 4px 0 #e6e6e6, 0 2px 4px 0 #e6e6e6">
                        <div class="card-body">
                            {!! session('message') !!}
                             
                            <form class="form-group" id="changePassword" action="/changeUserPassword/{{$profile->id}}" method="post">
                                @csrf
                                <input type="hidden" name="" id="userId" value="{{$profile->id}}">
                                <label>Current Password*</label>
                                <div class="input-icons">
                                    <i class="fas fa-lock"></i>
                                    <input class="input-field" type="password" id="current_password" name="current_password" />
                                </div>
                                <label>New Password*</label>
                                <div class="input-icons">
                                    <i class="fas fa-lock"></i>
                                    <input class="input-field" type="password" id="new_password" name="new_password" />
                                </div>
                                <label>Confirm Password*</label>
                                <div class="input-icons">
                                    <i class="fas fa-lock"></i>
                                    <input class="input-field" type="password" id="confirm_password" name="confirm_password" />
                                </div>
                                <div class="d-flex justify-content-end align-items-end">
                                    <button class="btn profile-btn" type="submit">Update Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection